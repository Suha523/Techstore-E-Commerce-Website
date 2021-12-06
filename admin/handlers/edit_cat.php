<?php

use Techstore\Classes\Models\Cats;


include("../../app.php");

if($request->postHas('submit')){

    
    $id = $request->post("id");
    $name = $request->post("name");
    
    $cat = new Cats;
    
     $cat->update("name='$name'",$id);

     $session->set('success',"The Category's Data Is Updated Successfuly");
     $request->redirectAdmin('categories.php');
}