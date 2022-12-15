@extends('Company.mainpageForRegister')

@section('content-training')
<div class="content">
<form class="form-balqees"action="#">
<div class="row opportunity-form">
    <p><a class="link" href="#"> training specifications and regulations</a> <a href=<span class="glyphicon glyphicon-download-alt "></span></a></p>
    <div class="row opportunity-form">   
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Choose Logo:</label>
    <a href="#" class="btn-upload">choose a file <span class="glyphicon glyphicon-download-alt icon-white"></span> </a>
    <!-- <button class="btn-upload" type="submit">choose file</button>  -->
    </div>
         <div class="col">
    <label for="validationTooltip01" class="form-label">Organization website: *  </label>
      <input type="text" class="form-control" placeholder="Example: www.organization.com" name="Organization-website">
    </div></div>

  </div>

  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label">Organization full name in English :*</label>
      <input type="text" class="form-control" placeholder="Enter organization name here " name="orgnizationName">
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label">Organization email : *</label>
      <input type="email" class="form-control" placeholder="Example: Organiztion@orgnization.com " name="orgnizationEmail">
    </div>
  </div>

  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Registration number :* </label>
            <input type="text" class="form-control" placeholder="Enter organization number here" name="Registration-number">
         </div>
         <div class="col">
            <label for="validationTooltip01" class="form-label"> Organization phone number :* </label>
            <input type="text" class="form-control" placeholder="Example: 96650*******" name="Organization-phone">
         </div>

  </div>
  <div class="row opportunity-form">
    <div class="col">
    <label for="validationTooltip01" class="form-label"> About the organization: * </label>
      <textarea rows="5" class="form-control" placeholder="Discribe your organization bussniss here." name="organization-description"></textarea>
    </div>
</div>
<div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor full name in English :* </label>
            <input type="text" class="form-control" placeholder="Example: Ahmed Abduallah Alhassan" name="supervisor-name">
         </div>
         <div class="col">
            <label for="validationTooltip01" class="form-label"> Country : </label>
            <input type="text" class="form-control" placeholder="Saudi Arabia" name="country">
         </div>

  </div>

  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor phone number :*  </label>
            <input type="text" class="form-control" placeholder="Example: 96650*******" name="Organization-phone">
         </div>
         <div class="col">
         <label for="validationTooltip01" class="form-label"> City :* </label>
      <select id="city" class="form-select form-select-lg">
        <option selected> select a city</option>
        <option>Abha</option>
        <option>Al-Abwa</option>
        <option>Al Artaweeiyah</option>
        <option>Al Bukayriyah</option>
        <option>Badr</option>
        <option>Baljurashi</option>
        <option>Bisha</option>
        <option>Bareq</option>
        <option>Buraydah</option>
        <option>Al Bahah</option>
        <option>Buqaa</option>
        <option>Dammam</option>
        <option>Dhahran</option>
        <option>Dhurma</option>
        <option>Dahaban</option>
        <option>Diriyah</option>
        <option>Duba</option>
        <option>Dumat Al-Jandal</option>
        <option>Dawadmi</option>
        <option>Farasan</option>
        <option>Gatgat</option>
        <option>Gerrha</option>
        <option>Ghawiyah</option>
        <option>Al-Gwei'iyyah</option>
        <option>Harmah</option>
        <option>Ha'il</option>
        <option>Hotat Bani Tamim</option>
        <option>Hofuf</option>
        <option>Huraymila</option>
        <option>Hafr Al-Batin</option>
        <option>Jabal Umm al Ru'us</option>
        <option>Jalajil</option>
        <option>Jeddah</option>
        <option>Jizan</option>
        <option>Jizan Economic City</option>
        <option>Jubail</option>
        <option>Al Jafr</option>
        <option>Khafji</option>
        <option>Khaybar</option>
        <option>King Abdullah Economic City</option>
        <option>King Abdullah Economic City</option>
        <option>Khamis Mushait</option>
        <option>Al-Saih</option>
        <option>Knowledge Economic City, Medina</option>
        <option>Khobar</option>
        <option>Al-Khutt</option>
        <option>Layla</option>
        <option>Lihyan</option>
        <option>Al Lith</option>
        <option>Al Majma'ah</option>
        <option>Mastoorah</option>
        <option>Al Mikhwah</option>
        <option>Al-Mubarraz</option>
        <option>Al Mawain</option>
        <option>Medina</option>
        <option>Mecca</option>
        <option>Muzahmiyya</option>
        <option>Najran</option>
        <option>Al-Namas</option>
        <option>Umluj</option>
        <option>Al-Omran</option>
        <option>Al-Oyoon</option>
        <option>Qadeimah</option>
        <option>Qatif</option>
        <option>Qaisumah</option>
        <option>Al Qunfudhah</option>
        <option>Qurayyat</option>
        <option>Rabigh</option>
        <option>Rafha</option>
        <option>Ar Rass</option>
        <option>Ras Tanura</option>
        <option>Ranyah</option>
        <option>Riyadh</option>
        <option>Riyadh Al-Khabra</option>
        <option>Rumailah</option>
        <option>Sabt Al Alaya</option>
        <option>Sarat Abidah</option>
        <option>Saihat</option>
        <option>Safwa city</option>
        <option>Sakakah</option>
        <option>Sharurah</option>
        <option>Shaqraa</option>
        <option>Shaybah</option>
        <option>As Sulayyil</option>
        <option>Taif</option>
        <option>Tabuk</option>
        <option>Tanomah</option>
        <option>Tarout</option>
        <option>Tayma</option>
        <option>Thadiq</option>
        <option>Thuwal</option>
        <option>Thuqbah</option>
        <option>Turaif</option>
        <option>Tabarjal</option>
        <option>Udhailiyah</option>
        <option>Al-'Ula</option>
        <option>Um Al-Sahek</option>
        <option>Unaizah</option>
        <option>Uqair</option>
        <option>'Uyayna</option>
        <option>Uyun AlJiwa</option>
        <option>Wadi Al-Dawasir</option>
        <option>Al Wajh</option>
        <option>Yanbu</option>
        <option>Az Zaimah</option>
        <option>Zulfi</option>
      </select>
         </div>
  </div>
  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor email :* </label>
            <input type="email" class="form-control" placeholder="Example: supervisor@orgnization.com" name="supervisor-email">
         </div>
         <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor email confirmation :* </label>
            <input type="email" class="form-control" placeholder="Example: supervisor@orgnization.com" name="supervisor-email-confirm">
         </div>
  </div>

  <div class="row opportunity-form">
        <div class="col">
            <label for="validationTooltip01" class="form-label"> Passowrd:* </label>
            <input type="password" class="form-control" placeholder="it should contain at leaste 8 character, small &capital litter and number" name="password">
         </div>
         <div class="col">
            <label for="validationTooltip01" class="form-label"> Supervisor fax   : </label>
            <input type="text" class="form-control" placeholder="Example: 966*********" name="Supervisor-fax  ">
         </div>

  </div>

  <div class="row opportunity-form">
  <div class="col">
    <label for="validationTooltip01" class="form-label">Password confirmation *</label>
      <input type="password" class="form-control" placeholder="must be simailar to password field" name="password-confirm">
    </div>
    <div class="col">
    <label for="validationTooltip01" class="form-label"> Address: </label>
      <input type="text" class="form-control" placeholder="Riyadh-Olay street" name="Address">
    </div>
  </div>
  <br><br>

  <div class="col-12">
    <button class="btn-Register" type="submit">Create account </button>
  </div>
</div>
</form>

</div>
@endsection