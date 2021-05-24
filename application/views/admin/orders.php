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
        <td><strong>Order ID</strong></td>
        <td><strong>Shipping </strong></td>
		<td><strong>Cost</strong></td>
        <td><strong>Payment Status</strong></td>
        <td><strong>Order Date</strong></td>
         <td><strong>Order Status</strong></td>
        <td><strong>View</strong></td>
        
        <td><strong>Delete</strong></td>
    </tr>
    </thead>
<?php foreach ($order as $row): ?>
<tbody>
        <tr>
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['shipping']; ?></td>
            <td><?php echo $row['cost']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['date']; ?></td>
             <td><?php echo $row['order_status']; ?></td>
            <td>
                <a class="btn btn-success" href="<?php echo base_url('admin/order_detail/'.$row['order_id']); ?>">Order Details</a> </td>

             <td>   
  <a class="btn btn-danger" href="<?php echo base_url('admin/delete_order/'.$row['order_id']); ?>" data-confirm="Are you sure you want to Delete?">Delete order</a> 
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