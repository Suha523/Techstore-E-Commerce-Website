<?php

use Techstore\Classes\File;
use Techstore\Classes\Models\Imgs;

include("../../app.php");
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
if($request->postHas("submit")){
    $id = $request->post('id');
    $name = $request->post('name');
    //  $product = new Product;
    //  $last_id = $product->insertAndGetId("name,description,price,piecesNo,category_id",
    //                  "'$name','$description','$price','$pieces','$cat_id'");
    $f = $request->files('files');
    // echo '<pre>';
    // print_r($f);
    // echo '</pre>';
    foreach($f['name'] as $key=>$img){
        // echo '<pre>';
        // print_r($img);
        // echo '</pre>';
        $imgOldName = $f['name'][$key];
        $imgOldTempName = $f['tmp_name'][$key];
        // echo $imgOldName.'</br>';
    
        $file = new File();
        $file->setName($imgOldName);
        $file->setTempName($imgOldTempName);
        // echo '<pre>';
        // print_r($file);
        // echo '</pre>';
       
        // $i = $file->getName();
        // echo $i.'</br>';
        // $temp = $file->getTempName();
        // echo $temp.'</br>';
        
        $imgName = $file->rename();
        $imgProd = new Imgs;
        $imgProd->insert('name, product_id',"'$imgName','$id'");
        $file->upload(); 
   
    }

    // $image = new Imgs;
    // $imgs = $image->selectWithProducts($last_id);
    // $img = $imgs['0']['name'];
    // $product->update("img = '$img'",$last_id);
    $request->redirectAdmin("product.php?id=$id&name=$name");
}