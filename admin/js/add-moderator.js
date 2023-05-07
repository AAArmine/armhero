$('#add-moderator').on('submit', function(event){
	event.preventDefault()
	let login=$('.login').val()
	let password=$('.password').val()
	if(login!='' && password!=''){
		$.ajax({
            method: 'post',
            url: '../php/moderators.php',
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
            	$('.res-add-moderator').html(data)
                setTimeout(function(){ location.reload() }, 3000)
            }
		})
	}
	else{
		$('.res-add-moderator').html('Լրացրեք բոլոր դաշտերը')
	}
})