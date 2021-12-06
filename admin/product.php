<!-- header -->
<?php

use Techstore\Classes\Models\Imgs;
use Techstore\Classes\Models\Product;

include("includes/header.php");
  if($request->getHas('id')){
      $id = $request->get('id');
      $name = $request->get('name');
      $product = new Product;
      $desc = $product->selectId($id,'products.description')['description'];
      $image = new Imgs;
      $imgs = $image->selectWithProducts($id);
      
  }
?>
<div class="container py-5">
    <div class="row">

        <div class="col-md-8">
            <h3 class="mb-3">Edit Product : <?=$name?></h3>
            <div class="card">
                <div class="card-body p-5">
                    <div class="card p-4">
                        <form method="post" action="<?=AURL?>handlers/add_imgs.php" enctype="multipart/form-data">
                            <input type="text" hidden name="id" value="<?=$id?>">
                            <input type="text" hidden name="name" value="<?=$name?>">
                            <!-- <img id="output" width="50px" /> -->

                            <div class="custom-file">

                                <input multiple type="file" class="custom-file-input" name="files[]"
                                    id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02"
                                    aria-describedby="inputGroupFileAddon02">Choose Images</label>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary mt-3">Add</button>
                        </form>
                    </div>
                    <!-- <form>
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control">
                                  <option>one</option>
                                  <option>two</option>
                                  <option>three</option>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input type="number" class="form-control">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="#">Back</a>
                            </div>
                        </form> -->
                    <div class="row">
                        <?php  foreach($imgs as $img): ?>
                        <div class="col-md-6">
                            <div class="card p-3" style="width: 18rem;">
                                <img src="<?=URL?>uploads/<?=$img['name']?>" class="card-img-top" alt="<?=$name?>">
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk
                                        of the card's content.</p> -->
                                    <a data-id="<?=$img['img_id']?>" class="btn btn-sm btn-danger delete-img" 
                                    href="<?=AURL?>handlers/delete_img.php?id=<?=$img['img_id']?>&prod_id=<?=$id?>&prod_name=<?=$name?>"
                                        data-toggle="tooltip" data-placement="top" title="delete img">
                                        <i class="fas fa-trash mr-1"></i>Delete this image
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card p-5 mt-5">
                <h5>
                    <?=$desc?>
                </h5>
            </div>
        </div>

    </div>
</div>
<!-- footer -->
<?php 
     include("includes/footer.php");
   ?>


<!-- <script>

$(".delete-img").click(function(e) {
    e.preventDefault();
    let element = this;
    let id = element.getAttribute("data-id");
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "<?=AURL?>handlers/delete_img.php",
                dataType: "json",
                data: {
                    id: id,
                    prod_id: <?=$id?>,
                    prod_name: <?=$name?>
                },
                success: function(data) {
                    let element2 = $(`a[data-id=${data}]`);
                    element2.closest(`div[class=card]`).remove();
                    toastr.success('Deleted Successfuly');
                },
                error: function() {
                    console.log("error");
                }

            })
        }
    })
});
</script> -->