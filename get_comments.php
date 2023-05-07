<?php
session_start();
include "config/dbconfig.php";
if (isset($_POST['limit'])) {
    $data = [];
    $limit = $_POST['limit'];
    $start = $_POST['start'];
    $lang  = $_POST['lang'];
    if($lang == 'en')
    {

        $lang_created = "day later";
    }
    if($lang == 'ru')
    {

        $lang_created = "день назад";
    }
    if($lang == 'am')
    {

        $lang_created = "օր առաջ";
    }
    if ($_POST['art_type'] == 'autobiography') {

        $comment_table = 'autobiography_comments';

    } else {

        $comment_table = 'history_comments';


    }
    $sel_art_id = $_POST['art_id'];
   
    $sql_comment = "SELECT a.article_id, a.created_date, a.description, a.user_id, c.* FROM $comment_table a, users c WHERE a.user_id = c.id AND a.status = 1 AND a.article_id = $sel_art_id ORDER BY a.created_date DESC LIMIT $start,$limit";
    $res_com = $con->query($sql_comment);
    
    while ($row = mysqli_fetch_array($res_com)) {
        $date_diff = date_diff(new DateTime(), new DateTime($row['created_date']))->days;
        // print_r($date_diff);
        $lang_fullname = 'fullname_' . $lang;
        if($row[$lang_fullname] == null){

           $lang_fullname = 'fullname';

        } 
        if($date_diff == 0 || $date_diff > 2)
        {
            echo '
          
          <div class="single_comment">
              
             <div class="first_comment_content d-flex justify-content-between align-items-baseline">
                 
                <h6 class="comment_author">' . $row[$lang_fullname] .'</h6>
                <p class="comment_date">' . $row['created_date'] .'</p> 
      
             </div>
             <div class="desc_div">

                <p class="comment_desc">' . $row['description'] . '</p>

             </div>
                

           </div>  
                        
           
          ';
             

        }
        else
        {

            echo '

          <div class="single_comment">
              
             <div class="first_comment_content d-flex justify-content-between align-items-baseline">
                 
                <h6 class="comment_author">' . $row[$lang_fullname] .'</h6>
                <p class="mr-5 comment_date">' . $date_diff . " " . " " . $lang_created .'</p> 
      
             </div>
             <div class="desc_div">

                <p class="comment_desc">' . $row['description'] . '</p>

             </div>
                

           </div>  
                        
           
          ';

        }
    
       
    //    print_r(date_diff(new DateTime(), new DateTime($row['created_date']))->days);
    }

}
?>
