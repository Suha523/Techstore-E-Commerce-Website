   <?php

use Techstore\Classes\Models\Cats;

$category = new Cats;
$cats = $category->selectAll();
   
   ?>
   
   <div class="modal fade" id="exampleModalProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
               <form method="post" action="<?=AURL?>handlers/edit_prod.php" enctype="multipart/form-data">
                            <input id="prodId" name="id" hidden type="text" class="form-control">
                            <div class="form-group">
                              <label>Name</label>
                              <input id="prodName" name="name" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select id="prodCat" name="cat_id" class="form-control">
                                    <?php foreach($cats as $cat): ?>
                                  <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label>Price</label>
                                <input id="prodPrice" name="price" type="number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input id="prodPieces" name="pieces" type="number" class="form-control">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="prodDesc" name="description" class="form-control" rows="3"></textarea>
                            </div>
                            
                            <!-- <img src"" id="prodImg" class="w-25 h-25">
                            <div class="custom-file">
                                <input id="img" name="img" type="file"  class="custom-file-input" id="customFile"
                                onchange="document.getElementById('prodImg').src = window.URL.createObjectURL(this.files[0])">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div> -->
                              
                            <div class="text-center mt-5">
                                <button name="submit" type="submit" class="btn btn-primary edit">Submit</button>
                                <a class="btn btn-dark" href="#" data-dismiss="modal">Back</a>
                            </div>
                        </form>
               </div>


           </div>
       </div>
   </div>

   <div class="modal fade" id="exampleModalCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
               <form method="post" action="<?=AURL?>handlers/edit_cat.php">
                            <input id="catId" name="id" hidden type="text" class="form-control">
                            <div class="form-group">
                              <label>Name</label>
                              <input id="catName" name="name" type="text" class="form-control">
                            </div>
                            
                            <div class="text-center mt-5">
                                <button name="submit" type="submit" class="btn btn-primary edit">Submit</button>
                                <a class="btn btn-dark" href="#" data-dismiss="modal">Back</a>
                            </div>
                        </form>
               </div>


           </div>
       </div>
   </div>
   
   

   <script src="<?=AURL?>assets/js/jquery-3.5.1.slim.min.js"></script>

<script src="<?=AURL?>assets/js/popper.min.js"></script>

<!-- jQuery -->
<!-- <script src="<?=AURL?>assets/plugins/jquery/jquery.min.js"></script> -->
   <script src="<?=AURL?>assets/js/jquery-3.5.1.min.js"></script>
   <script src="<?=AURL?>assets/js/bootstrap.bundle.min.js"></script>
   <script src="<?=AURL?>assets/js/sweetalert2.all.min.js"></script>
   <script src="<?=AURL?>assets/js/toastr.min.js"></script>
   <script src="<?=AURL?>assets/js/custom.js"></script>

   <!-- <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/adminlte.min.js"></script> -->

   </body>

   </html>