<?php

use Techstore\Classes\Models\Imgs;
use Techstore\Classes\Models\Product;

include("../../app.php");

if($request->postHas('id')){
    $id = $request->post('id');
    
    $prod = new Product;
    $image = new Imgs;
    $imgs = $image->selectWithProducts($id);
     foreach($imgs as $img){
        $imgName = $img['name'];
        unlink(PATH."uploads/$imgName");
     }
    // $imgName = $prod->selectId($id,"img")['img'];
    $prod->delete($id);
    // unlink(PATH."uploads/$imgName");
    
    
    echo json_encode($id);
}

?>