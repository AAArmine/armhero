<?php
$i_email = '';
$i_error = '';
if (isset($_SESSION['invalid_email'])) {

    $i_email = $_SESSION['invalid_email'];
    $i_error = $_SESSION['error'];

}
if (isset($_SESSION['error'])) {

    $i_error = $_SESSION['error'];

}
define('forget_email-am', '
<div class="container-fluid">
<div class="cont-back">
   <div class="block_back d-flex justify-content-center">
   
   <div class="in_back d-flex justify-content-around align-items-baseline">

    <i class="prev-slack fas fa-arrow-left" id="email_prev"></i>
    <h4>Գաղտնաբառի վերականգնում</h4>

   </div>
   
   
   </div>    

</div>

  <div class="row f_page_content">
     <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
      <div class="forget_email_block col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center">
          
          <h4>Հնարավոր չէ՞ մուտք գործել</h4>
         <pre> Մուտքագրեք ձեր էլ․փոստի հասցեն և մենք ձեզ հղում 
           կուղարկենք՝ ձեր հաշիվ մուտք գործելու
                       վերականգնման համար
         </pre>
         <form action="password_reset.php" method="post" id="forget_form">
         <input type="hidden" name="lang" value="' . $lang_dir . '">
           <input type="email" name="reset_email" class="form-control" value="' . $i_email . '" id="forget_email" placeholder="Էլ․փոստի հասցե">
           <span class="error_forget_email">' . $i_error . '</span>
           <button type="submit" class="mt-4 btn_forget" name="reset_button" id="reset_button"> Ստանալ Հղումը</button>  
         </form>
         <div class="mt-5 border_or d-flex justify-content-center align-items-baseline">

           <span class="border_f"></span>
           <p class="ml-1 mr-1">Կամ</p>
           <span class="border_f"></span>
         
         </div>
         <div class="go_register d-flex justify-content-center align-items-baseline">
         
            <a href="#">Ստեղծել նոր հաշիվ</a>

         </div>
         

      </div>

   

     </div>
     
     

  </div>

</div>                         
');
define('forget_email-ru', '
<div class="container-fluid">
<div class="cont-back">
   <div class="block_back d-flex justify-content-center">
   
   <div class="in_back d-flex justify-content-around align-items-baseline">

    <i class="prev-slack fas fa-arrow-left" id="email_prev"></i>
    <h4>Восстановление пароля</h4>

   </div>
   
   
   </div>    

</div>

  <div class="row f_page_content">
     <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
      <div class="forget_email_block col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center">
          
          <h4>Не можете войти?</h4>
         <pre> Введите свой адрес электронной почты и мы дадим 
         вам ссылку для восстановления
                            
            
         </pre>
         <form action="password_reset.php" method="post" id="forget_form">
         <input type="hidden" name="lang" value="' . $lang_dir . '">
           <input type="email" name="reset_email" class="form-control" value="' . $i_email . '" id="forget_email" placeholder="Адрес электронной почты">
           <span class="error_forget_email">' . $i_error . '</span>
           <button type="submit" class="mt-4 btn_forget" name="reset_button" id="reset_button">Получите ссылку</button>  
         </form>
         <div class="mt-5 border_or d-flex justify-content-center align-items-baseline">

           <span class="border_f"></span>
           <p class="ml-1 mr-1">Или</p>
           <span class="border_f"></span>
         
         </div>
         <div class="go_register d-flex justify-content-center align-items-baseline">
         
            <a href="#">Создать новый аккаунт</a>

         </div>
         

      </div>

   

     </div>
     
     

  </div>

</div>                         
');

define('forget_email-en', '
<div class="container-fluid">
<div class="cont-back">
   <div class="block_back d-flex justify-content-center">
   
   <div class="in_back d-flex justify-content-around align-items-baseline">

    <i class="prev-slack fas fa-arrow-left" id="email_prev"></i>
    <h4>
    Password recovery</h4>

   </div>
   
   
   </div>    

</div>

  <div class="row f_page_content">
     <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
      <div class="forget_email_block col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center">
          
          <h4>Can not login?</h4>
         <pre>Enter your email address and we will give
                 you a link recovery
               
           
         </pre>
         <form action="password_reset.php" method="post" id="forget_form">
           <input type="hidden" name="lang" value="' . $lang_dir . '">
           <input type="email" name="reset_email" class="form-control" value="' . $i_email . '" id="forget_email" placeholder="E-mail address">
           <span class="error_forget_email">' . $i_error . '</span>
           <button type="submit" class="mt-4 btn_forget" name="reset_button" id="reset_button">Get the link</button>  
         </form>
         <div class="mt-5 border_or d-flex justify-content-center align-items-baseline">

           <span class="border_f"></span>
           <p class="ml-1 mr-1">Or</p>
           <span class="border_f"></span>
         
         </div>
         <div class="go_register d-flex justify-content-center align-items-baseline">
         
            <a href="#">Create a new account</a>

         </div>
         

      </div>

   

     </div>
     
     

  </div>

</div>                         
');
unset($_SESSION['invalid_email']);
unset($_SESSION['error']);
?>