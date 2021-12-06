<!-- header -->
<?php

use Techstore\Classes\Models\Cats;
use Techstore\Classes\Models\Imgs;
use Techstore\Classes\Models\Product;

include("includes/header.php");
  $cat = new Cats;
  $cats = $cat->selectAll();
  $product = new Product;
  $prods = $product->selectAll("products.id as prod_id, products.name as prod_name, products.img, products.piecesNo, products.price
  ,products.created_at as prod_created_at, categories.id as cat_id, categories.name as cat_name");
  $image = new Imgs;
//   $imgs = $img->selectWithProducts($prods['prod_id']);

?>

<div class="container-fluid py-5">
    <div class="row">

        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>All Products</h3>
                <a href="<?=AURL?>add-product.php" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Add new
                </a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" >Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pieces</th>
                        <th scope="col">Price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($prods as $index=>$prod):
                           $prodId = $prod['prod_id'];
                           $imgs = $image->selectWithProducts($prodId);
                        ?>
                    <tr>
                        <th scope="row"><?=$index+1?></th>
                        <td><?=$prod['prod_name']?></td>
                        <td><?=$prod['cat_name']?></td>
                        <td>
                            <img width="50px" src="<?=URL?>uploads/<?=$imgs['0']['name'] ?? 'Technology_Camera_1-copy-18.jpg' ?>" alt="<?=$prod['prod_name']?>">
                        </td>
                        <td><?=$prod['piecesNo']?></td>
                        <td>$<?=$prod['price']?></td>
                        <td><?=date('d M, Y H:i A',strtotime($prod['prod_created_at']))?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="product.php?id=<?=$prod['prod_id']?>&name=<?=$prod['prod_name']?>" data-toggle="tooltip" data-placement="top"
                                title="show more">
                                <i class="fas fa-eye"></i>
                            </a>
                            <span data-toggle="modal" data-target="#exampleModalProd">
                                <a data-id="<?=$prod['prod_id']?>" class="btn btn-sm btn-info edit-prod" href="#"
                                    data-toggle="tooltip" data-placement="top" title="edit product">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </span>

                            <a data-id="<?=$prod['prod_id']?>" class="btn btn-sm btn-danger delete-prod" href="#"
                                data-toggle="tooltip" data-placement="top" title="delete product">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- footer -->
<?php 
     include("includes/footer.php");
   ?>

<script>
$(".edit-prod").click(function(e) {
    e.preventDefault();
    let element = this;
    let id = element.getAttribute("data-id");
    $.ajax({
        type: "GET",
        url: "handlers/get_prod_id.php",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data) {
            $("#prodId").val(data.prod_id);
            $("#prodName").val(data.prod_name);
            $("option").each(function( index ) {
                if($(this).val()==data.cat_id){
                    $(this).attr('selected','selected');
                }else{
                    $(this).removeAttr('selected');
                }
           
            });

            $("#prodPrice").val(data.price);
            $("#prodPieces").val(data.piecesNo);
            $("#prodDesc").val(data.prod_desc);
            // $("#prodImg").attr("src", "<?=URL?>uploads/" + data.img);
            // $("#img").val(data.img);


        },
        error: function() {
            console.log("error");
        }
    })
});



$(".delete-prod").click(function(e) {
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
                url: "<?=AURL?>handlers/delete_prod.php",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(data) {
                    let element2 = $(`a[data-id=${data}]`);
                    element2.closest("tr").remove();
                    toastr.success('Deleted Successfuly');
                },
                error: function() {
                    console.log("error");
                }

            })
        }
    })
});
</script>