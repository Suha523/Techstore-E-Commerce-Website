<?php

use Techstore\Classes\Models\Admins;

include("../../app.php");

 if($request->postHas("submit")){
     $id = $request->post("id");
     $name = $request->post("name");
     $email = $request->post("email");
     $password = $request->post("password");
     $confPassword = $request->post("confPassword");
    
    $admin = new Admins;
    if(!empty($password)&& !empty($confPassword)){
        if($password === $confPassword){
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $res = $admin->update("name='$name',email='$email',password='$hashedPassword'" ,$id);
            if($res){
                $session->set("success","The Admin's Information are Updated Successfuly");
                
               
            }
        }else{
            $session->set("error","The Two Passwords are not Identical!");
            $request->redirectAdmin('profile.php');
        }
    }else{
        $res = $admin->update("name='$name',email='$email'" ,$id);
            if($res){
                echo "name and email are updated successfuly";
                $session->set("success","The Admin's Information are Updated Successfuly");
               
            }
    }

    $request->redirectAdmin('handlers/handle_logout.php');

 }
?>