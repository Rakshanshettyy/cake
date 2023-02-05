<?php 
require('top.php');


?>


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Message </th>
                                    <th>Weight </th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'','',$key);
											$pname=$productArr[0]['name'];											
											$image=$productArr[0]['image'];
											$qty=$val['qty'];
                                            $msg_on_cake=$val['msg_on_cake'];
											$price=$val['weight'];
											$kg=checkprice($con,$price,$key);																						
											
											
											?>
                                <tr>
                                   <td class="thumbnail-img">
                                     <a href="#"><img class="img-fluid" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" />
									 </a>
                                   </td>
                                    <td class="name-pr">
                                       <a href="#"><?php echo $pname?>
								       </a>                                      
                                  
								  </td>
								   <td class="quantity-box"><input id="<?php echo $key?>msg_on_cake" value="<?php echo $msg_on_cake?>" /></td>
									<td class="price-pr">
                                       <a href="#"><?php echo $kg ?> Kg </a>                                      
                                    </td>
                                    <td class="price-pr">
                                        <p><?php echo $price?></p>
                                    </td>
                                    <td class="quantity-box"><input id="<?php echo $key?>qty" value="<?php echo $qty?>" /></td>
                                    <td class="total-pr">
                                        <p><?php echo $qty*$price?></p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="javascript:void(0)" onclick="add_to_cart('<?php echo $key?>','remove')">
										
									<i class="fas fa-times"></i>
									</a>
								
                                    </td>
                                </tr>
                               <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
			
                <div class="col-lg-8 col-sm-6">
                 <div class="update-box">
                  <a class="ml-auto btn hvr-hover" href="javascript:void(0)" onclick="add_to_cart('<?php echo $key?>','update')">Update</a>				  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <a class="ml-auto btn hvr-hover"  href="<?php echo SITE_PATH?>">Continue Shopping</a>
                 </div>
				         
                </div>
			</div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">  </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a class="ml-auto btn hvr-hover" href="<?php echo SITE_PATH?>checkout.php">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

 
<?php require('footer.php')?>        