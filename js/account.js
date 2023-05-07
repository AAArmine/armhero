// c_titles default
$('.c_title').each(function () {
    // alert();
    if (localStorage.getItem("active") === null) {
        console.log('local_null');
        $('#actions').parent().addClass('active_title');


    }

    if ($(this).attr('id') == localStorage.active) {

        $(this).parent().addClass('active_title');

        if ($(this).attr('id') == 'autobiography') {
            $('.blocks_cont').css('display', 'flex');
        } else {
            $('.blocks_cont').css('display', 'none');
        }
        if ($(this).attr('id') == 'history') {

            $('.historys_cont').css('display', 'flex');

        } else {
            $('.historys_cont').css('display', 'none');
        }

        if ($(this).attr('id') == 'actions') {

            $('.actions_cont').css('display', 'flex');
            $('.history_cont').css('display', 'flex');
            $('.history_cont_blocks').css('display', 'flex');
            $('.edit_cont').css('display', 'flex');
            $('.edit_cont_blocks').css('display', 'flex');


        } else {
            $('.actions_cont').css('display', 'none');
            $('.history_cont').css('display', 'none');
            $('.history_cont_blocks').css('display', 'none');
            $('.edit_cont').css('display', 'none');
            $('.edit_cont_blocks').css('display', 'none');

        }
        if ($(this).attr('id') == 'edites') {
            $('.edites_all_cont').css('display', 'flex');
        } else {
            $('.edites_all_cont').css('display', 'none');
        }


    }

});


