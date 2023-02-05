<?php
require('connection.inc.php');
require('functions.inc.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$oid=get_safe_value($con,$_POST['oid']);
$cancel_order="UPDATE `order` SET `order_status`=4  WHERE id=$oid";
$sql=mysqli_query($con,$cancel_order);
if($sql)
{
    echo "Order Cancelled";

}
else
{
    echo "Order Could not be Cancelled ";
}
?>
