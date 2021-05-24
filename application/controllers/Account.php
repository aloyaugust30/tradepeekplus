<?php
class Account extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                 $this->load->model('Account_Model');
				$this->load->model('Basket_model'); 
                $this->load->helper('url_helper');
				$this->load->library('cart');
				$this->load->library('user_agent');
				$this->load->library('session');
				$this->load->helper('form');
				$this->load->helper('text');
        		$this->load->library('form_validation');
				$this->load->helper('string');
        }

   
    public function register(){
		
		$data['title'] = 'User Registeration';
		
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		
		
        $this->form_validation->set_rules('fname','First name', 'required');
        $this->form_validation->set_rules('lname','Last name', 'required');
		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[user_table.email]');
        $this->form_validation->set_message('is_unique', 'The %s already exist');
        $this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('phone','Phone Number', 'trim|required');
		$this->form_validation->set_rules('user','User Type', 'trim|required');
		
        
        if($this->form_validation->run() == false){
            		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('register', $data);
		 $this->load->view('templates/footer');
                   
            
        }else{
            //call db
			$date = date("Y-m-d H:i:s");
			$user_id=rand(00000,99999); 
            $data = array(
                'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				
				'user_id' => $user_id,
                'email' => $this->input->post('email'),
               
                'password' => md5($this->input->post('password')),
				 'phone' => $this->input->post('phone'),
				 'user' => $this->input->post('user'),
				 'status' => "1",
				'date'=>$date,
            );
            
            $receiver =$this->input->post('email');
            
                
                //send confirm mail
				
                if($this->Account_Model->sendEmail($receiver)){
					$this->Account_Model->insertUser($data);
                    //redirect('Login_Controller/index');
                    //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please login. </div>');
					 redirect(base_url().'account/login');
                }else{
                    
                    //$error = "Error, Cannot insert new user details!";
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again or Contact info@tradpeek.com</div>');
					 redirect(base_url().'account/register');
                }
                
                
            
        }
        
    }
    
    function confirmEmail($hashcode){
        if($this->Account_Model->verifyEmail($hashcode)){
            $this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
           redirect(base_url().'account/login');
        }else{
            $this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
           redirect(base_url().'account/register');
        }
    }


public function vendors(){
		
		$data['title'] = 'Vendor Registeration - Tradpeek Plus';
		
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		
		
        $this->form_validation->set_rules('fname','First name', 'required');
        $this->form_validation->set_rules('lname','Last name', 'required');
		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[vendors.email]');
        $this->form_validation->set_message('is_unique', 'The %s already exist');
        $this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('phone','Phone Number', 'trim|required');
		$this->form_validation->set_rules('shname','Shop Name', 'trim|required');
		$this->form_validation->set_rules('bname','Bank Name', 'trim|required');
		$this->form_validation->set_rules('accname','Account Name', 'trim|required');
		$this->form_validation->set_rules('accnum','Account Number', 'trim|required');
		
        
        if($this->form_validation->run() == false){
            		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('vendors', $data);
		 $this->load->view('templates/footer');
                   
            
        }else{
            //call db
			$date = date("Y-m-d H:i:s");
			$ven_id=rand(00000,99999); 
            $data = array(
                'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				
				'ven_id' => $ven_id,
                'email' => $this->input->post('email'),
               
                'password' => md5($this->input->post('password')),
				 'phone' => $this->input->post('phone'),
				 'shname' => $this->input->post('shname'),
				 'bname' => $this->input->post('bname'),
				 'accname' => $this->input->post('accname'),
				 'accnum' => $this->input->post('accnum'),
				 'status' => "1",
				'date'=>$date,
            );
            
            $receiver =$this->input->post('email');
            
                
                //send confirm mail
				
                if($this->Account_Model->sendEmail($receiver)){
					$this->Account_Model->newVendor($data);
                    //redirect('Login_Controller/index');
                    //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                    $this->session->set_flashdata('reg-msg', '<div class="alert alert-success text-center">Successfully registered. Please login. </div>');
					 redirect(base_url().'account/vendors');
                }else{
                    
                    //$error = "Error, Cannot insert new user details!";
                    $this->session->set_flashdata('reg-msg', '<div class="alert alert-danger text-center">Failed!! Please try again or Contact info@tradpeek.com</div>');
					 redirect(base_url().'account/vendors');
                }
                
                
            
        }
        
    }



