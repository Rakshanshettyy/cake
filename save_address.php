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
$uid=$_SESSION['USER_ID'];
$name=get_safe_value($con,$_POST['name']);
$mobile=get_safe_value($con,$_POST['mobile']);
$address=get_safe_value($con,$_POST['address']);
$city=get_safe_value($con,$_POST['city']);
$pincode=get_safe_value($con,$_POST['pincode']);
$check_profile=mysqli_num_rows(mysqli_query($con,"select * from profile where user_id='$uid'"));
if($check_profile>0){
$sql=mysqli_query($con,"UPDATE `profile` SET `name`='$name',`mobile`='$mobile',`address`='$address',`city`='$city',`pincode`='$pincode' WHERE user_id='$uid'");
echo "Success";
}
else
{
    $check1="INSERT INTO `profile`( `user_id`, `name`, `mobile`, `address`, `city`, `pincode`) VALUES ('$uid','$name','$mobile','$address','$city','$pincode')";
    $sql=mysqli_query($con,$check1);
    echo $check1;
}

 ?>
