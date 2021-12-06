<?php

// use Techstore\Classes\Models\Admins;

include("../app.php"); 
// $admin = new Admins;
// echo $admin->login("suha@admin.com",'123',$session);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techstore | Dashboard</title>

    <link rel="stylesheet" href="<?=AURL?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=AURL?>assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?=AURL?>assets/css/style.css">
</head>

<body>
    <!-- class="bg-grad"  -->

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3 ">

                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="mb-3 text-primary">Login</h3>
                    </div>
                    <div class="card-body p-5">
                        <?php 
                        if($session->sessionHas("error")){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?=
                            $session->get("error"); 
                            $session->removeSession("error");
                            ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php }
                        
                        ?>
                        <form method="post" action="handlers/handle_login.php">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control rounded-pill">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control rounded-pill">
                            </div>
                            <div class="text-center mt-5">
                                <button name="submit" type="submit"
                                    class="btn btn-primary w-100 rounded-pill">Login</button>
                            </div>
                            <span class="d-inline-block mt-3"><a href="#">Forgot Your Password?</a></span>
                        </form>
                    </div>

                    <!-- <div class="card-footer">
                        Sign In With
                        <ul class="list-unstyled">
                            <div class="d-flex justify-content-center">
                            <li><a href="#" class="btn btn-primary mr-4"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="btn btn-success mr-4"><i class="fab fa-google"></i></a></li>
                            </div>
                        </ul>     
                    </div> -->
                </div>
            </div>

        </div>
    </div>
    <!-- footer -->
    <?php 
     include("includes/footer.php");
   ?>