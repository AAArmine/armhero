<?php


define('data-am', '<div class="user_data">

             <div class="update_message_block">

                 <span id="update_message"></span>

             </div>
            <div class="mt-2 user_name d-flex justify-content-between">
                <input class="name_surname data_field" id="d_name" 
                 data-message="Անվան երկարությունը պետք է լինի 8 - 30" 
                                min="8" max="30"
                value="' . $db_res['fullname'] . '">
                
                <i class="fas fa-pen edit_user_data" style="display:none"></i>
            </div>
            <hr class="data_line">
            <div class="data-input">

                <label for="d_email" class="data_label">Էլ․Հասցե:</label>
                <input type="text" class="data_field" id="d_email"
                   data-message="Խնդրում ենք գրել վավեր էլ. Փոստի հասցե"
                                      
                   data-unique="Էլ.փոստը արդեն գոյություն ունի"
                 readonly value="' . $db_res['email'] . '">

            </div>
            <div class="data-input d-flex">
                 <input type="hidden" value="' . $db_res['phone'] . '" id="old_phone">
                <label for="phone" class="data_label">Հեռախոս:</label>
                <div class="phone_block d-flex flex-column">
                    <input type="tel" class="data_field d_phone" id="phone" readonly value="' . $db_res['phone'] . '">
                    <span id="error-phone" class="hide"></span>
                    <div class="ml-1 mt-2" id="recaptcha-container"></div>
                </div>
            </div>
            <div class="data-input" id="visible_confirm">
                    <label for="d_code" class="data_label">Կոդ:</label>
                    <input type="text" class="data_field" id="d_code">
            </div>
           

        </div>');
define('data-ru', '<div class="user_data">

             <div class="update_message_block">

                 <span id="update_message"></span>

             </div>
            <div class="mt-2 user_name d-flex justify-content-between">
                <input class="name_surname data_field" id="d_name"
                 data-message="Длина имя ползователя должен быть 8 - 30"
                                       min="8" max="30"
                 value="' . $db_res['fullname'] . '">
                <i class="fas fa-pen edit_user_data" style="display:none"></i>
            </div>
            <hr class="data_line">
            <div class="data-input">

                <label for="d_email" class="data_label">Эл.адрес:</label>
                <input type="text" class="data_field" id="d_email"
                 data-message="Пожалуйста, напишите действующий адрес электронной почты"
                                       
                 data-unique="Электронная почта уже существует"
                 readonly value="' . $db_res['email'] . '">

            </div>
            <div class="data-input d-flex">
                 <input type="hidden" value="' . $db_res['phone'] . '" id="old_phone">
                <label for="phone" class="data_label">Номер:</label>
                <div class="phone_block d-flex flex-column">
                    <input type="tel" class="data_field d_phone" id="phone" readonly value="' . $db_res['phone'] . '">
                    <span id="error-phone" class="hide"></span>
                    <div class="ml-1 mt-2" id="recaptcha-container"></div>

                </div>



            </div>

            <div class="data-input" id="visible_confirm">

                

                    <label for="d_code" class="data_label">Код:</label>
                    <input type="text" class="data_field" id="d_code">
               

            </div>
            

        </div>');
define('data-en', '<div class="user_data">

             <div class="update_message_block">

                 <span id="update_message"></span>

             </div>
            <div class="mt-2 user_name d-flex justify-content-between">
                <input class="name_surname data_field" id="d_name" 
                data-message="Username length must be 8 - 30"
                                       min="8" max="30"
                
                value="' . $db_res['fullname'] . '">
                <i class="fas fa-pen edit_user_data" style="display:none"></i>
            </div>
            <hr class="data_line">
            <div class="data-input">

                <label for="d_email" class="data_label">Email:</label>
                <input type="text" class="data_field" id="d_email"
                 data-message="Please write valid email address"
                                      
                  data-unique="Email is already exists"
                 readonly value="' . $db_res['email'] . '">

            </div>
            <div class="data-input d-flex">
                 <input type="hidden" value="' . $db_res['phone'] . '" id="old_phone">
                <label for="phone" class="data_label">Phone:</label>
                <div class="phone_block d-flex flex-column">
                    <input type="tel" class="data_field d_phone" id="phone" readonly value="' . $db_res['phone'] . '">
                    <span id="error-phone" class="hide"></span>
                    <div class="ml-1 mt-2" id="recaptcha-container"></div>

                </div>



            </div>

            <div class="data-input" id="visible_confirm">

             

                    <label for="d_code" class="data_label">Code:</label>
                    <input type="text" class="data_field" id="d_code">
          

            </div>
         

        </div>');


?>
