<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);
?>
 <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Orders</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        
						 <li class="breadcrumb-item active">Order Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>   
<div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
									<th>Product Name</th>
                                    <th>Product Image</th>
									<th>Message</th>
									<th>Weight</th>
                                    <th>Quantity</th>									
									<th>Price</th>
									<th>Total Price</th>
                                   
									
                                </tr>
                            </thead>
                            <tbody>
											<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
											$total_price=0;
											while($row=mysqli_fetch_assoc($res)){
											$total_price=$total_price+($row['qty']*$row['price']);
											?>
                                <tr>
                                   <td class="name-pr">
                                       <a href="#"><?php echo $row['name']?>
								       </a>
                                    </td>
									<td class="thumbnail-img">
                                     <a href="#"><img class="img-fluid" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>">
									 </a>
                                   </td><th class="name-pr">&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['cake_message']?>
                                    </th>
									<th class="name-pr">&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['cake_weight']?>
                                    </th>
                                    <th class="name-pr">&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['qty']?>
                                    </th>
                                    <td class="total-pr">
                                        <p><?php echo $row['price']?></p>
                                    </td>
									 
                                   <td class="total-pr">
                                        <p><?php echo $row['qty']*$row['price']?></p>
                                    </td>
                                    
                                </tr>
                                <?php } ?>
								<tr>
								<td colspan="4"></td>
								<td colspan="2" class="name-pr"> 
								<div class="ml-auto h5"><i><b>Grand Total<b></i></div></td>
								<td class="total-pr">
                                <div class="ml-auto h5"><b> <?php echo $total_price?><b></div>
                                </div>
								</td>
                                </tr>
                            </tbody>
							    
                        </table>
                    </div>
                </div>
            </div>
<?php require('footer.php')?>        