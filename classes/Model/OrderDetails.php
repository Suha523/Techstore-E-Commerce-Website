<?php
namespace Techstore\Classes\Models;

use Techstore\Classes\DB;

class OrderDetails extends DB{

    public function __construct()
    {
        $this->table="order_details";
        $this->connect();
    }

    public function selectWithProducts($orderId){
        $sql = "SELECT products.name as prod_name, qty, products.price FROM 
        $this->table JOIN products ON $this->table.product_id=products.id WHERE
         $this->table.order_id=$orderId";
          $result=mysqli_query($this->conn, $sql);
          return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
}