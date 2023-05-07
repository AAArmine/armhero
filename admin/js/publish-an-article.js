table.on('click', '.publish-an-article', function(){
	let article_id=$(this).attr('data-id')
  let type=$(this).attr('data-type')
	let that_tr=$(this).parent().parent()
  console.log(article_id)
	$.ajax({
        	method: 'post',
        	url: '../php/publish-an-article.php',
        	data: {article_id, type},
        	success: function(result){
              $('.result-delete').html(result)
              that_tr.remove()
        	}
        })
})