<!-- header -->
<?php 

use Techstore\Classes\Models\Order;
use Techstore\Classes\Models\OrderDetails;
  include("includes/header.php");
  $ord = new Order;
  if($request->getHas('id')){
    $id = $request->get('id');
  }else{
    $id = '1';
  }
$t="orders.*,products.id AS prod_id, products.name AS prod_name,order_details.qty";
$o1 = $ord->selectId($id,"orders.*, SUM(qty*price) AS total");



$ord_det = new OrderDetails;
$details = $ord_det->selectWithProducts($id);




?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Order : <?=$o1['id']?></h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">Customer</th>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Name</th>
                                <td><?=$o1['name']?></td>
                              </tr>
                              <tr>
                                <th scope="row">Email</th>
                                <td><?=$o1['email'] ?? '...'?></td>
                              </tr>
                              <tr>
                                <th scope="row">Phone</th>
                                <td><?=$o1['phone']?></td>
                              </tr>
                              <tr>
                                <th scope="row">Address</th>
                                <td><?=$o1['address'] ?? '...'?></td>
                              </tr>
                              <tr>
                                <th scope="row">Time</th>
                                <td><?=date('d M,Y h:i A',strtotime($o1['created_at']))?></td>
                              </tr>
                              <tr>
                                <th scope="row">Status</th>
                                <td id="status"><?=$o1['status']?></td>
                              </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($details as $d):?>
                              <tr>
                                <td><?=$d['prod_name']?></td>
                                <td><?=$d['qty']?></td>
                                <td>$<?=$d['price']?></td>
                              </tr>
                              <?php endforeach; ?>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <th>Change Status</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?=$o1['total']?></td>
                                <?php 
                                if($o1['status']=='pending') { ?>
                                   <td>
                                    <a data-id="<?=$o1['id']?>" class="btn btn-success edit-status" href="<?=AURL?>handlers/approve_order.php?id=<?=$o1['id']?>">Approve</a>
                                    <a class="btn btn-danger" href="<?=AURL?>handlers/cancel_order.php?id=<?=$o1['id']?>">Cancel</a>
                                </td>
                                <?php  }
                                ?>
                                
                              </tr>
                            </tbody>
                        </table>

                        <a class="btn btn-dark mt-4" href="<?=AURL?>orders.php">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
      <!-- footer -->
   <?php 
     include("includes/footer.php");
   ?>

   <!-- <script>
     $(".edit-status").click(function(e){
      e.preventDefault();
      let element = this;
      let id = element.getAttribute("data-id");
       
      $.ajax({
        type: "GET",
        url: "handlers/get_ord_id.php",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data) {
            $("#status").val(data.status);
        },
        error: function() {
            console.log("error");
        }
    })

     });

     
   </script> -->