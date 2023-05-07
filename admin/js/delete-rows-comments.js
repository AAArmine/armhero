$('.delete-all-checked-row').click(function(){
	let checked_ids=[]
    let tbl_categories=$('.select').val()
	$('tr').each(function(){
		let id=$(this).attr('data-id');
        $(this).hasClass('selected') ? checked_ids.push(id) : null
	})
	console.log(checked_ids)
// console.log(table)
	if(checked_ids.length>0){
        $.ajax({
        	method: 'post',
        	url: '../php/delete-row-comments.php',
        	data: {checked_ids: checked_ids, tbl_categories: tbl_categories },
        	success: function(result){
              $('.result-delete').html(result)
                   $('.selected').each(function(){
                    $(this).remove()
                   })
        	}
        })
    }
})
table.on('click', '.remove', function(e) {
            e.preventDefault();
         let checked_ids=[]
         let that_tr=$(this).parent().parent()
         let row_id = $(this).parent().attr('data-row-id');
         let tbl_categories=$('.select').val()
             checked_ids.push(row_id)
         let th_is=$(this)
         $.ajax({
        	method: 'post',
        	url: '../php/delete-row-comments.php',
        	data: {checked_ids: checked_ids, tbl_categories: tbl_categories},
        	success: function(result){
              $('.result-delete').html(result)
              that_tr.remove()
        	}
        })
})