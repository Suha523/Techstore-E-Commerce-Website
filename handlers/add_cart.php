<?php

use Techstore\Classes\Cart;
include("../app.php");
// use Techstore\Classes;
if($request->postHas('submit')){
    $qty = $request->post('qty');
    $id = $request->post('prod_id');
    $name = $request->post('prod_name');
    $price = $request->post('price');
    $img = $request->post('img');
    
    $prodData = [
        'qty' => $qty,
        'name' => $name,
        'price' => $price,
        'img' => $img
    ];

    $cart = new Cart;
    $cart->add($id, $prodData);

   $request->redirect('products.php');

}else{
    $qty = 1;
}



