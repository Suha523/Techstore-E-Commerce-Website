<?php

use Techstore\Classes\Models\Imgs;
include("../../app.php");
if($request->getHas('prod_id')){
    $prod_id = $request->get("prod_id");
}

if($request->getHas("prod_name")){
    $prod_name = $request->get("prod_name");
}
if($request->getHas('id')){
    $id = $request->get('id');

    
    // $prod = new Product;
    $image = new Imgs;
    $imgs = $image->selectId($id);
     
    $imgName = $imgs['name'];
    unlink(PATH."uploads/$imgName");
    
        
     
     $image->delete($id);
    // $imgName = $prod->selectId($id,"img")['img'];
    // $prod->delete($id);

    // unlink(PATH."uploads/$imgName");
    
    
   $request->redirectAdmin("product.php?id=$prod_id&name=$prod_name");
}

?>