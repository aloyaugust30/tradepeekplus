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
   <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/user_profile/<?php echo $users['user_id']; ?>">   
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
    <td><strong>Country</strong></td>
    <td><span class="alert-danger"><?php echo form_error('country') ?> </span>
    <input type="text" name="country" value="<?php echo $users['country']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>State</strong></td>
    <td><span class="alert-danger"><?php echo form_error('state') ?> </span>
    <input type="text" name="state" value="<?php echo $users['state']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Address</strong></td>
    <td><span class="alert-danger"><?php echo form_error('address') ?> </span>
    <textarea cols="40" name="address"><?php echo $users['address']; ?></textarea></td>
  </tr>
  <tr>
    <td><strong>Account Type</strong></td>
    <td> <span class="alert-danger"><?php echo form_error('user') ?> </span>
    <select  id="user" name="user" required>
      
      	<option value="">User Type </option>
        <option value="celebrant">Celebrant</option>
       <option value="friends">Celebrant Friends</option>
      
        
        
       
      </select></td>
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