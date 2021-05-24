<!--content-->
                         

<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							Order History
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
                      
                      
                     
   <div class="table-responsive">           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Shipping Method</th>
        <th>Cost</th>
        <th>Status</th>
        <th>View</th>
       
      </tr>
    </thead>
    <tbody>
    <?php if( !empty($order) ) {
    foreach($order as $product) { ?>          
    <tr>
    
      <td><?php echo $product['order_id']; ?>     </td>
      <td><?php echo $product['shipping']; ?>     </td>
      <td>₦<?php echo $product['cost']; ?>    </td>
      <td><?php echo $product['status']; ?>     </td>
      <td><a href="<?php echo base_url()?>account/order_details/<?php echo $product['order_id']; ?> " class="btn btn-primary">View Details</a>    </td>
     
      
    
    
    
    </tr>
      
    <?php }} ?>     
    </tbody>
  </table>
  </div>                      
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>