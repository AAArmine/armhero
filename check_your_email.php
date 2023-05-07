<?php
session_start();
include "header.php";
include "lang_config.php";
include "forget_pass/email_check.php";


?>
<link rel="stylesheet" href="../css/forget_pass.css">
<title>Email Delivered</title>

</head>

<body>
<?php

echo constant('check-' . $lang_dir);

?>


</body>
</html>