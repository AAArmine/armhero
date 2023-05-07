$(document).ready(function () {
    if ($(window).innerWidth() < 576) {

        $('.sign_up').removeClass('rounded-pill');

    }

    $field_valid = false;
    $('.reg_field').on('input', function () {


        $value = $(this).val();
        $min = $(this).attr('min');
        $max = $(this).attr('max');


        if ($value == "" || $value.length < $min || $value.length > $max) {

            $(this).next().html($(this).attr('data-message'));
            console.log($(this))


        } else {

            $(this).next().empty();

        }

        $error_text = "";

        $('.error_field').each(function () {

            $error_text += $(this).text();
        });

        if ($error_text == "" && $('#name').val() != "" && $('#password').val() != "") {

            $field_valid = true;
            console.log($field_valid)
            if ($('.error_email').text() == "" && $field_valid == true) {
                console.log("field show")
                $('.phone_field').css('display', 'flex');

            }

        } else {

            $field_valid = false;
            $('.phone_field').hide();
        }


    });

    $email_valid = false;
    $('.reg_email').on('input', function () {

        var el = $(this);

        $value = $(this).val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        $route = $('#check_email_route').val();

        if ($value == "" || !pattern.test($value)) {

            $(this).next().html($(this).attr('data-message'));
            $email_valid = false;
        } else {
            $(this).next().empty()
            $email_valid = true;
            $.ajax({
                type: "POST",
                url: '../check_email.php',
                data: {
                    email: $value,
                },
                dataType: 'json',
                success: function (response) {

                    if (response == false) {
                        el.next().empty();

                        el.next().html(el.attr('data-unique'));
                        $('.phone_field').hide();

                    } else {

                        $error_text = "";

                        $('.error_field').each(function () {

                            $error_text += $(this).text();
                        });

                        el.next().empty();
                        console.log($field_valid);
                        if ($email_valid == true && $field_valid == true) {
                            console.log("ajax email show")
                            $('.phone_field').css('display', 'flex');

                        }

                    }

                },
                error: function () {
                    alert('error ajax');
                }
            });

        }

    });

// sign in redirect sign_up
    $('.log_l').on('click', function () {
        $lang = $('#current_lang').val();
        window.location.href = "../" + $lang + "/" + "sign_up.php";
    })

    // sign up redirect sign_in
    $('.reg_l').on('click', function () {
        $lang = $('#current_lang').val();
        console.log($lang)

        window.location.href = "../" + $lang + "/" + "sign_in.php";
    })


})
// Phone Validation
var input = document.getElementById('phone');
var btn_phone = document.getElementById('send_code');
var valid_msg = document.getElementById('error-phone');
var errors_array = ["Invalid number", "Invalid country code", "Too short", "Too long"];
var iti = window.intlTelInput(input, {

    customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
        console.log(selectedCountryData.dialCode);
        return '+' + selectedCountryData.dialCode;
    },

    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

});
// input.addEventListener("countrychange", function() {
//     let countryData  =  iti.getSelectedCountryData();
//     console.log(countryData.dialCode);
// });

var reset = function () {
    input.classList.remove("error");
    valid_msg.innerHTML = "";
    valid_msg.classList.add("hide");
}
btn_phone.addEventListener('click', function (e) {

    reset();
    $lang = $('#current_lang').val();
    if (input.value.trim()) {
        if (iti.isValidNumber()) {
            valid_msg.classList.remove("hide");
        } else {
            e.preventDefault()
            input.classList.add("error");
            var error_code = iti.getValidationError();
            valid_msg.innerHTML = errors_array[error_code];
            valid_msg.style.color = "red";
            valid_msg.classList.remove("hide");
        }


    }
    $.ajax({
        type: "POST",
        url: '../check_phone.php',
        data: {
            phone: input.value,
        },
        dataType: 'json',
        success: function (response) {
            console.log(response)
            if (response.unique == false) {

                valid_msg.innerHTML = response[$lang];
                valid_msg.style.color = "red";

            } else {
                // alert()
                $lang = $('#current_lang').val();
                $array_recaptcha = {

                    'en': 'The reCAPTCHA was not entered correctly',
                    'ru': 'ReCAPTCHA введена неправильно',
                    'am': 'ReCAPTCHA- ն ճիշտ մուտքագրված չէ'

                }

                function isCaptchaChecked() {
                    return grecaptcha && grecaptcha.getResponse().length !== 0;
                }

                if (isCaptchaChecked()) {
                    $('.recaptcha_error').empty();

                } else {

                    $('.recaptcha_error').empty();
                    $('.recaptcha_error').text($array_recaptcha[$lang]);
                }
      

            }

        },
        error: function () {
            alert('error ajax');
        }
    });


});

input.addEventListener("change", reset);
input.addEventListener("keyup", reset);


