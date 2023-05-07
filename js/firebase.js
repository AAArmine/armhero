window.onload = function () {

    render();

};
var currentLocation = window.location.href;
var location_array = currentLocation.split('/');
var index = location_array.length;
var page = location_array[index - 1];
console.log(page);

function render() {
    if (page == 'sign_up.php') {

        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    } else {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
            "recaptcha-container", {
                size: "invisible"
            }
        );

    }

    recaptchaVerifier.render().then(widgetId => {

        window.recaptchaWidgetId;


    });


};

function phoneAuth() {
    $lang = $('#current_lang').val();
    var number = document.getElementById('phone').value;
    var confirm_field = document.getElementById('visible_confirm');
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {

        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        $('.recaptcha_error').empty();

        if ($('#error-phone').text() == "" && $('.recaptcha_error').text() == "") {

            confirm_field.style.display = 'flex';
        }


        // alert("Message Sending");

    }).catch(function (error) {
        $error_phone_number = {

            'en': 'The phone number is not correctly',
            'ru': 'Номер телефона указан неверно',
            'am': 'Հեռախոսահամարը ճիշտ չէ'


        }
        $('.recaptcha_error').empty();
        $('.recaptcha_error').text($error_phone_number[$lang]);

    });

};

function verifyCode() {
    //
    let name = $('#name').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let phone = $('#phone').val();
    let code = document.getElementById('phone_code').value;
    coderesult.confirm(code).then(function (result) {

        var user = result.user;
        console.log(user);


        $.ajax({
            type: "POST",
            url: '../registration.php',
            data: {
                name: name,
                email: email,
                password: password,
                phone: phone,
            },
            dataType: 'json',
            success: function (response) {
                console.log(response)
                if (response == "true") {
                    $array_success = {

                        'en': 'Success Login',
                        'ru': 'Успешный вход',
                        'am': 'Հաջողված Մուտք'

                    }
                    $('.code_error').empty();
                    $lang = $('#current_lang').val();
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        iconColor: '#920505',
                        title: $array_success[$lang],
                        showConfirmButton: false,
                        timer: 1500

                    })
                    setTimeout(function () {


                        window.location.href = "../" + $lang + "/" + "sign_in.php";

                    }, 2500);


                }

            },
            error: function () {
                alert('error ajax');
            }
        });
    }).catch(function (error) {
        $lang = $('#current_lang').val();
        $error_code = {

            'en': 'Invalid code',
            'ru': 'Неверный код',
            'am': 'Անվավեր ծածկագիր'


        }
        $('.code_error').empty();
        $('.code_error').text($error_code[$lang]);

    });


};

function verifyCode_change() {
    //
    let name = $('#d_name').val();
    let email = $('#d_email').val();
    let phone = $('.d_phone').val();
    let city = $('#d_city').val();

    let code = document.getElementById('d_code').value;
    coderesult.confirm(code).then(function (result) {

        var user = result.user;
        console.log(user);


        $.ajax({
            type: "POST",
            url: '../change_user_data.php',
            data: {
                name: name,
                email: email,
                phone: phone,
                city: city,

            },
            dataType: 'json',
            success: function (response) {
                console.log(response)
                if (response) {

                    document.getElementById('update_message').innerText = response.message;
                    $('.data_field').each(function () {

                        $(this).attr("readonly", true)
                        $(this).css('border', 'none');

                    });
                    $('#visible_confirm').css('display', 'none');
                    $('.name_surname ').css('text-align', 'left');
                    if ($('.user_data').find('.button-data').length > 0) {

                        $('.button-data').remove();

                    }

                }

            },
            error: function () {
                alert('error ajax');
                $('#visible_confirm').css('display', 'flex');
            }
        });
    }).catch(function (error) {

        alert(error.message + "code error");
        $('#visible_confirm').css('display', 'flex');
    });


};