public function login(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model'); 
		 $this->load->helper('url_helper');
		
		
        $data['title'] = 'Login';
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
                    
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('login', $data);
		 $this->load->view('templates/footer');
                  
        }else{
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            if($this->Account_Model->loginUser($email, $password)){
                
                $userInfo = $this->Account_Model->loginUser($email, $password);
            
                
                    
                
                
$this->session->set_flashdata('login_msg', '<div class="alert alert-success text-center">Successfully logged in</div>');
                //$this->load->view('header');
                //$this->load->view('tasks_view');
                //$this->load->view('footer');
				if( $this->session->userdata('redirect_back') ) {
    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
    $this->session->unset_userdata('redirect_back');
    redirect( $redirect_url );
}
				else{
                redirect(base_url().'account/index');
				}
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again. make sure you verifed your account throught the email sent to you</div>');
                   
                    redirect(base_url().'account/login');
                   
                
            }
        }
    }
	

public function vendors_login(){
	
	
		
        $data['title'] = 'Vendors Login - Tradpeek Plus';
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
                    
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('vendors', $data);
		 $this->load->view('templates/footer');
                  
        }else{
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            if($this->Account_Model->loginVendor($email, $password)){
                
                $userInfo = $this->Account_Model->loginVendor($email, $password);
            
                
                    
                
                
$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully logged in</div>');
                //$this->load->view('header');
                //$this->load->view('tasks_view');
                //$this->load->view('footer');
				if( $this->session->userdata('redirect_back') ) {
    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
    $this->session->unset_userdata('redirect_back');
    redirect( $redirect_url );
}
				else{
                redirect(base_url().'vendor/index');
				}
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again or Cotact the Admin on info@tradpeek.com</div>');
                   
                    redirect(base_url().'account/vendors');
                   
                
            }
        }
    }

    
   

public function index(){
	
	
         $data['title'] = 'Tradpeek Plus - Dashboard.';
		 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
      
        if(isset($_SESSION['user_id'])){
			$this->load->helper('url');
			$user_id = $this->session->userdata('user_id');
       $data['user']=$this->Account_Model->get_user();
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/index', $data);
		
		$this->load->view('dashboard/templates/footer');
        }else{
            redirect(base_url().'account/login');
        }
        
    }
    
    public function logout(){
		
		
        $this->load->library('session');
         
        
        if($this->session->has_userdata('user_id')){
            //$this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            //unset($_SESSION['user_data']);
             
            redirect(base_url().'home/index');
        }
        
        
    }

public function unique_code()
        {
		$data['title'] = 'Tradpeek Plus Dashboard';
		$data['user']=$this->Account_Model->get_user();
		
		$this->form_validation->set_rules('code','Unique Code', 'required');
		
	
	
        if ($this->form_validation->run() === FALSE)
        {
			
        
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/index', $data);
		
		$this->load->view('dashboard/templates/footer');
		 
		}else{
			
			$code = $this->input->post('code');
	
		if($this->Basket_model->get_code($code)){
			
		redirect(base_url().'basket/details/'.$code);	
			
			
		}else{
	
		
        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! The code is wrong, Please try again</div>');
        
		 redirect(base_url().'account/index');
		}
		 }
		 
        }
		

public function recoverpassword()
{
		 $data['title'] = 'Forgot Passowrd';
 		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/forgotpassword');
        $this->load->view('templates/footer');
}

public function doforget()
{		$data['title'] = 'Forgot Passowrd';
		$this->load->helper('url');
		$email= $this->input->post('email');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required|trim');
	
	if ($this->form_validation->run() == FALSE)
{
		
 		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/forgotpassword');
        $this->load->view('templates/footer');
}
	else
{
		$data['title'] = 'Passowrd Sent';
		$this-> Account_Model->reset_password($email);	
		$this->session->set_flashdata('message','Password has been reset and has been sent to email');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/forgotpassword');
        $this->load->view('templates/footer');
}
}



  public function ForgotPassword1()
   {
         $email = $this->input->post('email');      
         $findemail = $this->Account_Model->ForgotPassword($email);  
         if($findemail){
          $this->Account_Model->sendpassword($findemail);        
           }else{
          $this->session->set_flashdata('login_msg',' Email not found!');
          redirect(base_url().'account/login','refresh');
      }
   }


public function forgotpassword()
{		$data['title'] = 'Forgot Passowrd';
		$this->load->helper('url');
		$email= $this->input->post('email');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required|trim');
	
	if ($this->form_validation->run() == FALSE)
{
		
 		
        $this->load->view('forgotpassword', $data);
       
}
	else
{
		$email= $this->input->post('email');
		if($user = $this->Account_Model->get_user_by_email($email)){
			
			foreach($user as $users) { 
			$slug = md5($users->user_id);
			$user_id=$users->user_id;
		
			
			if($this->Account_Model->send_email($email,$slug,$user_id)){
			
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">An email has been sent to you</div>');
           redirect(base_url().'account/forgotpassword');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email could not be sent, please try again.</div>');
           redirect(base_url().'account/forgotpassword');
        }}
		}else{
			
		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email address is not found. Please try to re-register.</div>');
           redirect(base_url().'account/register');	
			
		}

}
}


