table.on('click', '.remove', function(e) {
  e.preventDefault();
   let checked_ids=[]
   let that_tr=$(this).parent().parent()
   let row_id =$(this).parent().parent().attr('data-id')
   checked_ids.push(row_id)
   let th_is=$(this)
   $.ajax({
    method: 'post',
    url: '../php/delete-row.php',
    data: {checked_ids: checked_ids},
    success: function(result){
        $('.result-delete').html(result)
        that_tr.remove()
    }
  })
})
// ----------------open-modal-delete-comment------------------------
$('table').on('click', '.open-modal-delete-comment', function(){
let email=$(this).attr('data-email')
let categories=$('.selected').val()
let row_id=$(this).parent().attr('data-row-id')
let article_id=$(this).parent().attr('data-article-id')
let comment_text=$(this).parent().parent().find('.c-comment').html()
$('.delete-comment').attr('data-mail', email)
$('.delete-comment').attr('data-categories', categories)
$('.delete-comment').attr('data-comment-id', row_id)
$('.modal-article-id').attr('data-article-id', article_id)
$('.comment-text').attr('data-comment-text', comment_text)

// ---------------get reasons reject--------------------
let page_type=$('.content').attr('data-type')
$.ajax({
 url: '../php/for-all.php',
 method: 'post',
 data:{page_type},
 success: function(result){
   $('.reasons-modal').html(result)
 }
})
})
// ------------------send-message------------------------
$('.delete-comment').click(function(){
let checked_ids=[]
let email=$(this).attr('data-mail')
let categories=$(this).attr('data-categories')
let row_id=$(this).attr('data-comment-id')
let article_id=$('.modal-article-id').attr('data-article-id')
let comment_text=$('.comment-text').attr('data-comment-text')
checked_ids.push(row_id)
let reason_id
$('.select-reason:checked').each(function(){
   reason_id=$(this).attr('data-reason-id')
})
$.ajax({
method: 'post',
url: '../php/send-reason-delete.php',
data: {email, reason_id, categories, row_id, article_id, comment_text, checked_ids},
beforeSend: function(){
$('.result-modal-delete').html('Խնդրում ենք սպասել . . .')
},
success: function(result){
console.log(result)
if(result==1){
     $('.result-modal-delete').html('<span class="text-success">Մեկնաբանությունը ջնջված է</span>')
     setTimeout(function(){ location.reload() },1500)
}
else{
     $('.result-modal-delete').html('<span class="text-danger">Ընտրել պատճառը</span>')
}
}
})
})