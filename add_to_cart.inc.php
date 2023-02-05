<?php
class add_to_cart{
	function addProduct($pid,$qty,$msg_on_cake,$weight){
		$_SESSION['cart'][$pid]['qty']=$qty;
		$_SESSION['cart'][$pid]['msg_on_cake']=$msg_on_cake;
        $_SESSION['cart'][$pid]['weight']=$weight;		
	}
	
	function updateProduct($pid,$qty,$msg_on_cake){
		if(isset($_SESSION['cart'][$pid])){
			$_SESSION['cart'][$pid]['qty']=$qty;
		    $_SESSION['cart'][$pid]['msg_on_cake']=$msg_on_cake;
		}
	}
	
	function removeProduct($pid){
		if(isset($_SESSION['cart'][$pid])){
			unset($_SESSION['cart'][$pid]);
		}
	}
	
	function emptyProduct(){
		unset($_SESSION['cart']);
	}
	
	function totalProduct(){
		if(isset($_SESSION['cart'])){
			return count($_SESSION['cart']);
		}else{
			return 0;
		}
		
	}

}
?>