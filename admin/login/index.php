<?php 
    include "../heder.php";
?>
    <link href="../css/login.css" rel="stylesheet" />
    <body>
    <div class="wrapper wrapper-full-page">
        <div class="full-page  section-image" data-color="blue" data-image="../logo.png">
            <div class="content">
                <div class="container">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                            <div class="card card-login card-hidden">
                                <div class="card-header ">
                                    <h3 class="header text-center">Login</h3>
                                </div>
                                <div class="card-body ">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Login</label>
                                            <input id="login" type="text" placeholder="Enter login" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="pass" type="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div id="message"></div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <button id="submit" class="btn btn-orange btn-wd">Login</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
 <?php 
include "../footer.php";
 ?>
    </div>
    <script>
    $(document).ready(function() {
        
    });
</script>
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
        setTimeout(function() {
            $('.card').removeClass('card-hidden');
        }, 700)
        $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#submit').trigger('click');
                 console.log('keypress')
             }
        });
        $("#submit").click(function(){
            var log=$("#login").val();
            var pas=$("#pass").val();
            $.ajax({
                type: "post",
                url: "enter.php",
                data: {login: log, password: pas},
                success: function(ard){
                    $("#message").html(ard)
                }
            })
        })
    });
</script>
</body>
</html>
