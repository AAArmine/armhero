$(document).ready(function () {

    $lang = $('#cur_lang_page').val();
    $('#forget_email').on('input', function () {

        $errors = {

            'am': 'Նշված էլ․հասցեն բացակայում է',
            'ru': 'Указанный адрес электронной почты отсутствует',
            'en': 'The specified e-mail address is missing'

        };
        $errors_invalid = {

            'am': 'Խնդրում եմ գրել վավեր էլ. փոստի հասցե',
            'ru': 'Напишите действующий адрес электронной почты',
            'en': 'Please write valid email address'


        };
        $value = $(this).val();
        let elem = $(this);
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if ($value == "" || !pattern.test($value)) {

            $(this).next().text($errors_invalid[$lang]);

        } else {
            elem.next().empty();
            $.ajax({
                type: "POST",
                url: '../check_email.php',
                data: {

                    email: $value,

                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);

                    if (response == true) {
                        console.log($errors[$lang]);
                        elem.next().text($errors[$lang]);
                        $('#reset_button').removeAttr('type');

                    } else {

                        elem.next().empty();
                        $('#reset_button').attr('type', 'submit');

                    }

                },
                error: function () {
                    alert('error ajax');
                }
            });

        }


    })


    $('.reset_pass').on('input', function () {

        $pass = $('#forget_pass').val();
        $confirm = $('#forget_confirm').val();
        $errors_valid = {

            'am': 'Գաղտնաբառը պետք է լինի 1 - 6 սիմվոլ',
            'ru': 'Пароль должен содержать от 1 до 6 символов.',
            'en': 'Password must be 1 - 6 characters long'

        };

        $errors_diff = {

            'am': 'Գաղտնաբառերը չեն համընկնում',
            'ru': 'Пароли не соответствуют',
            'en': 'Passwords do not match'

        };

        if ($(this).val().length < 6) {

            console.log($lang);
            $(this).next().text($errors_valid[$lang]);


        } else {

            $(this).next().empty();

        }
        if ($confirm != "" && $pass != $confirm) {

            $('#forget_confirm').next().text($errors_diff[$lang]);

        } else {
            console.log($confirm)
            $('#forget_confirm').next().empty();

        }


    });

    $('#email_prev').on('click', function () {

        window.location.href = "../" + $lang + "/" + "sign_in.php";


    });
    $('#pass_prev').on('click', function () {

        window.location.href = "../" + $lang + "/" + "forget_email.php";


    })


});