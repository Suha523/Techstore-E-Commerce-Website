<?php

use Techstore\Classes\File;
use Techstore\Classes\Models\Product;

include("../../app.php");

if($request->postHas('submit')){

    
    $id = $request->post("id");
    $name = $request->post("name");
    $cat_id = $request->post("cat_id");
    $price = $request->post("price");
    $pieces = $request->post("pieces");
    $description = $request->post("description");
    // $img = $request->files('img');
    $product = new Product;
    // $imgName = $product->selectId($id,'img')['img'];
    
    // echo URL."uploads/$imgName";
    // if($img['error']==0){
    //     unlink(PATH."uploads/$imgName");
    //     $file = new File();
    //     $file->setName($img['name']);
    //     $file->setTempName($img['tmp_name']);
    //     $imgName = $file->rename();
    //     $file->upload();
    // }
    //  $product->update("name='$name', description='$description', price='$price', piecesNo='$pieces', img='$imgName', category_id='$cat_id'",$id);
     $product->update("name='$name', description='$description', price='$price', piecesNo='$pieces', category_id='$cat_id'",$id);

     $session->set('success',"The Product's Data Is Updated Successfuly");
     $request->redirectAdmin('products.php');
}