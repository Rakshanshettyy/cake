<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
 <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Orders</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        
						 <li class="breadcrumb-item active">Orders</li>
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
                                    <th>Order ID</th>
                                   
                                    <th>Order Date</th>									
                                    <th>Address</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Download Invoice</th>
                                    <th> </th>
									
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$uid=$_SESSION['USER_ID'];
								$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status order by order_status.id ");
								while($row=mysqli_fetch_assoc($res)){
							?>
                                <tr>
                                   <td class="name-pr">
                                     <?php echo $row['id']?>
									
                                   </td>
                                  
                                    <th class="name-pr">
                                       <?php echo $row['added_on']?>								       
                                    </th>

                                    <th class="name-pr">
                                        		<?php echo $row['address']?><br/>
												<?php echo $row['city']?><br/>
												<?php echo $row['pincode']?>
                                    </th>
                                    <th class="name-pr"><?php echo $row['payment_type']?></td>
                                    <th class="name-pr">
										<?php echo $row['payment_status']?>
                                    </th>
                                    <th class="name-pr">
                                       <a href="my_order_details.php?id=<?php echo $row['id']?>"> <?php echo $row['order_status_str']?></a>								
								
                                    </th>
                                    <td class="name-pr">
                                   
                                   <a href="order_pdf.php?id=<?php echo $row['id']?>">Click Here </a> 	
									
                                   </td><?php
                                    if( $row['order_status_str']=='Pending')
                                    {
                                   ?>
                                    <td class="remove-pr">
                                    <button onclick="cancel_order(<?php echo $row['id']?>)" >Cancel Order</button>
                                   <?php
                                    }
                                   ?>
                                </tr>
                               
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php require('footer.php')?>        