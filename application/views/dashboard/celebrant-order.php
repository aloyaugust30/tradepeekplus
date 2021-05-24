<!--content-->
                         

<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 My Order
							  
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
        <th>Material Title</th>
        <th>Original Price</th>
        <th>New Price</th>
        <th>Order Code</th>
        <th>View/Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php if( !empty($order) ) {
    foreach($order as $product) { ?>          
    <tr>
    
      <td><?php echo $product['title']; ?>     </td>
      <td>₦<?php echo $product['price']; ?>     </td>
      <td>₦<?php echo $product['ownprice']; ?>    </td>
      <td><?php echo $product['code']; ?>     </td>
      <td><a href="<?php echo base_url()?>account/order/<?php echo $product['code']; ?> " class="btn btn-primary">View</a>    </td>
      <td><a href="" class="btn btn-danger">Delete</a> </td>
      
    
    
    
    </tr>
      
    <?php }} ?>     
    </tbody>
  </table>
  </div>                      
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>