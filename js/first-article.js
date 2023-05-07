$(document).ready(function () {
  var start_com = 0;
  var limit_com = 5;
  var action = "inactive";
  $lang_dir = $("#cur_lang_page").val();
  $a_id = $("#sel_article_id").val();
  $a_type = $("#article_type").val();
  $("#delete-comment").click(function () {
    document.getElementById("comment-input").value = "";
  });
  $("#delete-add").click(function () {
    document.getElementById("add_input").value = "";
  });

  // open  comment
  function load_article_comment(limit_com, start_com) {
    var hidInpLang = $("#hiddeninput").val();
    // alert();
    $.ajax({
      type: "post",
      url: "../get_comments.php",
      data: {
        art_type: $a_type,
        art_id: $a_id,
        start: start_com,
        limit: limit_com,
        lang: $lang_dir,
      },
      cache: false,
      // dataType: 'json',
      success: function (result) {
        // console.log(result);
        $("#comments_content").append(result);
        if (result == "") {
          if (hidInpLang == 1) {
            $("#comments_content").append(
              '<p class="no_more_comment">No Comments</p>'
            );
          }
          if (hidInpLang == 2) {
            $("#comments_content").append(
              '<p class="no_more_comment">Մեկնաբանություններ չկան</p>'
            );
          }
          if (hidInpLang == 3) {
            $("#comments_content").append(
              '<p class="no_more_comment">Пока нет комментариев</p>'
            );
          }
          action = "active";
        } else {
          action = "inactive";
        }
      },
      error: function () {
        alert("error ajax");
      },
    });
  }

  // end function

  // Adding block start

  $("#send_add").click(function () {
    var hidInpLang = $("#hiddeninput").val();
    // alert();
    var textAdditional = $("#add_input").val();
    $art_type = $("#article_type").val();
    $art_id = $("#sel_article_id").val();
    if (textAdditional !== "") {
      $.ajax({
        type: "post",
        url: "../submitadditional.php",
        data: {
          textAdditional: textAdditional,
          art_type: $art_type,
          art_id: $art_id,
        },
        dataType: "json",
        success: function (result) {
          console.log(result);
          if (result == "true") {
            document.getElementById("add_input").value = "";
            if (hidInpLang == 1) {
              $(".add-message").html(
                "Your addition to the article is successfully send and after confirmation it will be published."
              );
            }
            if (hidInpLang == 2) {
              $(".add-message").html(
                "Ձեր լրացումը հաջողությամբ ուղարկվել է և հաստատվելուց հետո այն կհրապարակվի:"
              );
            }
            if (hidInpLang == 3) {
              $(".add-message").html(
                "Ваше дополнение к статье успешно отправлено и после подтверждения будет опубликовано."
              );
            }
            $(".error-add-message").html("");
            setTimeout(function () {
              $(".add-message").html("");
            }, 3000);
          }
        },
        error: function () {
          if (hidInpLang == 1) {
            $(".error-add-message").html(
              "Please login before sending your addition."
            );
          }
          if (hidInpLang == 2) {
            $(".error-add-message").html(
              "Ուղարկելուց առաջ խնդրում ենք մուտք գործել:"
            );
          }
          if (hidInpLang == 3) {
            $(".error-add-message").html(
              "Пожалуйста, авторизуйтесь перед отправкой."
            );
          }
        },
      });
    } else {
      if (hidInpLang == 1) {
        $(".error-add-message").html(
          "Please insert your comment before sending."
        );
      }
      if (hidInpLang == 2) {
        $(".error-add-message").html(
          "Ուղարկելուց առաջ խնդրում ենք տեղադրել ձեր մեկնաբանությունը:"
        );
      }
      if (hidInpLang == 3) {
        $(".error-add-message").html(
          "Пожалуйста, вставьте свой комментарий перед отправкой."
        );
      }
    }
  });

  // Adding comment

  $("#send-comment").click(function () {
    var hidInpLang = $("#hiddeninput").val();
    // alert();
    var textComment = $("#comment-input").val();
    $art_type = $("#article_type").val();
    $art_id = $("#sel_article_id").val();
    $lang_current = $("#cur_lang_page").val();
    if (textComment !== "") {
      $.ajax({
        type: "post",
        url: "../submitcomment.php",
        data: {
          textComment: textComment,
          art_type: $art_type,
          art_id: $art_id,
          lang_current: $lang_current,
        },
        dataType: "json",
        success: function (result) {
          console.log(result);
          document.getElementById("comment-input").value = "";

          $(".sent-message").html(result);

          console.log(start_com, limit_com);
          $("#comments_content").empty();
          load_article_comment(5, 0);
          var com_count = parseInt($(".com_count").text());
          com_count += 1;
          $(".com_count").text(com_count);
          $(".error-message").html("");
          setTimeout(function () {
            $(".sent-message").html("");
          }, 3000);
        },
        error: function () {
          if (hidInpLang == 1) {
            $(".error-message").html(
              "Please login before leaving a comment, or register if you don't have an account."
            );
          }
          if (hidInpLang == 2) {
            $(".error-message").html(
              "Խնդրում ենք մուտք գործել՝ մեկնաբանություն թողնելուց առաջ, կամ գրանցվել, եթե դեռ գրանցված չեք:"
            );
          }
          if (hidInpLang == 3) {
            $(".error-message").html(
              "Пожалуйста, войдите м в аккаунт, прежде чем оставлять комментарий, или зарегистрируйтесь, если у вас нет аккаунта"
            );
          }
          setTimeout(function () {
            $(".error-message").html("");
          }, 3000);
        },
      });
    } else {
      if (hidInpLang == 1) {
        $(".error-message").html("Please insert your comment before sending.");
      }
      if (hidInpLang == 2) {
        $(".error-message").html(
          "Ուղարկելուց առաջ խնդրում ենք տեղադրել ձեր մեկնաբանությունը:"
        );
      }
      if (hidInpLang == 3) {
        $(".error-message").html(
          "Пожалуйста, вставьте свой комментарий перед отправкой."
        );
      }
    }
  });
  $("#comment-input,#add_input").focus(function () {
    $(".error-message").html("");
  });

  // right_block click_simple article page

  // end right_block click_simple article page

  $("#open_comments").on("click", function () {
    if ($("#comments_content").css("display") == "none") {
      $("#comments_content").show();
      $(this).html('<i class="fas fa-caret-up"></i>');
    } else {
      // alert();
      $("#comments_content").hide();
      $(this).html('<i class="fas fa-caret-down">');
    }
  });
  if (action == "inactive") {
    action = "active";
    load_article_comment(limit_com, start_com);
  }

  console.log(document.getElementById("comments_content").scrollHeight);
  console.log($("#comments_content").scrollTop());
  console.log(Math.ceil($("#comments_content").innerHeight()));

  $("#comments_content").on("scroll", function () {
    console.log(document.getElementById("comments_content").scrollHeight);
    console.log($("#comments_content").scrollTop());
    console.log(Math.ceil($("#comments_content").innerHeight()));
    if (
      document.getElementById("comments_content").scrollHeight -
        $("#comments_content").scrollTop() <=
        Math.ceil($("#comments_content").innerHeight()) &&
      action == "inactive"
    ) {
      action = "active";
      start_com = start_com + limit_com;
      setTimeout(function () {
        load_article_comment(limit_com, start_com);
      }, 500);
    }
  });
  // end open comment

  $(".add_article").on("click", function () {
    if ($(".add_section").css("display") == "none") {
      $(".add_section").show();
      $(window).scrollTop($(".add_section").offset().top - 100);
    } else {
      $(".add_section").hide();
    }
  });

  $("#close_adding_block").on("click", function () {
    $(".add_section").hide();
    $(window).scrollTop(10);
  });
});
$(".carousel-item").first().addClass("active");
