<?php


namespace Techstore\Classes\Models;
use Techstore\Classes\DB;

class Imgs extends DB{

    public function __construct()
    {
        $this->table="prodimgs";
        $this->connect();
    }

    public function selectWithProducts($prod_id){
        $sql = "SELECT $this->table.name, $this->table.id as img_id FROM 
        $this->table JOIN products ON $this->table.product_id=products.id WHERE
         $this->table.product_id=$prod_id";
          $result=mysqli_query($this->conn, $sql);
          return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
}