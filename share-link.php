<?php
include "include.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Document</title>
    <style>
        .container {
            margin-top: 20%;
        }

        .shareDiv {
            color: grey;
            font-size: 13px;
        }
    </style>
</head>
<body>
<script>
    function copyToClipboard() {
        var textBox = document.getElementById("inpValue");
        textBox.select();
        document.execCommand("copy");
    }
</script>
<div class="container">
    <div class="shareDiv">
        Click the button to copy the link
    </div>

    <input type="text" class="form-control" name="myvalue" id="inpValue" value="<?php
    if (isset($_GET['val'])) {
        echo $_GET['val'];
    }
    ?>" readonly/>

    <button class="btn btn-primary btn-block" onclick="copyToClipboard()">COPY LINK</button>
</div>
</body>
</html>