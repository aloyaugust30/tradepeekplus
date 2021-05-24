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
   <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>account/edit_profile/<?php echo $users['user_id']; ?>">   
  <table class="table table-bordered">
    <tr>
    <th></th>
    <th>Profile Details</th>
  </tr>
  <tr>
    <td><strong>First Nmae</strong></td>
    <td><input type="text" name="fname" value="<?php echo $users['fname']; ?>"</td>
  </tr>
  <tr>
    <td><strong>Last Name</strong></td>
    <td><input type="text" name="lname" value="<?php echo $users['lname']; ?>"</td>
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td><?php echo $users['email']; ?></td>
  </tr>
  <tr>
  <tr>
    <td><strong>Phone Number</strong></td>
    <td><input type="text" name="phone" value="<?php echo $users['phone']; ?>" </td>
  </tr>
  <tr>
    <td><strong>Country</strong></td>
    <td><select onchange="print_state('state',this.selectedIndex);" id="country" name ="country" required></select></td>
  </tr>
  <tr>
    <td><strong>State</strong></td>
    <td><select name ="state" id ="state"  required></select>
		<script language="javascript">print_country("country");</script></td>
  </tr>
  <tr>
    <td><strong>Address</strong></td>
    <td><textarea cols="40" name="address"><?php echo $users['address']; ?></textarea></td>
  </tr>
  <tr>
    <td><strong>Account Type</strong></td>
    <td><select  id="user" name="user" required>
      
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