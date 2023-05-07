$('#user-form').on('submit', function(e){
	e.preventDefault();
	let bool=true
	$(".u-name").each(function(){
		if($(this).val()==''){
			bool=false
			// $('.result-user-form').html("Բոլոր դաշտերը պարտադիր են")
		}
	})
	if(bool){
		$.ajax({
			  url:"../php/user-info.php",
		      method:"POST",
		      data:new FormData(this),
		      contentType:false,
		      cache:false,
		      processData:false,
              success:function(data){
                  if(data){
                  	$('.result-user-form').html("<span class='text-success'>Դածտերը պահպանվել են</span>")
                  }
                  else{
                  	$('.result-user-form').html("<span class='text-danger'>Սխալ․․․</span>")
                  }
              }
		})
	}
	else{
		$('.result-user-form').html("<span class='text-danger'>Բոլոր դաշտերը պարտադիր են</span>")
	}

})