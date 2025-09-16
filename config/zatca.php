<?php

return [
    'env' => env('ZATCA_ENV', 'sandbox'), // sandbox | simulation | production

    'api_base_urls' => [
        'sandbox' => env('ZATCA_SANDBOX_API_URL', 'https://sandbox-api.fatoora.zatca.gov.sa'),
        'simulation' => env('ZATCA_SIMULATION_API_URL', 'https://simulation-api.fatoora.zatca.gov.sa'),
        'production' => env('ZATCA_PROD_API_URL', 'https://api.fatoora.zatca.gov.sa'),
    ],

    'organization_identifier' => env('ORG_IDENTIFIER', ''), // الرقم الضريبي / الهوية
    'common_name' => env('ZATCA_COMMON_NAME', ''),

    // مسارات حفظ المفاتيح والشهادة
    'private_key_path' => storage_path('app/zatca/private.key'),
    'csr_path' => storage_path('app/zatca/request.csr'),

    // بيانات إضافية في الطلب إلى ZATCA
    'serial_number' => env('ZATCA_SERIAL_NUMBER', ''),
    'business_category' => env('ZATCA_BUSINESS_CATEGORY', ''),

    // بيانات المصادقة مع API ZATCA
    'client_id' => env('ZATCA_CLIENT_ID', ''),
    'client_secret' => env('ZATCA_CLIENT_SECRET', ''),
];
