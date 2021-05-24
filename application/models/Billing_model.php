<?php

class Billing_model extends CI_Model{

    function __construct(){
        
        parent::__construct();
		date_default_timezone_set('Africa/Lagos');
        $this->load->database();
        $this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');
		
	
    }
    
	 public function get_places($slug = FALSE)
    {
		$user_id = $this->session->userdata('user_id');
        if ($slug === FALSE)
        {
			$this->db->where('user_id', $user_id);
            $query = $this->db->get('places');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('places', array('slug' => $slug));
        return $query->row_array();
    }
	
	
	 public function get_user()
    {
		$user_id = $this->session->userdata('user_id');
      
			$this->db->where('user_id', $user_id);
            $query = $this->db->get('user_table');
            return $query->result_array();
       
    }
    
	
	
    //insert user details to user table
    public function insertUser($data){
        
        return $this->db->insert('billing',$data);
      
    }
    
   public function insert_order($order){
        
        return $this->db->insert('order',$order);
    
      
   }
   
    public function insert_order_details($data){
        
        return $this->db->insert('order_details',$data);
    
	
    
        
       $mail_message='Dear Admin,'. "\r\n";
        $mail_message.='A new order has been placed' ."\r\n";
        $mail_message.='<br>Please login and Respond accordingly.';
        $mail_message.='<br><br>Thanks & Regards';
        $mail_message.='<br>Tradpeek Plus';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
        $mail = new PHPMailer;
        $mail->isSMTP();
		$mail->Timeout = 120;
        $mail->SMTPSecure = "ssl"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('nobleprojects001@gmail.com', 'Tadpeek Plus');
        $mail->IsHTML(true);
        $mail->addAddress('info@tradpeek.com');
        $mail->Subject = 'New Order from Tradpeek Plus';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        
        if($mail->send()){
			//for testing
            
            return true;
        }else{
           
            return false;
        }
        
       
    }

 public function verify_status($ref,$data) 
    {
            $this->db->where('order_id', $ref);
            return $this->db->update('order', $data);
        
    }
    
    //activate account
    function verifyEmail($key){
        $data = array('status' => 1);
        $this->db->where('md5(email)',$key);
        return $this->db->update('user_table', $data);    //update status as 1 to make active user
    }
	

public function loginAdmin($username, $password){
        //$this->db->where(array('username' = >$username, 'password' => $password));
        $query = $this->db->get_where('admin_table', array('username' => $username, 'password' => $password));   //status sholud be 1
        
        if($query->num_rows() == 1){
            
            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0] = $row->admin_id;
                $userArr[1] = $row->username;
				
                
            }
            $userdata = array(
                'admin_id' => $userArr[0],
                'username' => $userArr[1],
				
                'logged_in'=> TRUE
            );
            $this->session->set_userdata($userdata);
            
            return $query->result();
        }else{
            return false;
        }
    }
    
	
	public function count_orders()
{
	$user_id = $this->session->userdata('user_id');
    return $this->db
        ->where('poster_id', $user_id)
        ->count_all_results('booking');
}


public function count_new_orders()
{
	$user_id = $this->session->userdata('user_id');
    return $this->db
        ->where('poster_id', $user_id)
		->where('status', 'pending')
        ->count_all_results('booking');
}


public function booking_request()
{
	$user_id = $this->session->userdata('user_id');
    return $this->db
        ->where('user_id', $user_id)
		->count_all_results('booking');
}


public function canceled_booking()
{
	$user_id = $this->session->userdata('user_id');
    return $this->db
        ->where('user_id', $user_id)
		->where('status', 'canceled')
		->count_all_results('booking');
}


	
	public function ForgotPassword($email)
 {
        $this->db->select('email');
        $this->db->from('user_table'); 
        $this->db->where('email', $email); 
        $query=$this->db->get();
        return $query->row_array();
 }
 public function sendpassword($data)
{
		
        $email = $data['email'];
        $query1=$this->db->query("SELECT *  from user_table where email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{
        $passwordplain = "";
        $passwordplain  = rand(999999999,9999999999);
        $newpass['password'] = md5($passwordplain);
        $this->db->where('email', $email);
        $this->db->update('user_table', $newpass); 
        $mail_message='Dear '.$row[0]['fullname'].','. "\r\n";
        $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
        $mail_message.='<br>Please Update your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Your company name';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = "ssl"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('nobleprojects001@gmail.com', 'Host Places');
        $mail->IsHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
		
		
		
	
     
if (!$mail->send()) {
     $this->session->set_flashdata('login_msg','Failed to send password, please try again!');
} else {
   $this->session->set_flashdata('login_msg','Password sent to your email!');
}
  redirect(base_url().'account/login','refresh');        
}
else
{  
 $this->session->set_flashdata('login_msg','Email not found try again!');
 redirect(base_url().'account/login','refresh');
}
}
	
	
	
	 public function upload_proof($data)  
    {
        $user_id = $this->session->userdata('user_id');
 		$proof= $data['proof'];
		$status= "pending";
         $data = array(
        
		'verify_upload' => $proof,
		'verify_status'=>$status,
		
        );
       
            $this->db->where('user_id', $user_id);
            return $this->db->update('user_table', $data);
			
			$mail_message='Dear Admin,'. "\r\n";
        $mail_message.='A user just uploaded a proof of identity for you to confirm<br><br>';
        $mail_message.='<br>Please login into the admin dashboard to confirm.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Host Places';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = "ssl"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('nobleprojects001@gmail.com', 'Host Places');
        $mail->IsHTML(true);
        $mail->addAddress('contact@noblecontracts.com');
        $mail->Subject = 'Verify Proof of Identity';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        if($mail->send()){
			//for testing
            
            return true;
        }else{
           
            return false;
        }
    }
	
	
	
	public function check_status($user_id)
    {
		$this->db->select('verify_status');
    	$this->db->from('user_table');
    	$this->db->where('user_id',$user_id);
		return $this->db->get()->row()->verify_status;
        
    }
	
	

}

?>