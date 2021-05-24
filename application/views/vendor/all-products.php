<!--content-->
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							All Products
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
                      
                      
                    
   <div class="table-responsive">           
  <table class="table table-hover table-condensed">
<thead>
    <tr>
        <td><strong>Title</strong></td>
        <td><strong>Category</strong></td>
		<td><strong>Sub Category</strong></td>
        <td><strong>Quantity</strong></td>
        <td><strong>Price</strong></td>
        <td><strong>View</strong></td>
        <td><strong>Edit</strong></td>
        <td><strong>Delete</strong></td>
    </tr>
    </thead>
<?php foreach ($product as $products): ?>
<tbody>
        <tr><?php $string2 = $products['title']; ?>
            <td><?php echo $string2 = character_limiter($string2, 50); ?></td>
            <td><?php echo $products['category']; ?></td>
            <td><?php echo $products['sub_category']; ?></td>
            <td><?php echo $products['quantity']; ?></td>
            <td><?php echo $products['price']; ?></td>
            <td>
                <a class="btn btn-success" target="new" href="<?php echo base_url('product/'.$products['slug']); ?>">View</a> </td>
<td><a class="btn btn-primary"  href="<?php echo base_url('vendor/edit_product/'.$products['prod_id']); ?>">Edit</a> </td>
             <td>   
  <a class="btn btn-danger" href="<?php echo base_url('vendor/delete_product/'.$products['prod_id']); ?>" data-confirm="Are you sure you want to Delete?">Delete</a> 
            </td>
        </tr>
        </tbody>
<?php endforeach; ?>
</table>

 </div>
 <div class="col-md-12">
      <div class="row"><?php echo $this->pagination->create_links(); ?></div> 
     </div>
  </div>                      
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
