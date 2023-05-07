<?php
$mail_ext = explode('@', $_SESSION['reset_email']);
$mail_index = count($mail_ext);

define('check-am', '
<div class="container-fluid">

<div class="row f_page_content">
<div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
     
      <div class="check_email_block col-sm-5 col-md-5 col-lg-5 d-flex flex-column align-items-center">

<h5> Հղումն ուղարկված է </h5>
  <pre class="mt-2">
           Մենք հղում ենք ուղարկել՝
 ' . $_SESSION['reset_email'] . ' հասցեին,ձեր հաշվի 
          մուտքը վերականգնելու համար։   
 </pre>

 
 <a href="https://' . $mail_ext[$mail_index - 1] . '" class="mt-4 btn_forget">Շարունակել</a>

</div>
      
    
   
</div>
 

</div>

</div>    

');


define('check-ru', '
<div class="container-fluid">

<div class="row f_page_content">
<div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
     
      <div class="check_email_block col-sm-5 col-md-5 col-lg-5 d-flex flex-column align-items-center">

<h5> Ссылка отправлена </h5>
  <pre class="mt-2">
               Мы отправили ссылку
 ' . $_SESSION['reset_email'] . ' в ваш аккаунт
                  восстановить доступ.   
 </pre>


 
 <a href="https://' . $mail_ext[$mail_index - 1] . '" class="mt-4 btn_forget">
 Продолжать</a>

</div>
      
    
   
</div>
 

</div>

</div>    

');


define('check-en', '
<div class="container-fluid">

<div class="row f_page_content">
<div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center align-items-center">
     
      <div class="check_email_block col-sm-5 col-md-5 col-lg-5 d-flex flex-column align-items-center">

<h5> 
Link sent </h5>
  <pre class="mt-2">
               We have sent a link
 ' . $_SESSION['reset_email'] . ' to your 
           account  restore access.
   
 </pre>


 
 <a href="https://' . $mail_ext[$mail_index - 1] . '" class="mt-4 btn_forget">
 Continue</a>

</div>
      
    
   
</div>
 

</div>

</div>    

');

?>