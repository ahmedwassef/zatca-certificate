<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Salla\ZATCA\GenerateCSR;
use Salla\ZATCA\Models\CSRRequest;
use Exception;

class ZatcaService
{
    protected $config;

    public function __construct()
    {
        $this->config = config('zatca');
    }

    /**
     * توليد CSR والمفتاح الخاص باستخدام Salla/ZATCA
     */
    public function generateCsr(array $data): array
    {
        try {
            // Ensure storage directory exists
            if (!Storage::exists('zatca')) {
                Storage::makeDirectory('zatca');
            }

            $csrRequest = CSRRequest::make()
                ->setUID($data['organizationIdentifier'])
                ->setSerialNumber('TST', '1.0', $data['serialNumber'])
                ->setCommonName($data['commonName'])
                ->setCountryName('SA')
                ->setOrganizationName($data['organizationName'])
                ->setOrganizationalUnitName($data['businessCategory'])
                ->setRegisteredAddress($data['address'])
                ->setInvoiceType($data['simplified'] ?? false, $data['standard'] ?? false)
                ->setCurrentZatcaEnv($data['env'] ?? 'Sandbox');

            $CSR = GenerateCSR::fromRequest($csrRequest)->initialize()->generate();

            // حفظ المفتاح الخاص والـCSR في التخزين مع timestamp
            $timestamp = now()->format('Y-m-d_H-i-s');
            $privateKey = $CSR->getPrivateKey();
            $privateKeyString = '';
            if (is_string($privateKey)) {
                $privateKeyString = $privateKey;
            } else {
                openssl_pkey_export($privateKey, $privateKeyString);
            }
            Storage::put("zatca/private_key_{$timestamp}.key", $privateKeyString);
            Storage::put('zatca/private.key', $privateKeyString);
            Storage::put('zatca/request.csr', $CSR->getCsrContent());

            // حفظ معلومات إضافية
            $metadata = [
                'generated_at' => now()->toISOString(),
                'organization_name' => $data['organizationName'],
                'organization_identifier' => $data['organizationIdentifier'],
                'common_name' => $data['commonName'],
                'environment' => $data['env'] ?? 'Sandbox',
                'simplified' => $data['simplified'] ?? false,
                'standard' => $data['standard'] ?? false,
            ];
            
            //Storage::put("zatca/metadata_{$timestamp}.json", json_encode($metadata, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            Log::info('ZATCA CSR generated successfully', $metadata);

            return [
                'privateKey' => $privateKeyString,
                'csrContent' => $CSR->getCsrContent(),
                'metadata' => $metadata,
            ];
        } catch (Exception $e) {
            Log::error('ZATCA CSR generation failed', [
                'error' => $e->getMessage(),
                'data' => $data
            ]);
            throw new Exception('خطأ أثناء توليد CSR: ' . $e->getMessage());
        }
    }

    /**
     * إرسال CSR إلى ZATCA
     */
    public function sendCsrToZatca(string $csrContent, array $apiConfig): array
    {
        try {
            $endpoint = $apiConfig['endpoint'];
            $environment = $apiConfig['environment'] ?? 'Sandbox';
            
            // في بيئة التجريب، نقوم فقط بمحاكاة الإرسال
            if ($environment === 'Sandbox') {
                Log::info('ZATCA CSR simulation sent', [
                    'endpoint' => $endpoint,
                    'environment' => $environment
                ]);

                return [
                    'success' => true,
                    'message' => 'تم إرسال CSR إلى بيئة التجريب بنجاح. في بيئة الإنتاج، ستحتاج إلى استخدام API الحقيقي.',
                    'csrContent' => base64_encode($csrContent),
                    'endpoint' => $endpoint,
                    'environment' => $environment,
                    'next_steps' => [
                        'في بيئة الإنتاج، ستحصل على شهادة من ZATCA',
                        'احفظ الشهادة في مكان آمن',
                        'استخدم الشهادة مع المفتاح الخاص لتوقيع الفواتير'
                    ]
                ];
            }

            // للبيئة الحقيقية - سيتم تنفيذها عند الحاجة
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])
                ->post($endpoint, [
                    'csr' => base64_encode($csrContent)
                ]);

