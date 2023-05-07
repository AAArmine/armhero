$(document).ready(function () {
    $('#files').change(function () {
        var form_data = new FormData();
        // Read selected files
        var totalfiles = document.getElementById('files').files.length;
        for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.getElementById('files').files[index]);
        }

        // AJAX request
        $.ajax({
            url: '../ajaxfile.php',
            type: 'post',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {

                for (var index = 0; index < response.length; index++) {
                    var src = response[index];

                    // Add img element in <div id='preview'>
                    $('#preview').append('<div class="imgdivabs"><img src="../' + src + '" width="100px;" ><span class="delspan" id="' + src + '">X</span></div>');
                }

            }
        });
    });

    // delete img

});
$(document).ready(function () {
    $(document).on("click", ".delspan", function (event) {
        var imgpath = event.target.id;
        $(this).parent().remove();
        $.ajax({
            url: '../deleteupload.php',
            type: 'post',
            data: {
                imgpath: imgpath
            },
            success: function (response) {
                $('#result').append(response);
            }
        });


    });
});

$(document).ready(function () {
    $('.label').click(function () {
        $('#hiddenfield').css('display', 'block');
        $(this).find('.absname').animate({
            'bottom': '30px'
        }, "slow");
        $(this).find('.absname').css({
            'color': '#929191',
            "font-size": "10px"
        });
    });
});
// validation
var checkname = false;
var checkphone = false;
var checkemail = false;
var checkcaption = false;
var checkabout = false;
var checktext = false;

$('#abs-name').focusout(function () {
    var hidInpLang = $('#hiddeninput').val();
    var name = $('#abs-name').val();
    if (name.length > 3) {
        checkname = true;
        $('.hiddenfield-name').html('');
    } else {
        if (hidInpLang == 1) {
            $('.hiddenfield-name').html('More than 3 simbols required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-name').html('Պահանջվում է ավելի քան 3 նիշ:');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-name').html('Требуется более 3-х символов.');
        }
    }
});
$('#phonemod').focusout(function () {
    var phone = $(this).val();
    if (phone.length > 6) {
        if (!phone.match(/^[0-9\s]*$/)) {
            var hidInpLang = $('#hiddeninput').val();
            if (hidInpLang == 1) {
                $('.hiddenfield-phone').html('Only numbers required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-phone').html('Պահանջվում են միայն թվեր.');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-phone').html('Требуются только цифры.');
            }

        } else {
            checkphone = true;
            $('.hiddenfield-phone').html('');
        }
        checkphone = true;
    } else {
        var hidInpLang = $('#hiddeninput').val();
        if (hidInpLang == 1) {
            $('.hiddenfield-phone').html('Only numbers and more than 6 simbols required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-phone').html('Պահանջվում են միայն թվեր և ավելի քան 6 նիշ:.');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-phone').html('Требуются только цифры и более 6 символов.');
        }

    }
});
$('#abs-email').focusout(function () {
    var email = $(this).val();
    if (!email.match(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/) || email.length < 6) {
        var hidInpLang = $('#hiddeninput').val();
        if (hidInpLang == 1) {
            $('.hiddenfield-email').html('Fill in a valid email.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-email').html('Լրացրեք վավեր էլ. հասցե։');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-email').html('Заполните действующий адрес эл․ почты.');
        }

    } else {
        if (email.match(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/) && email.length > 6) {
            checkemail = true;
            $('.hiddenfield-email').html('');
        }

    }
});
$('#abs-caption').focusout(function () {
    var caption = $(this).val();
    if (caption.length > 3) {
        checkcaption = true;
        $('.hiddenfield-caption').html('');
    } else {
        var hidInpLang = $('#hiddeninput').val();
        if (hidInpLang == 1) {
            $('.hiddenfield-caption').html('More than 3 simbols required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-caption').html('Պահանջվում է ավելի քան 3 նիշ.');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-caption').html('Требуется более 3 символов.');
        }
    }
});
$('#abs-about').focusout(function () {
    var about = $('#abs-about').val();
    if (about.length > 3) {
        checkabout = true;
        $('.hiddenfield-about').html('');
    } else {
        var hidInpLang = $('#hiddeninput').val();
        if (hidInpLang == 1) {
            $('.hiddenfield-about').html('More than 3 simbols required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-about').html('Պահանջվում է ավելի քան 3 նիշ։');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-about').html('Требуется более 3 символов.');
        }
    }
});
$('#textarea-about').focusout(function () {
    var text = $(this).val();
    if (text.length > 10) {
        checktext = true;
        $('.hiddenfield1').html('');
    } else {
        var hidInpLang = $('#hiddeninput').val();
        if (hidInpLang == 1) {
            $('.hiddenfield1').html('This area does\'t have enough length.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield1').html('Այս դաշտը չունի բավարար երկարություն:');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield1').html('Это поле недостаточно длинное.');
        }


    }
});

