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
                      
                      
                     
   <div class="table-responsive">   
     <?php echo $this->session->flashdata('msg'); ?>               
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Material Name</th>
        <th>Quantity</th>
        <th>Price</th>
        
        <th>Order ID</th>
       
      </tr>
    </thead>
    <tbody>
    <?php if( !empty($order) ) {
    foreach($order as $product) { ?>          
    <tr>
    
      <td><?php echo $product['title']; ?>     </td>
      <td><?php echo $product['qty']; ?>     </td>
      <td>₦<?php echo $product['price']; ?>    </td>
      
      <td><?php echo $product['order_id']; ?></td>
     
      
    
    
    
    </tr>
      
    <?php }} ?>     
    </tbody>
  </table>
  </div>                      
                        
                        
  <table class="table table-bordered">
  <tr>
    <th></th>
    <th>Order Details</th>
  </tr>
  <tr>
    <td>Description</td>
    <td><?php echo $product['description']; ?> </td>
  </tr>
  <tr>
    <td>Model</td>
    <td><?php echo $product['model']; ?></td>
  </tr>
  <tr>
    <td>Category</td>
    <td><?php echo $product['category']; ?></td>
  </tr>
  <tr>
    <td>Sub-Category</td>
    <td><?php echo $product['sub_category']; ?></td>
  </tr>
  <tr>
    <td><strong>Image</strong></td>
    <td><div class="order-image"> <img src="<?=base_url().'uploads/'.$product['pic1']?>" data-imagezoom="true" class="img-responsive"> </div></td>
  </tr>
  
<tr>
    <td>Payment Status</td>
    <td><strong><?php echo $product['status']; ?></strong></td>
  </tr>
  
  
 
  
</table>                   
                        
                        
                     
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
        
 <script>
 
 $(document).on('click', ':not(form)[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
        e.stopImmediatePropagation();
        e.preventDefault();
    }
});

$(document).on('submit', 'form[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
        e.stopImmediatePropagation();
        e.preventDefault();
    }
});

$(document).on('input', 'select', function(e){
    var msg = $(this).children('option:selected').data('confirm');
    if(msg != undefined && !confirm(msg)){
        $(this)[0].selectedIndex = 0;
    }
});
</script>
 