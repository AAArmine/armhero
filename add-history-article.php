<?php
session_start();
include "../header.php";
include "history_article_define.php";
if (empty($_SESSION['user_id'])) {
    ?>
    <script>window.location.href = "sign_in.php"</script>
    <?php
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="../css/add-article.css">
<link rel="stylesheet" href="../css/footer.css">
<!-- <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css"> -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<title>Armheroes Add Article</title>

</head>
<body>
<?php include "navbar.php" ?>
<section class="add-article-section py-5">
    <h1 class="text-center fw-700 mb-5"><?= H1 ?></h1>
    <div class="container ">
        <div class="w-100 ">
            <div class="text-center w-50 mx-auto history-text">
                <h4 class="fw-700 "><?= HISTORY ?></h4>
                <hr width="20%" class="bg-red mx-auto" size="3">
                <p class="fw-700"><?= FILL_IN_REQUIREMENT ?></p>
            </div>
        </div>
        <form class="add-article d-flex flex-wrap mt-5 pt-4" method="post" enctype="multipart/form-data" id="a-a">
            <div class="left">
                <div class="w-100 bg-img mt-4">
                    <img src="../images/donatemain.png" class="w-100">
                </div>
            </div>
            <div class="d-flex flex-column right pl-5">
                <input type="text" name="title" placeholder="<?= PLC_TITLE ?>" data-error-text='<?= ERROR_TITLE ?>'
                       class='name'>
                <input type="" name="lng" data-lng="<?= $lang_menu ?>" class="hidden" value="<?= $lang_menu ?>">
                <input type="" name="tblname" class="hidden" value="history">
                <div class="mt-5">
                    <h5 class="fw-700"><?= TITLE_IMAGE ?></h5>
                    <div class="img-div mt-3 d-flex align-items-center field">
                        <label class="text-center w-100">
                            <span class="file-span " for="filed" name='field_span'><img
                                        src="../Icons/camera.png"></span>
                            <input type="file" id="field" name="img" class="img"
                                   data-error-text="<?= ERROR_IMAGE ?>"><span id="err_file" class="ml-3"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="w-100 my-5 bottom">
                <textarea placeholder="<?= PLC_DESC ?>" class="mt-3" name='description' id="description"></textarea>
                <br>
                <div class="w-25 add-img px-4 py-2 text-red mt-3 form-group">
                    <label class="text-center w-100">
                        <span class=" " for="upload-image" name=''><img src="../Icons/img-icon.png"></span>
                        <span class="ml-2 fw-700 f-size-16"><?= ADD_IMAGE ?></span>
                        <input type="file" id="upload-image" name="file[]" class="up-image"
                               data-error-text="<?= ERROR_IMAGE ?>" multiple/>
                    </label>
                </div>
                <p class=" size-14 fw-700 text-left"><?= IMG_5 ?></p>
                <div class="cont-uploaded-images d-flex flex-wrap"></div>
                <div class="cont-files d-flex flex-wrap"></div>

                <div class="external-links mt-3 w-75">
                    <div class="w-100 d-flex justify-content-between mt-3 py-3">
                        <div><h5 class="fw-700"><?= EXTERNAL_HREF ?></h5></div>
                        <div class="plus-external"><img src="../Icons/plus.svg" width="20px"></div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between " id="cont-ext-plus-0">
                        <input type="" name="external[0][name]" placeholder="<?= A_NAME ?>" data-n='name'>
                        <input type="" name="external[0][link]" placeholder="<?= A_HREF ?>" data-l='link'>
                    </div>
                </div>
                <div class="internal-links mt-5 w-75">
                    <div class="w-100 d-flex justify-content-between mt-3 py-3">
                        <div><h5 class="fw-700"><?= INTERNAL_HREF ?></h5></div>
                        <div class="plus-internal"><img src="../Icons/plus.svg" width="20px"></div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between" id="cont-int-plus-0">
                        <input type="" name="internal[0][name]" placeholder="<?= A_NAME ?>" data-n='name'>
                        <input type="" name="internal[0][link]" placeholder="<?= A_HREF ?>" data-l='link'>
                    </div>
                </div>
            </div>

            <button type="submit" class="px-5 py-2 btn-add-article text-white fw-700"> <?= PUBLICATE ?></button>
        </form>
        <div class="message mt-3 fw-700"></div>
    </div>
</section>

<?php include "footer.php" ?>
<script src='../js/add-articles.js'></script>
</body>
</html>
