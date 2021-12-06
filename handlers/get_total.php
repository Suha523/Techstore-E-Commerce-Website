<?php
 use Techstore\Classes\Cart;
      $cart = new Cart;
      $count = $cart->count();
      $total = $cart->totalPrice();
      echo json_encode($total);
?>