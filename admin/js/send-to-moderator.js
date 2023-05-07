$('.select_moderator').on('change', function () {
		let sel_val=$('.select_moderator option:selected').val()
		$(this).attr('value', sel_val)
})
$('.send-to-moderator').click(function(){
	let checked_mod_ids=[]
	let tbl_categories=$('.select').val()
	let moderator_id=$('.select_moderator').val()
	let tbl_type=$('#datatables').attr('data-name')
	let tbl_name=tbl_categories+"_articles_"+tbl_type
	$('tr').each(function(){
		let id=$(this).attr('data-id');
        $(this).hasClass('selected') ? checked_mod_ids.push(id) : null
	})
	if(checked_mod_ids.length>0){
        $.ajax({
        	method: 'post',
        	url: '../php/send-to-moderator.php',
        	data: {checked_mod_ids: checked_mod_ids, tbl_name: tbl_name, tbl_categories: tbl_categories, moderator_id: moderator_id },
        	success: function(result){
              $('.result-delete').html(result)
                   $('.selected').each(function(){
                    $(this).remove()
                   })
        	}
        })
    }

})