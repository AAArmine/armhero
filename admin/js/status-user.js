// ----------------open-modal-delete-comment------------------------
$('table').on('click', '.open-modal-block-user', function(){
  let email=$(this).parent().attr('data-email')
  let row_id=$(this).parent().parent().attr('data-id')
  let type=$(this).attr('data-type')
  $('.user-id').attr('data-user-id', row_id)
  $('.user-id').attr('data-type', type)
  $('.status-user').parent().attr('data-email', email)
})
$('.status-user').click(function(){
   let that=$(this)
   let type=$('.user-id').attr('data-type')
   let user_id=$('.user-id').attr('data-user-id')
   let email=$(this).parent().attr('data-email')
   let reason_id
      $('.select-reason:checked').each(function(){
         reason_id=$(this).attr('data-reason-id')
      })
   $.ajax({
       url: '../php/status-user.php',
       method: 'post',
       data:{user_id, type, reason_id, email},
       beforeSend: function(){
          $('.result-user-status').html('Կատարվում է ․ ․ ․')
       },
       success: function(result){
         $('.result-user-status').html(result)
       }
     })
})

$('table').on('click', '.status-user-active', function(){
   console.log('sss')
   let that=$(this)
  let type=$(this).attr('data-type')
  let user_id=$(this).parent().parent().attr('data-id')
  let email=$(this).parent().attr('data-email')
  $.ajax({
       url: '../php/status-user.php',
       method: 'post',
       data:{user_id, type, email},
       success: function(result){
         $('.result-status').html(result)
         that.parent().parent().remove()
         setTimeout(function(){window.location.reload()})
       }
     })
})