<?php
require('top.inc.php');

$subsql="";
$fromdate=$todate="";
if(isset($_POST['submit']))
{
   $from=$_POST['my_date_picker1'];
   $fromdate=$from;
  $fromarr=explode("/",$from);
  $from=$fromarr['2'].'-'.$fromarr['1'].'-'.$fromarr['0'];  
  $from=$from." 00:00:00";
  
  
  $to=$_POST['my_date_picker2'];
  $todate= $to;
    $toarr=explode("/",$to);
  $to=$toarr['2'].'-'.$toarr['1'].'-'.$toarr['0'];  
  $to=$to." 23:59:59";
  $subsql=" AND added_on >= '$from' && added_on <= '$to' ";

}
?>


<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Transaction </h4>
                   <form method="post">
          Start Date:        <input type="text" id="my_date_picker1" name="my_date_picker1" value="<?php echo $fromdate?>" required> 
          End Date:        <input type="text" id="my_date_picker2" name="my_date_picker2" value="<?php echo $todate?>" required>
        <input  type="submit" name="submit" value="filter">
        </form>
    				</div>
                    <?php
                               $sql="select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status $subsql order by id desc";
                               $res=mysqli_query($con,$sql);

                               ?>
				<div class="card-body--">
                    <?php if (mysqli_num_rows($res)>0) {
                    ?>
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							 
                               <th class="product-thumbnail">Order ID</th>
									<th class="product-name"><span class="nobr">Order Date</span></th>
									<th class="product-price"><span class="nobr"> Name </span></th>
                                    <th class="product-price"><span class="nobr"> Mobile </span></th>
                                    <th class="product-stock-stauts"><span class="nobr"> Total Amount </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                                  
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><a href="order_master_detail.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a><br>
									<a href="order_pdf.php?id=<?php echo $row['id']?>">PDF </a> 
                                </td>
							   <td><?php echo $row['added_on']?></td>
							   <td><?php echo $row['name']?></td>
                               <td><?php echo $row['mobile']?></td>
							   <td><?php echo $row['total_price']?></td>
							   <td><?php echo $row['payment_type']?></td>
							   <td><?php echo $row['payment_status']?></td>
                               <td><?php echo $row['order_status_str']?></td>
                               
							   
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
    <?php
}else{
    Echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Data Found";
}
?>
</div>

 
<?php
require('footer.inc.php');
?>