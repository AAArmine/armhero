<?php
class DB{
	private $dbHost     = "localhost";
    private $dbUsername = "u1335379_armhero";
    private $dbPassword = "urljTKNueh1SqX2G";
    private $dbName     = "u1335379_armhero";
    public  $tblName     = "";

    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            $conn->set_charset('utf8');
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
                // echo "connect";
            }
        }
    }
    public function loginAdministration($conditions = array()){
        $sql = 'SELECT * FROM '.$this->tblName;
        if(!empty($conditions) && is_array($conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $result = $this->db->query($sql);
        return !empty($result->num_rows > 0) ? $result->fetch_assoc() : false;
    } 


    public function all_in_one_row($sort, $tblname){
        $sql = "SELECT * FROM " .$tblname." ORDER BY id ".$sort;
        $result = $this->db->query($sql);
        return $result;
    } 
     public function all_rows($tblname){
        $sql = "SELECT * FROM $tblname";
        $result = $this->db->query($sql);
        return $result;
    } 

    public function select_categories_name($tblname, $item_id){
        $sql="SELECT categories_am FROM ".$tblname."_categories  WHERE id=( SELECT categories_id FROM ". $tblname.
         " WHERE id=".$item_id. ")"; 
        $result = $this->db->query($sql);
       return !empty($result->num_rows > 0) ? $result->fetch_assoc() : false;
    } 

    public function checkRow_result($conditions = array()){
        $sql = 'SELECT * FROM '.$this->tblName;
        if(!empty($conditions) && is_array($conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql .="ORDER BY id DESC";
        $result = $this->db->query($sql);
        // $result_fetch_assoc=$result->fetch_assoc();
        return !empty($result->num_rows > 0) ? $result : false;
    } 

    public function checkRow($tblName, $conditions = array()){
        $sql = 'SELECT * FROM '.$tblName;
        if(!empty($conditions) && is_array($conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }

        $result = $this->db->query($sql);
        return !empty($result->num_rows > 0) ? $result : false;
        // return !empty($result->num_rows > 0) ? $result->fetch_assoc() : false;
    } 
     // -----------check Row name in All tables (am en ru)-----------------------
    public function checkRowNameInAllTables($article_name, $tblname, $article_id){
        $sql = "SELECT am.$article_name AS name_am, en.$article_name AS name_en, ru.$article_name AS name_ru FROM $tblname"."_articles_am am, $tblname"."_articles_en en, $tblname"."_articles_ru ru WHERE am.article_id=$article_id AND en.article_id=$article_id AND ru.article_id=$article_id";      
        $result = $this->db->query($sql);
        return !empty($result->num_rows > 0) ? $result : false;
    } 
    // -----------select edited articles by users---------------------------
    public function checkRowEditedArticles($article_name, $tblname, $mod_id){
        if(!empty($mod_id)){
            $sql = "SELECT df.".$article_name.", edt.*, df.moderator_id, u.fullname, u.email FROM $tblname"."_articles_default"." df,". $tblname."_edited_articles_by_users"." edt, users u  WHERE df.moderator_id=$mod_id AND edt.user_id=u.id AND df.article_id IN (SELECT article_id FROM $tblname"."_edited_articles_by_users".") ORDER BY edt.id DESC";
        }
        else{
            $sql = "SELECT df.".$article_name.", edt.*, df.moderator_id, u.fullname, u.email FROM $tblname"."_articles_default"." df,". $tblname."_edited_articles_by_users"." edt, users u  WHERE edt.user_id=u.id AND df.article_id IN (SELECT article_id FROM $tblname"."_edited_articles_by_users".") ORDER BY edt.id DESC";
        }
        $result = $this->db->query($sql);
        return !empty($result->num_rows > 0) ? $result : false;
    } 

    // -----------check RowE dited Articles In All Language Tables-----------------------
    public function checkRowEditedArticlesInAllLanguageTables($article_name, $tblname, $mod_id){
       if(!empty($mod_id)){
          $sql = "SELECT id, user_id, article_id, $article_name, created_date FROM $tblname"."_articles_en WHERE article_status=1 AND publication_status=0 AND moderator_id=$mod_id AND article_id IN (SELECT article_id FROM $tblname"."_articles_am WHERE article_status=1 AND publication_status=0 AND article_id IN (SELECT  article_id FROM $tblname"."_articles_ru WHERE article_status=1 AND publication_status=0 ))";      
       }
       else{
          $sql = "SELECT id, user_id, article_id, moderator_id, $article_name, created_date FROM $tblname"."_articles_en WHERE article_status=1 AND publication_status=0 AND article_id IN (SELECT article_id FROM $tblname"."_articles_am WHERE article_status=1 AND publication_status=0 AND article_id IN (SELECT  article_id FROM $tblname"."_articles_ru WHERE article_status=1 AND publication_status=0 ))";      
       }
        $result = $this->db->query($sql);
        return !empty($result->num_rows > 0) ? $result : false;
    } 

    // -----------check Row Publication Articles In All Language Tables-----------------------
    public function checkRowPublicationArticlesInAllLanguageTables($article_name, $tblname, $mod_id){
       if(!empty($mod_id)){
          $sql = "SELECT id, user_id, article_id, $article_name, created_date FROM $tblname"."_articles_en WHERE publication_status=1 AND moderator_id=$mod_id AND article_id IN (SELECT article_id FROM $tblname"."_articles_am WHERE publication_status=1 AND article_id IN (SELECT article_id FROM $tblname"."_articles_ru WHERE publication_status=1 ))";      
       }
       else{
          $sql = "SELECT id, user_id, article_id, moderator_id, $article_name, created_date FROM $tblname"."_articles_en WHERE publication_status=1 AND article_id IN (SELECT article_id FROM $tblname"."_articles_am WHERE publication_status=1 AND article_id IN (SELECT  article_id FROM $tblname"."_articles_ru WHERE publication_status=1 ))";      
       }
        $result = $this->db->query($sql);
        return !empty($result->num_rows > 0) ? $result : false;
    } 

    // ----------check row comments-----------------------------------------
    public function checkRowComments($tblname, $mod_id, $status, $lastTime){
       if(!empty($mod_id)){
          $sql = "SELECT c.*, u.email FROM $tblname"."_comments c, users u, ".$tblname."_articles_en a WHERE a.user_id=u.id AND c.status=$status AND a.moderator_id=$mod_id AND c.article_id=a.article_id AND c.created_date > '$lastTime' GROUP BY c.id";      
       }
       else{
          $sql = "SELECT c.*, u.email, a.moderator_id FROM $tblname"."_comments c, users u, ".$tblname."_articles_en a WHERE a.user_id=u.id AND c.status=$status AND c.article_id=a.article_id AND c.created_date > '$lastTime' GROUP BY c.id";            
       }
        $result = $this->db->query($sql);
        return !empty($result->num_rows > 0) ? $result : false;
    } 

// ---------------select user name--------------------------------
    public function selectUser($data, $tblname, $inner_tblname, $article_id){
        if(!empty($data) && is_array($data)){
            $sel='';
            $i=0;
            foreach ($data as $value) {
                $pre=($i > 0)?', ':'';
                $sel.=$pre.$value;
                $i++;
            }

          $query="SELECT ". $sel ." FROM ". $tblname." WHERE id IN (SELECT user_id FROM $inner_tblname WHERE article_id=$article_id )";
        }
         $result=$this->db->query($query);
         return !empty($result->num_rows > 0) ? $result : false;
    }
    
    public function insert($data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $columns .= $pre.$key;
                $values  .= $pre."'".$val."'";
                $i++;
            }
            $query = "INSERT INTO " . $this->tblName . " (" . $columns . ") VALUES (" . $values . ")";
               $insert = $this->db->query($query);
               
                $query1 = "INSERT INTO autobiography_articles_am (" . $columns . ") VALUES (" . $values . ")";
                $insert1 = $this->db->query($query1);
                $query2 = "INSERT INTO autobiography_articles_ru (" . $columns . ") VALUES (" . $values . ")";
                $insert2 = $this->db->query($query2);
                $query3 = "INSERT INTO autobiography_articles_en (" . $columns . ") VALUES (" . $values . ")";
                $insert3 = $this->db->query($query3);
            
            
            // return $insert?$this->db->id:false;
            return $insert ? true : false;
        }else{
            return false;
        }
    }



    public function update($data, $conditions){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions) && is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    if(is_array($value)){
                        $j=0;
                        $values  = '';
                        foreach($value as $k => $v){
                            $p = ($j > 0) ? ', ' : '';
                            $values .= $p.$v;
                            $j++;
                        }
                        $whereSql .= $key." IN (".$values. ")";
                    }
                    else{
                        $pre = ($i > 0)?' AND ':'';
                        $whereSql .= $pre.$key." = '".$value."'";
                        $i++;
                    }
                }
            }
            $query = "UPDATE ".$this->tblName." SET ".$colvalSet.$whereSql;
            $update = $this->db->query($query);
            // return $update?$this->db->affected_rows:false;
            return $update ? true : false;
        }else{
            return false;
        }
    }

    public function delete($id, $conditions){

         if(!empty($conditions) && is_array($conditions)){
            $i=0;
            $values  = '';
            foreach($conditions as $key => $val){
                $pre = ($i > 0) ? ', ' : '';
                $values .= $pre.$val;
                $i++;
            }
         }
         else{
            $values=$conditions;
         }
        $query="DELETE FROM ". $this->tblName. " WHERE ".$id." IN (".$values. ")";
        $delete = $this->db->query($query);
        return $delete ? true : false;
    }

    // ----------update publication status all tables (en, ru, am) ----------------
    public function updatePublicationStatusAllTables($tblname, $update, $article_id, $status, $status_default_tbl){
            $query = "UPDATE ".$tblname."_articles_am am, ".$tblname."_articles_ru ru, ".$tblname."_articles_en en, " .$tblname."_articles_default df  SET am.publication_status=$status, am.publication_date='$update', ru.publication_status=$status, ru.publication_date='$update', en.publication_status=$status, en.publication_date='$update', df.article_status='$status_default_tbl', df.publication_date='$update' WHERE am.article_id=$article_id AND ru.article_id=$article_id AND en.article_id=$article_id AND df.article_id=$article_id";
            $update = $this->db->query($query);

            return $update ? true : false;
    }

}

?>