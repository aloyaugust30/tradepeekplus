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
        <td><strong>First Name</strong></td>
        <td><strong>Last Name</strong></td>
		<td><strong>Email</strong></td>
        <td><strong>Shop Name</strong></td>
        <td><strong>Phone</strong></td>
        <td><strong>View</strong></td>
        
        <td><strong>Delete</strong></td>
    </tr>
    </thead>
<?php foreach ($vendor as $row): ?>
<tbody>
        <tr>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['shname']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
                <a class="btn btn-success" href="<?php echo base_url('admin/vendor_profile/'.$row['ven_id']); ?>">View</a> </td>

             <td>   
  <a class="btn btn-danger" href="<?php echo base_url('admin/delete_vendor/'.$row['ven_id']); ?>" data-confirm="Are you sure you want to Delete?">Delete</a> 
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