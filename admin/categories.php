<!-- header -->
<?php

use Techstore\Classes\Models\Cats;

include("includes/header.php");
  $cat = new Cats;
  $cats = $cat->selectAll();

?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Categories</h3>
                    <a href="<?=AURL?>add-category.php" class="btn btn-primary">
                       <i class="fas fa-plus mr-1"></i> Add new
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($cats as $index=>$c):?>
                      <tr>
                        <th scope="row"><?=$index+1?></th>
                        <td><?=$c['name']?></td>
                        <td><?=$c['created_at']?></td>
                        <td>
                        <span data-toggle="modal" data-target="#exampleModalCat">
                                <a data-id="<?=$c['id']?>" class="btn btn-sm btn-info edit-cat" href="#"
                                    data-toggle="tooltip" data-placement="top" title="edit category">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </span>

                            <a data-id="<?=$c['id']?>" class="btn btn-sm btn-danger delete-cat" href="#"
                                data-toggle="tooltip" data-placement="top" title="delete category">
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
$(".edit-cat").click(function(e) {
    e.preventDefault();
    let element = this;
    let id = element.getAttribute("data-id");
    $.ajax({
        type: "GET",
        url: "handlers/get_cat_id.php",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data) {
            $("#catId").val(data.id);
            $("#catName").val(data.name);

        },
        error: function() {
            console.log("error");
        }
    })
});



$(".delete-cat").click(function(e) {
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
                url: "<?=AURL?>handlers/delete_cat.php",
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