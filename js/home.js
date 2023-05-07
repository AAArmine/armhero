$(document).ready(function () {
  $(document).on("change keyup", ".required", function (e) {
    var nameval = $("#contact-name").val();
    var mailval = $("#contact-mail").val();
    var textval = $("#contact-text").val();
    if (
      mailval.length > 6 &&
      mailval.match(
        /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
      )
    ) {
      $(".errorMail").html("");
    }
    if (nameval.length > 3) {
      $(".errorName").html("");
    }
    if (textval.length > 10) {
      $(".errorText").html("");
    }
  });
  $("#cont-us").click(function () {
    var nameok = "";
    var mailok = "";
    var textok = "";
    var nameval = $("#contact-name").val();
    var mailval = $("#contact-mail").val().trim();
    var textval = $("#contact-text").val();
    var hidInpLang = $("#hiddeninput").val();

    if (
      mailval == "" ||
      !mailval.match(
        /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
      )
    ) {
      if (hidInpLang == 1) {
        $(".errorMail").html("Enter a valid email address.");
      }
      if (hidInpLang == 2) {
        $(".errorMail").html("Ներմուծեք վավեր էլ.հասցե:");
      }
      if (hidInpLang == 3) {
        $(".errorMail").html("Введите  действующий адрес электронной почты.");
      }
    } else {
      mailok = "ok";
      $(".errorMail").html("");
    }

    if (nameval.length < 3) {
      if (hidInpLang == 1) {
        $(".errorName").html('"Your Name" field doesn\'t have enough lenght.');
      }
      if (hidInpLang == 2) {
        $(".errorName").html("«Ձեր անունը» դաշտը բավականաչափ երկար չէ:");
      }
      if (hidInpLang == 3) {
        $(".errorName").html('Поле "Ваше имя" недостаточно длинное.');
      }
    } else {
      nameok = "ok";
      $(".errorName").html("");
    }
    if (textval.length < 10) {
      if (hidInpLang == 1) {
        $(".errorText").html("Message field doesn't have enough lenght.");
      }
      if (hidInpLang == 2) {
        $(".errorText").html("«Հաղորդագրություն» դաշտը բավականաչափ երկար չէ:");
      }
      if (hidInpLang == 3) {
        $(".errorText").html('Поле "Сообщение" недостаточно длинное.');
      }
    } else {
      textok = "ok";
      $(".errorText").html("");
    }

    if (mailok == "ok" && textok == "ok" && nameok == "ok") {
      $.ajax({
        type: "post",
        url: "../homeContactSmtp.php",
        data: {
          name: nameval,
          email: mailval,
          text: textval,
        },
        success: function (result) {
          document.getElementById("contact-name").value = "";
          document.getElementById("contact-mail").value = "";
          document.getElementById("contact-text").value = "";
          if (result == "Sent") {
            if (hidInpLang == 1) {
              $(".cont-success").html(
                "Message Sent! Thank you for contacting us."
              );
            }
            if (hidInpLang == 2) {
              $(".cont-success").html(
                "Նամակը ուղարկված է: Շնորհակալություն մեզ հետ կապվելու համար:"
              );
            }
            if (hidInpLang == 3) {
              $(".cont-success").html(
                "Сообщение отправлено! Благодарим Вас за обращение к нам."
              );
            }

            setTimeout(function () {
              if (hidInpLang == 1) {
                $(".cont-success").html("");
              }
              if (hidInpLang == 2) {
                $(".cont-success").html("");
              }
              if (hidInpLang == 3) {
                $(".cont-success").html("");
              }
            }, 3000);
          }
        },
      });
    }
  });

  // language style change

  $(".dropdown-toggle").click(function () {
    if ($(".search-full-div-abs").css("display") == "none") {
      // $('.dropdown-menu').attr('style', 'color: white');
      $(".dropdown-menu a").attr(
        "style",
        "background-color: transparent !important"
      );
      $(".dropdown-menu a").attr("style", "color: white !important");
    } else {
      $(".dropdown-menu a").attr("style", "color: black !important");

      $(".dropdown-menu a").attr("style", "background-color: white !important");
    }
  });

  // appear slider after more than 3 items

  var viewportWidth = window.innerWidth;
  var countBirthdayItem = $(".birthday-flex-item2-item").length;
  console.log(viewportWidth);

  if (viewportWidth > 850) {
    console.log("mec");
    if (countBirthdayItem == 1) {
      $(".birthday-flex-item1").width("48%");
      $(".birthday-flex-item2").width("44%");
      $(".birthday-image-div").css("height", "250px");
      $(".birthday-image-div").css("width", "350px");
    }
    if (countBirthdayItem == 2) {
      $(".birthday-flex-item1").width("28%");
      $(".birthday-flex-item2").width("58%");
      $(".birthday-flex-item2-item").width("48%");
      $(".birthday-image-div").css("height", "220px");
      $(".birthday-image-div").css("width", "300px");
    }
    if (countBirthdayItem == 3) {
      $(".birthday-flex-item1").width("28%");
      $(".birthday-flex-item2").width("69%");
      $(".birthday-flex-item2-item").width("32.6%");
      $(".birthday-image-div").css("height", "180px");
      $(".birthday-image-div").css("width", "250px");
    }

    var countEventItem = $(".event-flex-item2-item").length;

    if (countEventItem == 1) {
      $(".event-flex-item1").width("48%");
      $(".event-flex-item2").width("44%");
      $(".event-image-div").css("height", "250px");
      $(".event-image-div").css("width", "350px");
    }
    if (countEventItem == 2) {
      $(".event-flex-item1").width("28%");
      $(".event-flex-item2").width("58%");
      $(".event-image-div").css("height", "220px");
      $(".event-image-div").css("width", "300px");
    }
    if (countEventItem == 3) {
      $(".event-flex-item1").width("28%");
      $(".event-flex-item2").width("69%");
      $(".event-image-div").css("height", "180px");
      $(".event-image-div").css("width", "250px");
    }
  } else {
    console.log("poqr");
    if (countEventItem == 1 || countEventItem == 0 || countEventItem == 3) {
      $("birthday-flex-item2-item").width("100%");
      $(".birthday-flex-item2").width("100%");
    }
  }
});
