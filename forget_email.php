<?php
session_start();
include "header.php";
include "lang_config.php";
include "forget_pass/email-content.php";
// var_dump($lang_dir);

?>
<link rel="stylesheet" href="../css/forget_pass.css">
<title>Forget Password</title>

</head>

<body>
<input type="hidden" value="<?php echo $lang_dir ?>" id="cur_lang_page">
<?php
echo constant('forget_email-' . $lang_dir);

?>


<script src='../js/forget.js' type="text/javascript">
</script>
</body>
</html>