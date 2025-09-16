<?php

namespace App\Http\Controllers;

use App\Services\ZatcaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZatcaController extends Controller
{
    protected $zatcaService;

    public function __construct(ZatcaService $zatcaService)
    {
        $this->zatcaService = $zatcaService;
    }

    /**
     * عرض نموذج إعداد ZATCA
     */
    public function showForm()
    {
        return view('zatca.form');
    }

    /**
     * توليد CSR والمفتاح الخاص
     */
    public function generateCsr(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'organizationIdentifier' => 'required|string|size:15|regex:/^[0-9]+$/',
                'serialNumber' => 'required|string|min:1|max:50',
                'commonName' => 'required|string|min:3|max:100',
                'organizationName' => 'required|string|min:2|max:100',
                'businessCategory' => 'required|string',
                'address' => 'required|string|min:10|max:500',
                'simplified' => 'boolean',
                'standard' => 'boolean',
                'env' => 'required|in:Sandbox,Production',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'خطأ في البيانات المدخلة',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->all();
            
            // Ensure at least one invoice type is selected
            if (!($data['simplified'] ?? false) && !($data['standard'] ?? false)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'يجب اختيار نوع واحد على الأقل من أنواع الفواتير'
                ], 422);
            }

            $result = $this->zatcaService->generateCsr($data);

            return response()->json([
                'status' => 'success',
                'data' => $result,
                'message' => 'تم إنشاء طلب الشهادة بنجاح'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'حدث خطأ أثناء إنشاء طلب الشهادة: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * إرسال CSR إلى ZATCA
     */
    public function sendCsr(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'csrContent' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'محتوى طلب الشهادة مطلوب',
                    'errors' => $validator->errors()
                ], 422);
            }

            $env = session('zatca_env', 'Sandbox');
            $apiConfig = [
                'endpoint' => $env === 'Production' 
                    ? config('zatca.api_base_urls.production') . '/csids'
                    : config('zatca.api_base_urls.sandbox') . '/csids',
                'environment' => $env
            ];

            $result = $this->zatcaService->sendCsrToZatca($request->csrContent, $apiConfig);

            return response()->json([
                'status' => 'success',
                'data' => $result,
                'message' => 'تم إرسال طلب الشهادة إلى ZATCA بنجاح'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'حدث خطأ أثناء إرسال طلب الشهادة: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * عرض معلومات الحالة والإعدادات
     */
    public function showStatus()
    {
        try {
            $status = $this->zatcaService->getStatus();
            
            return response()->json([
                'status' => 'success',
                'data' => $status
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'فشل في جلب معلومات الحالة: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * تحميل الملفات (المفتاح الخاص أو CSR)
     */
    public function downloadFile(Request $request, $type)
    {
        try {
            if (!in_array($type, ['private-key', 'csr'])) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'نوع الملف غير صحيح'
                ], 400);
            }

            $filePath = $this->zatcaService->getFilePath($type);
            
            if (!file_exists($filePath)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'الملف غير موجود'
                ], 404);
            }

            $fileName = $type === 'private-key' ? 'zatca-private-key.key' : 'zatca-csr.csr';
            
            return response()->download($filePath, $fileName);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'فشل في تحميل الملف: ' . $e->getMessage()
            ], 500);
        }
    }
}
