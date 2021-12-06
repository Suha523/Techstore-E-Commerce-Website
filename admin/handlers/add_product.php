<?php

use Techstore\Classes\File;
use Techstore\Classes\Models\Imgs;
use Techstore\Classes\Models\Product;

include("../../app.php");
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
if($request->postHas("submit")){
    $name = $request->post("name");
    $cat_id = $request->post("cat_id");
    $price = $request->post("price");
    $pieces = $request->post("pieces");
    $description = $request->post("description");

    // try #1:
    
    // $img = $request->files('img');
    
    // $file = new File($img);
    // $img_name = $file->rename();
    // $product = new Product;
    // $product->insert("name,description,price,piecesNo,img,category_id",
    //                  "'$name','$description','$price','$pieces','$img_name','$cat_id'");
    //     $file->upload();
    //     $request->redirectAdmin("products.php");

     // try #2:
     $product = new Product;
     $last_id = $product->insertAndGetId("name,description,price,piecesNo,category_id",
                     "'$name','$description','$price','$pieces','$cat_id'");
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
        $imgProd->insert('name, product_id',"'$imgName','$last_id'");
        $file->upload(); 
   
    }

    // $image = new Imgs;
    // $imgs = $image->selectWithProducts($last_id);
    // $img = $imgs['0']['name'];
    // $product->update("img = '$img'",$last_id);
    $request->redirectAdmin("products.php");
}