$('body').blur(function () {
    $('label .error').each(function () {
        err = $(this).attr('for')
        if (err != '') {
            $('.' + err).addClass('error')
        } else {
            $('.' + err).removeClass('error')
        }
    })
    if ($('#field').attr('aria-invalid') == 'false') {
        $('.img-div').removeClass('error')
    }
})
// -------------upload main image--------------------------------
$('#field').on('input', function (e) {
    let reader = new FileReader();
    reader.onload = function (e) {
        let data = e.target.result
        let ext_data = data.split(';')[0].split('/')[1]
        let arr_ext = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG']
        if (jQuery.inArray(ext_data, arr_ext) != -1) {
            $('.img-div').removeClass('error')
            $('.img-div').find('label').addClass('opst')
            $('.img-div').find('span').remove()
            $('.img-div').css({
                'background': 'url(' + e.target.result + ')', 'background-size': 'contain',
                'background-repeat': 'no-repeat', 'background-position': 'center'
            });
        }
    };
    reader.readAsDataURL(this.files[0]);
})

let count_id = 0
$('.up-image').on('change', function (e) {
    let count_img = document.getElementsByClassName('new-img').length
    console.log(count_img)
    $that = $(this).clone()
    if (count_img < 5) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let data = e.target.result
            let ext_data = data.split(';')[0].split('/')[1]
            let arr_ext = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG']
            console.log(jQuery.inArray(ext_data, arr_ext))
            if (jQuery.inArray(ext_data, arr_ext) != -1) {
                console.log(ext_data)
                $('.cont-files').append($that)

                count_id++
                $that.attr('id', count_id)
                $('.cont-uploaded-images').append('<div class="d-flex d11" data-del="' + count_id + '"><div class="new-img" id="new-img-' + count_id + '"></div><div class="delete-img" ><i class="fa fa-close text-red"></i></div></div>');
                $('#new-img-' + count_id).css({
                    'background': 'url(' + e.target.result + ')', 'background-size': 'contain',
                    'background-repeat': 'no-repeat', 'background-position': 'center'
                });
            }
        };
        reader.readAsDataURL(this.files[0])
    } else {
        $(this).attr('type', '')
    }
})
// ---------------delete uploade images-------------------------
$('body').on('click', '.delete-img', function () {
    $('.up-image').attr('type', 'file')
    let del_id = $(this).parent().attr('data-del')
    $(this).parent().remove()
    $('#' + del_id).remove()
})
// ------------add external links-------------------------------
let count_ex_lnk = 0
$('.plus-external').click(function () {
    count_ex_lnk++
    console.log(count_ex_lnk)
    if (count_ex_lnk < 3) {
        let clone_cont_plus = $('#cont-ext-plus-0').clone()
        clone_cont_plus.attr('id', 'cont-ext-plus-' + count_ex_lnk)
        clone_cont_plus.find('input[data-n="name"]').attr('name', 'external[' + count_ex_lnk + '][name]')
        clone_cont_plus.find('input[data-l="link"]').attr('name', 'external[' + count_ex_lnk + '][link]')
        console.log(clone_cont_plus)
        $('#cont-ext-plus-' + (count_ex_lnk - 1)).after(clone_cont_plus)
    }
})
let count_in_lnk = 0
$('.plus-internal').click(function () {
    count_in_lnk++
    console.log(count_in_lnk)
    if (count_in_lnk < 3) {
        let clone_cont_plus = $('#cont-int-plus-0').clone()
        clone_cont_plus.attr('id', 'cont-int-plus-' + count_in_lnk)
        clone_cont_plus.find('input[data-n="name"]').attr('name', 'internal[' + count_in_lnk + '][name]')
        clone_cont_plus.find('input[data-l="link"]').attr('name', 'internal[' + count_in_lnk + '][link]')
        console.log(clone_cont_plus)
        $('#cont-int-plus-' + (count_in_lnk - 1)).after(clone_cont_plus)
    }
})
$('.add-article').click(function (event) {
    let lng = $(this).parent().find('.hidden').attr('data-lng')
    let err_name_text = $('.name').attr('data-error-text')
    let err_img_text = $('.img').attr('data-error-text')
    let rqur = ''
    if (lng == 'am') {
        rqur = 'Այս դաշտը պարտադիր է'
    } else if (lng == 'en') {
        rqur = 'This field is required'
    } else {
        rqur = 'Это поле является обязательным'
    }

    $('label .error').each(function () {
        err = $(this).attr('for')
        console.log(err)
        if (err != '') {
            $('.' + err).addClass('error')
        } else {
            $('.' + err).removeClass('error')
        }
    })
    if ($('#field').attr('aria-invalid') == 'false') {
        $('.img-div').find('label').addClass('opst')
        $('.img-div').find('span').remove()
        $('.img-div').removeClass('error')
    } else {
        $('.img-div').addClass('error')
    }
    $('.date').on('change', function () {
        $(this).parent().find('#birth_day-error').remove()
        $(this).removeClass('error')
    })
    $('.add-article').validate({
        rules: {
            name_hero: {
                required: true,
                minlength: '10',
            },
            title: {
                required: true,
                minlength: '5',
            },
            birth_day: {
                required: true,
            },
            img: {
                required: true,
                accept: "jpg,png,jpeg"
            },
            description: {
                required: true,
            }
        },
        messages: {
            name_hero: {
                required: rqur,
                minlength: err_name_text,
            },
            title: {
                required: rqur,
                minlength: err_name_text,
            },
            birth_day: {
                required: rqur,
            },
            img: {
                required: rqur,
                accept: err_img_text
            },
            description: {
                required: rqur
            }
        },
        submitHandler: function (form) {
            $('#upload-image').attr('type', '')
            // form.submit();
            var formData = new FormData(form);

            $.ajax({
                type: "POST",
                url: '../php-request/post-add-article.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    if (lng == 'am') {
                        $('.message').html('Խնդրում ենք սպասել . . .')
                    } else if (lng == 'en') {
                        $('.message').html('Sending . . .')
                    } else if (lng == 'ru') {
                        $('.message').html('Отправка . . .')
                    } else {
                    }
                },
                success: function (result) {
                    console.log(result)
                    // setTimeout(function () {
                        if (result == 'am') {
                            $('.message').html('Ձեր հոդվածը հաջողությամբ ուղարկվում է և հաստատվելուն պես կհրապարակվի այս կայքում:')
                        } else if (result == 'en') {
                            $('.message').html('Your article is sent successfully and will be published on the this website as soon as it is approved.')
                        } else if (result == 'ru') {
                            $('.message').html('Ваша статья была успешно отправлена ​​և будет опубликована на этом сайте, как только она будет одобрена.')
                        } else {
                            $('.message').html('error')
                        }
                        setTimeout(function () {
                            location.reload()
                        }, 4000)
                    // }, 1000)
                }
            })

        }
    })

})
 