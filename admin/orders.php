<!-- header -->
<?php

use Techstore\Classes\Models\Order;

include("includes/header.php");
  $order = new Order;
  $orders = $order->selectAll("orders.id, orders.name, orders.phone,orders.status,
  orders.created_at as time ,sum(products.price*order_details.qty) AS total");
  // echo '<pre>';
  // print_r($orders);
  // echo '</pre>';
  
?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Orders</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($orders as $index=>$o): ?>
                      <tr>
                        <th scope="row"><?=$index+1?></th>
                        <td><?=$o['name']?></td>
                        <td><?=$o['phone']?></td>
                        <td><?=$o['total']?></td>
                        <td><?=date('d M, Y H:i A',strtotime($o['time']))?></td>
                        <?php 
                         if($o['status']=='pending'){ ?>
                         <td><span class="badge badge-warning"><?=$o['status']?></span></td>

                        <?php }else{
                          if($o['status']=='approved'){ ?>
                           <td><span class="badge badge-success"><?=$o['status']?></span></td>

                          <?php }else{ ?>
                            <td><span class="badge badge-danger"><?=$o['status']?></span></td>

                          <?php }

                        }
                        ?>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?=AURL?>order.php?id=<?=$o['id']?>"
                            data-toggle="tooltip" data-placement="top" title="more details">
                                <i class="fas fa-eye"></i>
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