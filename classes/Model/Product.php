<?php
namespace Techstore\Classes\Models;
use Techstore\Classes\DB;
class Product extends DB{

  public function __construct()
  {
      $this->table="products";
      $this->connect();
  }

  public function selectId($id, $fields="*"){
    $sql = "SELECT $fields FROM $this->table JOIN categories ON $this->table.category_id=categories.id WHERE $this->table.id=$id";
    $result=mysqli_query($this->conn, $sql);
    return mysqli_fetch_assoc($result);  // return row
  }

  public function selectAll($fields="*"){
    $sql = "SELECT $fields FROM $this->table JOIN categories ON $this->table.category_id=categories.id";
    $result=mysqli_query($this->conn, $sql);
    return mysqli_fetch_all($result,MYSQLI_ASSOC); 

   }

   
   
}

?>