public function reset_password()
{		$data['title'] = 'Change Passowrd';

		$data['user_id']=$user_id = $this->uri->segment(4);
		$data['hash']=$hash = $this->uri->segment(3);
	
		$this->load->helper('url');
		$email= $this->input->post('email');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
	
	if ($this->form_validation->run() == FALSE)
{
		
 		
        $this->load->view('reset_password', $data);
       
}
	else
	
{	
	$user_id = $this->uri->segment(4);
	$user = $this->Account_Model->get_slug($user_id);
			
			foreach($user as $users) { 
			$slug = md5($users->user_id);
			$hash = $this->uri->segment(3);
		
			
			if($hash != $slug){
			
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">The Code from the email does not match</div>');
           redirect(base_url().'account/reset_password');
        }else{
			
			
			$data = array(
        		
                'password' => md5($this->input->post('password')),
				
		
		
		
    );

	$user_id = $this->uri->segment(4);
		if($this->Account_Model->update_password($user_id,$data)){
			
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Password has been updated. please Login</div>');
           redirect(base_url().'account/login');
        
		}else{
			
		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">An Error occoured Please try again later</div>');
           redirect(base_url().'account/reset_password');	
			
		}	
	
		}}
}
}
   
   public function success()
   {
	   $data['title'] = 'Verify Your Email';
	   $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/success');
        $this->load->view('templates/footer');
	   
	   
	   
	   }
	   
public function verify_success()
   {
	   $data['title'] = 'Verify Your Email';
	   $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/verify_success');
        $this->load->view('templates/footer');
	   
	   
	   
	   }
	   
public function profile ()
{
		$data['title'] = 'My Profile - Tradpeek Plus';
		$user_id = $this->uri->segment(3);
		$data['user']=$this->Account_Model->get_user();
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/profile', $data);
		
		$this->load->view('dashboard/templates/footer');	
	
	
}
	   
	  
public function edit_profile()
    {
		
       
        
        $data['title'] = 'Edit Profile - Dashboard.';
		
			$user_id = $this->session->userdata('user_id');
       $data['user']=$this->Account_Model->get_user();
        
  		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required');
		$this->form_validation->set_rules('country','Country', 'required');
		$this->form_validation->set_rules('state','State', 'required');
		$this->form_validation->set_rules('address','Address', 'required');
		$this->form_validation->set_rules('user','User Type', 'required');
      
	
        if ($this->form_validation->run() === FALSE)
        {
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/edit-profile', $data);
		
		$this->load->view('dashboard/templates/footer');	
 
        }
        else
		
        {
			$user_id = $this->session->userdata('user_id');       
       		 
            $data = array(
				
                'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'phone' => $this->input->post('phone'),
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
				'address' => $this->input->post('address'),
				'user' => $this->input->post('user'),
				
				
            );
			 
		

		$this->Account_Model->update_profile($user_id,$data);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have Updated Your profile </div>');
		 
		 
        
     redirect( base_url() . 'account/profile/'.$user_id);   
 
		
			
		
        }
    
	}
	
public function order()
        {
		$data['title'] = 'Oder Details';
		 $code = $this->uri->segment(3);	
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Basket_model->get_order($code);
		 
		 $this->form_validation->set_rules('ownprice','Your Price', 'required');
      
	
        if ($this->form_validation->run() === FALSE)
        {
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/order-details', $data);
		 $this->load->view('dashboard/templates/footer');
		 
		}else{
			 
		    $code = $this->uri->segment(3);	
       		 
            $data = array(
				
                'ownprice' => $this->input->post('ownprice'),
				
				
            );
			 
		

		$this->Account_Model->update_price($code,$data);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have Updated your order Price </div>');
		 
		 
        
     redirect( base_url() . 'account/order/'.$code);   	 
			 
		 }
        }
		


public function celebrant_orders()
        {
		$data['title'] = 'Oder Details';
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Account_Model->get_order();
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/celebrant-order');
		 $this->load->view('dashboard/templates/footer');
        }

public function order_history()
        {
		$data['title'] = 'Oder History | Tradpeek Plus';
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Account_Model->get_order_history();
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/order-history');
		 $this->load->view('dashboard/templates/footer');
        }

public function order_details()
        {
			$order_id = $this->uri->segment(3);
		$data['title'] = 'Order History | Tradpeek Plus';
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Account_Model->get_order_details($order_id);
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/order-history-details');
		 $this->load->view('dashboard/templates/footer');
        }


public function cancel_order()
        {
		
		 $order_id = $this->uri->segment(3);
		
           
		

		$this->Account_Model->cancel_order($order_id);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have deleted an Order</div>');
		 
		 
        
     redirect( base_url() . 'account/order_history');   	 
			 
		 
        }
	


}