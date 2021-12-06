<?php

use Techstore\Classes\Models\Cats;

include("../../app.php");
if($request->getHas("id")){
    $id = $request->get('id');
    $cat = new Cats;
    $cats = $cat->selectId($id,"id,name");
    echo json_encode($cats);
}

?>