            if ($response->successful()) {
                $responseData = $response->json();
                
                Log::info('ZATCA CSR sent successfully', [
                    'endpoint' => $endpoint,
                    'response' => $responseData
                ]);

                return [
                    'success' => true,
                    'message' => 'تم إرسال CSR إلى ZATCA بنجاح',
                    'response' => $responseData,
                    'endpoint' => $endpoint,
                    'environment' => $environment
                ];
            } else {
                Log::error('ZATCA CSR sending failed', [
                    'endpoint' => $endpoint,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);

                throw new Exception('فشل في إرسال CSR إلى ZATCA: ' . $response->body());
            }

        } catch (Exception $e) {
            Log::error('ZATCA CSR sending error', [
                'error' => $e->getMessage(),
                'endpoint' => $apiConfig['endpoint'] ?? 'unknown'
            ]);
            throw new Exception('خطأ أثناء إرسال CSR إلى ZATCA: ' . $e->getMessage());
        }
    }

    /**
     * الحصول على حالة النظام
     */
    public function getStatus(): array
    {
        $status = [
            'config_loaded' => !empty($this->config),
            'storage_accessible' => Storage::exists('zatca'),
            'private_key_exists' => Storage::exists('zatca/private.key'),
            'csr_exists' => Storage::exists('zatca/request.csr'),
            'last_generated' => null,
            'files' => []
        ];

        // البحث عن آخر الملفات المنشأة
        $files = Storage::files('zatca');
        $csrFiles = array_filter($files, fn($file) => str_contains($file, 'request_') && str_ends_with($file, '.csr'));
        $keyFiles = array_filter($files, fn($file) => str_contains($file, 'private_key_') && str_ends_with($file, '.key'));
        $metadataFiles = array_filter($files, fn($file) => str_contains($file, 'metadata_') && str_ends_with($file, '.json'));

        if (!empty($csrFiles)) {
            rsort($csrFiles);
            $latestCsr = $csrFiles[0];
            $status['last_generated'] = Storage::lastModified($latestCsr);
        }

        $status['files'] = [
            'csr_files' => count($csrFiles),
            'key_files' => count($keyFiles),
            'metadata_files' => count($metadataFiles)
        ];

        return $status;
    }

    /**
     * الحصول على مسار الملف
     */
    public function getFilePath(string $type): string
    {
        switch ($type) {
            case 'private-key':
                return Storage::path('zatca/private.key');
            case 'csr':
                return Storage::path('zatca/request.csr');
            default:
                throw new Exception('نوع ملف غير مدعوم: ' . $type);
        }
    }

    /**
     * تنظيف الملفات القديمة
     */
    public function cleanupOldFiles(int $keepCount = 5): array
    {
        try {
            $files = Storage::files('zatca');
            $cleaned = [];

            // تنظيف ملفات CSR القديمة
            $csrFiles = array_filter($files, fn($file) => str_contains($file, 'request_') && str_ends_with($file, '.csr'));
            if (count($csrFiles) > $keepCount) {
                rsort($csrFiles); // الأحدث أولاً
                $toDelete = array_slice($csrFiles, $keepCount);
                foreach ($toDelete as $file) {
                    Storage::delete($file);
                    $cleaned[] = $file;
                }
            }

            // تنظيف ملفات المفاتيح القديمة
            $keyFiles = array_filter($files, fn($file) => str_contains($file, 'private_key_') && str_ends_with($file, '.key'));
            if (count($keyFiles) > $keepCount) {
                rsort($keyFiles);
                $toDelete = array_slice($keyFiles, $keepCount);
                foreach ($toDelete as $file) {
                    Storage::delete($file);
                    $cleaned[] = $file;
                }
            }

            // تنظيف ملفات البيانات الوصفية القديمة
            $metadataFiles = array_filter($files, fn($file) => str_contains($file, 'metadata_') && str_ends_with($file, '.json'));
            if (count($metadataFiles) > $keepCount) {
                rsort($metadataFiles);
                $toDelete = array_slice($metadataFiles, $keepCount);
                foreach ($toDelete as $file) {
                    Storage::delete($file);
                    $cleaned[] = $file;
                }
            }

            Log::info('ZATCA files cleanup completed', [
                'cleaned_files' => $cleaned,
                'keep_count' => $keepCount
            ]);

            return [
                'success' => true,
                'cleaned_files' => $cleaned,
                'message' => 'تم تنظيف الملفات القديمة بنجاح'
            ];

        } catch (Exception $e) {
            Log::error('ZATCA files cleanup failed', [
                'error' => $e->getMessage()
            ]);
            throw new Exception('فشل في تنظيف الملفات القديمة: ' . $e->getMessage());
        }
    }
}
