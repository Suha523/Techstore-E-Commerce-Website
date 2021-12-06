<?php

use Techstore\Classes\Cart;
use Techstore\Classes\Models\Order;
use Techstore\Classes\Models\OrderDetails;

include("../app.php");
if($request->postHas('submit')){
    $name = $request->post('name');
    $email = $request->post('email');
    $phone = $request->post('phone');
    $address = $request->post('address');
    
    $order = new Order;
    $orderId = $order->insertAndGetId("name, email, phone, address","'$name', '$email', '$phone', '$address'");
    echo $orderId;
    $cart = new Cart;
    $orderDetail = new OrderDetails;
    foreach($cart->getAll() as $id=>$prod){
        $qty = $prod['qty'];
        $orderDetail->insert("product_id, order_id, qty","'$id', '$orderId', '$qty'");
        
    }
    
    $session->set("success","The Order Is Added Successfuly");
   $request->redirect("products.php");
}