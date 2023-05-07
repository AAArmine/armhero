// console.log($('#cur_lang_page').val())
$(document).ready(function () {
    $('.relative-li').on('click', function () {
        $('.abs-stories').addClass('display-block');
        $('.abs-triangle').addClass('display-block');
    });

    $(document).click(function (e) {

        if ($(e.target).hasClass('navspan')) {
            e.preventDefault();
            return;
        }
        // links to be clickable
        if ($(e.target).is('a')) {
            return;
        } else {
            $('.abs-stories').removeClass('display-block');
            $('.abs-triangle').removeClass('display-block');
        }
    });

    $('.sign_up_home').on('click', function () {

        $lang = $('#home_lang').val();
        window.location.href = "../" + $lang + "/" + "sign_up.php";

    });

    // mob-menu
    $('#show-menu').on('click', function () {
        if ($('.menu-abs').css('display') == 'none') {
            $('.menu-abs').css('display', 'block');
        } else {
            $('.menu-abs').css('display', 'none');
        }
    });

    // search click
    $(".searchitem").children().filter(':not(.search-full-div-abs)').on('click', function () {
        // alert();
        if ($('.search-full-div-abs').css('display') == 'none') {
            $('.search-full-div-abs').css('display', 'block');
        } else {
            $('.search-full-div-abs').css('display', 'none');
        }
    });

    $('#date-ofBirth').on('focus', function () {
        $('.calendar-png').css('opacity', '0');
    });
    $('#date-ofBirth').on('focusout', function () {
        $('.calendar-png').css('opacity', '1');
    });


    $('.make-search').on('click', function () {
        // alert();
        if ($('.search-full-div-abs-mob').css('display') == 'none') {
            $('.search-full-div-abs-mob').css('display', 'block');
            $('.line-mob-display').css('display', 'block');
        } else {
            $('.search-full-div-abs-mob').css('display', 'none');
            $('.line-mob-display').css('display', 'none');
        }
    });


    // create_modal

    $('#create_variant').on('click', function () {

        console.log('create');
        if ($('#variant_add_article').css('display') == 'none') {

            $('#variant_add_article').css('display', 'flex');

        } else {

            $('#variant_add_article').css('display', 'none');

        }


    });
    $('#create_variant1').on('click', function () {

        console.log('create');
        if ($('#variant_add_article').css('display') == 'none') {

            $('#variant_add_article').css('display', 'flex');

        } else {

            $('#variant_add_article').css('display', 'none');

        }


    });


    $('.event_variant').on('click', function () {

        $lang_dir = $('#cur_lang_page').val();

        $(this).css('opacity', '0.5');
        window.location.href = "../" + $lang_dir + "/" + "add-history-article.php";


    });

    $('.auto_variant').on('click', function () {

        $lang_dir = $('#cur_lang_page').val();

        $(this).css('opacity', '0.5');
        window.location.href = "../" + $lang_dir + "/" + "add-article.php";


    });

    $('.close_div').on('click', function () {

        $('#variant_add_article').css('display', 'none');

    });


    // end create_modal







$(document).on('click','.one_block', function () {
    // alert();
    $article_id = $(this).data('article_id');
    $article_type = $(this).data('article_view');
    $lang_dir = $('#cur_lang_page').val();

    $.ajax({
        type: "POST",
        url: '../single_article.php',
        data: {

            article_id: parseInt($article_id),
            article_type: $article_type,
            lang: $lang_dir
        },
        // dataType: 'json',
        success: function (response) {
            console.log(response);
            // alert()
            window.location.href = "../" + $lang_dir + "/" + "article-read.php";

            // window.location.href = window.location.origin + '/' + 'armhero/' + $lang_dir + '/my-article.php';


        },
        error: function () {
            alert('error ajax');
        }
    });

})
// end search click mob
    $('.place_auto_birth, .date_of_birth').on('change', function (e){


           if ($('.place_auto_birth').val() == 0 && $('.date_of_birth').val() == "" && $('.inp-main-search').val() == ""){
               // alert($('.date_of_birth').val());
               $('.inp-act-search').prop('disabled',false);
               $('.inp-event_date-search').prop('disabled',false);


           }
           else
           {

               $('.inp-act-search').prop('disabled',true);
               $('.inp-event_date-search').prop('disabled',true);

           }


    });
    $('.inp-main-search').on('input',function (){

        if ($(this).val() == "" && $('.place_auto_birth').val() == 0 && $('.date_of_birth').val() == ""){

            $('.inp-act-search').prop('disabled',false);
            $('.inp-event_date-search').prop('disabled',false);

        }
        else
        {

            $('.inp-act-search').prop('disabled',true);
            $('.inp-event_date-search').prop('disabled',true);

        }

    })

    $('.inp-act-search,.inp-event_date-search').on('input',function (){

        if ($('.inp-act-search').val() == "" && $('.inp-event_date-search').val() == ""){


            $('.place_auto_birth').prop('disabled',false);
            $('.date_of_birth').prop('disabled',false);
            // $('.inp-event_date-search').hide();
            $('.inp-main-search').prop('disabled',false);

        }
        else {

            $('.place_auto_birth').prop('disabled',true);
            $('.date_of_birth').prop('disabled',true);
            // $('.inp-event_date-search').show();
            $('.inp-main-search').prop('disabled',true);

        }


    })


});

// search----------------------


$('#search-by-name').on('keyup', function(){
    $lang = $('#home_lang').val();
    $name_search=$('#search-by-name').val();
    if($name_search.length > 2){
        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
    
                name_search: $name_search,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
});

$('#search-by-title').on('keyup', function(){
    $lang = $('#home_lang').val();
    $title_search=$('#search-by-title').val();
    if($title_search.length > 2){
        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
    
                title_search: $title_search,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
});


// search click
$('#seach-filters').click(function(){
    $lang = $('#home_lang').val();

    $birthDate = $('#date-ofBirth').val();
    $birthPlace = $('#place-ofBirth').val();
    if($birthDate !=='' && $birthPlace !==''){
        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
                birthDate: $birthDate,
                birthPlace: $birthPlace,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
    else if($birthDate !==''){

        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
                birthDate: $birthDate,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
    else if($birthPlace !==''){
        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
                birthPlace: $birthPlace,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
});


// mobile





$('#search-by-name-mob').on('keyup', function(){
    console.log('mpb');
    $lang = $('#home_lang').val();
    $name_search=$('#search-by-name-mob').val();
    if($name_search.length > 2){
        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
    
                name_search: $name_search,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
});

$('#search-by-title-mob').on('keyup', function(){
    $lang = $('#home_lang').val();
    $title_search=$('#search-by-title-mob').val();
    if($title_search.length > 2){
        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
    
                title_search: $title_search,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
});


// search click
$('#seach-filters-mob').click(function(){
    $lang = $('#home_lang').val();

    $birthDate = $('#date-ofBirth-mob').val();
    $birthPlace = $('#place-ofBirth-mob').val();
    if($birthDate !=='' && $birthPlace !==''){
        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
                birthDate: $birthDate,
                birthPlace: $birthPlace,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
    else if($birthDate !==''){

        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
                birthDate: $birthDate,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
    else if($birthPlace !==''){
        $.ajax({
            type: "POST",
            url: '../searchFilter/name_title_filter.php',
            data: {
                birthPlace: $birthPlace,
                lang: $lang
            },
            success: function (response) {
                $('.search-resultes-concrete').html(response)
            },
            error: function () {
                alert('error ajax');
            }
        });
    }
});




