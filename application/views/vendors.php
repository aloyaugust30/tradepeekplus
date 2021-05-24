<div class="main-wrapper oh">

<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
                    <h1 class="uppercase">Vendors</h1>
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								Vendors
							</li>
						</ol>
					</div>
				</div>
			</div>
		</section> <!-- end page title -->

<section class="section-wrap-small single-product">
<div class="container relative">

<div class="row">

<div class="col-sm-6">
    <h6>Register a Vendor Account</h6>
     <?php echo $this->session->flashdata('reg-msg') ?>
    <p><form action="<?php echo base_url(); ?>account/vendors" method="post" enctype="multipart/form-data">
			<div class="login-mail">
            <span class="text-danger"><?php echo form_error('fname'); ?></span>
					<input type="text" name="fname" placeholder="First Name" required="" value="<?php echo set_value('fname'); ?>">
				
				</div>
                
                <div class="login-mail">
                <span class="text-danger"><?php echo form_error('lname'); ?></span>
					<input type="text" name="lname" placeholder="Last Name" required="" value="<?php echo set_value('lname'); ?>">
			
				</div>
                
                <div class="login-mail">
                <span class="text-danger"><?php echo form_error('shname'); ?></span>
	<input type="text" name="shname" placeholder="Shop Name" required="" value="<?php echo set_value('shname'); ?>">
				
				</div>


				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('phone'); ?></span>
	<input type="text" name="phone" placeholder="Phone Number" required="" value="<?php echo set_value('phone'); ?>">
				
				</div>
				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
	<input type="text" name="email" placeholder="Email" required="" value="<?php echo set_value('email'); ?>">
				
				</div>
				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('password'); ?></span>
<input type="password" name="password" placeholder="Password" required="" value="<?php echo set_value('password'); ?>">
					
				</div>
               
               
               
				
			
					<input type="submit" value="Register" class="btn btn-dark btn-md add-to-cart">
	
                </form></p>
</div> <!-- end col -->

<div class="col-sm-6">
    <h6>Login as a Vendor</h6>
    <?php echo $this->session->flashdata('msg') ?>
    <p><form action="<?php echo base_url(); ?>account/vendors_login" method="post" enctype="multipart/form-data">
			
				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
					<input type="text" placeholder="Email" name="email" required="" value="<?php echo set_value('email'); ?>">
			
				</div>
				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('password'); ?></span>
					<input type="password" placeholder="Password" name="password" required="" value="<?php echo set_value('password'); ?>">
			
				</div>
				   
			
					<input type="submit" value="login" class="btn btn-dark btn-md add-to-cart">
			
              <span style="float:right">  <a href=""> <em>Forgot Password</em></a></span>

			
			
			<div class="clearfix"> </div>
			</form></p>
</div> <!-- end col -->

</div> 
</div>
</section>