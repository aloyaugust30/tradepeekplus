<?php
class Billing extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                 $this->load->model('Account_Model');
				$this->load->model('Basket_model'); 
				$this->load->model('Billing_model'); 
                $this->load->helper('url_helper');
				$this->load->library('cart');
				$this->load->library('session');
				$this->load->helper('form');
				$this->load->helper('text');
        		$this->load->library('form_validation');
				$this->load->helper('string');
				$sess_id = $this->session->userdata('user_id');

   if(empty($sess_id))
   {
			
    $this->load->library('user_agent');  // load user agent library
    // save the redirect_back data from referral url (where user first was prior to login)
    $this->session->set_userdata('redirect_back', $this->agent->referrer() );  
    redirect(base_url().'account/login');
}
        }

   
    public function address(){
		
		$data['title'] = 'Billing Details';
		
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url_helper');
		$this->load->helper('text');
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		
		$user_id = $this->session->userdata('user_id');
       $data['user']=$this->Account_Model->get_user();
		
        $this->form_validation->set_rules('fname','First name', 'required');
        $this->form_validation->set_rules('lname','Last name', 'required');
		
      
		$this->form_validation->set_rules('phone','Phone Number', 'trim|required');
		  $this->form_validation->set_rules('country','Country', 'required');
		$this->form_validation->set_rules('state','state', 'trim|required');
		$this->form_validation->set_rules('address','Address', 'trim|required');
		
        
        if($this->form_validation->run() == false){
            		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('billing-address', $data);
		 $this->load->view('templates/footer');
                   
            
        }else{
            //call db
		
			$user_id = $this->session->userdata('user_id');
            $data = array(
                
                'address' => $this->input->post('address'),
				
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
			
            );
            
           
            if($this->Account_Model->update_user_details($user_id,$data)){
                
                //send confirm mail
				
             
					 redirect(base_url().'billing/payment');
                }else{
                    
                    //$error = "Error, Cannot insert new user details!";
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again or Contact Admin@tradpeekplus.com</div>');
					 redirect(base_url().'billing/address');
                }
                
                
          
        }
        
    }
    
   public function payment()
        {
              
		$data['user']=$this->Account_Model->get_user();
        $data['title'] = 'Payment Details';
 
 		$data['cart']  = $this->cart->contents();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('payment', $data);
		
        $this->load->view('templates/footer');
		
        }	







}