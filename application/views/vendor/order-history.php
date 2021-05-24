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
        
        <th>Title</th>
        <th>Quantity</th>
        <th>Payment Status</th>
        <th>Order Date</th>
        <th>View</th>
       
      </tr>
    </thead>
    <tbody>
    <?php if( !empty($order) ) {
    foreach($order as $product) { ?>          
    <tr>
    
      <td><?php echo $product['order_id']; ?>     </td>
      <td><?php echo $product['title']; ?>     </td>
     
      <td><?php echo $product['qty']; ?>     </td>
      <td><?php echo $product['status']; ?>     </td>
      <td><?php $date = strtotime($product['date']); ?>
		<?php echo date('j F Y', $date); ?>   </td>
      <td><a href="<?php echo base_url()?>vendor/order_details/<?php echo $product['order_id']; ?> " class="btn btn-primary">View Details</a>    </td>
     
      
    
    
    
    </tr>
      
    <?php }} ?>     
    </tbody>
  </table>
  </div>                      
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>