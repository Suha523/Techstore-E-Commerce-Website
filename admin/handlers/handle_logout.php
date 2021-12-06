<?php

use Techstore\Classes\Models\Admins;

include("../../app.php");

  $admin = new Admins;
  $admin->logout($session);
  $request->redirectAdmin("login.php");
?>