<!-- header -->
<?php

use Techstore\Classes\Models\Cats;
use Techstore\Classes\Models\Order;
use Techstore\Classes\Models\Product;

include("includes/header.php");
  $product = new Product;
  $cat = new Cats;
  $order = new Order;

  $productsNum = $product->getCount();
  $catsNum = $cat->getCount();
  $ordersNum = $order->getCount();
?>
<div class="container py-5">
    <div class="row">

        <div class="col-md-4">
            <!-- <div class="card text-white bg-info mb-3">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>233</h5>
                          <a href="#" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div> -->

            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?=$productsNum?></h3>

                    <p>Products</p>
                </div>
                <div class="icon">
                <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="<?=AURL?>products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>


        </div>

        <!-- <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="card-text d-flex justify-content-between align-items-center">
                        <h5>5</h5>
                        <a href="#" class="btn btn-light">Show</a>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-md-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?=$catsNum?></h3>

                <p>Categories</p>
            </div>
            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>
            <a href="<?=AURL?>categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <div class="card-text d-flex justify-content-between align-items-center">
                        <h5>1120</h5>
                        <a href="#" class="btn btn-light">Show</a>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-md-4">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?=$ordersNum?></h3>

                <p>Orders</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="<?=AURL?>orders.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php 


     include("includes/footer.php");
   ?>