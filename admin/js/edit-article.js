CKEDITOR.replace( 'content-am',{
                  height: 300,
                  toolbar: [
                                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                                { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                                { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                                { name: 'insert', items: [ 'HorizontalRule'] },
                                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                                { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                                { name: 'others', items: [ '-' ] },
                                { name: 'about', items: [ 'About' ] }
                            ]
                 });
CKEDITOR.replace( 'content-ru', {
                  height: 300,
                  toolbar: [
                                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                                { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                                { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                                { name: 'insert', items: [ 'HorizontalRule'] },
                                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                                { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                                { name: 'others', items: [ '-' ] },
                                { name: 'about', items: [ 'About' ] }
                            ]
                 });
CKEDITOR.replace( 'content-en', {
                  height: 300,
                  toolbar: [
                                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                                { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                                { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                                { name: 'insert', items: [ 'HorizontalRule'] },
                                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                                { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                                { name: 'others', items: [ '-' ] },
                                { name: 'about', items: [ 'About' ] }
                            ]
                 });

$(".edit-article").on('submit', function(event){
    event.preventDefault()
    let that=$(this);
    let title=$(this).find('.article-name').val()
    let text=$(this).find('.ckeditor').val()

    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
    }
    if(title!=='' && text!==''){
    $.ajax({
          url:"../php/edited-article.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
                success:function(data){
                  console.log(data)
                  that.find('.result').html(data)
                }
    })
  }
  else{
    $(this).find('.result').html('<span class="text-danger">Լրացնել պարտադիր դաշտերը</span>')
    $(this).find('.article-name').addClass('error')
    $(this).find('.cke_contents').addClass('error')
  }
})

// -----------reject or accept edited articles-----------------------------
$('.btn_article_edited').click(function(){
    let categories=$('#content').attr('data-categories')
    let type=$(this).attr('data-type')
    let row_id=$(this).attr('data-id')
    let red_div=$(this).parent().find('.result-edited-article')
    $.ajax({
      method: 'post',
      url: '../php/reject_or_accept_edited_article.php',
      data:{categories, type, row_id},
      success: function(result){
           red_div.html(result)
      }
    })
})
// // ------------------open-modal-send-message------------------------
// $('.open-modal-send-message').click(function(){
//   let email=$(this).attr('data-email')
//   $('.send-message').attr('data-mail', email)
// })
// // ------------------send-message------------------------
// $('.send-message').click(function(){
//   let email=$(this).attr('data-mail')
//   let text=$('.modal-textarea').val()
//   console.log(text)
//   $.ajax({
//     method: 'post',
//     url: '../php/send-message.php',
//     data: {email, text},
//     success: function(result){
//       $('.result-modal').html(result)
//     }
//   })
// })