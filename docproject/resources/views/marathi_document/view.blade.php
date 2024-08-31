<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light semiDark">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Colors">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title> DocProject </title>

    <!-- Favicon -->
  @include('include.header_assets')

  <style>
    .separatorline {
    border-top-width: 5px; /* Adjust the thickness as needed */
    border-color: #152030; /* Optional: Set the border color */
    
   
}
  </style>

</head>

<body class=" font-inter dashcode-app" id="body_class">
<main class="app-wrapper">
    @include('include/settings')

    @include('include/header')
    <div class="flex flex-col justify-between min-h-screen">
      <div>

     

      <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
          <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
              <div id="content_layout">
                 <!-- Add New Button -->
 
                 <!-- Main Content Area starts -->

<!-- BEGIN: Step Form Verticle -->

<div class="wizard card">
    <div class="card-header">
        <!-- <h4 class="card-title">
                                                    Vertical form wizard
                                                </h4> -->
    </div>

    <div class="card-body p-6">
        <div class="grid gap-5 grid-cols-12">
            <div class="lg:col-span-3 col-span-12">
                <div class="flex z-[5] items-start relative flex-col lg:min-h-full md:min-h-[300px] min-h-[250px] wizard-steps">
                    <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                        <div
                            class="transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium bg-white ring-slate-900 ring-opacity-70 text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700"
                        >
                            <div class="number-box">
                                <span class="number"> 1</span>

                                <span class="text-3xl no-icon">
                                    <iconify-icon icon="bx:check-double"> </iconify-icon>
                                </span>
                            </div>
                        </div>

                        <div class="bar-line2"></div>
                        <div class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                            <span class="w-max block">दस्तसाठी आवश्यक माहिती </span>
                        </div>
                    </div>

                    <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                        <div
                            class="transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium bg-white ring-slate-900 ring-opacity-70 text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700"
                        >
                            <div class="number-box">
                                <span class="number"> 2</span>

                                <span class="text-3xl no-icon">
                                    <iconify-icon icon="bx:check-double"> </iconify-icon>
                                </span>
                            </div>
                        </div>

                        <div class="bar-line2"></div>
                        <div class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                            <span class="w-max block">पक्षकार संपूर्ण माहीती</span>
                        </div>
                    </div>

                    <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                        <div
                            class="transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium bg-white ring-slate-900 ring-opacity-70 text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700"
                        >
                            <div class="number-box">
                                <span class="number"> 3</span>

                                <span class="text-3xl no-icon">
                                    <iconify-icon icon="bx:check-double"> </iconify-icon>
                                </span>
                            </div>
                        </div>

                        <div class="bar-line2"></div>
                        <div class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                            <span class="w-max block">Address</span>
                        </div>
                    </div>

                    <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                        <div
                            class="transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium bg-white ring-slate-900 ring-opacity-70 text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700"
                        >
                            <div class="number-box">
                                <span class="number"> 4</span>

                                <span class="text-3xl no-icon">
                                    <iconify-icon icon="bx:check-double"> </iconify-icon>
                                </span>
                            </div>
                        </div>

                        <div class="bar-line2"></div>
                        <div class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                            <span class="w-max block">Address</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="conten-box lg:col-span-9 col-span-12 h-full">
                <form>
                    <div class="wizard-form-step active" data-step="1">
                        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                            <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                 <h3 class="text-lg font-semibold mb-4">दस्तसाठी आवश्यक माहिती / Required Information</h3>
                            </div>
                            <div class="input-area">
                              <label for="document_type" class="form-label">दस्ताचा प्रकार /Document Article </label>
                                <select name="document_type" id="document_type" class="form-control w-full mt-2" placeholder="अनुष्छेद/आर्टिकल निवडा">
                                <option value="" disabled selected hidden>अनुष्छेद/आर्टिकल निवडा</option>  
                                <option value="abhihastantaran" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">25 - अभिहस्तांतरण पत्र</option>

                                </select>        
                            </div>

                            <div class="input-area">
                              <label for="property_type" class="form-label">मिळकतीचा प्रकार / Property Type</label>
                                <select name="property_type" id="property_type" class="form-control w-full mt-2" >
                                <option value="" disabled selected hidden>मिळकतीचा प्रकार निवडा</option>  
                                <option value="residential" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">रेसिडेंन्सीयल</option>
                                <option value="plot" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">प्लाॅट </option>           
                                </select>     
                            </div>


                            <div class="input-area">
                               <label for="document_title" class="form-label">दस्ताचा शिर्षक / Document Title</label>
                                <select name="document_title" id="document_title" class="form-control w-full mt-2" >
                                <option value="" disabled selected hidden>दस्ताचा शिर्षक निवडा</option>  
                                <option value="अभिहस्तांतरण पत्र" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अभिहस्तांतरण पत्र</option>
                                <option value="खरेदीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">खरेदीखत </option>           
                                <option value="खुषखरेदीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">खुषखरेदीखत </option>           
                                <option value="फराेक्तखरेदीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">फराेक्तखरेदीखत </option>           
                                <option value="विक्रीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">विक्रीखत </option>           
                                <option value="हस्तांतरणपत्र" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">हस्तांतरणपत्र </option>           
                                <option value="तबदिलपत्र" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">तबदिलपत्र </option>           
                                <option value="कायम खुषखरेदीखत" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">कायम खुषखरेदीखत </option>           
                                <option value="सेल डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">सेल डीड </option>           
                                <option value="कन्व्हेंन्स डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">कन्व्हेंन्स डीड </option>           
                                <option value="ट्रान्सफर डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">ट्रान्सफर डीड </option>           
                                <option value="असाईनमेंट+B45 डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">असाईनमेंट+B45 डीड </option>           
                                <option value="असाईनमेंट डीड" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">असाईनमेंट डीड </option>           
                                </select>     
                            </div>

                              <div class="input-area">
                                 <label for="property_consideration_price" class="form-label">माेबदला - किंमत /Consideration - Price</label>
                                 <input id="property_consideration_price" name="property_consideration_price" type="number" class="form-control" >
                              </div>

                              <div class="input-area">
                                  <label for="religious_slogan" class="form-label">धार्मिक घाेष वाक्य /Religious slogans</label>
                                 <input id="religious_slogan" name="religious_slogan" type="text" class="form-control" >
                              </div>

                              <div class="input-area">
                                 <label for="document_execution_date" class="form-label">दस्त निष्पादनाचा दिनांक /Doc Execution Date</label>
                                 <input id="document_execution_date" name="document_execution_date" type="date" class="form-control" >
                              </div>

                              <div class="input-area">
                                  <label for="religious_symbol" class="form-label">धार्मिक चिन्ह (फाेटाे) /Religious Symbols (Image)</label>
                                  <input id="religious_symbol" name="religious_symbol" type="file" class="form-control" >
                              </div>

                            <!-- CSRF Token -->
                             <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </div>
                    </div>
                    <div class="wizard-form-step" data-step="2">
                              <div class="grid lg:grid-cols-4">
                                  <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                      <h3 class="text-lg font-semibold mt-8 mb-4">पक्षकार संपूर्ण माहीती / Party Details</h3>
                                  </div>
                                  <!-- Maintaining the 4-column layout for form inputs -->
                                  <div class="grid grid-cols-4 gap-6">
                                      <div class="input-area col-md-3">
                                          <label for="party_number" class="form-label">पक्षकार क्रमांक</label>
                                          <input id="party_number" name="party_number" type="text" value="1" class="form-control" disabled>
                                      </div>

                                      <div class="input-area col-md-3">
                                          <label for="party_type" class="form-label">पक्षकार</label>
                                          <select name="party_type" id="party_type" class="form-control w-full mt-2">
                                              <option value="" disabled selected hidden>पक्षकार निवडा</option>
                                              <option value="लिहून देणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">लिहून देणार</option>
                                              <option value="लिहून घेणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">लिहून घेणार</option>
                                              <option value="मान्यता देणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">मान्यता देणार</option>
                                              <option value="पाॅवर ऑफ ऑटर्नि हाेल्डर / जनरल मुखत्यार/ स्पेशल मुखत्यार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">पाॅवर ऑफ ऑटर्नि हाेल्डर / जनरल मुखत्यार/ स्पेशल मुखत्यार</option>
                                          </select>
                                      </div>

                                      <div class="input-area">
                                          <label for="party_sub_type" class="form-label">पक्षकाराचा प्रकार</label>
                                          <select name="party_sub_type" id="party_sub_type" class="form-control w-full mt-2">
                                              <option value="" disabled selected hidden>पक्षकाराचा प्रकार निवडा</option>
                                              <option value="वैयक्तिक / स्वतंत्र" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">वैयक्तिक / स्वतंत्र</option>
                                              <option value="प्राेप्रायटरी फर्म" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">प्राेप्रायटरी फर्म</option>
                                              <option value="भागिदारी संस्था" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">भागिदारी संस्था</option>
                                              <option value="लिमीटेड लायबीलीटी पार्टनरशिप (LLP)" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">लिमीटेड लायबीलीटी पार्टनरशिप (LLP)</option>
                                              <option value="पब्लीक लिमीटेड कंपनी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">पब्लीक लिमीटेड कंपनी</option>
                                              <option value="प्रायव्हेट लिमीटेड कंपनी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">प्रायव्हेट लिमीटेड कंपनी</option>
                                              <option value="जाॅईंट व्हेंचर" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">जाॅईंट व्हेंचर</option>
                                              <option value="ट्रस्ट" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">ट्रस्ट</option>
                                              <option value="सहकारी संस्था / काेऑपरेटिव्ह साेसायटी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">सहकारी संस्था / काेऑपरेटिव्ह साेसायटी</option>
                                              <option value="एच.यू.एफ" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">एच.यू.एफ</option>
                                              <option value="बॅँक" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">बॅँक</option>
                                              <option value="महामंडळ" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">महामंडळ</option>
                                              <option value="महानगरपालिका, नगरपालिका, नगरपरिषद, ग्रामपंचायत, जिल्हा परिषद तर्फे" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">महानगरपालिका, नगरपालिका, नगरपरिषद, ग्रामपंचायत, जिल्हा परिषद तर्फे</option>
                                              <option value="महाराष्ट्र शासन तर्फे" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">महाराष्ट्र शासन तर्फे</option>
                                          </select>
                                      </div>

                                      <div class="input-area">
                                          <label for="party_tarfe" class="form-label">तर्फे</label>
                                          <select name="party_tarfe" id="party_tarfe" class="form-control w-full mt-2" disabled>
                                              <option value="" disabled selected hidden>तर्फे</option>
                                              <option value="अधिकृत व्यक्ती" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अधिकृत व्यक्ती</option>
                                              <option value="व्यवस्थापकीय संचालक" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">व्यवस्थापकीय संचालक</option>
                                              <option value="अधिकृत भागिदार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अधिकृत भागिदार</option>
                                              <option value="नियुक्त व्यक्ती" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">नियुक्त व्यक्ती</option>
                                              <option value="अध्यक्ष" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अध्यक्ष</option>
                                              <option value="विश्वस्त" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">विश्वस्त</option>
                                              <option value="मालक" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">मालक</option>
                                              <option value="सचिव" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">सचिव</option>
                                              <option value="सदस्य" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">सदस्य</option>
                                              <option value="एच.यु.एफ. कर्ता" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">एच.यु.एफ. कर्ता</option>
                                              <option value="अधिकृत संचालक" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अधिकृत संचालक</option>
                                              <option value="आयुक्त" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">आयुक्त</option>
                                              <option value="मुख्याधिकारी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">मुख्याधिकारी</option>
                                              <option value="अधिकारी" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">अधिकारी</option>
                                          </select>
                                      </div> 

                                      <div class="input-area">
                                       <label for="party_sirname" class="form-label">आडनांव</label>
                                       <input id="party_sirname" name="party_sirname" type="text"   class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_firstname" class="form-label">नांव</label>
                                        <input id="party_firstname" name="party_firstname" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_middlename" class="form-label">वडिलांचे / पतिचे नांव</label>
                                        <input id="party_middlename" name="party_middlename" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_birthdate" class="form-label">जन्म दिनांक (वय)</label>
                                        <input id="party_birthdate" name="party_birthdate" type="date"   class="form-control" >
                                      </div>

                                  <!--  -->
                                  
                                      <div class="input-area">
                                        <label for="party_gender" class="form-label">स्त्री / पुरुष</label>
                                        <select name="party_gender" id="party_gender" class="form-control w-full mt-2">
                                          <option value="" disabled selected hidden>निवडा</option>  
                                          <option value="male" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">पुरुष</option>
                                          <option value="female" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">स्त्री </option>
                                        </select>     
                                      </div>

                                      <div class="input-area">
                                        <label for="party_profession" class="form-label">व्यवसाय</label>
                                        <input id="party_profession" name="party_profession" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_pancard" class="form-label">पॅन नंबर</label>
                                        <input id="party_pancard" name="party_pancard" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_adharcard" class="form-label">आधार नंबर</label>
                                        <input id="party_adharcard" name="party_adharcard" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_cin" class="form-label">CIN</label>
                                        <input id="party_cin" name="party_cin" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_registration_number" class="form-label">Registration No</label>
                                        <input id="party_registration_number" name="party_registration_number" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_registration_date" class="form-label">Registration Date</label>
                                        <input id="party_registration_date" name="party_registration_date" type="date"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_mobile" class="form-label">माेबाईल नंबर</label>
                                        <input id="party_mobile" name="party_mobile" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_email" class="form-label">ई-मेल आय.डी</label>
                                        <input id="party_email" name="party_email" type="text"  class="form-control" >
                                      </div>


                                      
                                </div>

     
                                  

                              </div>

                                <h3 class="text-sm font-semibold mt-8 mb-4"><u> संपूर्ण पत्ता/Party Address </u> </h3>

                                <div class="grid grid-cols-4 gap-6">
  
                                    <div class="input-area">
                                        <label for="party_address_buildingname" class="form-label">ईमारतीचे नांव</label>
                                        <input id="party_address_buildingname" name="party_address_buildingname" type="text"   class="form-control" >
                                      </div>


                                      <div class="input-area">
                                        <label for="party_address_flatno" class="form-label">फ्लॅट / घर क्रं.</label>
                                        <input id="party_address_flatno" name="party_address_flatno" type="text"  class="form-control" >
                                      </div>

                                        <div class="input-area">
                                        <label for="party_address_floorno" class="form-label">मजला क्रमांक</label>
                                        <input id="party_address_floorno" name="party_address_floorno" type="text"  class="form-control" >
                                      </div>

                                        <div class="input-area">
                                        <label for="party_address_road" class="form-label">राेड / रस्ता / लेन नंबर</label>
                                        <input id="party_address_road" name="party_address_road" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_address_location" class="form-label">लाेकेशन</label>
                                        <input id="party_address_location" name="party_address_location" type="text"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_address_pincode" class="form-label">पीन काेड</label>
                                        <input id="party_address_pincode" name="party_address_pincode" type="number"  class="form-control" >
                                      </div>

                                      <div class="input-area">
                                        <label for="party_address_state" class="form-label">राज्य / स्टेट</label>
                                        <input id="party_address_state" name="party_address_state" type="text"  class="form-control" >
                                      </div>

                                        <div class="input-area">
                                        <label for="party_address_district" class="form-label">जिल्हा</label>
                                        <input id="party_address_district" name="party_address_district" type="text"  class="form-control" >
                                      </div>

                                        <div class="input-area">
                                        <label for="party_lihun_ghenar_hissa" class="form-label">लिहून घेणार यांचा हिस्सा (%)</label>
                                        <input id="party_lihun_ghenar_hissa" name="party_lihun_ghenar_hissa" type="text"  class="form-control" >
                                      </div>

                              </div>


                          </div>

                    <div class="wizard-form-step" data-step="3">
                        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                            <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">
                                    Address
                                </h4>
                            </div>
                            <div class="input-area lg:col-span-3 md:col-span-2 col-span-1">
                                <label for="address" class="form-label">Address*</label>
                                <textarea name="address" id="address" rows="3" class="form-control" placeholder="Your Address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-form-step" data-step="4">
                        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                            <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">
                                    Social Links
                                </h4>
                            </div>
                            <div class="input-area">
                                <label for="fblink" class="form-label">Facebook Link*</label>
                                <input id="fblink" type="url" class="form-control" placeholder="Facebook Link" />
                            </div>
                            <div class="input-area">
                                <label for="youtubelink" class="form-label">Youtube Link*</label>

                                <input id="youtubelink" type="url" class="form-control" placeholder="Youtube Link" />
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 space-x-3">
                        <button class="btn btn-dark prev-button" type="button">
                            prev
                        </button>
                        <button class="btn btn-dark next-button" type="button">
                            next
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Step Form Verticle -->
<!-- Main Content Area Ends -->

                

    

                  </div>
                </div>

              </div>
            </div>
          
          </div>
        </div>

        @include('include/footer');

