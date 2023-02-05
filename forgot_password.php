<?php 
require('top.php');		
require('validation.php');		
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>			

    <div class="head">
    <div class="logo1">
        <div style="margin: top 1%;" class="logo-top">
            <h1>Bake N Bite</h1>
        </div>
        <div class="logo-bottom">
            <section class="sky-form">									
                <label>Welcome To Bake N Bite</label>
              
            </section>
        </div>
    </div>		
    <div class="login">
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Forget Password</span></li>
                    
                </ul>				  	 
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        <div class="login-top">
                           <form id="login-form" method="post">
                            <input type="text" name="email" id="email" placeholder="Your Email*"  required=""/>
							<br>
							<span class="field_error" id="email_error"></span>
                              							
                           <div class="submit-button text-center">
							<button type="button" onclick="forgot_password()" class="btn hvr-hover" id="btn_submit">Submit</button>
                             </div>
							
							<div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
						
                        </div>
                    </div>
                  
					
                </div>	
            </div>
        </div>	
    </div>	
    <div class="clear"></div>
   </div>   
   <script>
		function forgot_password(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'forgot_password_submit.php',
					type:'post',
					data:'email='+email,
					success:function(result){
						jQuery('#email').val('');
						jQuery('#email_error').html(result);
						jQuery('#btn_submit').html('Submit');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
		</script>
  
   <?php require('footer.php')?>        