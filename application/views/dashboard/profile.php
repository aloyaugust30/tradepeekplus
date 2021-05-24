<!--content-->

<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 My Profile
							  
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
  <table class="table table-bordered">
    <tr>
    <th></th>
    <th>Profile Details</th>
  </tr>
  <tr>
    <td><strong>First Nmae</strong></td>
    <td><?php echo $users['fname']; ?></td>
  </tr>
  <tr>
    <td><strong>Last Name</strong></td>
    <td><?php echo $users['lname']; ?></td>
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td><?php echo $users['email']; ?></td>
  </tr>
  <tr>
  <tr>
    <td><strong>Phone Number</strong></td>
    <td><?php echo $users['phone']; ?> </td>
  </tr>
  <tr>
    <td><strong>Country</strong></td>
    <td><?php echo $users['country']; ?></td>
  </tr>
  <tr>
    <td><strong>State</strong></td>
    <td><?php echo $users['state']; ?></td>
  </tr>
  <tr>
    <td><strong>Address</strong></td>
    <td><?php echo $users['address']; ?></td>
  </tr>
  <tr>
    <td><strong>Account Type</strong></td>
    <td><?php echo $users['user']; ?></td>
  </tr>
  <tr>
    <td></td>
    <td><a href="<?php echo base_url()?>account/edit_profile/<?php echo $users['user_id']; ?>" class="btn btn-primary">Edit Profile </a></td>
   
  </tr>
  </table>
  </div>                      
</form>                        
                        
 <?php }} ?>                       
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>