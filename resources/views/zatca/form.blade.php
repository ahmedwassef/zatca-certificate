<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>نموذج إعداد شهادة هيئة الزكاة والضريبة والجمارك (ZATCA)</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cairo:400,500,600,700&display=swap" rel="stylesheet" />
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Tailwind CSS - optimized build for RTL */
            *,::before,::after{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::before,::after{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Cairo,ui-sans-serif,system-ui,sans-serif}body{margin:0;line-height:inherit}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,[type='button'],[type='reset'],[type='submit']{-webkit-appearance:button;background-color:transparent;background-image:none}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}button,[role="button"]{cursor:pointer}:disabled{cursor:default}img,svg,video,canvas,audio,iframe,embed,object{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}.container{width:100%}@media(min-width:640px){.container{max-width:640px}}@media(min-width:768px){.container{max-width:768px}}@media(min-width:1024px){.container{max-width:1024px}}@media(min-width:1280px){.container{max-width:1280px}}@media(min-width:1536px){.container{max-width:1536px}}.mx-auto{margin-left:auto;margin-right:auto}.my-8{margin-top:2rem;margin-bottom:2rem}.mb-2{margin-bottom:0.5rem}.mb-4{margin-bottom:1rem}.mb-6{margin-bottom:1.5rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.block{display:block}.flex{display:flex}.grid{display:grid}.hidden{display:none}.h-10{height:2.5rem}.h-12{height:3rem}.min-h-screen{min-height:100vh}.w-full{width:100%}.max-w-4xl{max-width:56rem}.flex-1{flex:1 1 0%}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media(min-width:768px){.md\\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}.flex-col{flex-direction:column}.items-center{align-items:center}.justify-center{justify-content:center}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.space-y-2>:not([hidden])~:not([hidden]){--tw-space-y-reverse:0;margin-top:calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(0.5rem * var(--tw-space-y-reverse))}.space-y-4>:not([hidden])~:not([hidden]){--tw-space-y-reverse:0;margin-top:calc(1rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(1rem * var(--tw-space-y-reverse))}.rounded-lg{border-radius:0.5rem}.border{border-width:1px}.border-gray-300{--tw-border-opacity:1;border-color:rgb(209 213 219/var(--tw-border-opacity))}.border-green-300{--tw-border-opacity:1;border-color:rgb(134 239 172/var(--tw-border-opacity))}.border-red-300{--tw-border-opacity:1;border-color:rgb(252 165 165/var(--tw-border-opacity))}.bg-blue-600{--tw-bg-opacity:1;background-color:rgb(37 99 235/var(--tw-bg-opacity))}.bg-gray-50{--tw-bg-opacity:1;background-color:rgb(249 250 251/var(--tw-bg-opacity))}.bg-green-50{--tw-bg-opacity:1;background-color:rgb(240 253 244/var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242/var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255/var(--tw-bg-opacity))}.bg-yellow-50{--tw-bg-opacity:1;background-color:rgb(254 252 232/var(--tw-bg-opacity))}.p-4{padding:1rem}.p-6{padding:1.5rem}.px-4{padding-left:1rem;padding-right:1rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.py-3{padding-top:0.75rem;padding-bottom:0.75rem}.text-center{text-align:center}.text-right{text-align:right}.font-cairo{font-family:Cairo,ui-sans-serif,system-ui,sans-serif}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-2xl{font-size:1.5rem;line-height:2rem}.font-bold{font-weight:700}.font-medium{font-weight:500}.font-semibold{font-weight:600}.text-blue-800{--tw-text-opacity:1;color:rgb(30 64 175/var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99/var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity:1;color:rgb(55 65 81/var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39/var(--tw-text-opacity))}.text-green-800{--tw-text-opacity:1;color:rgb(22 101 52/var(--tw-text-opacity))}.text-red-800{--tw-text-opacity:1;color:rgb(153 27 27/var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255/var(--tw-text-opacity))}.text-yellow-800{--tw-text-opacity:1;color:rgb(133 77 14/var(--tw-text-opacity))}.shadow-lg{--tw-shadow:0 10px 15px -3px rgb(0 0 0/0.1),0 4px 6px -4px rgb(0 0 0/0.1);--tw-shadow-colored:0 10px 15px -3px var(--tw-shadow-color),0 4px 6px -4px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.focus\\:border-blue-500:focus{--tw-border-opacity:1;border-color:rgb(59 130 246/var(--tw-border-opacity))}.focus\\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus\\:ring-2:focus{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000)}.focus\\:ring-blue-500:focus{--tw-ring-opacity:1;--tw-ring-color:rgb(59 130 246/var(--tw-ring-opacity))}.hover\\:bg-blue-700:hover{--tw-bg-opacity:1;background-color:rgb(29 78 216/var(--tw-bg-opacity))}@media(min-width:768px){.md\\:text-3xl{font-size:1.875rem;line-height:2.25rem}}
            .rtl {
                direction: rtl;
            }
            .loader {
                border: 4px solid #f3f3f3;
                border-top: 4px solid #3498db;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                animation: spin 1s linear infinite;
                display: inline-block;
                margin-left: 10px;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
    @endif
</head>
<body class="bg-gray-50 font-cairo rtl" dir="rtl">
    <div class="min-h-screen flex flex-col justify-center py-12">
        <div class="mx-auto max-w-4xl px-4">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                    نموذج إعداد شهادة هيئة الزكاة والضريبة والجمارك
                </h1>
                <p class="text-gray-600">
                    قم بملء البيانات المطلوبة لإنشاء طلب الحصول على شهادة ZATCA الخاصة بك
                </p>
            </div>

            <!-- Alert Messages -->
            <div id="alertContainer" class="mb-6"></div>

            <!-- Form -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <form id="zatcaForm" class="space-y-6">
                    @csrf
                    
                    <!-- Environment Selection -->
                    <div class="bg-yellow-50 border border-yellow-300 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-yellow-800 mb-4">اختيار البيئة</h3>
                        <div class="flex gap-4">
                            <label class="flex items-center">
                                <input type="radio" name="env" value="Sandbox" checked class="ml-2">
                                <span class="text-gray-700">بيئة التجريب (Sandbox)</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="env" value="Production" class="ml-2">
                                <span class="text-gray-700">بيئة الإنتاج (Production)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Company Information -->
                    <div class="bg-blue-50 border border-blue-300 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-blue-800 mb-4">معلومات الشركة</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="relative mb-4">
                                <label for="organizationName" class="block text-sm font-medium text-gray-700 mb-2">
                                    اسم الشركة <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="organizationName" name="organizationName" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right" placeholder="مثال: شركة التقنية المتقدمة">
                                <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-organizationName" aria-live="polite">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <span></span>
                                </div>
                            </div>
                            
                            <div class="relative mb-4">
                                <label for="commonName" class="block text-sm font-medium text-gray-700 mb-2">
                                    الاسم المشترك <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="commonName" 
                                       name="commonName" 
                                       required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right"
                                       placeholder="مثال: TST-886431145-399999999900003">
                                <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-commonName" aria-live="polite">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <span></span>
                                </div>
                            </div>
                            
                            <div class="relative mb-4">
                                <label for="organizationIdentifier" class="block text-sm font-medium text-gray-700 mb-2">
                                    معرف الشركة (VAT Number) <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="organizationIdentifier" 
                                       name="organizationIdentifier" 
                                       required 
                                       pattern="[0-9]{15}" 
                                       maxlength="15"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="399999999900003"
                                       dir="ltr">
                                <p class="text-sm text-gray-500 mt-1">رقم ضريبة القيمة المضافة (15 رقم)</p>
                                <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-organizationIdentifier" aria-live="polite">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <span></span>
                                </div>
                            </div>
                            
                            <div class="relative mb-4">
                                <label for="businessCategory" class="block text-sm font-medium text-gray-700 mb-2">
                                    فئة النشاط التجاري <span class="text-red-500">*</span>
                                </label>
                                <select id="businessCategory" 
                                        name="businessCategory" 
                                        required 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right">
                                    <option value="">اختر فئة النشاط</option>
                                    <option value="Supply activities to support transportation">أنشطة الدعم للنقل</option>
                                    <option value="Retail trade">تجارة التجزئة</option>
                                    <option value="Wholesale trade">تجارة الجملة</option>
                                    <option value="Manufacturing">التصنيع</option>
                                    <option value="Construction">البناء والتشييد</option>
                                    <option value="Information technology">تقنية المعلومات</option>
                                    <option value="Professional services">الخدمات المهنية</option>
                                    <option value="Other">أخرى</option>
                                </select>
                                <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-businessCategory" aria-live="polite">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Serial Number Information -->
                    <div class="bg-green-50 border border-green-300 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-green-800 mb-4">معلومات الرقم التسلسلي</h3>
                        <div class="grid grid-cols-1 gap-4">
                            <div class="relative mb-4">
                                <label for="serialNumber" class="block text-sm font-medium text-gray-700 mb-2">
                                    الرقم التسلسلي <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="serialNumber" 
                                       name="serialNumber" 
                                       required 
                                       value="1-TST"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       dir="ltr">
                                <p class="text-sm text-gray-500 mt-1">
                                    اسم الحل: TST | الإصدار: 1.0 | الرقم التسلسلي: (أدخل رقمك هنا)
                                </p>
                                <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-serialNumber" aria-live="polite">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="bg-gray-50 border border-gray-300 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">العنوان المسجل</h3>
                        <div class="relative mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                العنوان الكامل <span class="text-red-500">*</span>
                            </label>
                            <textarea id="address" 
                                      name="address" 
                                      required 
                                      rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right"
                                      placeholder="مثال: شارع الملك فهد، حي العليا، الرياض 12244-2255، المملكة العربية السعودية"></textarea>
                            <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-address" aria-live="polite">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                <span></span>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Types -->
                    <div class="bg-red-50 border border-red-300 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-red-800 mb-4">أنواع الفواتير المدعومة</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="relative">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="simplified" value="1" class="ml-2">
                                        <span class="font-medium">الفواتير المبسطة (Simplified Invoice)</span>
                                    </label>
                                    <p class="text-sm text-gray-600 mr-6">للمبيعات المباشرة للأفراد (B2C)</p>
                                    <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-simplified" aria-live="polite">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <div class="relative">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="standard" value="1" checked class="ml-2">
                                        <span class="font-medium">الفواتير المعيارية (Standard Invoice)</span>
                                    </label>
                                    <p class="text-sm text-gray-600 mr-6">للمبيعات للشركات والمؤسسات (B2B)</p>
                                    <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-standard" aria-live="polite">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-yellow-800 mt-4 bg-yellow-100 p-2 rounded">
                            <strong>ملاحظة:</strong> يجب اختيار نوع واحد على الأقل من أنواع الفواتير
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col md:flex-row gap-4 pt-6">
                        <button type="submit" 
                                id="generateBtn"
                                class="flex-1 bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors flex items-center justify-center relative">
                            <span id="generateBtnText">إنشاء طلب الشهادة (CSR)</span>
                            <span id="generateBtnSpinner" class="ml-2 hidden">
                                <svg class="animate-spin h-5 w-5 text-white" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/></svg>
                            </span>
                            <span id="generateBtnSuccess" class="ml-2 hidden">
                                <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            <span id="generateBtnError" class="ml-2 hidden">
                                <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </span>
                        </button>
                        
                        <button type="button" 
                                id="sendBtn"
                                disabled
                                class="flex-1 bg-gray-400 text-white py-3 px-6 rounded-lg font-semibold cursor-not-allowed opacity-50 transition-colors flex items-center justify-center relative">
                            إرسال إلى ZATCA
                            <span id="sendBtnSpinner" class="ml-2 hidden">
                                <svg class="animate-spin h-5 w-5 text-white" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/></svg>
                            </span>
                            <span id="sendBtnSuccess" class="ml-2 hidden">
                                <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            <span id="sendBtnError" class="ml-2 hidden">
                                <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Results Section -->
            <div id="resultsSection" class="mt-8 hidden">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">نتائج إنشاء الشهادة</h3>
                    
                    <div class="space-y-4">
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">المفتاح الخاص (Private Key)</label>
                            <textarea id="privateKey" 
                                      readonly 
                                      class="w-full h-40 px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-sm font-mono"
                                      dir="ltr"></textarea>
                            <button type="button" onclick="copyToClipboard('privateKey')" class="mt-2 px-2 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none flex items-center" title="نسخ إلى الحافظة">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
                                <span class="ml-2">نسخ</span>
                            </button>
                            <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-privateKey" aria-live="polite">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                <span></span>
                            </div>
                        </div>
                        
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">طلب الشهادة (CSR)</label>
                            <textarea id="csrContent" 
                                      readonly 
                                      class="w-full h-40 px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-sm font-mono"
                                      dir="ltr"></textarea>
                            <button type="button" onclick="copyToClipboard('csrContent')" class="mt-2 px-2 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none flex items-center" title="نسخ إلى الحافظة">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
                                <span class="ml-2">نسخ</span>
                            </button>
                            <div class="text-red-600 text-xs mt-1 flex items-center hidden" id="error-csrContent" aria-live="polite">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-green-50 border border-green-300 rounded-lg">
                        <h4 class="font-semibold text-green-800 mb-2">الخطوات التالية:</h4>
                        <ol class="list-decimal list-inside text-sm text-green-700 space-y-1">
                            <li>احفظ المفتاح الخاص في مكان آمن</li>
                            <li>استخدم طلب الشهادة (CSR) للحصول على شهادة من ZATCA</li>
                            <li>قم بتكوين نظامك باستخدام الشهادة المستلمة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('zatcaForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const generateBtn = document.getElementById('generateBtn');
            const generateBtnText = document.getElementById('generateBtnText');
            const generateLoader = document.getElementById('generateBtnSpinner');
            const sendBtn = document.getElementById('sendBtn');
            
            // Show loading state
            generateBtn.disabled = true;
            generateBtnText.textContent = 'جارٍ الإنشاء...';
            generateLoader.classList.remove('hidden');
            
            try {
                const formData = new FormData(e.target);
                const data = Object.fromEntries(formData.entries());
                
                // Convert checkbox values
                data.simplified = data.simplified === '1';
                data.standard = data.standard === '1';
                
                // Validate invoice types
                if (!data.simplified && !data.standard) {
                    showAlert('يجب اختيار نوع واحد على الأقل من أنواع الفواتير', 'error');
                    return;
                }
                
                const response = await fetch('/zatca/generate-csr', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    // Display results
                    document.getElementById('privateKey').value = result.data.privateKey;
                    document.getElementById('csrContent').value = result.data.csrContent;
                    document.getElementById('resultsSection').classList.remove('hidden');
                    
                    // Enable send button
                    sendBtn.disabled = false;
                    sendBtn.classList.remove('bg-gray-400', 'cursor-not-allowed', 'opacity-50');
                    sendBtn.classList.add('bg-green-600', 'hover:bg-green-700');
                    
                    showAlert('تم إنشاء طلب الشهادة بنجاح!', 'success');
                    
                    // Scroll to results
                    document.getElementById('resultsSection').scrollIntoView({ behavior: 'smooth' });
                } else {
                    showAlert('حدث خطأ أثناء إنشاء طلب الشهادة: ' + (result.message || 'خطأ غير معروف'), 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showAlert('حدث خطأ في الاتصال بالخادم', 'error');
            } finally {
                // Reset button state
                generateBtn.disabled = false;
                generateBtnText.textContent = 'إنشاء طلب الشهادة (CSR)';
                generateLoader.classList.add('hidden');
            }
        });
        
        // Send CSR to ZATCA
        document.getElementById('sendBtn').addEventListener('click', async function() {
            const csrContent = document.getElementById('csrContent').value;
            
            if (!csrContent) {
                showAlert('لا يوجد طلب شهادة للإرسال', 'error');
                return;
            }
            
            this.disabled = true;
            this.textContent = 'جارٍ الإرسال...';
            
            try {
                const response = await fetch('/zatca/send-csr', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        csrContent: csrContent
                    })
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    showAlert('تم إرسال طلب الشهادة إلى ZATCA بنجاح!', 'success');
                } else {
                    showAlert('حدث خطأ أثناء إرسال طلب الشهادة: ' + (result.message || 'خطأ غير معروف'), 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showAlert('حدث خطأ في الاتصال بالخادم', 'error');
            } finally {
                this.disabled = false;
                this.textContent = 'إرسال إلى ZATCA';
            }
        });
        
        function showAlert(message, type) {
            const alertContainer = document.getElementById('alertContainer');
            const alertClass = type === 'success' ? 'bg-green-50 border-green-300 text-green-800' : 'bg-red-50 border-red-300 text-red-800';
            
            const alertHTML = `
                <div class="border rounded-lg p-4 ${alertClass}">
                    <p class="font-medium">${message}</p>
                </div>
            `;
            
            alertContainer.innerHTML = alertHTML;
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 5000);
        }
        
        function copyToClipboard(elementId) {
            const element = document.getElementById(elementId);
            element.select();
            element.setSelectionRange(0, 99999);
            
            navigator.clipboard.writeText(element.value).then(() => {
                showAlert('تم نسخ المحتوى بنجاح!', 'success');
            }).catch(() => {
                showAlert('فشل في نسخ المحتوى', 'error');
            });
        }
        
        // Auto-format VAT number
        document.getElementById('organizationIdentifier').addEventListener('input', function(e) {
            // Remove non-digits
            let value = e.target.value.replace(/\D/g, '');
            
            // Limit to 15 digits
            if (value.length > 15) {
                value = value.slice(0, 15);
            }
            
            e.target.value = value;
        });
        
        // Auto-generate common name based on VAT number
        document.getElementById('organizationIdentifier').addEventListener('blur', function(e) {
            const vatNumber = e.target.value;
            const commonNameField = document.getElementById('commonName');
            
            if (vatNumber.length === 15 && !commonNameField.value) {
                commonNameField.value = `TST-886431145-${vatNumber}`;
            }
        });
    </script>
</body>
</html>
