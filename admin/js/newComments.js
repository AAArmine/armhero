$(document).ready(function(){
    $('.confirm-comment').on('click', function(){
        $artCategory=$('#categoryArticle').val();
        $commentId =$(this).prop('id').split('_')[1];
        console.log($commentId);
        $.ajax({
            method: 'post',
            url:"../data/comments-update.php",
            data:{
                commentId: $commentId,
                artCategory:$artCategory
            },
            success: function (response) {
            console.log(response);
            $('.result-delete').html('Մեկնաբանությունը հաջողությամբ հաստատվեց։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
        });
    });
    $('.delete-comment').on('click', function(){
        $artCategory=$('#categoryArticle').val();
        $commentId =$(this).prop('id').split('_')[1];
        console.log($commentId);
        $.ajax({
            method: 'post',
            url:"../data/comments-delete.php",
            data:{
                commentId: $commentId,
                artCategory:$artCategory
            },
            success: function (response) {
            $('.result-delete').html('Մեկնաբանությունը հաջողությամբ ջնջվեց։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
        });
    });
});