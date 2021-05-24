<!--content-->
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							Edit Product
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
   <?php foreach ($product as $products): ?>                   
                      
                     
   <div class="forms">
<h3 class="title1"></h3>
<div class="form-three widget-shadow">
<form class="form-horizontal" action="<?php echo base_url(); ?>admin/edit_product/<?php echo $products['prod_id']; ?>" method="post" enctype="multipart/form-data">

<?php echo $this->session->flashdata('msg') ?>
<div class="form-group">
<span class="text-danger"><?php echo form_error('title'); ?></span>
<div class="col-sm-2">
Product Title *
</div>
<div class="col-sm-8">
<input type="text" name="title" class="form-control1" id="focusedinput" placeholder="Product Title" value="<?php echo $products['title']; ?>">
</div>

</div>

<div class="form-group">

<div class="col-sm-2">
Price *
</div>
<div class="col-sm-4">
<span class="text-danger"><?php echo form_error('price'); ?></span>
<input type="text" name="price" class="form-control1" id="focusedinput" placeholder="eg: 1000" value="<?php echo $products['price']; ?>">
</div>

<div class="col-sm-1">
Quantity*
</div>

<div class="col-sm-4">
<span class="text-danger"><?php echo form_error('quantity'); ?></span>
<input type="text" name="quantity" class="form-control1" id="focusedinput" placeholder="eg: 10" value="<?php echo $products['quantity']; ?>">
</div>
</div>




<div class="form-group">
<span class="text-danger"><?php echo form_error('description'); ?></span>
<div class="col-sm-2">
Description *
</div>

<div class="col-sm-8">
<textarea name="description" id="description" required="true" class="form-control1"><?php echo $products['description']; ?></textarea>
</div>
</div>


<div class="form-group">
<span class="text-danger"><?php echo form_error('meta-description'); ?></span>
<div class="col-sm-2">
Meta Description
</div>

<div class="col-sm-8">
<textarea name="meta-description" id="meta-description" class="form-control1"><?php echo $products['meta_desc']; ?></textarea>
</div>
</div>


<div class="form-group">
<span class="text-danger"><?php echo form_error('keyword'); ?></span>
<div class="col-sm-2">
Key Words
</div>
<div class="col-sm-8">
<input type="text" name="keyword" class="form-control1" id="focusedinput" placeholder="key words" value="<?php echo $products['keyword']; ?>">
</div>

</div>


<div class="form-group">
<span class="text-danger"><?php echo form_error('model'); ?></span>
<div class="col-sm-2">
Model *
</div>
<div class="col-sm-8">
<input type="text" name="model" class="form-control1" id="focusedinput" placeholder="model" value="<?php echo $products['model']; ?>">
</div>

</div>


<div class="form-group">
<span class="text-danger"><?php echo form_error('vendor'); ?></span>
<div class="col-sm-2">
Vendor *
</div>
<div class="col-sm-8">
<?php 
	 
	 $options = array('' => '- Select a Vendor -');
foreach($vendor as $test) {
    $options[$test->shname] = $test->shname;
}
echo form_dropdown('vendor', $options, set_value('vendor'));
	 
	 ?>
</div>
</div>



<div class="form-group">
<span class="text-danger"><?php echo form_error('category'); ?></span>
<div class="col-sm-2">
Category *
</div>
<div class="col-sm-8">

	<select onchange="print_state('state',this.selectedIndex);" id="country" name="category" class="form-control1" required></select>
</div>

</div>


<div class="form-group">
<span class="text-danger"><?php echo form_error('sub_category'); ?></span>
<div class="col-sm-2">
Sub Category *
</div>
<div class="col-sm-8">

	<select name ="sub_category" id ="state" class="form-control1" required></select>
		<script language="javascript">print_country("country");</script>
</div>

</div>

<div class="row">
<div class="col-sm-4">
<div class="order-image"> <img src="<?=base_url().'uploads/'.$products['pic1']?>" data-imagezoom="true" class="img-responsive"> </div>
<input type="file" name="pic1" />
<span class="text-danger"> <?php if(isset($error)){print $error;}?> </span>
</div>


<div class="col-sm-4">
<div class="order-image"> <img src="<?=base_url().'uploads/'.$products['pic2']?>" data-imagezoom="true" class="img-responsive"> </div>
<input type="file" name="pic2" />
</div>

<div class="col-sm-4">
<div class="order-image"> <img src="<?=base_url().'uploads/'.$products['pic3']?>" data-imagezoom="true" class="img-responsive"> </div>
<input type="file" name="pic3" />
</div>

</div>

<div class="clearfix"></div><br /><br />



<div class="form-group">
<input type="submit" value="Submit" class="btn btn-danger" />
</div>

</form>
</div>
</div>
                   
                        
                        
 <?php endforeach; ?>                      
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
