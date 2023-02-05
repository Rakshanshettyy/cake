
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

			
<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Account</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

	

            




    <div class="head">
   		
    <div class="login">

	
                        <h4 class="profile_head">Address</h4>
                        <div class="row">
                            
                            <div class="col-md-6">
                               
                                <p>123 Shipping Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button class="btn">Edit Address</button>
                            </div>
                        </div>
                  
                    <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Account Details</h4>
                        
                    </div>

       <!-- Name Update -->
                    <h3 class="profile_head" ><u>Profile</u><h3>             
                                 			  	                                
                           <form id="login-form" method="post">
						<div class="row">
                            <div class="col-md-6">
							<label class="password_label">Enter Name</label>
                            <input style="width:45%" type="text" name="name" id="name" placeholder="Your Name*"  value="<?php echo $_SESSION['USER_NAME']?>"/>
							
							<span class="field_error" id="name_error"></span>
                            </div>
							<div class="col-md-6">
							<label class="password_label">Mobile</label>
                            <input  type="text" name="name" id="name" placeholder="Your Name*"  value="<?php echo $_SESSION['USER_NAME']?>"/>
							
							<span class="field_error" id="name_error"></span>
                            </div>
							<div class="col-md-6">
							<label class="password_label">Email</label>
                            <input style="width:45%" type="text" name="name" id="name" placeholder="Your Name*"  value="<?php echo $_SESSION['USER_NAME']?>"/>
							
							<span class="field_error" id="name_error"></span>
                            </div>
							<div class="col-md-6">
							<label class="password_label">Pincode</label>
                            <input style="width:45%" type="text" name="name" id="name" placeholder="Your Name*"  value="<?php echo $_SESSION['USER_NAME']?>"/>
							
							<span class="field_error" id="name_error"></span>
                            </div>
							<div class="col-md-12">
							<label class="password_label">Address</label>
                            <input style="width:45%" type="text" name="name" id="name" placeholder="Your Name*"  value="<?php echo $_SESSION['USER_NAME']?>"/>
							
							<span class="field_error" id="name_error"></span>
                            </div>
                            
                          
						
                           
                             <div class="submit-button text-center">
						    <div class="submit col-md-12">
								<button   type="button" onclick="update_profile()" id="btn_submit" class="btn ">Update Account</button>
							</div>
                              
                            </div>
                        </div>
						   

                         	
						<!-- Password Update -->
					<!-- <h3 class="profile_head" ><u>Update Password</u></h3>             
                               			  	                                
                           <form method="post" id="frmPassword">
							<label class="password_label">Current Password</label>
                            <input type="password" name="current_password" id="current_password" style="width:35%">
							<span class="field_error" id="current_password_error"></span><br>
							
							<label style="margin-right:18px" class="password_label">New  Password</label>
                            <input type="password" name="new_password" id="new_password" style="width:35%">
							<span class="field_error" id="new_password_error"></span><br>
						
							<label class="password_label">Confirm Password</label>
                            <input type="password" name="confirm_new_password" id="confirm_new_password" style="width:35%">
							<span class="field_error" id="confirm_new_password_error"></span>
							

                           <div class="submit-button text-center">
						    <div class="submit">
								<button type="button" class="btn hvr-hover" onclick="update_password()" id="btn_update_password">Update</button>
							</div>
                          </div>							  
    </div>	
            	 -->
    </div>	
    <div class="clear">
	</div>
<script>
function update_profile(){
			jQuery('.field_error').html('');
			var name=jQuery('#name').val();
			if(name==''){
				jQuery('#name_error').html('Please enter your name');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'update_profile.php',
					type:'post',
					data:'name='+name,
					success:function(result){
						jQuery('#name_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
		function update_password(){
			jQuery('.field_error').html('');
			var current_password=jQuery('#current_password').val();
			var new_password=jQuery('#new_password').val();
			var confirm_new_password=jQuery('#confirm_new_password').val();
			var is_error='';
			if(current_password==''){
				jQuery('#current_password_error').html('Please enter password');
				is_error='yes';
			}
			if(new_password==''){
				jQuery('#new_password_error').html('Please enter password');
				is_error='yes';
			}
			if(confirm_new_password==''){
				jQuery('#confirm_new_password_error').html('Please enter password');
				is_error='yes';
			}
			if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
				jQuery('#confirm_new_password_error').html('Please enter same password');
				is_error='yes';
			}
			
			if(is_error==''){
				jQuery('#btn_update_password').html('Please wait...');
				jQuery('#btn_update_password').attr('disabled',true);
				jQuery.ajax({
					url:'update_password.php',
					type:'post',
					data:'current_password='+current_password+'&new_password='+new_password,
					success:function(result){
						jQuery('#current_password_error').html(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled',false);
						jQuery('#frmPassword')[0].reset();
					}
				})
			}
			
		}
		</script>
		
  
   <?php require('footer.php')?>        