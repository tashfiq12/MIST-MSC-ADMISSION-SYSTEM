<?php
if (!defined('pageclassconst')){die('You cannot access this file directly!');}
require_once( dirname( __FILE__ ) . '/../functions/connectionClass.php' );
require_once( dirname( __FILE__ ) . '/../messages/alertClass.php' );

class pagesClass extends connectionClass{
    
    public function addPage($data)
   {
   
        $data["pagedetails"]=$this->real_escape_string($data["pagedetails"]);
      $keys=array_keys($data);
     $values=array_values($data);
     $table="page";
        $query='INSERT INTO '.$table.' ('.implode(', ', $keys).') VALUES ("'.implode('","', $values).'")';
        $result=  $this->query($query) or die($this->error);
        if($result){
            unset($_POST);
            echo "success while inserting";
        }
        else
        {
            return $message->getAlert("Error while adding page", "error");
        }

   }
    
    public function dulicatePage($name){
        $check="select * from webpages where URL='$name'";
        $result=  $this->query($check);
        $count=  $result->num_rows;
        if($count < 1){return 0;}else{return $count;}
    }
    
  private function slug($string){
       $string = strtolower(trim($string));
    $string = str_replace("'", '', $string);
    $string = preg_replace('#[^a-z\-]+#', '-', $string);
    $string = preg_replace('#_{2,}#', '_', $string);
    $string = preg_replace('#_-_#', '-', $string);
    $string = preg_replace('#(^_+|_+$)#D', '', $string);
    return preg_replace('#(^-+|-+$)#D', '', $string);
}

    public function listPages(){
        $list="select * from page Order By ID";
        $result=  $this->query($list);
        $count=  $result->num_rows;
        if($count < 1){
            return "There is no row";
        }
        else{
            while($row= $result->fetch_array(1)){
                $arr[]= $row;
            }
            return $arr;
        }
    }
    
   
    public function particularPage($id) {
       
        $list="select * from page where ID='$id'";
        $result=  $this->query($list) or die($this->error);
        $count=  $result->num_rows;
        if($count < 1){
            echo "";
        }else{
           return $row= $result->fetch_array(1);
        }
    }
    
    public function particularPageSlug($id) {
        $list="select * from page where ID='$id'";
        $result=  $this->query($list);
        $count=  $result->num_rows;
        if($count < 1){}else{
            while($row= $result->fetch_array(3)){
                return $row;
            }
        }
    }
    
public function updatePage($data,$id){
    $message=new alertClass();
    
        $data["pagedetails"]=$this->real_escape_string($data["pagedetails"]);
    foreach ($data as $key => $value) {
        $value="'$value'";
        $updates[]="$key=$value";
    }
    $imploadAray=  implode(",", $updates);
    $query="Update page Set $imploadAray Where ID='$id'";
    $result=  $this->query($query) or die($this->error);
        if($result){
            return $message->getAlert("Page is updated", "success");
        }
        else
        {
            return $message->getAlert("Error while updating page", "error");
        }  
}

public function deletePage($id){
    $delete="Delete from page where ID='$id'";
    $result=  $this->query($delete);
    $message=new alertClass();
        if($result){
            return $message->getAlert("Page is deleted", "success");
        }
        else
        {
            return $message->getAlert("Error while deleting page", "error");
        }  
}
}
