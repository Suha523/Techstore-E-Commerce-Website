<?php

use Techstore\Classes\Models\Order;

include("../../app.php");

if($request->getHas("id")){
    $id = $request->get('id');
    $order = new Order;

    $or = $order->update("status='canceled'",$id);
    $session->set("canceled","The Order Is Canceled");
    $request->redirectAdmin('orders.php');
}

?>