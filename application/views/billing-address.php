<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<h1 class="uppercase">Billing</h1>
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								Billing
							</li>
						</ol>
					</div>
				</div>
			</div>
		</section> <!-- end page title -->
        
 <section class="section-wrap page-404">
			<div class="container">
<?php foreach ($user as $users): ?>
<div class="row text-center">
<div class="col-md-8 col-md-offset-2">

<h2 class="mb-50">Billing Information</h2>
<?php echo $this->session->flashdata('msg') ?>
			<form action="<?php echo base_url(); ?>billing/address" method="post" enctype="multipart/form-data">
			
				 <div class="login-mail">
               <span class="text-danger"><?php echo form_error('fname'); ?></span>
					<input type="text" name="fname" placeholder="First Name" required="" value="<?php echo $users['fname']; ?>">
			
				</div>
                
                <div class="login-mail">
                <span class="text-danger"><?php echo form_error('lname'); ?></span>
					<input type="text" name="lname" placeholder="Last Name" required="" value="<?php echo $users['lname']; ?>">
				
				</div>


				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('phone'); ?></span>
	<input type="text" name="phone" placeholder="Phone Number" required="" value="<?php echo $users['phone']; ?>">
			
				</div>
                
                <?php if($users['country']==''){?>

				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('country'); ?></span>
	<select onchange="print_state('state',this.selectedIndex);" id="country" name ="country" class="form-control" required></select>
       
				
				</div>
				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('state'); ?></span>
					<select name ="state" id ="state" class="form-control" required></select>
		<script language="javascript">print_country("country");</script>
				
				</div>
              
               
               
               
				
                 <?php }else{ ?> 
                 
      <div class="login-mail">
                <span class="text-danger"><?php echo form_error('country'); ?></span>
	<input type="text" name="country" placeholder="Country" required="" value="<?php echo $users['country']; ?>">
       
				
				</div>
				<div class="login-mail">
                <span class="text-danger"><?php echo form_error('state'); ?></span>
	<input type="text" name="state" placeholder="State" required="" value="<?php echo $users['state']; ?>">
				</div>
              
             
                 
                 <?php }?>
                 
                 <div class="login-mail">
                <span class="text-danger"><?php echo form_error('address'); ?></span>
				<textarea name="address" class="form-control"><?php echo $users['address']; ?></textarea>
				</div> 
                 
		
					<input type="submit" class="btn btn-dark btn-md add-to-cart" value="Procced to Payment">
	
        </form>
			
			
			
			<div class="clearfix"> </div>
            
			</form>
            <div class="small-space"></div>
 <?php endforeach ?>     
</div>
</div>


			</div>
		</section>