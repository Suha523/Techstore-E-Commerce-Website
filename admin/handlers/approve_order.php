<?php

use Techstore\Classes\Models\Order;

include("../../app.php");

if($request->getHas("id")){
    $id = $request->get('id');
    $order = new Order;

    $or = $order->update("status='approved'",$id);
    $session->set("approved","The Order Is Approved");
    $request->redirectAdmin('orders.php');
}

?>