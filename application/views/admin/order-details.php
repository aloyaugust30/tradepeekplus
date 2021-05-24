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
        <th>Original Price</th>
        
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
    <td>Status</td>
    <td><?php echo $product['status']; ?> </td>
  </tr>
  <tr>
    <td>Shipping Method</td>
    <td><?php echo $product['shipping']; ?></td>
  </tr>
  <tr>
    <td>Total Cost</td>
    <td>₦<?php echo $product['cost']; ?></td>
  </tr>
  <tr>
    <td>Order Status</td>
    <td><?php echo $product['order_status']; ?></td>
  </tr>
  <tr>
    <td>Order Date</td>
    <td><?php $date = strtotime($product['date']); ?>
		<?php echo date('j F Y,  H:i:s', $date); ?>   </td>
  </tr>
  <?php if($product['status']=='pending'){ ?>
  <tr>
    <td></td>
    <td><a href="<?php echo base_url() ?>account/cancel_order/<?php echo $product['order_id']; ?>" data-confirm="Are you sure you want to Cancel this Order" class="btn btn-primary">Delete Order</a></td>
  </tr>
  
  <?php }else{ }?>
  
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
 