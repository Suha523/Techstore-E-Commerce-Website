<?php

use Techstore\Classes\Models\Cats;

include("../../app.php");

if($request->postHas("submit")){
    $name = $request->post("name");
    $cat = new Cats;
    $cat->insert("name","'$name'");
    $request->redirectAdmin("categories.php");
}

?>