//in_start_localstorage get active section
if (localStorage.getItem("active_donate") === null) {
    console.log('local_null_donate');
    $('#money').addClass('active_variant');
    active_money();

} else {

    $('.variant_donate').each(function () {

        $active_id = localStorage.active_donate;

        if ($(this).attr('id') == $active_id) {
            if ($active_id == "money") {

                active_money();
            } else {

                no_active_money();

            }
            $(this).addClass('active_variant');
        } else {

            $(this).removeClass('active_variant')
        }


    });

}


// end localstorage get active section
var clickedcaptcha = false;
// form validation and sending as ayax
var indFields = false;

$(document).on('change keyup', '.required', function (e) {
    var hidInpLang = $('#hiddeninput').val();

    $('.inpmoddiv-r').addClass('border-bot');
    // $('.g-recaptcha').addClass('captchaborder');
    $('.margin-top').css('margin-top', '20px');

    if (hidInpLang == 1) {

        document.getElementById('g-recaptcha-error').innerHTML = ' "Name Surname", "Email" and "Captcha" fields are required.';
    }
    if (hidInpLang == 2) {

        document.getElementById('g-recaptcha-error').innerHTML = ' «Անուն Ազգանուն», «էլ․ հասցե» և «Կապչա» դաշտերը պարտադիր են:';
    }
    if (hidInpLang == 3) {
        document.getElementById('g-recaptcha-error').innerHTML = ' «Имя Фамилия», "эл. адрес" и "Каптча" поля для ввода обязательны для заполнения.';
    }

    var name = $('#namemod').val();
    var email = $('#emailmod').val();
    var emailok = false;
    var nameok = false;
    var clickedcaptcha=false;
    
    if (name.length > 2) {
        $('#inpmoddiv-name').removeClass('border-bot');
        nameok = true;
    }
// test

    if (!email.match(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {
        if (hidInpLang == 1) {
            $('#emailerror').html('Email is invalid.');
        }
        if (hidInpLang == 2) {
            $('#emailerror').html('Էլ.փոստը անվավեր է:');
        }
        if (hidInpLang == 3) {
            $('#emailerror').html('Электронная почта недействительна.');
        }

    } else {
        $('#emailerror').html('')
        emailok = true;
    }



    if (nameok==false || emailok==false) {
        indFields =false;
    }else{
        indFields =true;
    }

    if (indFields) {
        clickedcaptcha = true;
        console.log(clickedcaptcha);
        var hidval = $('#hidden').val();
        if (hidval == '') {
            $('#hidden').val('verified-fields');
        } else if (hidval == 'verified-captcha') {
            $('#dondiv').remove();
            $('.modal2').attr('id', 'secondModal');
            $('#donatebtn').prop('disabled', false);
            document.getElementById('g-recaptcha-error').innerHTML = '';
            // $('.g-recaptcha').removeClass('captchaborder');
        }
    } else {
        hidval = '';
        clickedcaptcha = false;

    }

});

var imNotARobot = function () {

    var hidval = $('#hidden').val();
    if (hidval == '') {
        $('#hidden').val('verified-captcha');
        clickedcaptcha = false;

        if (hidInpLang == 1) {

            document.getElementById('g-recaptcha-error').innerHTML = 'Fill in all the required fields.("Name" field should be not less than 3 symbols.)';
        }
        if (hidInpLang == 2) {

            document.getElementById('g-recaptcha-error').innerHTML = 'Լրացրեք բոլոր պահանջվող դաշտերը: («Անուն» դաշտը պետք է լինի ոչ պակաս, քան 3 նիշ):';
        }
        if (hidInpLang == 3) {
            document.getElementById('g-recaptcha-error').innerHTML = 'Заполните все обязательные поля.(«Имя Фамилия» должен быть не менее 3-х символов.)';
        }


    } else {
        document.getElementById('g-recaptcha-error').innerHTML = '';
        $('#dondiv').remove();

        $('#donatebtn').prop('disabled', false);
        // $('.g-recaptcha').removeClass('captchaborder');
        clickedcaptcha = true;
    }
};
$('#donatebtn').click(function () {
    var hidInpLang = $('#hiddeninput').val();
    var name = $('#namemod').val();
    var email = $('#emailmod').val();
    var comment = $('#commentmod').val();
    console.log(indFields);

    if (clickedcaptcha && indFields) {

        $('.modal2').attr('id', 'secondModal');

        $.ajax({
            type: 'post',
            url: '../ajaxsmtp.php',
            data: {
                name: name,
                comment: comment,
                lang: hidInpLang,
                email: email,
            },
            success: function (result) {
                console.log(result);
                document.getElementById('namemod').value = '';
                document.getElementById('emailmod').value = '';

                document.getElementById('commentmod').value = '';

                $('#inpmoddiv-name').removeClass('border-bot');

                grecaptcha.reset();
                $('.modal2').removeAttr('id');
                $('#donatebtn').prop('disabled', true);
                $('#g-recaptcha-error').html('');
            }
        });
    }else{
        if (hidInpLang == 1) {

            document.getElementById('g-recaptcha-error').innerHTML = ' "Name Surname", "Email" and "Captcha" fields are required.';
        }
        if (hidInpLang == 2) {

            document.getElementById('g-recaptcha-error').innerHTML = ' «Անուն Ազգանուն», «էլ․ հասցե» և «Կապտչա» դաշտերը պարտադիր են:';
        }
        if (hidInpLang == 3) {
            document.getElementById('g-recaptcha-error').innerHTML = ' Поля «Имя Фамилия»,"эл. адрес" и «Captcha» поля для ввода обязательны для заполнения.';
        }
    }
});
// $('.donatediv').click(function () {
//     console.log('div');
//     var name = $('#namemod').val();
//     var surname = $('#surnamemod').val();
//     var phone = $('#phonemod').val();
//     var hidInpLang = $('#hiddeninput').val();
//     if (name == '' && surname == '' && phone == '') {
//         $('.inpmoddiv-r').addClass('border-bot');
//         $('.margin-top').css('margin-top', '21px');
//         if (hidInpLang == 1) {

//             document.getElementById('g-recaptcha-error').innerHTML = ' "Name Surname" and "Captcha" fields are required.';
//         }
//         if (hidInpLang == 2) {

//             document.getElementById('g-recaptcha-error').innerHTML = ' «Անուն Ազգանուն» և «Կապտչա» դաշտերը պարտադիր են:';
//         }
//         if (hidInpLang == 3) {
//             document.getElementById('g-recaptcha-error').innerHTML = ' Поля «Имя Фамилия» и «Captcha» обязательны.';
//         }

//     }
// });





// Adding code

$('.variant_donate').on('click', function () {

    $('.variant_donate').each(function () {

        if ($(this).hasClass('active_variant')) {
          
            $(this).removeClass('active_variant')
        }


    });
    $(this).addClass('active_variant');
    localStorage.active_donate = $(this).attr('id');
    if ($(this).attr('id') == 'money') {

        active_money();

    } else {

        no_active_money();

    }

});

function active_money() {

    if (window.innerWidth < 801) {

        $('.main_middle_line').css('display', 'none');
        $('.mainflexitem2').css('display', 'none');
        $('.mainflexitem1').css('display', 'block');
    } else {
        $('.inpmoddiv').css('border-bottom', '1px solid rgb(204 198 198)');
        $('#commentmod').css('border-bottom', '1px solid rgb(204 198 198)');
        $('.inpmoddiv').find('input').prop('readonly', true);
        $('#commentmod').prop('readonly', true);
        $('#donatebtn').prop('disabled', true);
        $('.money_title').css('color', 'black');
        $('.disp1').css('color', 'lightgrey');
        $('.pay_variant').removeClass('no_active');
        $('.pay_section_underline').css('background-color', 'darkgrey');
        $('#captchaborderid').addClass('disabled_recaptcha')
    }


}

function no_active_money() {


    if (window.innerWidth < 801) {

        $('.main_middle_line').css('display', 'none');
        $('.mainflexitem2').css('display', 'block');
        $('.mainflexitem1').css('display', 'none');
    } else {

        $('.pay_variant').addClass('no_active');
        $('.money_title').css('color', 'lightgrey');
        $('.disp1').css('color', 'black');
        $('.pay_section_underline').css('background-color', 'lightgrey');
        $('.inpmoddiv').css('border-bottom', '1px solid black');
        $('#commentmod').css('border-bottom', '1px solid black');
        $('.inpmoddiv').find('input').prop('readonly', false);
        $('#commentmod').prop('readonly', false);
        $('#donatebtn').prop('disabled', false);
        $('#captchaborderid').removeClass('disabled_recaptcha')

    }


}

