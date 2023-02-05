<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');


$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
$product_res=mysqli_query($con,"select * from product where status=1 ");
$product_arr=array();
while($show=mysqli_fetch_assoc($product_res))
{
	$product_arr[]=$show;	
}		

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();


$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);

$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="Bake N Bites";
$meta_desc="Bake N Bites";
$meta_keyword="Bake N Bites";
if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='contact.php'){
	$meta_title='Contact Us';
}
if(isset($_SESSION['USER_LOGIN'])){
    $userid=$_SESSION['USER_ID'];
    $profile_name=$_SESSION['USER_NAME']; 
    $profile=mysqli_fetch_assoc(mysqli_query($con,"select * from profile where user_id='$userid'"));
    $profile_mob=$profile['mobile'];
    $profile_add=$profile['address'];
    $profile_city=$profile['city'];
    $profile_pincode=$profile['pincode'];

	

}


?>


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
   <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- Site Metas -->
      <title><?php echo $meta_title?></title>
      <meta name="keywords" content="<?php echo $meta_desc?>">
      <meta name="description" content="<?php echo $meta_keyword?>">
      <meta name="author" content="">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  
      <!-- Site Icons -->
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
      <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Site CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/custom.css">
       <!--Login CSS-->
       <link href="css/style1.css" rel="stylesheet" type="text/css" media="all"/>
      <!--[if lt IE 9]>-->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      

    

 
	
   

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
				<div class="login-box">
                        <div class="our-link">
                            <ul>
                                                                
                            

                                <li> <?php if(isset($_SESSION['USER_LOGIN'])){
											echo '<a href="logout.php">Logout</a>';
										}else{
											echo '<a href="login.php">Login/Register</a>';
										}
										?></li>                      
                            </ul>
                        </div>
                    </div>
                    <div class="right-phone-box">
					
                        <p>Call US :- <a href="#"> +91 8529637418</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="profile.php"><i class="fa fa-user s_color"></i> 
                                  <?php if(isset($_SESSION['USER_LOGIN']))
                                        {
											echo  $profile_name;
										}?></a></li>
							
                                        <?php
										foreach($cat_arr as $list){
											?>
							<li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow" data-toggle="dropdown" href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
                          <?php
											$cat_id=$list['id'];
											$sub_cat_res=mysqli_query($con,"select * from sub_categories where status='1' and categories_id='$cat_id'");
											if(mysqli_num_rows($sub_cat_res)>0){
											?>			
						  <ul style="background-color:black" class="dropdown-menu">
								<?php
													while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
														echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'">'.$sub_cat_rows['sub_categories'].'</a></li>';
													}
													?>
												</ul>
												<?php } ?>
							</li>
											<?php
										}
										?>						
							
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="dropdown">
                            <a href="my_account.php" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">My Account</a>
                            <ul class="dropdown-menu">
								
								<li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="my_order.php">Orders</a></li>
                                <li><a href="my_account.php">My Account</a></li>
                              
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us </a></li>
                    </ul>
                </div>            							
								
               <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="sidemenu">
							<a href="cart.php">
								<i class="fa fa-shopping-bag">My Cart<span class="badge"><?php echo $totalProduct?></span></i>

								
							</a>
						</li>
                    </ul>
                </div>
                
                <!-- End Atribute Navigation -->
            </div>
        </nav>
		
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
<form action="search.php" method="get">
    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
               
                <input type="text" name="str" class="form-control" placeholder="Search">
				<span class="input-group-addon"><i><button type="submit"  class="fa fa-search"> </i></span>
				 
               </form>
            </div>
        </div>
    </div>
   