$('#mainsubmit').click(function () {
    var hidInpLang = $('#hiddeninput').val();
    if (checkname && checkphone && checkemail && checkcaption && checkabout && checktext) {
        var name = $('#abs-name').val();
        var phone = $('#phonemod').val();
        var email = $('#abs-email').val();
        var caption = $('#abs-caption').val();
        var about = $('#abs-about').val();
        var comments = $('#abs-comments').val();
        var text = $('#textarea-about').val();
        $('.modal').attr('id', 'mainmodal');
        $.ajax({
            type: 'post',
            url: '../submitstory.php',
            data: {
                name: name,
                phone: phone,
                email: email,
                caption: caption,
                about: about,
                comments: comments,
                text: text
            },
            success: function (result) {
                document.getElementById('abs-name').value = '';
                document.getElementById('phonemod').value = '';
                document.getElementById('abs-email').value = '';
                document.getElementById('abs-caption').value = '';
                document.getElementById('abs-about').value = '';
                document.getElementById('textarea-about').value = '';

                document.querySelector('#mainmodal').removeAttribute('id');
                var images = document.getElementsByClassName('imgdivabs');
                for (var i = 0; i < images.length; i++) {
                    images[i].innerHTML = '';
                }
            }

        });
    } else if (checkname == false) {

        if (hidInpLang == 1) {
            $('.hiddenfield-name').html('This field is required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-name').html('Այս դաշտը պարտադիր է:');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-name').html('Это поле обязательно к заполнению.');
        }


        if (checkphone == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-phone').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-phone').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-phone').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkemail == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-email').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-email').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-email').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkcaption == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-caption').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-caption').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-caption').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkabout == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-about').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-about').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-about').html('Это поле обязательно к заполнению.');
            }
        }

        if (checktext == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield1').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield1').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield1').html('Это поле обязательно к заполнению.');
            }
        }
    } else if (checkphone == false) {

        if (hidInpLang == 1) {
            $('.hiddenfield-phone').html('This field is required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-phone').html('Այս դաշտը պարտադիր է:');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-phone').html('Это поле обязательно к заполнению.');
        }


        if (checkname == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-name').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-name').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-name').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkemail == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-email').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-email').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-email').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkcaption == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-caption').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-caption').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-caption').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkabout == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-about').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-about').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-about').html('Это поле обязательно к заполнению.');
            }
        }


        if (checktext == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield1').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield1').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield1').html('Это поле обязательно к заполнению.');
            }
        }


    } else if (checkemail == false) {
        if (hidInpLang == 1) {
            $('.hiddenfield-email').html('This field is required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-email').html('Այս դաշտը պարտադիր է:');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-email').html('Это поле обязательно к заполнению.');
        }


        if (checkname == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-name').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-name').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-name').html('Это поле обязательно к заполнению.');
            }
        }

        if (checkphone == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-phone').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-phone').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-phone').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkcaption == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-caption').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-caption').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-caption').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkabout == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-about').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-about').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-about').html('Это поле обязательно к заполнению.');
            }
        }


        if (checktext == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield1').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield1').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield1').html('Это поле обязательно к заполнению.');
            }
        }


    } else if (checkcaption == false) {
        if (hidInpLang == 1) {
            $('.hiddenfield-caption').html('This field is required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-caption').html('Այս դաշտը պարտադիր է:');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-caption').html('Это поле обязательно к заполнению.');
        }


        if (checkname == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-name').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-name').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-name').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkphone == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-phone').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-phone').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-phone').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkemail == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-email').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-email').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-email').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkabout == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-about').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-about').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-about').html('Это поле обязательно к заполнению.');
            }
        }


        if (checktext == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield1').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield1').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield1').html('Это поле обязательно к заполнению.');
            }
        }


    } else if (checkabout == false) {
        if (hidInpLang == 1) {
            $('.hiddenfield-about').html('This field is required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield-about').html('Այս դաշտը պարտադիր է:');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield-about').html('Это поле обязательно к заполнению.');
        }


        if (checkname == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-name').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-name').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-name').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkphone == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-phone').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-phone').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-phone').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkemail == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-email').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-email').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-email').html('Это поле обязательно к заполнению.');
            }
        }

        if (checkcaption == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-caption').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-caption').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-caption').html('Это поле обязательно к заполнению.');
            }
        }


        if (checktext == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield1').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield1').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield1').html('Это поле обязательно к заполнению.');
            }
        }


    } else if (checktext == false) {
        if (hidInpLang == 1) {
            $('.hiddenfield1').html('This field is required.');
        }
        if (hidInpLang == 2) {
            $('.hiddenfield1').html('Այս դաշտը պարտադիր է:');
        }
        if (hidInpLang == 3) {
            $('.hiddenfield1').html('Это поле обязательно к заполнению.');
        }


        if (checkname == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-name').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-name').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-name').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkphone == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-phone').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-phone').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-phone').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkemail == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-email').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-email').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-email').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkcaption == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-caption').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-caption').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-caption').html('Это поле обязательно к заполнению.');
            }
        }


        if (checkabout == false) {
            if (hidInpLang == 1) {
                $('.hiddenfield-about').html('This field is required.');
            }
            if (hidInpLang == 2) {
                $('.hiddenfield-about').html('Այս դաշտը պարտադիր է:');
            }
            if (hidInpLang == 3) {
                $('.hiddenfield-about').html('Это поле обязательно к заполнению.');
            }
        }


    }
});