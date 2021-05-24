<!-- Page Title -->
		<section class="page-title style-2 text-center">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>
							
							<li class="active">
								Friends &amp; Family
							</li>
						</ol>
					</div>
				</div>
			</div>
		</section> <!-- end page title -->
  
<!-- Single Product -->
<section class="section-wrap-small single-product">
<div class="container relative">
<div class="row">

<div class="col-sm-6 col-xs-12 mb-60">

    <h3 class="text">Friends and Family</h3><br>
    <p class="text">Please Enter the Unique code the celebrant gave you to access the Fabric</p><br />
					
					<form action="<?php echo base_url(); ?>account/unique_code" method="post" enctype="multipart/form-data" class="form-horizontal">
   
   <div class="form-group">
<div class="login-mail">
            <span class="text-danger"><?php echo form_error('fname'); ?></span>
 <input type="text" name="code" placeholder="Unique Code" required="" value="<?php echo set_value('fname'); ?>">
		
				</div>
<div class="col-md-2">
<input type="submit" name="submit" value="Search" class="btn btn-dark btn-md add-to-cart" /> 
</div>
</div>
</div> <!-- end col img slider -->

<div class="col-sm-6 col-xs-12 product-description-wrap">
 <img src="<?php echo base_url(); ?>images/Aso-Ebi-Style1.jpg" alt=" " class="img-responsive" />
</div> <!-- end row -->




</div> <!-- end container -->
</section> <!-- end single product -->

