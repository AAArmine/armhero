<?php
session_start();
include "../config/dbconfig.php";
include 'lang_config.php';


$locate_url = 'location:sign_in.php';
if (!isset($_SESSION['user_id'])) {
    header($locate_url);
    exit();
}
$sql="SELECT * FROM users WHERE id ='".$_SESSION['user_id']."'";
$result_user = mysqli_query($con, $sql);
$row_data=mysqli_fetch_array($result_user);


include 'auth_user_data.php';
include 'accounts/user_data.php';
include 'accounts/user_titles.php';
?>
<?php
include "../header.php";

function custom_echo($x, $length)
{
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/account.css">

<title>Armheroes Account</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

</head>
<body class="<?php if (strpos($currren_uri, 'account.php') !== false) : ?>body_fon<?php endif; ?>">
<div class="se-pre-con"></div>
<input type="hidden" value="<?php echo $lang_dir ?>" id="cur_lang_page">
<input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" id="user_id">

<div class="">

    <?php
    include "whitenav.php";
    ?>
    <!-- Navbar-->
    <?php
    include "navbar.php";
    ?>
    <div class="wid80">

    

    <div>
        <!--        Start user data-->
        <?php
        echo constant('data-' . $lang_dir);

        ?>
        <?php
        if($row_data['fullname_am']==$row_data['fullname_en'] || $row_data['fullname_am']==$row_data['fullname_ru'] || $row_data['fullname_en']==$row_data['fullname_ru']){
            ?>
            <div class="names_lang">
                <?php
                // echo $data['fullname'];
                if($lang_dir=='am'){
                    echo "Լրացրեք Ձեր Անունը և Ազգանունը երեք լեզուներով*";
                }
                if($lang_dir=='en'){
                    echo "Fill in Your Name and Last name in three languages*";
                }
                if($lang_dir=='ru'){
                    echo "Введите свое имя и фамилию на трех языках*";
                }
                ?>
            <input type="text" id="name_am" class='nameInp' placeholder='Ձեր անունը և ազգանունը հայերեն լեզվով' value=''>
            <input type="text" id="name_en" class='nameInp name_en' placeholder='Your Name and Surname in english' value=''>
            <input type="text" id="name_ru" class='nameInp name_ru' placeholder='Ваше имя и фамилию на русском языке' value=''>
            <div class="error_name">
            <?php
                if($lang_dir=='am'){
                    echo "Բոլոր դաշտերը պետք է լրացնել։*";
                }
                if($lang_dir=='en'){
                    echo "All fields must be filled in.*";
                }
                if($lang_dir=='ru'){
                    echo "Все поля должны быть заполнены․*";
                }
                ?>
            </div>
            <div class="name-success">
            <?php
                if($lang_dir=='am'){
                    echo "Ձեր անունը հաջողությամբ թամացվեց։";
                }
                if($lang_dir=='en'){
                    echo "Your name has been successfully updated";
                }
                if($lang_dir=='ru'){
                    echo "Ваше имя успешно обновлено";
                }
                ?>
            </div>
            <button class='btn1 mt-3 but_names'>
                <?php
                if($lang_dir=='am'){
                    echo "Հաստատել";
                }
                if($lang_dir=='en'){
                    echo "Submit";
                }
                if($lang_dir=='ru'){
                    echo "Подтвердить";
                }
                ?>
            </button>

        </div>
        <?php
        }else{
            ?>
        <div class="names_lang">
            <input type="text" id="name_am" class='nameInp' placeholder='<?php echo $row_data['fullname_am'];?>' value='<?php echo $row_data['fullname_am'];?>'>
            <input type="text" id="name_en" class='nameInp name_en' placeholder='<?php echo $row_data['fullname_en'];?>' value='<?php echo $row_data['fullname_en'];?>'>
            <input type="text" id="name_ru" class='nameInp name_ru' placeholder='<?php echo $row_data['fullname_ru'];?>' value='<?php echo $row_data['fullname_ru'];?>'>
            <div class="error_name">
            <?php
                if($lang_dir=='am'){
                    echo "Բոլոր դաշտերը պետք է լրացնել։*";
                }
                if($lang_dir=='en'){
                    echo "All fields must be filled in.*";
                }
                if($lang_dir=='ru'){
                    echo "Все поля должны быть заполнены․*";
                }
                ?>
            </div>
            <div class="name-success">
            <?php
                if($lang_dir=='am'){
                    echo "Ձեր անունը հաջողությամբ թամացվեց։";
                }
                if($lang_dir=='en'){
                    echo "Your name has been successfully updated";
                }
                if($lang_dir=='ru'){
                    echo "Ваше имя успешно обновлено";
                }
                ?>
            </div>
            <button class='btn1 mt-3 but_names'>
                <?php
                if($lang_dir=='am'){
                    echo "Հաստատել";
                }
                if($lang_dir=='en'){
                    echo "Submit";
                }
                if($lang_dir=='ru'){
                    echo "Подтвердить";
                }
                ?>
            </button>

        </div>
        <?php
        }
        ?>
        
        <!--        End user data-->
        
        
        
        
        
        <!--        Tabs data-->
        <div class='nav_container'>
          <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#my_all">
                    <?php
                        if($lang_dir=='am'){
                            echo "Իմ գործողությունները";
                        }
                        if($lang_dir=='en'){
                            echo "My actions";
                        }
                        if($lang_dir=='ru'){
                            echo "Мои действия";
                        }
                    ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#myAuth_all">
                    <?php
                        if($lang_dir=='am'){
                            echo "Իմ բոլոր կենսագրությունները";
                        }
                        if($lang_dir=='en'){
                            echo "All my biographies";
                        }
                        if($lang_dir=='ru'){
                            echo "Все мои биографии";
                        }
                    ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#myHist_all">
                    <?php
                        if($lang_dir=='am'){
                            echo "Իմ բոլոր հոդվածները";
                        }
                        if($lang_dir=='en'){
                            echo "All my articles";
                        }
                        if($lang_dir=='ru'){
                            echo "Все мои статьи";
                        }
                    ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#myAdd_all">
                    <?php
                        if($lang_dir=='am'){
                            echo "Իմ բոլոր լրացումները";
                        }
                        if($lang_dir=='en'){
                            echo "My additions to the articles";
                        }
                        if($lang_dir=='ru'){
                            echo "Все мои дополнения к статьям";
                        }
                    ?>

                </a>
            </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            
            <!--all-->
            <div id="my_all" class="tab-pane active">
               <?php include "accounts/section_myautho.php"; ?>
               
               <hr>
               <?php include "accounts/section_myhistory.php"; ?>
               
               <hr>
               <?php include "accounts/section_myedit.php"; ?>
              
            </div>
            <div id="myAuth_all" class="tab-pane">
                <?php include "accounts/section_my_all_autho.php"; ?>

            </div>
            <div id="myHist_all" class="tab-pane">
                <?php include "accounts/section_all_myhistorys.php"; ?>
            </div>
            <div id="myAdd_all" class="tab-pane">
                <?php include "accounts/section_all_edits.php"; ?>
            </div>
            
        </div>
        
    </div>
    </div>
    </div>
        <!-- tab-content -->
        
        
        
        
      
    <?php
                include "footer.php";
                ?>



</div>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-app.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-auth.js"></script>

<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase-database.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<!--<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>-->

<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyBmkucuBeziyLh3IUnsp4V6y3oM7S0rzvA",
        authDomain: "armhero-f6871.firebaseapp.com",
        projectId: "armhero-f6871",
        storageBucket: "armhero-f6871.appspot.com",
        messagingSenderId: "663754213106",
        appId: "1:663754213106:web:a76c3e46f609da98a8726b",
        measurementId: "G-PD59GKM4XJ"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    // firebase.analytics();
</script>
<script src='../js/firebase.js' type="text/javascript">
</script>

<script>
  $('.but_names').click(function(){
        var name_am=$('#name_am').val()!==''?$('#name_am').val():false;
        var name_en=$('#name_en').val()!==''?$('#name_en').val():false;
        var name_ru=$('#name_ru').val()!==''?$('#name_ru').val():false;
        var user_id=$('#user_id').val();


        if(name_am, name_en, name_ru){
            $.ajax({
            type: 'post',
            url: '../insertName.php',
            data: {
                name_am: name_am,
                name_en: name_en,
                name_ru: name_ru,
                user_id: user_id
                
            },
            success: function (result) {
                if(result){
                    $('.name-success').show();
                    setTimeout(function(){ $('.name-success').hide(); }, 3000);
                };
            }
        });

        }else{
            
            $('.error_name').show();
            setTimeout(function(){ $('.error_name').hide(); }, 3000);
        }
  })
 


    //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).on('load', function () {
// Animate loader off screen
        $(".se-pre-con").fadeOut("fast");
    });
</script>

<script src='../js/account.js' type="text/javascript">
</script>
<script src='../js/sign_in.js' type="text/javascript">
</script>
<!-- <script src='../js/navbar.js' type="text/javascript">
</script> -->
</body>
</html>