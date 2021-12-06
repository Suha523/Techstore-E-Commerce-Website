<!-- header -->
<?php 
  include("includes/header.php");
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Profile</h3>
                <div class="card">
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
                        <form method="post" action="<?=AURL?>handlers/handle_profile.php">
                        <input name="id" type="text" hidden value=<?=$session->get("adminId");?> class="form-control" >

                            <div class="form-group">
                              <label>Name</label>
                              <input name="name" type="text" value=<?=$session->get("adminName");?> class="form-control" >
                            </div>

                            <div class="form-group">
                              <label>Email</label>
                              <input name="email" type="email" value=<?=$session->get("adminEmail");?> class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Password</label>
                              <input name="password" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Confrim Password</label>
                              <input name="confPassword" type="password" class="form-control">
                            </div>
                              
                            <div class="text-center mt-5">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="#">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
      <!-- footer -->
   <?php 
     include("includes/footer.php");
   ?>