</main>
@include('include.footer_assets');
 


<script>
    $(document).ready(function() {
    $("#marathidoc_form").validate({
        rules: {
            document_type: {
                required: true
            },
            property_type: {
                required: true
            },
            document_title: {
                required: true,                 
            },
            property_consideration_price: {
                required: true
            },
            religious_slogan: {
                required: true
            },
            religious_symbol: {
                required: true
            },
            document_execution_date: {
                required: true
            }
        },
        messages: {
            document_type: {
                required: "This Field is required"
            },
            property_type: {
                required: "This Field is required"
            },
            document_title: {
                required: "This Field is required"
            },
           property_consideration_price: {
                required: "This Field is required"
            },
           religious_slogan: {
                required: "This Field is required"
            },
           religious_symbol: {
                required: "This Field is required"
            },
            document_execution_date: {
                required: "This Field is required"
            }            
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('useradd')}}",
                dataType: "html",
                data: $('#marathidoc_form').serialize(),
                beforeSend: function() {

                    $("#loader").show();
                },               
                success: function(result) {

                    result = JSON.parse(result);
                   
                    if(result.status === 'success'){

                        alertify.success(result.returnmsg);    
                                

                    }
                    else if (result.status === 'fail'){
                        alertify.error(result.returnmsg);
                    } 

                    $('#marathidoc_form')[0].reset();

                    getuserlist();
                },
                complete: function() {
                    $("#loader").hide();
                },
                error : function(error) {

                }
            });
            return false;
        }
    });

});
</script>

<script>

    

$(document).ready(function() {

  // hiding side menu on page load
   $(".sidebar-wrapper").addClass("menu-hide");
      $("#menuCollapse").hide();
      $(".app-header").addClass("margin-0");
      $(".site-footer").addClass("margin-0");
      $("#content_wrapper").addClass("margin-0");

});


$(document).ready(function() {
    // Listen for changes in the party_sub_type dropdown
    $('#party_sub_type').on('change', function() {
        // Get the index of the selected option
        var selectedIndex = $(this).prop('selectedIndex');

        // Set the selected index in the party_tarfe dropdown
        $('#party_tarfe').prop('selectedIndex', selectedIndex);
    });
});
 

 

</script>



 </body>


</html>

