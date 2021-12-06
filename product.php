<?php 



use Techstore\Classes\Models\Product;
use Techstore\Classes\Models\Imgs;
  include ("includes/header.php");
  if($request->getHas('id')){
	$id = $request->get('id');
  }else{
	$id = "1";
  }
  
  $product = new Product;
  $prod = $product->selectId($id,"products.id as prod_id,products.name as prod_name,
   products.description as description, products.price as price, products.img as img,
   products.piecesNo as piecesNo, categories.id as cat_id, categories.name as cat_name");
   
   $img = new Imgs;
$imgs = $img->selectWithProducts($prod['prod_id']);
// echo '<pre>';
// print_r($imgs);
// echo '</pre>';
  
?>

<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row h-100 w-100">

            <!-- Images -->
            <!-- <div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="images/single_4.jpg"><img src="images/single_4.jpg" alt=""></li>
						<li data-image="images/single_2.jpg"><img src="images/single_2.jpg" alt=""></li>
						<li data-image="images/single_3.jpg"><img src="images/single_3.jpg" alt=""></li>
					</ul>
				</div> -->

            <!-- Selected Image -->
            <!-- <div class="col-lg-6 order-lg-2 order-1">
                <div class="image_selected"><img src="<?=URL?>uploads/<?=$prod['img']?>" alt=""></div>
            </div> -->
            <div class="col-lg-6 order-lg-2 order-1 w-50 h-50">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item w-75 active">
                            <img src="uploads/<?=$imgs['0']['name'] ?? 'Technology_Camera_1-copy-18.jpg'?>" class="d-block w-75 h-50" alt="<?=$prod['prod_name']?>">
                        </div>
                        <?php foreach($imgs as $index=>$i): if($index>0){ ?>
                        <div class="carousel-item w-50">
                            <img src="uploads/<?=$i['name'] ?? 'Technology_Camera_1-copy-18.jpg'?>" class="d-block w-100" alt="<?=$prod['prod_name']?>">
                        </div>
                        <?php } endforeach; ?>
                        <!-- <div class="carousel-item">
                            <img src="uploads/xps.jpg" class="d-block w-100" alt="...">
                        </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
                </div>
            </div>

            <!-- Description -->
            <div class="col-lg-6 order-3">
                <div class="product_description">
                    <div class="product_category"><?=$prod['cat_name']?></div>
                    <div class="product_name"><?=$prod['prod_name']?></div>
                    <div class="product_text">
                        <p><?=$prod['description']?></p>
                    </div>
                    <div class="order_info d-flex flex-row">
                        <form action="<?= URL ?>handlers/add_cart.php" method="post">
                            <div class="clearfix" style="z-index: 1000;">
                                <input type="text" hidden name="prod_id" value="<?=$prod['prod_id']?>" />
                                <input type="text" hidden name="prod_name" value="<?=$prod['prod_name']?>" />
                                <input type="text" hidden name="price" value="<?=$prod['price']?>" />
                                <input type="text" hidden name="img" value="<?=$prod['img']?>" />


                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" name="qty" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>

                                <div class="product_price">$<?=$prod['price']?></div>

                            </div>
                            <?php if($cart->hasId($prod['prod_id'])){ ?>
                            <div class="button_container">
                                <span>
                                    <p class="text-danger">This Product Is Already In The
                                        Cart</p>
                                </span>
                                <a href="<?=URL?>cart.php" class="button cart_button text-white">Delete From The
                                    Cart</a>
                            </div>
                            <?php }else{ ?>
                            <div class="button_container">
                                <button type="submit" name="submit" class="button cart_button">Add to Cart</button>
                            </div>
                            <?php } ?>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Copyright -->

<?php 
	  include("includes/footer.php");
	?>