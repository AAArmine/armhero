<div class="logotopflex d-flex flextop">
    <div class="logotopflexitem1">
        <a href='#'>
            <img src="../images/logo.png" alt="logo" class='logomain'>
        </a>
    </div>
    <div class="logotopflexitem2">
        <div class="abovedonate">
            <?php
            if ($lang_menu == 'en') {
                echo "We will appreciate any and all contributions";
            }
            if ($lang_menu == 'am') {
                echo "Շնորհակալություն մեր կողքին լինելու համար";
            }
            if ($lang_menu == 'ru') {
                echo "Спасибо за Вашу поддержку";
            }
            ?>
        </div>
        <a href="donate.php" class='btn1' id="donate_btn" class='a_no_dec'>
            <?php
            if ($lang_menu == 'en') {
                echo "Support the project";
            }
            if ($lang_menu == 'am') {
                echo "Աջակցել նախագծին";
            }
            if ($lang_menu == 'ru') {
                echo "Поддержать проект";
            }
            ?>
        </a>
    </div>
</div>