// ------------------open-modal-send-message------------------------
$('table').on('click', '.open-modal-send-message', function(){
  let email=$(this).attr('data-email')
  console.log(email)
  $('.send-message').attr('data-mail', email)
})

// ------------------open-modal-send-message-article from edit-article.php------------------------
$('.open-modal-send-message-article').on('click', function(){
  let email=$(this).attr('data-email')
  console.log(email)
  $('.send-message').attr('data-mail', email)
})
// ------------------send-message------------------------
$('.send-message').click(function(){
  let email=$(this).attr('data-mail')
  let text=$('.modal-textarea').val()
  console.log(text)
  $.ajax({
    method: 'post',
    url: '../php/send-message.php',
    data: {email, text},
    beforeSend: function(){
      $('.result-modal').html('Խնդրում ենք սպասել . . .')
    },
    success: function(result){
      if(result==1){
           $('.result-modal').html('<span class="text-success">Նամակը ուղարկված է</span>')
           setTimeout(function(){ location.reload() },1500)
      }
      else{
           $('.result-modal').html('<span class="text-danger">Տեքստի դաշտը դատարկ է</span>')
      }
    }
  })
})