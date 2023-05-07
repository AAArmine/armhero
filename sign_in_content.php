<?php

define('content-am', '
            <!--     Signup titles  -->

            <div class="content_titles d-flex justify-content-center flex-column align-items-center">

                <h3 class="mt-5">Բարի գալուստ "Հայ Հերոս" կայք</h3>

                <h5 class="mt-3">Մուտք</h5>

            </div>
            <!--    Signup titles end -->
            <!-- Signup fields-->

            <div class="content_fields">
                <div class="mt-5 row">
                    <form method="post" class="mt-2" data-lang="<?php echo $lang_dir ?>" id="sign_in_form">
                     
                       <div class="form-group reg_form">
                            

                            <div class="col-sm-7">
                                <input type="email" class="form-control log_email"
                                   
                                       data-message="Խնդրում ենք գրել վավեր էլ. Փոստի հասցե"
                                      
                                       data-unique="Էլ.փոստը արդեն գոյություն ունի"
                                       id="email" name="email"
                                       placeholder="Էլ․փոստի հասցե">
                                <span class="error_email"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                            

                            <div class="col-sm-7">
                                <input type="password" class="form-control log_fields"
                                   
                                       data-message="Գաղտնաբառի երկարությունը պետք է լինի 6 - 15" min="6" max="15"
                                       id="password" name="password"
                                       placeholder="Գաղտնաբառ">
                                       <div class="mt-1 forgot_pass">
                                       
                                       <small>Մոռացե՞լ եք</small>&nbsp<a class="red_link" href="../' . $lang_dir . '/forget_email.php"> Գաղտնաբառը</a>
                                       </div>
                                       
                                <span class="error_field"></span>
                            </div>
                        </div>

                    
                        <div class="form-group reg_form">
                            <div class="mt-4 col-sm-7">
                                <button type="button" class="btn btn-primary sub_log">Մուտք գործել</button>
                            </div>
                        </div>
                           <div class="mt-4 login_link">

                          <strong>Չունե՞ք հաշիվ</strong> &nbsp &nbsp <a class="log_l">Գրանցվել</a>
                        </div>
                      
                         <div class="mt-5 sign_up_footer d-flex justify-content-center">
                              <p class="l_footer_text">Developing by Cyber Teach &nbsp; &nbsp; &nbsp; &nbsp;  &copy Copyright "Start-up center" NGO 2021</p>
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

                <h5 class="mt-3">Вход</h5>

            </div>
            <!--    Signup titles end -->
            <!-- Signup fields-->

            <div class="content_fields">
                <div class="mt-5 row">
                    <form method="post" class="mt-2" data-lang="<?php echo $lang_dir ?>" id="sign_in_form">
                   
                  
                        <div class="form-group reg_form">
                        

                            <div class="col-sm-7">
                                <input type="email" class="form-control log_email"
                                       
                                       data-message="Пожалуйста, напишите действующий адрес электронной почты"
                                       
                                       data-unique="Электронная почта уже существует"
                                       
                                       id="email" name="email"
                                       placeholder="Адрес электронной почты">
                                <span class="error_email"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                         

                            <div class="col-sm-7">
                                <input type="password" class="form-control log_fields"
                                  
                                      data-message="Длина паролья должен быть 6 - 15"
                                       min="6" max="15"
                                       id="password" name="password"
                                       placeholder="Пароль">
                                        <div class="mt-1 forgot_pass">
                                       
                                       <small>Forget your</small>&nbsp<a class="red_link" href="../' . $lang_dir . '/forget_email.php">Password ?</a>
                                       </div>
                                <span class="error_field"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                            <div class="col-sm-7 button_col">
                                <button type="button" class="btn btn-primary sub_log">Вход</button>
                            </div>
                        </div>
                        
                           <div class="mt-4 login_link">

                          <strong>Нет аккаунта?</strong> &nbsp &nbsp <a class="log_l">Регистрация</a>
                          
                        </div>
                       
                         <div class="mt-5 sign_up_footer d-flex justify-content-center">
                              <p class="l_footer_text">Разработка Cyber ​​Teach &nbsp; &nbsp; &nbsp; &nbsp;  &copy Авторские права ОО «Стартап-центр» 2021</p>
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

                <h5 class="mt-3">Sign In</h5>

            </div>
            <!--    Signup titles end -->
            <!-- Signup fields-->

            <div class="content_fields">
                <div class="mt-5 row">
                    <form method="post" class="mt-2" data-lang="<?php echo $lang_dir ?>" id="sign_in_form">
                   
                  
                        <div class="form-group reg_form">
                        

                            <div class="col-sm-7">
                                <input type="email" class="form-control log_email"
                                       
                                       data-message="Please write valid email address"
                                   
                                       
                                       id="email" name="email"
                                       placeholder="Email address">
                                <span class="error_email"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                         

                            <div class="col-sm-7">
                                <input type="password" class="form-control log_fields"
                                  
                                      data-message="Password length must be 6 - 15"
                                       min="6" max="15"
                                       id="password" name="password"
                                       placeholder="Password">
                                        <div class="mt-1 forgot_pass">
                                       
                                       <small>Forget your</small>&nbsp<a class="red_link" href="../' . $lang_dir . '/forget_email.php">Password ?</a>
                                       </div>
                                       
                                <span class="error_field"></span>
                            </div>
                        </div>

                        <div class="form-group reg_form">
                            <div class="col-sm-7 button_col">
                                <button type="button" class="btn btn-primary sub_log">Sign In</button>
                            </div>
                            <span class="success_login"></span>
                        </div>
                        
                           <div class="mt-4 login_link">

                          <strong>Dont have an account?</strong> &nbsp &nbsp <a class="log_l">Sign up</a>
                        </div>
                       
                         <div class="mt-5 sign_up_footer d-flex justify-content-center">
                              <p class="l_footer_text">Developing by Cyber Teach &nbsp; &nbsp; &nbsp; &nbsp;  &copy Copyright "Start-up center" NGO 2021</p>
                         </div>
                    </form>


                </div>
            </div>

            <!-- Signup fields end-->
');


?>
