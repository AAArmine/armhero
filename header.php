<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="Armenian heroes, national heroes, Armenian hero, Armenian national values, Armenian war heroes, heroes biography, documental materials of heroes, write a hero story, write a hero biography">
    <meta name="description" content="Armenian heroes biography, Armenian heroes story">
    <link rel='icon' type='image/png' href='../Icons/logofon.png'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
    <!--    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>-->

    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>-->
    <!--    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>-->


    <?php if (isset($currren_uri)) : ?>
    <?php $address_pos = strpos($currren_uri, '.php');
    $address = substr($currren_uri, 0, $address_pos);

    ?>
    <input type="hidden" id="curr_url" value="<?php echo $address; ?>">
    <script>

        var url = document.getElementById("curr_url").value;
        var href = window.location.href;
        if (localStorage.getItem("page_address") === null) {
            //  alert();

            localStorage.page_address = url;

        } else {

            if (href.indexOf("page") == -1 && localStorage.getItem("page_address") != url) {

                for (var i = 0; i < localStorage.length; i++) {
                    if (localStorage.key(i).indexOf("page") >= 0) {
                        console.log(localStorage.key(i))
                        localStorage.removeItem(localStorage.key(i));

                    }


                }

            }
            localStorage.page_address = url;


        }
        // alert(localStorage.length);


    </script>


<?php endif; ?>