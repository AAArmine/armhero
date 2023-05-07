$(document).ready(function () {
    // history pagination
    $last_page_autho = $('#last_page').val();
    if (localStorage.getItem("page_history_stories") === null) {
        $('.link_his').each(function () {
            if ($(this).text() == 1) {
                $(this).addClass('active_page');
            }
            $this_page = parseInt($(this).text());
            $point_page = 3;
            var ul = document.getElementById("his_ul");
            var items = ul.getElementsByTagName("li");
            for (var i = 0; i < items.length; ++i) {
                if (items[i].children[0].innerHTML <= 3 || items[i].children[0].innerHTML == $last_page_autho) {

                    items[i].style.display = 'block';

                } else {

                    if (items[i].children[0].innerHTML == 4) {

                        items[i].children[0].textContent = '. . .';

                    } else {
                        // alert()
                        if (items[i].children[0].textContent == '. . .') {

                            items[i].style.display = 'block';

                        } else {

                            items[i].style.display = 'none';
                        }

                    }
                }

            }
        });

    } else {
        $('.link_his').each(function () {
            if ($(this).text() == localStorage.page_history_stories) {
                $(this).addClass('active_page');
                if (localStorage.page_history_stories != 2 && localStorage.page_history_stories != 1 && localStorage.page_history_stories != $last_page_autho) {
                    if ($(this).hasClass('active_page')) {
                        $this_page = parseInt($(this).text());
                        $this_prev = $this_page - 1;
                        $this_next = $this_page + 1;

                    }
                    var ul = document.getElementById("his_ul");
                    var items = ul.getElementsByTagName("li");
                    for (var i = 0; i < items.length; ++i) {

                        if (items[i].children[0].innerHTML != $this_page && items[i].children[0].innerHTML != $this_prev && items[i].children[0].innerHTML != $this_next && items[i].children[0].innerHTML != $last_page_autho) {
                            // console.log(items[i].children[0].innerHTML)
                            $the_next_point = parseInt($this_next) + 1

                            if (items[i].children[0].innerHTML == $this_prev - 1 || items[i].children[0].innerHTML == $the_next_point) {

                                if (items[i].children[0].innerHTML != 1) {

                                    items[i].children[0].textContent = '. . .';
                                }


                            } else {
                                if (items[i].children[0].textContent == '. . .') {

                                    items[i].style.display = 'block';

                                } else {

                                    items[i].style.display = 'none';

                                }

                            }

                        }

                    }

                } else {
                    if (localStorage.page_history_stories == $last_page_autho) {

                        if ($(this).hasClass('active_page')) {
                            $this_page = parseInt($(this).text());
                            $this_prev = $this_page - 2;
                            var ul = document.getElementById("his_ul");
                            var items = ul.getElementsByTagName("li");
                            for (var i = 0; i < items.length; ++i) {
                                if (items[i].children[0].innerHTML != $this_page && items[i].children[0].innerHTML != 1 && items[i].children[0].innerHTML < $this_prev) {

                                    if (items[i].children[0].innerHTML == $this_prev - 1) {

                                        items[i].children[0].textContent = '. . .';
                                        items[i].style.display = 'block';

                                    } else {

                                        items[i].style.display = 'none';

                                    }
                                } else {
                                    items[i].style.display = 'block';

                                }

                            }

                        }

                    } else {
                        $this_page = parseInt($(this).text());
                        $point_page = 3;
                        var ul = document.getElementById("his_ul");
                        var items = ul.getElementsByTagName("li");
                        for (var i = 0; i < items.length; ++i) {
                            if (items[i].children[0].innerHTML <= 3 || items[i].children[0].innerHTML == $last_page_autho) {

                                items[i].style.display = 'block';

                            } else {

                                if (items[i].children[0].innerHTML == 4) {

                                    items[i].children[0].textContent = '. . .';

                                } else {
                                    // alert()
                                    if (items[i].children[0].textContent == '. . .') {

                                        items[i].style.display = 'block';

                                    } else {

                                        items[i].style.display = 'none';
                                    }

                                }
                            }

                        }

                    }

                }


            }

        });

    }


    // the history pagination_clicks

    $('.link_his').on('click', function () {

        $('.link_his').each(function () {
            if ($(this).hasClass('active_page')) {
                $(this).removeClass('active_page')
            }
        });
        localStorage.page_class_stories = "active_page";
        localStorage.page_history_stories = $(this).text();
        // $(this).addClass('active_page');

    })

    $('.link_his_prev').on('click', function () {

        if (localStorage.page_history_stories != 1) {

            $lan = $('#cur_lang_page').val();
            $num = localStorage.page_history_stories - 1;
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/stories-history.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_history_stories = $num;

        }

    });

    $('.link_his_next').on('click', function () {

        $first_time = false;
        $last_page = $('#last_page').val();
        $lan = $('#cur_lang_page').val();
        if (localStorage.getItem("page_history_stories") === null) {
            $('.link_his').each(function () {
                if ($(this).hasClass('active_page')) {
                    $load_active_page = parseInt($(this).text()) + 1;
                }
            });
            $page_next = $load_active_page.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/stories-history.php?page=' + $page_next)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_next)

            $first_time = true;
            localStorage.page_history_stories = $load_active_page;
        }
        if (localStorage.page_history_stories != $last_page && $first_time != true) {
            // $lan = $('#cur_lang_page').val();
            $num = parseInt(localStorage.page_history_stories) + 1;
            // alert($num);
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/stories-history.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_history_stories = $num;
        }


    });


// end the history pagination_clicks

// end history pagination


// Start autho pagination

    $last_page_autho = $('#last_page').val();
    if (localStorage.getItem("page_autho_stories") === null) {
        console.log('local_null');
        $('.link_auth').each(function () {
            if ($(this).text() == 1) {
                $(this).addClass('active_page');
            }
            $this_page = parseInt($(this).text());
            $point_page = 3;
            var ul = document.getElementById("his_ul");
            var items = ul.getElementsByTagName("li");
            for (var i = 0; i < items.length; ++i) {
                if (items[i].children[0].innerHTML <= 3 || items[i].children[0].innerHTML == $last_page_autho) {

                    items[i].style.display = 'block';

                } else {

                    if (items[i].children[0].innerHTML == 4) {

                        items[i].children[0].textContent = '. . .';

                    } else {
                        // alert()
                        if (items[i].children[0].textContent == '. . .') {

                            items[i].style.display = 'block';

                        } else {

                            items[i].style.display = 'none';
                        }

                    }
                }

            }
        });

    } else {
        $('.link_auth').each(function () {
            if ($(this).text() == localStorage.page_autho_stories) {
                $(this).addClass('active_page');
                if (localStorage.page_autho_stories != 2 && localStorage.page_autho_stories != 1 && localStorage.page_autho_stories != $last_page_autho) {
                    if ($(this).hasClass('active_page')) {
                        $this_page = parseInt($(this).text());
                        $this_prev = $this_page - 1;
                        $this_next = $this_page + 1;

                    }
                    var ul = document.getElementById("his_ul");
                    var items = ul.getElementsByTagName("li");
                    for (var i = 0; i < items.length; ++i) {

                        if (items[i].children[0].innerHTML != $this_page && items[i].children[0].innerHTML != $this_prev && items[i].children[0].innerHTML != $this_next && items[i].children[0].innerHTML != $last_page_autho) {

                            $the_next_point = parseInt($this_next) + 1

                            if (items[i].children[0].innerHTML == $this_prev - 1 || items[i].children[0].innerHTML == $the_next_point) {

                                if (items[i].children[0].innerHTML != 1) {

                                    items[i].children[0].textContent = '. . .';
                                }


                            } else {
                                if (items[i].children[0].textContent == '. . .') {

                                    items[i].style.display = 'block';

                                } else {

                                    items[i].style.display = 'none';

                                }

                            }

                        }

                    }

                } else {
                    if (localStorage.page_autho_stories == $last_page_autho) {

                        if ($(this).hasClass('active_page')) {
                            $this_page = parseInt($(this).text());
                            $this_prev = $this_page - 2;
                            var ul = document.getElementById("his_ul");
                            var items = ul.getElementsByTagName("li");
                            for (var i = 0; i < items.length; ++i) {
                                if (items[i].children[0].innerHTML != $this_page && items[i].children[0].innerHTML != 1 && items[i].children[0].innerHTML < $this_prev) {

                                    if (items[i].children[0].innerHTML == $this_prev - 1) {

                                        items[i].children[0].textContent = '. . .';
                                        items[i].style.display = 'block';

                                    } else {

                                        items[i].style.display = 'none';

                                    }
                                } else {
                                    items[i].style.display = 'block';

                                }

                            }

                        }

                    } else {
                        $this_page = parseInt($(this).text());
                        $point_page = 3;
                        var ul = document.getElementById("his_ul");
                        var items = ul.getElementsByTagName("li");
                        for (var i = 0; i < items.length; ++i) {
                            if (items[i].children[0].innerHTML <= 3 || items[i].children[0].innerHTML == $last_page_autho) {

                                items[i].style.display = 'block';

                            } else {

                                if (items[i].children[0].innerHTML == 4) {

                                    items[i].children[0].textContent = '. . .';

                                } else {
                                    // alert()
                                    if (items[i].children[0].textContent == '. . .') {

                                        items[i].style.display = 'block';

                                    } else {

                                        items[i].style.display = 'none';
                                    }

                                }
                            }

                        }

                    }

                }


            }

        });

    }


// the autho pagination_clicks

    $('.link_auth').on('click', function () {

        $('.link_auth').each(function () {
            if ($(this).hasClass('active_page')) {
                $(this).removeClass('active_page')
            }
        });
        localStorage.page_class_stories = "active_page";
        localStorage.page_autho_stories = $(this).text();


    })

    $('.link_auth_prev').on('click', function () {

        if (localStorage.page_autho_stories != 1) {

            $lan = $('#cur_lang_page').val();
            $num = localStorage.page_autho_stories - 1;
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/stories-autobiography.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_autho_stories = $num;

        }

    });

    $('.link_auth_next').on('click', function () {

        $first_time = false;
        $last_page = $('#last_page').val();
        $lan = $('#cur_lang_page').val();
        if (localStorage.getItem("page_autho_stories") === null) {
            $('.link_auth').each(function () {
                if ($(this).hasClass('active_page')) {
                    $load_active_page = parseInt($(this).text()) + 1;
                }
            });
            $page_next = $load_active_page.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/stories-autobiography.php?page=' + $page_next)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_next)

            $first_time = true;
            localStorage.page_history_stories = $load_active_page;
        }
        if (localStorage.page_history_stories != $last_page && $first_time != true) {
            // $lan = $('#cur_lang_page').val();
            $num = parseInt(localStorage.page_history_stories) + 1;
            // alert($num);
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/stories-autobiography.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_history_stories = $num;
        }


    });


// end autho pagination


    $('.one_block').on('click', function () {
        // alert();
        $article_id = $(this).data('article_id');
        $article_type = $(this).data('article_view');
        $lang_dir = $('#cur_lang_page').val();
        // alert($article_id)
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

});
// filters 1



$('#submitName').click(function(){
    $nameVal=$('#auth_name').val();
    $language=$('#language').val();
    if($nameVal){
        $.ajax({
            type: 'post',
            url: '../auth_process.php',
            data: {
                nameVal:$nameVal,
                language:$language

            },
            success: function (result) {
                $('.filter_content').html(result);
            }
        });
    }else{
        $('#notFilledName').css('display', 'block');
        setTimeout(function(){$('#notFilledName').css('display', 'none');}, 3000)
    }
});


$('#submitPlaceOfBirth').click(function(){
    $placeofbirthVal=$('#auth_placeofbirth').val();
    $language=$('#language').val();
    if($placeofbirthVal){
        $.ajax({
            type: 'post',
            url: '../auth_process.php',
            data: {
                placeofbirthVal:$placeofbirthVal,
                language:$language

            },
            success: function (result) {
                $('.filter_content').html(result);
            }
        });
    }else{
        $('#notFilledPlaceOfBirth').css('display', 'block');
        setTimeout(function(){$('#notFilledPlaceOfBirth').css('display', 'none');}, 3000)
    }
});


$('#submitBirthDay').click(function(){
    $birthdayVal=$('#auth_birthday').val();
    $language=$('#language').val();
    if($birthdayVal){
        $.ajax({
            type: 'post',
            url: '../auth_process.php',
            data: {
                birthdayVal:$birthdayVal,
                language:$language

            },
            success: function (result) {
                $('.filter_content').html(result);
            }
        });
    }else{
        $('notFilledBirthday').css('display', 'block');
        setTimeout(function(){$('#notFilledBirthday').css('display', 'none');}, 3000)
    }
});
$('#submitName2').click(function(){
    $name2Val=$('#auth_name2').val();
    $language=$('#language').val();
    if($name2Val){
        $.ajax({
            type: 'post',
            url: '../auth_process.php',
            data: {
                name2Val:$name2Val,
                language:$language

            },
            success: function (result) {
                $('.filter_content').html(result);
            }
        });
    }else{
        $('#notFilledName2').css('display', 'block');
        setTimeout(function(){$('#notFilledName2').css('display', 'none');}, 3000)
    }
});


// filters 2
$('#submitTitle').click(function(){
    $titleVal=$('#auth_title').val();
    $language=$('#language').val();
    if($titleVal){
        $.ajax({
            type: 'post',
            url: '../auth_process2.php',
            data: {
                titleVal:$titleVal,
                language:$language

            },
            success: function (result) {
                $('.filter_content').html(result);
            }
        });
    }else{
        $('#notFilledTitle').css('display', 'block');
        setTimeout(function(){$('#notFilledTitle').css('display', 'none');}, 3000)
    }
});



$('#submitPublicationdate').click(function(){
    $publicationdateVal=$('#auth_publicationdate').val();
    $language=$('#language').val();
    if($publicationdateVal){
        $.ajax({
            type: 'post',
            url: '../auth_process2.php',
            data: {
                publicationdateVal:$publicationdateVal,
                language:$language

            },
            success: function (result) {
                $('.filter_content').html(result);
            }
        });
    }else{
        $('#notFilledPublicationdate').css('display', 'block');
        setTimeout(function(){$('#notFilledPublicationdate').css('display', 'none');}, 3000)
    }
});
$('#submitTitle2').click(function(){
    $title2Val=$('#auth_title2').val();
    $language=$('#language').val();
    if($title2Val){
        $.ajax({
            type: 'post',
            url: '../auth_process2.php',
            data: {
                title2Val:$title2Val,
                language:$language

            },
            success: function (result) {
                $('.filter_content').html(result);
            }
        });
    }else{
        $('#notFilledTitle2').css('display', 'block');
        setTimeout(function(){$('#notFilledTitle2').css('display', 'none');}, 3000)
    }
});