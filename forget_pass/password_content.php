<?php
$i_pass = '';
$i_conf = '';
if (isset($_SESSION['res_pass'])) {

    $i_pass = $_SESSION['res_pass'];


}
if (isset($_SESSION['reset_confirm'])) {

    $i_conf = $_SESSION['reset_confirm'];

}
define('forget_pass-am', '
  <div class="container-fluid">
  <div class="cont-back">
     <div class="block_back d-flex justify-content-center">
     
     <div class="in_back d-flex justify-content-around align-items-baseline">
  
      <i class="prev-slack fas fa-arrow-left" id="pass_prev"></i>
      <h4>Գաղտնաբառի վերականգնում</h4>
  
     </div>
     
     
     </div>    
  
  </div>
  
    <div class="row f_page_content">
       <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
        <div class="forget_email_block col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center">
            
            <h4>Գաղտնաբառի վերականգնում</h4>
           <pre>Գաղտնաբառը վերականգնելու համար մուտքագրեք նոր
                 գաղտնաբառ
           </pre>
           <form action="update-forget-password.php" method="post" id="forget_form">
           <input type="hidden" name="email" value="' . $email . '">
           <input type="hidden" name="lang_dir" value="' . $lang_dir . '">
           <input type="hidden" name="reset_link_token" value="' . $token . '">
             <input type="password" name="reset_password"  class="form-control reset_pass" id="forget_pass" placeholder="Նոր գաղտնաբառ">
              <span class="pass_error">' . $i_pass . '</span>
             <input type="password" name="reset_confirm" class="mt-2 form-control reset_pass" id="forget_confirm" placeholder="Հաստատել նոր գաղտնաբառը">
             <span class="pass_error">' . $i_conf . '</span>
             <button type="submit" class="mt-4 btn_forget" name="reset_pass" id="reset_button"> Հաստատել </button>  
           </form>
        
           
  
        </div>
  
     
  
       </div>
       
       
  
    </div>
  
  </div>       

  ');

define('forget_pass-ru', '
  <div class="container-fluid">
  <div class="cont-back">
     <div class="block_back d-flex justify-content-center">
     
     <div class="in_back d-flex justify-content-around align-items-baseline">
  
      <i class="prev-slack fas fa-arrow-left" id="pass_prev"></i>
      <h4>Восстановление пароля</h4>
  
     </div>
     
     
     </div>    
  
  </div>
  
    <div class="row f_page_content">
       <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
        <div class="forget_email_block col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center">
            
            <h4>Восстановление пароля</h4>
           <pre>Введите новый пароль, чтобы сбросить
           пароль
           </pre>
           <form action="update-forget-password.php" method="post" id="forget_form">
           <input type="hidden" name="lang_dir" value="' . $lang_dir . '">
           <input type="hidden" name="email" value="' . $email . '">
           <input type="hidden" name="reset_link_token" value="' . $token . '">
             <input type="password" name="reset_password" class="form-control reset_pass" id="forget_pass" placeholder="Новый пароль">
             <span class="pass_error">' . $i_pass . '</span>
             <input type="password" name="reset_confirm" class="mt-2 form-control reset_pass" id="forget_confirm" placeholder="Подтвердите новый пароль">
             <span class="pass_error">' . $i_conf . '</span>
             <button type="submit" class="mt-4 btn_forget" name="reset_pass" id="reset_button"> Подтверждать </button>  
           </form>
        
           
  
        </div>
  
     
  
       </div>
       
       
  
    </div>
  
  </div>       

  ');


define('forget_pass-en', '
  <div class="container-fluid">
  <div class="cont-back">
     <div class="block_back d-flex justify-content-center">
     
     <div class="in_back d-flex justify-content-around align-items-baseline">
  
      <i class="prev-slack fas fa-arrow-left" id="pass_prev"></i>
      <h4>
      Password recovery</h4>
  
     </div>
     
     
     </div>    
  
  </div>
  
    <div class="row f_page_content">
       <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
        <div class="forget_email_block col-sm-6 col-md-6 col-lg-6 d-flex flex-column align-items-center">
            
            <h4>
            Password recovery</h4>
           <pre>Enter new password to reset
        password
           </pre>
           <form action="update-forget-password.php" method="post" id="forget_form">
           <input type="hidden" name="email" value="' . $email . '">
           <input type="hidden" name="lang_dir" value="' . $lang_dir . '">
           <input type="hidden" name="reset_link_token" value="' . $token . '">
             <input type="password" name="reset_password" class="form-control reset_pass" id="forget_pass" placeholder="New password">
             <span class="pass_error">' . $i_pass . '</span>
             <input type="password" name="reset_confirm" class="mt-2 form-control reset_pass" id="forget_confirm" placeholder="Confirm new password">
             <span class="pass_error">' . $i_conf . '</span>
             <button type="submit" class="mt-4 btn_forget" name="reset_pass" id="reset_button"> Confirm </button>  
           </form>
        
           
  
        </div>
  
     
  
       </div>
       
       
  
    </div>
  
  </div>       

  ');

unset($_SESSION['res_pass']);
unset($_SESSION['reset_confirm']);

?>