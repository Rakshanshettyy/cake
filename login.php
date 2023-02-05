<?php 
require('top.php');		
		
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>			

    <div class="head">
   		
    <div class="login">
        <div class="sap_tabs">
            <div id="horizontalTab" >
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Login</span></li>
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><label>/</label><span>Sign up</span></li>
                    <div class="clearfix"></div>
                </ul>				  	 
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        <div class="login-top">
                           <form id="login-form" method="post">
                            <input type="text" name="login_email" id="login_email" placeholder="Your Email*"  required=""/>
							<br>
							<span class="field_error" id="login_email_error"></span>
                              <br> <input type="password" name="login_password" id="login_password" placeholder="Your Password*"  required=""/>	
							<br>
							<span class="field_error" id="login_password_error"></span>								
                           <div class="submit-button text-center">
						    <div class="submit">
										<button   type="button" onclick="user_login()" class="btn hvr-hover">Login</button>
								</div>
                             </div>
							 <a href="forgot_password.php">Forgot Password?</a>
							<div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
						
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                    <div class="login-top">
                            <form id="register-form" method="post">
                        <input type="text" name="name" id="name" placeholder="Your Name*" class="name" required=""/>
									<br>
									<span class="field_error" id="name_error"></span><br>

							<input style="width:45%" type="text" name="email" id="email" placeholder="Your Email*" class="email" required=""/>
						 <button  style="color:#ffffff;font-weight:bold;margin-right:15%;margin-left:10%" type="button"  class="btn hvr-hover email_sent_otp " onclick="email_sent_otp()">Send Otp</button>
						   
						   <input style="width:30%" type="text" class="email_verify_otp" id="email_otp" placeholder="Enter OTP*" class="email" required=""/>
						<button type="button"  style="color:#ffffff;font-weight:bold" class="btn hvr-hover email_verify_otp " onclick="email_verify_otp()">Verify Otp</button>
								<span id="email_otp_result"></span> 				   
								<span class="field_error" id="email_error"></span>	<br>
					
						<input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" class="email" required=""/>
						<br>
						<span class="field_error" id="mobile_error"></span><br>
                        <input type="password" name="password" id="password" placeholder="Your Password*" class="password" required=""/>
						<br>
						<span class="field_error" id="password_error"></span>					   
                            
                            <div class="submit-button text-center">
						    <div class="submit">
                                    <button type="button" class="btn hvr-hover"onclick="user_register()">Register</button>
                                </div>
                             </div>
								
                                <div class="clear"></div>
								<div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
                            </div>	
							</form>
							
                        </div>
                        
                    </div>
					
                </div>	
            </div>
        </div>	
    </div>	
    <div class="clear">
	</div>
<script>
		function email_sent_otp(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('.email_sent_otp').html('Please wait..');
				jQuery('.email_sent_otp').attr('disabled',true);
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'email='+email+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('#email').attr('disabled',true);
							jQuery('.email_verify_otp').show();
							jQuery('.email_sent_otp').hide();
							
						}else if(result=='email_present'){
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Email id already exists');
						}else{
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Please try after sometime');
						}
					}
				});
			}
		}
		function email_verify_otp(){
			jQuery('#email_error').html('');
			var email_otp=jQuery('#email_otp').val();
			if(email_otp==''){
				jQuery('#email_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+email_otp+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('.email_verify_otp').hide();
							jQuery('#email_otp_result').html('Email id verified');
							jQuery('#is_email_verified').val('1');
							if(jQuery('#is_mobile_verified').val()==1){
								jQuery('#btn_register').attr('disabled',false);
							}
						}else{
							jQuery('#email_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		}
	</script>
  
   
  
   <?php require('footer.php')?>        