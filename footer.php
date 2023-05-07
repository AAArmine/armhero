<div class="d-flex flexfooter justify-content-between">
    <div class="footer-item1">
        <a href='#'>
            <img src="../images/logo.png" alt="logo" class='logomainfoot'>
        </a>
        <div class="logomainfoot-text">Ես մի զարկն եմ քո բազկի
        </div>
    </div>
    <div class="footer-item2">
        <div class="contDiv">
            <div class='contact-word'>
                <?php
                if ($lang_menu == "am") {
                    echo "Կապ";
                }
                if ($lang_menu == "en") {
                    echo "Contact";
                }
                if ($lang_menu == "ru") {
                    echo "Контакты";
                }
                ?>

            </div>

            <a href="mailto:contact@armhero.org?Subject=Some%20subject" id='mailTo'>
                <img src="../Icons/email.png" class='imgicon'>
                <span class="cont">contact@armhero.org</span>
            </a>

            <div class="contacts">
                <a href="tel:+37494276863">
                    <img src="../Icons/phone-call.png" class='imgicon'>
                    <span class="cont">+37494276863</span>
                </a>
            </div>
        </div>
    </div>
    <div class="footer-item3">
        <div class='foot-a-div'>
            <a href="add-article.php">
                <?php
                if ($lang_menu == "am") {
                    echo "Գրել պատմություն/հոդված";
                }
                if ($lang_menu == "en") {
                    echo "Write story/article";
                }
                if ($lang_menu == "ru") {
                    echo "Создать статью/историю";
                }
                ?>
            </a>
        </div>
        <div class='foot-a-div'>
            <a href="donate.php">
                <?php
                if ($lang_menu == "am") {
                    echo "Աջակցել նախագծին";
                }
                if ($lang_menu == "en") {
                    echo "Support the project";
                }
                if ($lang_menu == "ru") {
                    echo "Поддержать проект";
                }
                ?>
            </a>
        </div>
        <div class='foot-a-div'>
            <?php
            if ($lang_menu == "am") {
                echo "<a href='javascript:void(0);' onClick=window.open('am-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>
                        Գաղտնիության քաղաքականություն
                        </a>";
            }
            if ($lang_menu == "en") {
                echo "<a href='javascript:void(0);' onClick=window.open('en-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>
                        Privacy policy
                        </a>";
            }
            if ($lang_menu == "ru") {
                echo "<a href='javascript:void(0);' onClick=window.open('ru-policy.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>
                        Политика конфиденциальности
                        </a>";
            }
            ?>
        </div>
        <div class='foot-a-div'>
            <?php
            if ($lang_menu == "am") {
                echo "<a href='javascript:void(0);' onClick=window.open('am-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>
                        Օգտագործման կանոններ
                        </a>";
            }
            if ($lang_menu == "en") {
                echo "<a href='javascript:void(0);' onClick=window.open('en-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>
                        Terms of use
                        </a>";
            }
            if ($lang_menu == "ru") {
                echo "<a href='javascript:void(0);' onClick=window.open('ru-termsofuse.php','Ratting','width=300,height=300,top=70,status=0,scrollbars=1');>
                        Условия использования
                        </a>";
            }
            ?>

        </div>
    </div>
    <div class="footer-item4">
        <a href=''><img src='../Icons/twitter.png' class='social-icons'></a>
        <a href=''><img src='../Icons/facebook.png' class='social-icons'></a>
        <a href=''><img src='../Icons/in.png' class='social-icons'></a>
        <a href=''><img src='../Icons/vk.png' class='social-icons'></a>
    </div>

</div>
<div class="copyright <?php if ($currren_uri == 'account.php') : ?>account_copyright<?php endif; ?>">
    <span class="footerspan">
        <?php
        if ($lang_menu == "am") {
            echo "Կայքը նախագծել և պատրաստել է  <a href='https://www.cybertech.am/'>«CyberTech»</a> ընկերությունը։ </span> <i class='far fa-copyright'></i> «Սթարթափ Կենտրոն» ՀԿ, " . date("Y");
        }
        if ($lang_menu == "en") {
            echo "Developing by  <a href='https://www.cybertech.am/'>CyberTech</a></span> <i class='far fa-copyright'></i> 'Start up center' NGO " . date("Y");
        }
        if ($lang_menu == "ru") {
            echo "Дизайн и подготовка сайта  <a href='https://www.cybertech.am/'>CyberTech</a></span> <i class='far fa-copyright'></i> НПО \"Стартап Центр\" " . date("Y");
        }
        ?>

</div>
<script src='../js/navbar.js'></script>