<?php 
 
 
use Techstore\Classes\Models\Admins;

include("../../app.php");

if($request->postHas('submit')){
    $email = $request->post('email');
    $password = $request->post('password');


    $admin = new Admins;
    $login=$admin->login($email,$password,$session) ;
    
    if($login == "1"){
        $session->set("login","1");
        $request->redirectAdmin('index.php');
    }else{
        $session->set("error",$login);
        $request->redirectAdmin('login.php');
    }
    
    // $session->removeSession("login");
   

}
// else{
//     // $qty = 1;
// }

?>



