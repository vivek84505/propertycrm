<!-- Add Document Card starts -->
<div class="card relative" id="userCard"  >
  <div class="card-body flex flex-col p-6">
    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
      <div class="flex-1">
        <!-- Card title or other content can go here -->
      </div>
    </header>


<div class="card-text h-full" >
  <form id="marathidoc_form">
    <div class="form-group">
      <!-- Section 1: Personal Information -->
      <h3 class="text-lg font-semibold mb-4">दस्तसाठी आवश्यक माहिती / Required Information</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
          <label for="document_execution_date" class="form-label">दस्त निष्पादनाचा दिनांक /Document Execution Date</label>
          <input id="document_execution_date" name="document_execution_date" type="date" class="form-control" >
        </div>

        <div class="input-area">
          <label for="religious_symbol" class="form-label">धार्मिक चिन्ह (फाेटाे) /Religious Symbols (Image)</label>
          <input id="religious_symbol" name="religious_symbol" type="file" class="form-control" >
        </div>

      </div>

      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
     
      <!-- Separator -->
    <hr class="separatorline my-8 border-t-8 border-gray-300">

      <!-- Section 2: Contact Information -->
      <h3 class="text-lg font-semibold mt-8 mb-4"> पक्षकार संपूर्ण माहीती / Party Details</h3>
    <div class="grid grid-cols-4 gap-6">
  <div class="input-area">
    <label for="mobile" class="form-label">पक्षकार क्रमांक</label>
    <input id="party_number" name="party_number" type="text" value="1" class="form-control" disabled>
  </div>

  <div class="input-area">
    <label for="party_type" class="form-label">पक्षकार</label>
    <select name="party_type" id="party_type" class="form-control w-full mt-2">
      <option value="" disabled selected hidden>पक्षकार निवडा</option>  
      <option value="लिहून देणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">लिहून देणार</option>
      <option value="लिहून घेणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">लिहून घेणार </option>           
      <option value="मान्यता देणार" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">मान्यता देणार </option>           
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


  
</div>



 <div class="grid grid-cols-4 gap-6">
  
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
 
   
   

  <!--  --> 
  
</div>

 <!-- party full address section start -->
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

   

   
  <!--  -->
  
   

   
  <!--  --> 
  
</div>

    <!-- party full address section end -->

    </div>
    <button class="btn flex justify-center btn-dark mt-5 ml-auto">Submit</button>
  </form>
</div>

  </div>
</div>
<br/>
<!-- Add Document Card End -->