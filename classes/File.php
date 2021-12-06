<?php

 namespace Techstore\Classes;
//  include ("../app.php");
 class File{
     private $name, $temp_name, $uploadName;
     public function __construct()
     {
        // $this->name = $img['name'];
        // $this->temp_name = $img['tmp_name'];
        
     }

     public function setName($img_name){
      $this->name = $img_name;
        
    }

    public function setTempName($img_temp_name){
      $this->temp_name = $img_temp_name;
    }

    public function getName(){
      return $this->name;
    }

    public function getTempName(){
      return $this->temp_name;
    }

    public function rename(){
      $img_name = time().uniqid();
      $ext = pathinfo($this->name, PATHINFO_EXTENSION);
      $this->uploadName = "$img_name.$ext";
      return $this->uploadName;
    }
    
    public function upload(){
        $path = PATH."uploads/$this->uploadName";
        move_uploaded_file($this->temp_name,$path);
    }

    public function remove(){
      $path = PATH."uploads/$this->uploadName";
      unlink($path);
  }

 }
?>