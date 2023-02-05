<?php 
require('top.php');

$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
	$sort=mysqli_real_escape_string($con,$_GET['sort']);
	
	if($sort=="price_high"){
		$sort_order=" order by product.price desc ";
		$price_high_selected="selected";	
	}if($sort=="price_low"){
		$sort_order=" order by product.price asc ";
		$price_low_selected="selected";
	}if($sort=="new"){
		$sort_order=" order by product.id desc ";
		$new_selected="selected";
	}if($sort=="old"){
		$sort_order=" order by product.id asc ";
		$old_selected="selected";
	}

}
	$get_product=get_product($con,'','','','',$sort_order);
		
	?>
	

   <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
			<?php if(count($get_product)>0){?>
                <div class="col-xl-9 col-lg-12 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-9 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                      <select id="sort_product_id" onchange="sort_shop_product_drop('<?php echo SITE_PATH?>')"  class="selectpicker show-tick form-control" data-placeholder="INR" >
									<option data-display="Select"></option>
									<option value="new" <?php echo $new_selected?>>Latest </option>
									<option value="price_high" <?php echo $price_high_selected?>>High Price → Low Price</option>
									<option value="price_low"  <?php echo $price_low_selected?>>Low Price → High Price</option>
									<option value="old" <?php echo $old_selected?>>Popularity</option>
								   </select>
                                </div>

                            </div>
                           
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
									 <?php
						foreach($get_product as $list){
										?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                     <div class="box-img-hover">
									<a href="product.php?id=<?php echo $list['id']?>">
									 <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" class="img-fluid" alt="product images">
                                    </a>
									  </div>
                                                <div class="why-text">
                                                    <h4><a href="product.php"><?php echo $list['name']?></a></h4>
													<h5><?php echo $list['price']?>  INR</h5>
                                                </div>
                                            </div>
                                        </div>
											<?php } ?>
									</div>
									
								</div>
								<?php } else { 
						echo "Data not found";
					} ?>
							</div>
						</div>
					</div>
				</div>
		
    <!-- End Shop Page -->

    <!-- filter Page -->
    <div class="col-xl-3 col-lg-3 col-sm-6 col-xs-6 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                               
                            </div>
                           
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <?php
										foreach($cat_arr as $list){
											?>
                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="categories.php?id=<?php echo $list['id']?>" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2"><?php echo $list['categories']?></a>
                                    <?php
											$cat_id=$list['id'];
											$sub_cat_res=mysqli_query($con,"select * from sub_categories where status='1' and categories_id='$cat_id'");
											if(mysqli_num_rows($sub_cat_res)>0){
											?>
                                    <div class="collapse show" id="categories.php?id=<?php echo $list['id']?>" data-parent="#list-group-men">
                                        <div class="list-group">
                                        <?php
													while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
                                          echo '<a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'" class="list-group-item list-group-item-action ">'.$sub_cat_rows['sub_categories'].'</a>';
                                                    }
                                          ?>
                                          
                                        </div>
                                          </div>
                                          <?php } ?>                                                                          
                                </div>
                                
                            <?php
										}
										?>                            
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
                </div>
                <!-- end filter page -->


    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
		</div>
	</div>

    <!-- End Instagram Feed  -->

<?php require('footer.php')?>
