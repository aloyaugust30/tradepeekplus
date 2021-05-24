<!--content-->
                         

<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							Edit Profile
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
                      
                      
                     
   <?php if( !empty($user) ) {
    foreach($user as $users) { ?>              
                      
   <div class="table-responsive">    
   <?php echo $this->session->flashdata('msg'); ?>    
   <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/vendor_profile/<?php echo $users['ven_id']; ?>">   
  <table class="table table-bordered">
    <tr>
    <th></th>
    <th>Profile Details</th>
  </tr>
  <tr>
    <td><strong>First Nmae</strong></td>
    <td><span class="alert-danger"><?php echo form_error('fname') ?> </span>
    <input type="text" name="fname" value="<?php echo $users['fname']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Last Name</strong></td>
    <td><span class="alert-danger"><?php echo form_error('lname') ?> </span>
    <input type="text" name="lname" value="<?php echo $users['lname']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td><span class="alert-danger"><?php echo form_error('email') ?> </span>
    <input type="text" name="email" value="<?php echo $users['email']; ?>" /></td>
  </tr>
  <tr>
  <tr>
    <td><strong>Phone Number</strong></td>
    <td><span class="alert-danger"><?php echo form_error('phone') ?> </span>
    <input type="text" name="phone" value="<?php echo $users['phone']; ?>" /> </td>
  </tr>
  <tr>
    <td><strong>Shop Name</strong></td>
    <td><input type="text" name="shname" value="<?php echo $users['shname']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Bank Name</strong></td>
    <td><span class="alert-danger"><?php echo form_error('bname') ?> </span>
    <input type="text" name="bname" value="<?php echo $users['bname']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Account Name</strong></td>
    <td><span class="alert-danger"><?php echo form_error('accname') ?> </span>
    <input type="text" name="accname" value="<?php echo $users['accname']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Account Number</strong></td>
    <td><span class="alert-danger"><?php echo form_error('accnum') ?> </span>
    <input type="text" name="accnum" value="<?php echo $users['accnum']; ?>" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="submit" value="Update Profile" class="btn btn-primary" /></td>
   
  </tr>
  </table>
  </div>                      
</form>                        
                        
 <?php }} ?>                       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>