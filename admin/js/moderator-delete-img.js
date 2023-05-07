$('.delete-img').click(function(){
	let categories=$('#content').attr('data-categories')
	let article_id=$(this).attr('data-article-id')
	let img_id=$(this).attr('data-img-id')
	$that=$(this).parent()
	$.ajax({
		method: 'post',
		url: '../php/moderator-delete-img.php',
		data: {categories, article_id, img_id},
		success: function(res){
			$that.remove()
           $('.result-deleted-image').html(res)
		}
	})
})
$('#change-main-img').on('submit', function(e){
	e.preventDefault();
	let file=$('#change-main').val()
	if(file!=''){
		$.ajax({
				  url:"../php/moderator-delete-img.php",
			      method:"POST",
			      data:new FormData(this),
			      contentType:false,
			      cache:false,
			      processData:false,
	              success:function(data){
	              	console.log(data)
	              	$('.result-change-main').html(data)
	                  // if(data){
	                  // 	$('.result-user-form').html("<span class='text-success'>Դածտերը պահպանվել են</span>")
	                  // }
	                  // else{
	                  // 	$('.result-user-form').html("<span class='text-danger'>Սխալ․․․</span>")
	                  // }
	              }
		})
	}
	else{
		$('.result-change-main').html('<span class="text-danger">Ընտրել նկարը</span>')
	}
})