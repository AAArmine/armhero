$(document).ready(function () {
    $language = $('#current_lang').val();
    $field_valid_log = false;
    $email_log_valid = false;

    $('.log_email').on('input', function () {

        $value = $(this).val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if ($value == "" || !pattern.test($value)) {
            $(this).next().html($(this).attr('data-message'));
            $email_log_valid = false;
        } else {
            $(this).next().empty()
            $email_log_valid = true;
        }
        console.log($email_log_valid + "email");
        console.log($field_valid_log + "password");

    });

    $('.log_fields').on('input', function () {
        // alert()
        $val = $(this).val();
        $min = $(this).attr('min');
        $max = $(this).attr('max');
        if ($val == "" || $val.length < $min || $val.length > $max) {

            $(this).next().next().html($(this).attr('data-message'));
            $field_valid_log = false;

        } else {

            $(this).next().next().empty();
            $field_valid_log = true;

        }
        console.log($email_log_valid + "email");
        console.log($field_valid_log + "password");

    });

    $('.sub_log').on('click', function () {

        $email = $('.log_email').val();
        $password = $('.log_fields').val();
        $lang = $('#current_lang').val();
        console.log($email)
        console.log($password)
        if ($field_valid_log == true && $email_log_valid == true) {
            // alert()
            $.ajax({
                type: "POST",
                url: '../authorization.php',
                data: {
                    email: $email,
                    password: $password
                },
                dataType: 'json',
                success: function (response) {
                    // alert()
                    console.log(response)
                    if (response == 'login') {
                        $array_success = {

                            'en': 'Success Login',
                            'ru': 'Успешный вход',
                            'am': 'Հաջողված Մուտք'

                        }
                        $succes_message = $array_success[$language];
                        console.log($succes_message);
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            iconColor: '#920505',
                            title: $array_success[$language],
                            showConfirmButton: false,
                            timer: 1500

                        })
                        setTimeout(function () {

                            localStorage.clear();
                            window.location.href = "../" + $lang + "/" + "account.php";

                        }, 2500);


                    } else {
                        $('.error_field').empty();
                        $('.error_field').html(response[$lang]);
                        console.log(response[$lang]);

                    }

                },
                error: function () {
                    alert('error ajax');
                }
            });

        }


    })


})