$(document).ready(function () {
    //loader start
    $last_page_autho = $('#last_page').val();
    $la = $('#cur_lang_page').val();
    // loader end


    // the edites
    if (localStorage.getItem("page_edites") === null) {
        console.log('local_null');
        $('.link_ed').each(function () {
            if ($(this).text() == 1) {
                $(this).addClass('active_page');
            }
            $this_page = parseInt($(this).text());
            $point_page = 3;
            var ul = document.getElementById("ed_ul");
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
        $('.link_ed').each(function () {
            if ($(this).text() == localStorage.page_edites) {
                $(this).addClass('active_page');
                if (localStorage.page_edites != 2 && localStorage.page_edites != 1 && localStorage.page_edites != $last_page_autho) {
                    if ($(this).hasClass('active_page')) {
                        $this_page = parseInt($(this).text());
                        $this_prev = $this_page - 1;
                        $this_next = $this_page + 1;

                    }
                    var ul = document.getElementById("ed_ul");
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
                    if (localStorage.page_edites == $last_page_autho) {

                        if ($(this).hasClass('active_page')) {
                            $this_page = parseInt($(this).text());
                            $this_prev = $this_page - 2;
                            var ul = document.getElementById("ed_ul");
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
                        var ul = document.getElementById("ed_ul");
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

// end edites
// the edites pagination_clicks

    $('.link_ed').on('click', function () {

        $('.link_ed').each(function () {
            if ($(this).hasClass('active_page')) {
                $(this).removeClass('active_page')
            }
        });
        localStorage.page_class = "active_page";
        localStorage.page_edites = $(this).text();
        // $(this).addClass('active_page');

    })

    $('.link_ed_prev').on('click', function () {

        if (localStorage.page_edites != 1) {

            $lan = $('#cur_lang_page').val();
            $num = localStorage.page_edites - 1;
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_edites = $num;

        }

    });

    $('.link_ed_next').on('click', function () {

        $first_time = false;
        $last_page = $('#last_page').val();
        $lan = $('#cur_lang_page').val();
        if (localStorage.getItem("page_edites") === null) {
            $('.link_his').each(function () {
                if ($(this).hasClass('active_page')) {
                    $load_active_page = parseInt($(this).text()) + 1;
                }
            });
            $page_next = $load_active_page.toString();

            // $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_next)
            $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_next)

            $first_time = true;
            localStorage.page_edites = $load_active_page;
        }
        if (localStorage.page_edites != $last_page && $first_time != true) {
            // $lan = $('#cur_lang_page').val();
            $num = parseInt(localStorage.page_edites) + 1;
            // alert($num);
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_edites = $num;
        }


    });


// end the edites pagination_clicks


    //pagination click
    if (localStorage.getItem("page_autobiography") === null) {
        console.log('local_null');
        $('.link').each(function () {
            if ($(this).text() == 1) {
                $(this).addClass('active_page');
            }
            $this_page = parseInt($(this).text());
            $point_page = 3;
            var ul = document.getElementById("autho_ul");
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
        // sharunakeliii
        $('.link').each(function () {

            if ($(this).text() == localStorage.page_autobiography) {

                // alert($(this).text())
                $(this).addClass('active_page');
                // alert(localStorage.page_autobiography)
                if (localStorage.page_autobiography != 2 && localStorage.page_autobiography != 1 && localStorage.page_autobiography != $last_page_autho) {
                    if ($(this).hasClass('active_page')) {
                        $this_page = parseInt($(this).text());
                        $this_prev = $this_page - 1;
                        $this_next = $this_page + 1;

                    }
                    var ul = document.getElementById("autho_ul");
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
                    if (localStorage.page_autobiography == $last_page_autho) {

                        if ($(this).hasClass('active_page')) {
                            $this_page = parseInt($(this).text());
                            $this_prev = $this_page - 2;
                            var ul = document.getElementById("autho_ul");
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
                        var ul = document.getElementById("autho_ul");
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

        // sharunakeliii

    }
    // the history
    if (localStorage.getItem("page_history") === null) {
        console.log('local_null');
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
            if ($(this).text() == localStorage.page_history) {
                $(this).addClass('active_page');
                if (localStorage.page_history != 2 && localStorage.page_history != 1 && localStorage.page_history != $last_page_autho) {
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
                    if (localStorage.page_history == $last_page_autho) {

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

    // end history
    // the history pagination_clicks

    $('.link_his').on('click', function () {

        $('.link_his').each(function () {
            if ($(this).hasClass('active_page')) {
                $(this).removeClass('active_page')
            }
        });
        localStorage.page_class = "active_page";
        localStorage.page_history = $(this).text();
        // $(this).addClass('active_page');

    })

    $('.link_his_prev').on('click', function () {

        if (localStorage.page_history != 1) {

            $lan = $('#cur_lang_page').val();
            $num = localStorage.page_history - 1;
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_history = $num;

        }

    });

    $('.link_his_next').on('click', function () {

        $first_time = false;
        $last_page = $('#last_page').val();
        $lan = $('#cur_lang_page').val();
        if (localStorage.getItem("page_history") === null) {
            $('.link_his').each(function () {
                if ($(this).hasClass('active_page')) {
                    $load_active_page = parseInt($(this).text()) + 1;
                }
            });
            $page_next = $load_active_page.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_next)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_next)

            $first_time = true;
            localStorage.page_history = $load_active_page;
        }
        if (localStorage.page_history != $last_page && $first_time != true) {
            // $lan = $('#cur_lang_page').val();
            $num = parseInt(localStorage.page_history) + 1;
            // alert($num);
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_history = $num;
        }


    });


    // end the history pagination_clicks

    $('body').on('click', '.link', function () {
// alert()
        $('.link').each(function () {
            if ($(this).hasClass('active_page')) {


                $(this).removeClass('active_page')

            }
        });
        localStorage.page_class = "active_page";
        localStorage.page_autobiography = $(this).text();
        // alert(localStorage.page_autobiography)
        // $(this).addClass('active_page');


    })
    $('.link_prev').on('click', function () {
// alert()

        if (localStorage.page_autobiography != 1) {

            $lan = $('#cur_lang_page').val();
            $num = localStorage.page_autobiography - 1;
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            // alert($(this).attr('href'));
            localStorage.page_autobiography = $num;

        }

    });
    $('.link_next').on('click', function () {

        $last_page = $('#last_page').val();
        $first_time = false;
        $last_page = $('#last_page').val();
        $lan = $('#cur_lang_page').val();
        if (localStorage.getItem("page_autobiography") === null) {
            $('.link').each(function () {
                if ($(this).hasClass('active_page')) {
                    $load_active_page = parseInt($(this).text()) + 1;
                }
            });
            $page_next = $load_active_page.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_next)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_next)

            $first_time = true;
            localStorage.page_autobiography = $load_active_page;
        }

        if (localStorage.page_autobiography != $last_page && $first_time != true) {
            $lan = $('#cur_lang_page').val();
            $num = parseInt(localStorage.page_autobiography) + 1;
            // alert($num);
            $page_num = $num.toString();

            $(this).attr('href', window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_num)
            // $(this).attr('href', window.location.origin + '/' + $lan + '/account.php?page=' + $page_num)

            localStorage.page_autobiography = $num;
        }


    });


    //end pagination click

    // user_title click
    $('.c_title').on('click', function () {


        if (!$(this).parent().hasClass('active_title')) {
            $(".se-pre-con").fadeIn("fast");
            let title_id = $(this).attr('id');
            let elem_title = $(this);

            $.ajax({
                type: "POST",
                url: '../titles_session.php',
                data: {
                    title: title_id,

                },
                dataType: 'json',
                success: function (response) {

                    console.log(response)
                    $lan = $('#cur_lang_page').val();
                    if (localStorage.getItem("page_" + elem_title.attr('id')) !== null) {

                        let page_name = 'page_' + elem_title.attr('id');

                        $num = parseInt(localStorage[page_name]);

                        $page_num = $num.toString();

                        window.location.href = window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_num;
                        // window.location.href = window.location.origin + '/' + $lan + '/account.php?page=' + $page_num;

                    } else {

                        window.location.href = window.location.origin + '/' + 'armhero/' + $lan + '/account.php';
                        // window.location.href = window.location.origin + '/' + $lan + '/account.php';

                    }


                },
                error: function () {
                    alert('error ajax');
                }
            });


            localStorage.removeItem("active");
            localStorage.active = $(this).attr('id');

            setTimeout(function () {

                $('.c_title').each(function () {
                    if ($(this).parent().hasClass('active_title')) {
                        $(this).parent().removeClass('active_title')
                    }
                });
                $(this).parent().addClass('active_title');
                if ($(this).attr('id') == 'autobiography') {

                    $('.blocks_cont').css('display', 'flex');

                } else {
                    $('.blocks_cont').css('display', 'none');
                }
                if ($(this).attr('id') == 'history') {

                    $('.historys_cont').css('display', 'flex');

                } else {
                    $('.historys_cont').css('display', 'none');
                }
                if ($(this).attr('id') == 'actions') {

                    $('.actions_cont').css('display', 'flex');
                    $('.history_cont').css('display', 'flex');
                    $('.history_cont_blocks').css('display', 'flex');
                    $('.edit_cont').css('display', 'flex');
                    $('.edit_cont_blocks').css('display', 'flex');

                } else {
                    $('.actions_cont').css('display', 'none');
                    $('.history_cont').css('display', 'none');
                    $('.history_cont_blocks').css('display', 'none');
                    $('.edit_cont').css('display', 'none');
                    $('.edit_cont_blocks').css('display', 'none');

                }
                if ($(this).attr('id') == 'edites') {
                    $('.edites_all_cont').css('display', 'flex');
                } else {
                    $('.edites_all_cont').css('display', 'none');
                }

            }, 100);

        }


    });
// end user_title click


// Start all changing functional
    $('.edit_user_data').on('click', function () {
        $('.data_field').each(function () {
            console.log($(this).attr('readonly'))
            if ($(this).is('[readonly]')) {

                console.log('if');
                $(this).attr("readonly", false)
                $(this).css('border', '1px solid black');
                $('.name_surname').css('text-align', 'center');
                $('.name_surname').css('border', '1px solid black');
                $('.name_surname').attr("readonly", false);
                $('.edit_user_data').css('color', 'darkred');
                if ($('.user_data').find('.button-data').length == 0) {
                    $('.user_data').append('<div class="button-data"><button type="button" class="btn1_account" id="sending"> Send Code</button></div>')

                }
            } else {
                console.log('else');
                $(this).attr("readonly", true)
                $(this).css('border', 'none')
                $('.name_surname').css('text-align', 'left');
                $('.name_surname').css('border', 'none');
                $('.name_surname').attr("readonly", true);
                $('.edit_user_data').css('color', 'black');
                if ($('.user_data').find('.button-data').length > 0) {

                    $('.button-data').remove();
                }

            }

        });

    })
    // views all click
    $('.account_view').on('click', function () {
        $(".se-pre-con").fadeIn("fast");
        let show_block = $(this).data('id');
        let elem_title = $(this);
        $('#' + show_block).parent().addClass('active_title')

        $.ajax({
            type: "POST",
            url: '../titles_session.php',
            data: {
                title: show_block,

            },
            dataType: 'json',
            success: function (response) {
                console.log(response)
                $lan = $('#cur_lang_page').val();
                if (localStorage.getItem("page_" + show_block) !== null) {

                    let page_name = 'page_' + show_block;

                    $num = parseInt(localStorage[page_name]);

                    $page_num = $num.toString();
                    window.location.href = window.location.origin + '/' + 'armhero/' + $lan + '/account.php?page=' + $page_num;
                    // window.location.href = window.location.origin + '/' + $lan + '/account.php?page=' + $page_num;

                } else {
                    window.location.href = window.location.origin + '/' + 'armhero/' + $lan + '/account.php';
                    // window.location.href = window.location.origin + '/' + $lan + '/account.php';

                }

                // location.reload();

            },
            error: function () {
                alert('error ajax');
            }
        });
        localStorage.removeItem("active");
        localStorage.active = show_block;

    });
    // end views all click
//check name in change
    $field_valid_change = true;
    $('#d_name').on('input', function () {

        $value = $(this).val();
        $min = $(this).attr('min');
        $max = $(this).attr('max');
        if ($value == "" || $value.length < $min || $value.length > $max) {

            $('#update_message').empty();
            $('#update_message').html($(this).attr('data-message'));
            console.log($(this))
            $field_valid_change = false;


        } else {

            $('#update_message').empty();
            $field_valid_change = true;
        }

    })

//end check name in change
    // check email in changing data
    $email_valid_change = true;
    $email_unique = true;
    $('#d_email').on('input', function () {

        var el = $(this);

        $value = $(this).val();
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        $route = $('#check_email_route').val();

        if ($value == "" || !pattern.test($value)) {
            $('#update_message').empty()
            $('#update_message').html($(this).attr('data-message'));
            $email_valid_change = false;
        } else {
            $('#update_message').empty()
            $email_valid_change = true;
            $.ajax({
                type: "POST",
                url: '../check_email_change.php',
                data: {
                    email: $value,
                },
                dataType: 'json',
                success: function (response) {
                    // console.log(response)
                    if (response == false) {
                        $('#update_message').empty();
                        // console.log(el)
                        $('#update_message').html(el.attr('data-unique'));
                        $email_unique = false;

                    } else {
                        $('#update_message').empty();
                        $email_unique = true;
                    }

                },
                error: function () {
                    alert('error ajax');
                }
            });

        }


    })

    // end change email in changing data

})
let original_name = $('#d_name').val();
let original_email = $('#d_email').val();
let original_city = $('#d_city').val();

function phone_no_change() {
    let email = $('#d_email').val();
    let city = $('#d_city').val();
    let name = $('#d_name').val();

    $.ajax({
        type: "POST",
        url: '../change_user_data.php',
        data: {

            name: name,
            email: email,
            city: city,

        },
        dataType: 'json',
        success: function (response) {
            console.log(response.message)
            if (response) {

                document.getElementById('update_message').innerText = response.message;
                $('.edit_user_data').css('color', 'black');
                $('.data_field').each(function () {

                    $(this).attr("readonly", true)
                    $(this).css('border', 'none');

                });
                $('.name_surname ').css('text-align', 'left');
                if ($('.user_data').find('.button-data').length > 0) {

                    $('.button-data').remove();

                }
            }

        },
        error: function () {
            alert('error ajax');
        }
    });


}

var input = document.getElementById('phone');
var old_phone = document.getElementById('old_phone');
var btn_phone = document.getElementById('sending');
var valid_msg = document.getElementById('error-phone');
var errors_array = ["Invalid number", "Invalid country code", "Too short", "Too long"];
var iti = window.intlTelInput(input, {

    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});


document.addEventListener('click', function (e) {

    if (e.target && e.target.id == 'sending') {
        // alert('sending');
        var full_number = iti.getNumber();
        console.log(full_number);
        // input.value = full_number;
        var phone = input.value;
        console.log(full_number);
        console.log(phone);
        if (full_number == old_phone.value) {
            let email = $('#d_email').val();
            let city = $('#d_city').val();
            let name = $('#d_name').val();
            $is_changing = true;
            if (name == original_name && email == original_email && city == original_city) {

                $('.edit_user_data').css('color', 'black');
                $no_change_msg = {

                    'en': "You haven't changed the data",
                    'ru': "Вы не меняли данные",
                    'am': "Դուք չեք փոփոխել տվյալները"

                };
                console.log($no_change_msg)
                $l = $('#cur_lang_page').val();
                console.log($no_change_msg[$l]);
                document.getElementById('update_message').innerText = $no_change_msg[$l];
                $('.data_field').each(function () {

                    $(this).attr("readonly", true)
                    $(this).css('border', 'none');

                });
                $('.name_surname ').css('text-align', 'left');
                if ($('.user_data').find('.button-data').length > 0) {

                    $('.button-data').remove();

                }
                $is_changing = false;
                // alert($is_changing)

            }
            if ($field_valid_change == true && $email_valid_change == true && $email_unique == true && $is_changing == true) {
                phone_no_change();

            }


        } else {
            console.log('hastatvaccccc')
            if ($field_valid_change == true && $email_valid_change == true && $email_unique == true) {
                phoneAuth();
                document.getElementById('sending').setAttribute('class', 'btn1_account changing_button')
                document.getElementById('sending').removeAttribute("id");

            }

        }
    }

});
$(document).on('click', '.changing_button', function (e) {
    if ($('#d_code').val() != "" && $.isNumeric($("#d_code").val())) {

        verifyCode_change();

    } else {
        e.preventDefault();
    }

})


// End all changing functional

// start redirect in read-article

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
            window.location.href = "../" + $lang_dir + "/" + "read-article.php";


        },
        error: function () {
            alert('error ajax');
        }
    });

})



//end redirect in read-article