$(document).ready(function(){
    
    $('.delete-comment-auth').on('click', function(){
        $commentId =$(this).prop('id').split('_')[1];
        console.log($commentId);
        $.ajax({
            method: 'post',
            url:"../data/comments-delete-existing.php",
            data:{
                commentIdAuth: $commentId
            },
            success: function (response) {
            $('.result-delete').html('Մեկնաբանությունը հաջողությամբ ջնջվեց։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
        });
    });
    $('.delete-comment-his').on('click', function(){
        $commentId =$(this).prop('id').split('_')[1];
        console.log($commentId);
        $.ajax({
            method: 'post',
            url:"../data/comments-delete-existing.php",
            data:{
                commentIdHis: $commentId
            },
            success: function (response) {
            $('.result-delete1').html('Մեկնաբանությունը հաջողությամբ ջնջվեց։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
        });
    });
});