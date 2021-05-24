<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<h1 class="uppercase">Login</h1>
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								Login
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

<h2 class="mb-50">Login Details</h2>
<?php echo $this->session->flashdata('msg') ?>
			<form action="<?php echo base_url(); ?>account/login" method="post" enctype="multipart/form-data">
			
				
                <span class="text-danger"><?php echo form_error('email'); ?></span>
	<input type="text" placeholder="Email" name="email" required value="<?php echo set_value('email'); ?>">
				
                <span class="text-danger"><?php echo form_error('password'); ?></span>
<input type="password" placeholder="Password" name="password" required value="<?php echo set_value('password'); ?>">
					
<input type="submit" value="login" class="btn btn-md btn-color">
			
              <span style="float:right">  <a href=""> <em>Forgot Password</em></a></span><br />
             
			
			
			
			<div class="clearfix"> </div>
            
			</form>
            <div class="small-space"></div>
      
</div>
</div>
<div class="col-sm-12">
      
  If you don't have an account, Please  <a href="<?php echo base_url(); ?>account/register" class="">Register</a>     
    
    </div>

			</div>
		</section>