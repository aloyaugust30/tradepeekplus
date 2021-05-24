<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<h1 class="uppercase">Register</h1>
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								Register
							</li>
						</ol>
					</div>
				</div>
			</div>
		</section> <!-- end page title -->
        
 <section class="section-wrap page-404">
			<div class="container">

<div class="row text-center">
<div class="col-md-8 col-md-offset-2">

<h2 class="mb-50">Registeration Details</h2>
<?php echo $this->session->flashdata('msg') ?>
			<form action="<?php echo base_url(); ?>account/register" method="post" enctype="multipart/form-data">
			
			<div class="login-mail">
            <span class="text-danger"><?php echo form_error('fname'); ?></span>
					<input type="text" name="fname" placeholder="First Name" required="" value="<?php echo set_value('fname'); ?>">
					
				</div>
                
                <div class="login-mail">
                <span class="text-danger"><?php echo form_error('lname'); ?></span>
					<input type="text" name="lname" placeholder="Last Name" required="" value="<?php echo set_value('lname'); ?>">
					
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
               
               <div class="login-mail">
                <span class="text-danger"><?php echo form_error('user'); ?></span>
				<select class="form-control" id="user" name="user">
      
      	<option value="">User Type </option>
        <option value="celebrant">Celebrant</option>
       <option value="friends">Friends &amp; Family</option>
       
        
        
       
      </select>
    
				</div>
				
				
					<input type="submit" value="Register" class="btn btn-md btn-color">
			
			
			
			
			
			<div class="clearfix"> </div>
			</form>
            <div class="small-space"></div>
      
</div>
</div>
<div class="col-sm-12">
      
  If you already have an account, Please  <a href="<?php echo base_url(); ?>account/login" class="hvr-skew-backward">Login</a>     
    
    </div>

			</div>
		</section>