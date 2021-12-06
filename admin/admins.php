<!-- header -->
<?php

use Techstore\Classes\Models\Admins;

include("includes/header.php");
  $admin = new Admins;
  $admins = $admin->selectAll();
?>
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($admins as $index=>$ad): ?>
                      <tr>
                        <th scope="row"><?=$index+1?></th>
                        <td><?=$ad['name']?></td>
                        <td><?=$ad['email']?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="#"
                            data-toggle="tooltip" data-placement="top" title="edit data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="#" 
                            data-toggle="tooltip" data-placement="top" title="delete data">
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