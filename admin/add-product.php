<!-- header -->
<?php

use Techstore\Classes\Models\Cats;

include("includes/header.php");
  $cat = new Cats;
  $cats = $cat->selectAll('id, name');
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Product</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form  method="post" action="<?=AURL?>handlers/add_product.php" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Name</label>
                              <input name="name" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select name="cat_id" class="form-control">
                                    <?php foreach($cats as $c):?>
                                  <option value="<?=$c['id']?>"><?=$c['name']?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" type="number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input name="pieces" type="number" class="form-control">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            
                            <!-- <div class="custom-file">
                                <input name="img" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div> -->

                            <div class="custom-file">
                                                <input multiple type="file" class="custom-file-input"  name="files[]"
                                                    id="inputGroupFile02">
                                                <label class="custom-file-label" for="inputGroupFile02"
                                                    aria-describedby="inputGroupFileAddon02">Choose Images</label>
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