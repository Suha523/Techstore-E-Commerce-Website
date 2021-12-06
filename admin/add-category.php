<!-- header -->
<?php 
  include("includes/header.php");
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Category</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="post" action="<?=AURL?>handlers/add_cat.php">
                            <div class="form-group">
                              <label>Name</label>
                              <input name="name" type="text" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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