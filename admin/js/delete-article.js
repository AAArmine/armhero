
// ------------------delete article and send-message for delet reason------------------------

$('.delete-article').click(function(){
  let email=$(this).attr('data-mail')
  let categories=$(this).attr('data-categories')
  let article_id=$('.modal-article-id').attr('data-article-id')
  let reason_id
      $('.select-reason:checked').each(function(){
         reason_id=$(this).attr('data-reason-id')
      })
    $.ajax({
      method: 'post',
      url: '../php/delete-article.php',
      data: {email, reason_id, categories, article_id},
      beforeSend: function(){
        $('.result-modal-delete').html('Խնդրում ենք սպասել . . .')
      },
      success: function(result){
        console.log(result)
        if(result==1){
             $('.result-modal-delete').html('<span class="text-success">Հոդվածը ջնջված է</span>')
             setTimeout(function(){ window.location.href = "created-articles.php"; },2000)
        }
        else{
             $('.result-modal-delete').html('<span class="text-danger">Ընտրել պատճառը</span>')
        }
      }
    })
})