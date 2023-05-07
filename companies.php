<head>
<link rel="stylesheet" href="../css/companies.css">

</head>
<section > 
<div class="container">

  <ul class="nav nav-tabs ">
    <li><a data-toggle="tab" href="#home" class="keysup ">
                        <?php
                        if ($lang_menu == "am") {
                            echo "Հիմնական աջակիցներ";
                        }
                        if ($lang_menu == "en") {
                            echo "Key Supporters";
                        }
                        if ($lang_menu == "ru") {
                            echo "Ключевые спонсоры"; 
                        }
                        ?>
    </a></li>
    <li><a data-toggle="tab" href="#menu1" class="justsup ">
                        <?php
                        if ($lang_menu == "am") {
                            echo "Աջակիցներ";
                        }
                        if ($lang_menu == "en") {
                            echo "Supporters";
                        }
                        if ($lang_menu == "ru") {
                            echo "Спонсоры"; 
                        }
                        ?>
    </a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>
                        <?php
                        if ($lang_menu == "am") {
                            echo "Ընկերություններ";
                        }
                        if ($lang_menu == "en") {
                            echo "Companies";
                        }
                        if ($lang_menu == "ru") {
                            echo "Компании"; 
                        }
                        ?>
      </h3>
      <div class="container">
        <div class="row">
          <div class="company col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 " >
             <div class="logdiv1"><img src="../icons/adidas.png" alt="" class="companies_logos1"></div>
             <div class="company_name">Adidas</div>
             <div class="company_text">
                Lorem Ipsum is simply dummy text of the
                printing and typesetting industry. Lorem
                Ipsum has been the industry's standard
                dummy text ever since the 1500s, when an
                unknown printer took a galley of type and
                scrambled it to make a type specimen 
             </div> 
             <div class="all_btn">
               <a>
                 <div class="company_btn">
                        <?php
                        if ($lang_menu == "am") {
                            echo "<p class='visite'>այցելեք կայքը</p>";
                        }
                        if ($lang_menu == "en") {
                            echo "<p class='visite'>visite website</p>";
                        }
                        if ($lang_menu == "ru") {
                            echo "<p class='visite'>посетите веб-сайт</p>"; 
                        }
                        ?>
                 </div>
               </a>
             </div>
          </div>
          <div class="company col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
             <div class="logdiv2"><img src="../icons/nike.png" alt="" class="companies_logos2"></div>
             <div class="company_name">Nike</div>
            <div class="company_text">
Lorem Ipsum is simply dummy text of the
printing and typesetting industry. Lorem
Ipsum has been the industry's standard
dummy text ever since the 1500s, when an
unknown printer took a galley of type and
scrambled it to make a type specimen 
             </div>
             <div class="all_btn">
                  <a>
                    <div class="company_btn">
                        <?php
                        if ($lang_menu == "am") {
                            echo "<p class='visite'>այցելեք կայքը</p>";
                        }
                        if ($lang_menu == "en") {
                            echo "<p class='visite'>Visite website</p>";
                        }
                        if ($lang_menu == "ru") {
                            echo "<p class='visite'>посетите веб-сайт</p>"; 
                        }
                        ?>
                    </div>
                  </a>
                </div>  
             </div>
          <div class="company col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
             <div class="logdiv3"><img src="../icons/apple.png" alt="" class="companies_logos3"></div>
             <div class="company_name">Apple</div>
             <div class="company_text">
Lorem Ipsum is simply dummy text of the
printing and typesetting industry. Lorem
Ipsum has been the industry's standard
dummy text ever since the 1500s, when an
unknown printer took a galley of type and
scrambled it to make a type specimen 
             </div> 
             <div class="all_btn">
               <a">
                 <div class="company_btn">
                        <?php
                        if ($lang_menu == "am") {
                            echo "<p class='visite'>այցելեք կայքը</p>";
                        }
                        if ($lang_menu == "en") {
                            echo "<p class='visite'>Visite website</p>";
                        }
                        if ($lang_menu == "ru") {
                            echo "<p class='visite'>посетите веб-сайт</p>"; 
                        }
                        ?>
                 </div>
               </a>
             </div>
          </div>
        </div>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
          <?php
          include "../carousel/company.php";
          ?>
    </div>
  </div>
</div>



</section>
