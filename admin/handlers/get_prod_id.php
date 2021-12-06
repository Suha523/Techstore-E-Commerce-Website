<?php

use Techstore\Classes\Models\Product;

include("../../app.php");
if($request->getHas("id")){
    $id = $request->get('id');
    $product = new Product;
    $prods = $product->selectId($id,"products.id as prod_id, products.name as prod_name, products.img, products.piecesNo, products.price
    ,products.description as prod_desc, categories.id as cat_id, categories.name as cat_name");
    echo json_encode($prods);
}

?>