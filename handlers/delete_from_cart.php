<?php

use Techstore\Classes\Cart;

include("../app.php");

if($request->getHas('id')){
    $id = $request->get('id');
    $cart = new Cart;
    $cart->delete($id);
    
    $request->redirect('cart.php');
    // echo json_encode($id);
}
