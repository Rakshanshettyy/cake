<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='login.php';
	</script>
	<?php
}
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}

$cart_total=0;

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$address=get_safe_value($con,$_POST['address']);
	$city=get_safe_value($con,$_POST['city']);
	$pincode=get_safe_value($con,$_POST['pincode']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
	$user_id=$_SESSION['USER_ID'];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		
		$qty=$val['qty'];
        $msg_on_cake=$val['msg_on_cake'];
        $price=$val['weight'];
        $kg=checkprice($con,$price,$key);	
		$cart_total=$cart_total+($price*$qty);
		
	}
	$total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='pending';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	
	
	mysqli_query($con,"insert into `order`(user_id,name,mobile,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$name','$mobile','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price')");
	
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		
		$qty=$val['qty'];
		$msg_on_cake=$val['msg_on_cake'];
        $price=$val['weight'];
        $kg=checkprice($con,$price,$key);	
		
		mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price,cake_weight,cake_message) values('$order_id','$key','$qty','$price','$kg','$msg_on_cake')");
	}
	
	unset($_SESSION['cart']) ;
	sendinvoice($con,$order_id);
	?>
	<script>
		window.location.href='thank_you.php';
	</script>
	<?php
	
	
}
?>
     
<!-- Start Cart  -->
<div class="col-sm-6 col-lg-12 mb-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Order Summary</h3>
                                </div>
								
								 
									<div class="col-lg-16">
										<div class="table-main table-responsive">
											<table class="table">
												<thead>
													<tr>
														 <th>Images</th>
                                                         <th>Product Name</th>
                                                         <th>Cake Message </th>
                                                         <th>Cake Weight </th>
                                                         <th>Price</th>
                                                         <th>Quantity</th>
                                                         <th>Total</th>
                                                        
													</tr>
												</thead>
												<tbody>
													<?php
													$cart_total=0;
													foreach($_SESSION['cart'] as $key=>$val){
													$productArr=get_product($con,'','',$key);
													$pname=$productArr[0]['name'];
													$image=$productArr[0]['image'];
													$qty=$val['qty'];
													$msg_on_cake=$val['msg_on_cake'];
                                                    $price=$val['weight'];
                                                    $kg=checkprice($con,$price,$key);	
													$cart_total=$cart_total+($price*$qty);
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
														<td class="price-pr">
															<p><?php echo $msg_on_cake?></p>
														</td>
														<td class="price-pr">
															<p><?php echo $kg?></p>
														</td>
														<td class="price-pr">
															<p><?php echo $price?></p>
														</td>
														<td class="quantity-box"><label><?php echo $qty?></label></td>
														<td  class="total-pr">
															<p><?php echo $qty*$price?></p>
														</td>
														
													</tr>
												  <?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
                        <div class="col-md-12 col-lg-9">
                            <div class="order-box">
                                
                                <div class="d-flex">
                                    </div>
                                <hr class="my-1">
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> <?php echo $cart_total?></div>
                                </div>
                                <hr> </div>
                        </div>
                       
                    </div>
                </div>
            </div>

    <div class="cart-box-main">
        <div class="container">
	
			<div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
							<?php

							?>
                            <h3>Billing address</h3>
                        </div>
                        <form   id="open" method="post">
                            <div class="mb-3">
                                <label for="name">Name *</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $profile_name; ?>" required>

                                <div class="invalid-feedback"> Please enter your Name. </div>
                            </div>  
							<div class="mb-3">
                                <label for="mobile">Mobile Number*</label>
								<input type="telephone" name="mobile" class="form-control" id="mobile" placeholder="Mobile Number" value="<?php echo $profile_mob; ?>" required>

                                <div class="invalid-feedback"> Please enter your mobile number. </div>
                            </div>                       
                            <div class="mb-3">
                                <label for="address">Address *</label>
								<input type="text" name="address" class="form-control" id="address" placeholder="Street Address" value="<?php echo $profile_add; ?>" required>

                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
							<div class="mb-3">
                                <label for="address">City *</label>
								<input type="text" name="city" class="form-control" id="city" placeholder="City/State" value="<?php echo $profile_city; ?>"required>

                                <div class="invalid-feedback"> Please enter your City </div>
                            </div>
                            <div class="mb-3">
                                    <label for="zip">Pincode *</label>
									
									<input type="text" name="pincode" class="form-control" id="pincode" placeholder="Post code/ zip"  value="<?php echo $profile_pincode; ?>" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
								<hr class="mb-4">
                          
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" onclick="save_address() " class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next time</label>
                            </div>
                            <hr class="mb-4">
                            <div class="title"> <span>Payment</span> </div>
                            <div class="d-block my-3">
                                                                <div class="custom-control custom-radio">
                                    <input id="COD" name="payment_type" type="radio" Value="cod" class="custom-control-input" required>
                                    <label class="custom-control-label"  for="COD">Cash on Delivery</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="Paypal" name="payment_type" type="radio" Value="Paypal" class="custom-control-input" required>
                                    <label class="custom-control-label"  for="Paypal">Paypal</label>
                                </div>
                            </div>
                            
                            <hr class="mb-1"> 
							<input class="ml-auto btn hvr-hover" type="submit" name="submit"/>
						</form>
						 </div>
                    </div>
                </div>
                

        </div>
    </div>
    <!-- End Cart -->
<?php require('footer.php')?>        