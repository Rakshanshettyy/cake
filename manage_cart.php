<?php

require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$msg_on_cake=get_safe_value($con,$_POST['msg_on_cake']);
$weight=get_safe_value($con,$_POST['weight']);
$pid=get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
$type=get_safe_value($con,$_POST['type']);
$obj=new add_to_cart();

if($type=='add'){
	$obj->addProduct($pid,$qty,$msg_on_cake,$weight);
}

if($type=='remove'){
	$obj->removeProduct($pid);
}

if($type=='update'){
	$obj->updateProduct($pid,$qty,$msg_on_cake);
}

echo $obj->totalProduct();
?>
