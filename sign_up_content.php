<?php
define('content-am', '
            <!--     Signup titles  -->

            <div class="content_titles d-flex justify-content-center flex-column align-items-center">

                <h3 class="mt-5">Բարի գալուստ "Հայ Հերոս" կայք</h3>

                <h5 class="mt-3">Գրանցում</h5>

            </div>
            <!--    Signup titles end -->
            <!-- Signup fields-->

            <div class="content_fields">
                <div class="row">
                    <form method="post" class="mt-2" data-lang="<?php echo $lang_dir ?>" id="sign_up_form">
                        <div class="form-group reg_form">
                         

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="text" class="form-control reg_field"
                                data-message="Անվան երկարությունը պետք է լինի 8 - 30" 
                                min="8" max="30"
                                       id="name"
                                       name="name"
                                       placeholder="Անուն Ազգանուն">
                                       
                                <span class="error_field"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                            

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="email" class="form-control reg_email"
                                   
                                       data-message="Խնդրում ենք գրել վավեր էլ. Փոստի հասցե"
                                      
                                       data-unique="Էլ.փոստը արդեն գոյություն ունի"
                                       id="email" name="email"
                                       placeholder="Էլ․փոստի հասցե">
                                <span class="error_email"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                            

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="password" class="form-control reg_field"
                                   
                                       data-message="Գաղտնաբառի երկարությունը պետք է լինի 6 - 15" min="6" max="15"
                                       id="password" name="password"
                                       placeholder="Գաղտնաբառ">
                                <span class="error_field"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form phone_field">
                           
                            <div class="col-9 col-sm-7 col-md-10 col-lg-7 in_input">
                                <div>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                    <span id="error-phone" class="hide"></span>
                                </div>

                                <button class="btn btn-large btn-primary" type="button" onclick="phoneAuth();"
                                        id="send_code">
                                    Հաստատել
                                </button>


                            </div>
                            <div class="ml-1 mt-2" id="recaptcha-container"></div>

                        </div>


                        <div class="form-group reg_form" id="visible_confirm">
                         

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7 in_input" id="confirm_reg">
                                <input type="text" class="form-control" id="phone_code" name="phone_code" placeholder="Գրանցման կոդ">
                                <span class="code_error"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                            <div class="col-sm-7 col-md-10 col-lg-7 button_col">
                                <button type="button" onclick="verifyCode();" class="btn btn-primary sub_reg">Գրանցվել</button>
                            </div>
                        </div>
                           <div class="mt-4 login_link">

                          <strong>Հաշիվ ունե՞ք։</strong> &nbsp &nbsp <a class="reg_l">Մուտք գործել</a>
                        </div>
                        <div class="mt-2 privancy_link">
                              <p class="privacy_text arm_text">Գրանցվելով դուք ընդունում եք մեր <a href="">Օգտագործման կանոնները,</a>տվյալների քաղաքականությունը և<a href="">Գաղտնիության քաղաքականությունը։</a></p>
                         </div>
                         <div class="mt-5 sign_up_footer d-flex justify-content-center">
                              <p class="s_footer_text">Developing by Cyber Teach &nbsp; &nbsp; &nbsp; &nbsp;  &copy Copyright "Start-up center" NGO 2021</p>
                         </div>
                    </form>

                </div>
            </div>

            <!-- Signup fields end-->

        ');
define('content-ru', '
            <!--     Signup titles  -->

            <div class="content_titles d-flex justify-content-center flex-column align-items-center">

                <h3 class="mt-5">Добро пожаловать в ArmHeros</h3>

                <h5 class="mt-3">Регистрация</h5>

            </div>
            <!--    Signup titles end -->
            <!-- Signup fields-->

            <div class="content_fields">
                <div class="row">
                    <form method="post" class="mt-2" data-lang="<?php echo $lang_dir ?>" id="sign_up_form">
                        <div class="form-group reg_form">
                     

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="text" class="form-control reg_field"
                                      
                                       data-message="Длина имя ползователя должен быть 8 - 30"
                                       min="8" max="30"
                                       id="name"
                                       name="name"
                                       placeholder="Имя Фамилия">
                                       
                                <span class="error_field"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                        

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="email" class="form-control reg_email"
                                       
                                       data-message="Пожалуйста, напишите действующий адрес электронной почты"
                                       
                                       data-unique="Электронная почта уже существует"
                                       
                                       id="email" name="email"
                                       placeholder="Адрес электронной почты">
                                <span class="error_email"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                         

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="password" class="form-control reg_field"
                                  
                                      data-message="Длина паролья должен быть 6 - 15"
                                       min="6" max="15"
                                       id="password" name="password"
                                       placeholder="Пароль">
                                <span class="error_field"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form phone_field">
                          

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7 in_input">
                                <div>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                    <span id="error-phone" class="hide"></span>
                                </div>

                                <button class="btn btn-large btn-primary" type="button" onclick="phoneAuth();"
                                        id="send_code">
                                    Verify
                                </button>


                            </div>
                            <div class="ml-1 mt-2" id="recaptcha-container"></div>

                        </div>


                        <div class="form-group reg_form" id="visible_confirm">
                        
                            <div class="col-9 col-sm-7 col-md-10 col-lg-7 in_input" id="confirm_reg">
                                <input type="text" class="form-control" id="phone_code" name="phone_code" placeholder="Confirm code">
                               <span class="code_error"></span>
                            </div>
                        </div>


                        <div class="form-group reg_form">
                            <div class="col-9 col-sm-7 col-md-10 col-lg-7 button_col">
                                <button type="button" onclick="verifyCode();" class="btn btn-primary sub_reg">Sign up</button>
                            </div>
                        </div>
                        
                           <div class="mt-4 login_link">

                          <strong>Есть аккаунт</strong> &nbsp &nbsp <a class="reg_l">Вход</a>
                         
                        </div>
                        <div class="mt-2 privancy_link">
                              <p class="privacy_text">Регистрируясь, вы принимаете <a href="">Наши условия</a> and <a href="">Политика использования cookie</a></p>
                         </div>
                         <div class="mt-5 sign_up_footer d-flex justify-content-center">
                              <p class="s_footer_text">Разработка Cyber ​​Teach &nbsp; &nbsp; &nbsp; &nbsp;  &copy Авторские права ОО «Стартап-центр» 2021</p>
                         </div>
                    </form>


                </div>
            </div>

            <!-- Signup fields end-->
');
define('content-en', '
            <!--     Signup titles  -->

            <div class="content_titles d-flex justify-content-center flex-column align-items-center">

                <h3 class="mt-5">Welcome to ArmHeros</h3>

                <h5 class="mt-3">Sign Up</h5>

            </div>
            <!--    Signup titles end -->
            <!-- Signup fields-->

            <div class="content_fields">
                <div class="row">
                    <form method="post" class="mt-2" data-lang="<?php echo $lang_dir ?>" id="sign_up_form">
                        <div class="form-group reg_form">
                          

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="text" class="form-control reg_field"
                                       data-message="Username length must be 8 - 30"
                                       min="8" max="30"
                                       id="name"
                                       name="name"
                                       placeholder="Name Surname">
                                <span class="error_field"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                           

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="email" class="form-control reg_email"
                                       data-message="Please write valid email address"
                                      
                                       data-unique="Email is already exists"
                                  
                                       id="email" name="email"
                                       placeholder="Email address">
                                <span class="error_email"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                         

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7">
                                <input type="password" class="form-control reg_field"
                                       data-message="Password length must be 6 - 15"
                                       min="6" max="15"
                                       id="password" name="password"
                                       placeholder="Password">
                                <span class="error_field"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form phone_field">
                           

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7 in_input">
                                <div>
                                    <input type="tel" class="form-control" id="phone" name="phone" >
                                    <span id="error-phone" class="hide"></span>
                                </div>

                                <button class="btn btn-large btn-primary" type="button"
                                        id="send_code">
                                    Verify
                                </button>


                            </div>
                            <div class="ml-1 mt-2" id="recaptcha-container"></div>
                            <span class="recaptcha_error"></span>

                        </div>


                        <div class="form-group reg_form" id="visible_confirm">
                       

                            <div class="col-9 col-sm-7 col-md-10 col-lg-7 in_input" id="confirm_reg">
                                <input type="text" class="form-control" id="phone_code" name="phone_code" placeholder="Confirm code">
                                <span class="code_error"></span>

                            </div>
                        </div>


                        <div class="form-group reg_form">
                            <div class="col-9 col-sm-7 col-md-10 col-lg-7 button_col">
                                <button type="button" onclick="verifyCode();" class="btn btn-primary sub_reg">Sign up</button>
                            </div>
                        </div>
                          <div class="mt-4 login_link">

                          <strong>Have an account</strong> &nbsp &nbsp <a class="reg_l">Log in</a>
                        </div>
                        <div class="mt-2 privancy_link">
                              <p class="privacy_text">By registering, your accept <a href="">Our Terms</a> and <a href="">Cookie Policy</a></p>
                         </div>
                         <div class="mt-5 sign_up_footer d-flex justify-content-center">
                              <p class="s_footer_text">Developing by Cyber Teach &nbsp; &nbsp; &nbsp; &nbsp;  &copy Copyright "Start-up center" NGO 2021</p>
                         </div>
                    </form>


                </div>
            </div>

            <!-- Signup fields end-->
')
?>