$(document).ready(function(){
    $('.confirm-addition').on('click', function(){
        $artCategory=$('#categoryArticle').val();
        $additionId =$(this).prop('id').split('_')[1];
        console.log($artCategory);
        $.ajax({
            method: 'post',
            url:"../data/addition-update.php",
            data:{
                additionId: $additionId,
                artCategory:$artCategory
            },
            success: function (response) {
            // console.log(response);
            $('.result-delete').html('Մեկնաբանությունը հաջողությամբ հաստատվեց։');
            setTimeout(function () { location.reload(true); }, 2000);
        }
        });
    });
    $('.delete-addition').on('click', function(){
        $artCategory=$('#categoryArticle').val();
        $additionId =$(this).prop('id').split('_')[1];
        
        $.ajax({
            method: 'post',
            url:"../data/addition-delete.php",
            data:{
                additionId: $additionId,
                artCategory:$artCategory
            },
            success: function (response) {

            $('.result-delete').html('Մեկնաբանությունը հաջողությամբ ջնջվեց։');
            setTimeout(function () { location.reload(true); }, 2000);
            
        }
        });
    });
});