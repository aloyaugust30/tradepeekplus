<!--content-->

<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 Order Details
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
                      
<?php if( !empty($order) ) {
    foreach($order as $product) { ?>              
                      
   <div class="table-responsive">    
   <?php echo $this->session->flashdata('msg'); ?>       
  <table class="table table-bordered">
    <tr>
    <th></th>
    <th>Order Details</th>
  </tr>
  <tr>
    <td><strong>Title</strong></td>
    <td><?php echo $product['title']; ?></td>
  </tr>
  <tr>
    <td><strong>Category</strong></td>
    <td><?php echo $product['category']; ?></td>
  </tr>
  <tr>
    <td><strong>Sub Category</strong></td>
    <td><?php echo $product['sub_category']; ?></td>
  </tr>
  <tr>
  <tr>
    <td><strong>Order Code</strong></td>
    <td><?php echo $product['code']; ?> &nbsp;&nbsp;<span style="font-size:14px"><em>( This is the code you share to your friends )</em> </span></td>
  </tr>
  <tr>
    <td><strong>Description</strong></td>
    <td><?php echo $product['description']; ?></td>
  </tr>
  <tr>
    <td><strong>Original Price</strong></td>
    <td>₦<?php echo $product['price']; ?></td>
  </tr>
  <form method="post" action="<?php echo base_url() ?>account/order/<?php echo $product['code']; ?>" enctype="multipart/form-data">
  <tr>
    <td><strong>My Price</strong></td>
    <td>₦ <input type="text" name="ownprice" value="<?php echo $product['ownprice']; ?>" required="required" /></td>
   
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td><div class="order-image"> <img src="<?=base_url().'uploads/'.$product['pic1']?>" data-imagezoom="true" class="img-responsive"> </div></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="submit" class="btn btn-primary" value="Change Price" /></td>
   
  </tr>
  </table>
  </div>                      
</form>                        
                        
 <?php }} ?>                   
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>