
  $('#change-image_main').submit(function (e) {
    e.preventDefault();
    $main_img=$('#change-main').val();
    $category=$('#category_article').val();
    $article_id=$('#id_article').val();  
    if($main_img!==""){
    $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data: new FormData(document.getElementById('change-image_main')),
        contentType: false,
        processData: false,
        success: function (response) {
            $('.result-change-main').html('Նկարը հաջողությամբ թարմացվեց, սեղմել cntrl+F5 տեսնեու համար')
            
            setTimeout(function () { location.reload(true); }, 6000);
        }
    }); 
  }else{
        console.log('upload AN IMAGE FIRS');
        $('.result-change-main').html('Նկարը ընտրված չէ')
      }
  });
                                   


  // delete external link
  $('.delete-links-external').on('click', function(){
   
    $id_external_link=$(this).attr('datatype');
    $category_article=$('#category_article').val();
   
      $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data:{
          id_external_link: $id_external_link,
          category_article:$category_article
        },
       
        success: function (response) {
            console.log(response);
            $('.result-change-link').html('Հղումը հաջողությամբ ջնջվեց');
            setTimeout(function () { location.reload(true); }, 2000);
        }
    }); 
  });

  
  // delete internal link
  $('.delete-links-internal').on('click', function(){
    $id_internal_link=$(this).attr('datatype');
    $category_article=$('#category_article').val();
      $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data:{
          id_internal_link: $id_internal_link,
          category_article:$category_article
        },
        success: function (response) {
            console.log(response);
            $('.result-change-link-internal').html('Հղումը հաջողությամբ ջնջվեց');
            setTimeout(function () { location.reload(true); }, 2000);
        }
    }); 
  });


  //  SAVE CHANGES
  $art_id = $('#save_art_id_am').val();
  $category_article=$('#article_categories_am').val();
  // save changes am
  $('.save_arm_art').click(function(){
    $content_am = $('#content_am').val();
    if($category_article=="autobiography"){
      $auth_name_am=$('#auth_name_am').val();
      $nik_name_am=$('#nik_name_am').val();
      $place_of_birth_am=$('#place_of_birth_am').val();
      $date_of_birth_am=$('#date_of_birth_am').val();
      $content_am=CKEDITOR.instances.editor1.getData();
      console.log($date_of_birth_am);
      $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data:{
          art_id: $art_id,
          category_article:$category_article,
          content_am:$content_am,
          auth_name_am: $auth_name_am,
          nik_name_am: $nik_name_am,
          place_of_birth_am:$place_of_birth_am,
          date_of_birth_am: $date_of_birth_am,
          content_am:$content_am
        },
        success: function (response) {
            $('.result-am').html('Տվյալները թարմացվեցին։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
    }); 
    }
    else{
      
      $article_title_am=$('#article_title_am').val();
   
      $content_am=CKEDITOR.instances.editor1.getData();
   

      $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data:{
          art_id: $art_id,
          category_article:$category_article,
          content_am:$content_am,
          article_title_am: $article_title_am
        },
        success: function (response) {
          console.log(response);
          $('.result-am').html('Տվյալները թարմացվեցին։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
      }); 
    }
  });
   // save changes ru
   $('.save_ru_art').click(function(){
    $content_ru = $('#content_ru').val();
    if($category_article=="autobiography"){
      $auth_name_ru=$('#auth_name_ru').val();
      $nik_name_ru=$('#nik_name_ru').val();
      $place_of_birth_ru=$('#place_of_birth_ru').val();
      $date_of_birth_ru=$('#date_of_birth_ru').val();
      $content_ru=CKEDITOR.instances.editor2.getData();
      console.log($content_ru);
      $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data:{
          art_id: $art_id,
          category_article:$category_article,
          content_ru:$content_ru,
          auth_name_ru: $auth_name_ru,
          nik_name_ru: $nik_name_ru,
          place_of_birth_ru:$place_of_birth_ru,
          date_of_birth_ru: $date_of_birth_ru,
          content_ru:$content_ru
        },
        success: function (response) {
            $('.result-ru').html('Տվյալները թարմացվեցին։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
    }); 
    }else{
      $article_title_ru=$('#article_title_ru').val();
      $content_ru=CKEDITOR.instances.editor2.getData();
      $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data:{
          art_id: $art_id,
          category_article:$category_article,
          content_ru:$content_ru,
          article_title_ru: $article_title_ru
        },
        success: function (response) {
          $('.result-ru').html('Տվյալները թարմացվեցին։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
      }); 
    }
  });

   // save changes en
   $('.save_en_art').click(function(){
    $content_en = $('#content_en').val();
    if($category_article=="autobiography"){
      $auth_name_en=$('#auth_name_en').val();
      $nik_name_en=$('#nik_name_en').val();
      $place_of_birth_en=$('#place_of_birth_en').val();
      $date_of_birth_en=$('#date_of_birth_en').val();
      $content_en=CKEDITOR.instances.editor3.getData();
      console.log($content_en);
      $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data:{
          art_id: $art_id,
          category_article:$category_article,
          content_en:$content_en,
          auth_name_en: $auth_name_en,
          nik_name_en: $nik_name_en,
          place_of_birth_en:$place_of_birth_en,
          date_of_birth_en: $date_of_birth_en,
          content_en:$content_en
        },
        success: function (response) {
            $('.result-en').html('Տվյալները թարմացվեցին։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
    }); 
    }else{
      $article_title_en=$('#article_title_en').val();
      $content_en=CKEDITOR.instances.editor3.getData();
      $.ajax({
        url: '../data/editArticles.php',
        method: 'POST',
        data:{
          art_id: $art_id,
          category_article:$category_article,
          content_en:$content_en,
          article_title_en: $article_title_en
        },
        success: function (response) {
          $('.result-en').html('Տվյալները թարմացվեցին։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
      }); 
    }
  });

  // confirm article

  $('.change-status').on('click', function(){
   $articleId= $('#change_status_articleId').val();
   $change_status_category=$('#change_status_category').val();
  //  console.log($change_status_category);
   if($articleId){
    $.ajax({
      url: '../data/editArticles.php',
      method: 'POST',
      data:{
        articleId: $articleId,
        change_status_category: $change_status_category
      },
      success: function (response) {
        console.log(response);
        $('.submit-confirm').html('Հոդվածը հաջողությամբ հաստատվեց։');
          setTimeout(function () { location.reload(true); }, 3000);
      }
    }); 
  }
   
  });