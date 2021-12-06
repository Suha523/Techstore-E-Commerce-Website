<?php

use Techstore\Classes\Models\Cats;


include("../../app.php");

if($request->postHas('id')){
    $id = $request->post('id');
    
    $cat = new Cats;
    $cat->delete($id);
    echo json_encode($id);
}

?>