<?php 

namespace Techstore\Classes;

class Cart{

   public function add($id, $data){
       $_SESSION['cart'][$id] = $data;
   }

   public function delete($id){
        unset($_SESSION['cart'][$id]); 
   }

   public function count(){
    if(isset($_SESSION['cart'])){
       return count($_SESSION['cart']);
    }
    return 0;
   }

   public function totalPrice(){
    $totalPrice = 0;
    if(isset($_SESSION['cart']))
       foreach($_SESSION['cart'] as $id=>$data){
           $totalPrice+=$data['qty']*$data['price'];
       }
       return $totalPrice;
   }

   public function hasId($id){
    if(isset($_SESSION['cart'])){
       return array_key_exists($id, $_SESSION['cart']);
    }
    return false;
   }

   public function getAll(){
    if(isset($_SESSION['cart'])){
       return $_SESSION['cart'];
    }
    return [];
   }

}

?>