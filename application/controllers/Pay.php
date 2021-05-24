<?php
defined('BASEPATH') OR exit("Access Denied");//remove this line if not using with CodeIgniter


class Pay extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Billing_model');
		 $this->load->model('Account_Model');
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->helper('url_helper');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->database();
        $this->load->library('paystack', [
            'secret_key'=>'sk_test_6b796a486f3b32e980a0345aebd05435ea8db7cb', 
            'public_key'=>'pk_test_52dd110512f421f91145b499ca55c344a9273e76']);
    }
    
  
    /**
     * Initialise a transaction by getting only the authorised URL returned
     */
    public function getAuthURL(){
		
		
		
		
		$data['title'] = 'Make Payment';
		
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		
		 $user_id = $this->session->userdata('user_id'); 
		$data['user'] = $this->Account_Model->get_user($user_id);
       
        $this->form_validation->set_rules('shipping','Shipping Option', 'trim|required');
        $this->form_validation->set_rules('total','Total Amount', 'trim|required');
      
		
		
			
        if($this->form_validation->run() == false){
            		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('billing-address', $data);
		 $this->load->view('templates/footer');
            
        }else{
		
      
                
  $user_id = $this->session->userdata('user_id');   
//get customer email
$email = $this->session->userdata('email'); 
$amount = $this->input->post('total');

$length = 8;

$order_id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);


$order = array(
			'user_id'=>$this->session->userdata('user_id'),
			'order_id'=>$order_id,
			'shipping' => $this->input->post('shipping'),
			'status'=>"pending",
			'cost' => $amount,
			'date' => date("Y-m-d H:i:s"),
			);

 
			
			$this->Billing_model->insert_order($order); 



$amount2 = $amount * 100;
 
			if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
			$data = array(
			'user_id'=>$this->session->userdata('user_id'),
			'order_id'=>$order_id,
			'prod_id' => $item['id'],
			'title' => $item['name'],
			'qty' => $item['qty'],
			'price' => $item['price'],
			'ven_id' => $item['ven_id'],
			'date' => date("Y-m-d H:i:s"),
			);

 
			
			$this->Billing_model->insert_order_details($data);        
           	endforeach;
endif;
            //init($ref, $amount_in_kobo, $email, $metadata_arr=[], $callback_url="", $return_obj=false)
        $url = $this->paystack->init($order_id, $amount2, $email, base_url('pay/callback'), FALSE);
        
        //$url ? header("Location: {$url}") : "";
        $url ? redirect($url) : "";   
            
        

		}
    }
    
    
   
    public function verify($ref){
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		
        //verifyTransaction($ref) will return an array of verification details or FALSE on failure
        $ver_info = $this->paystack->verifyTransaction($ref);
        
        //do something if verification is successful e.g. save authorisation code
        if($ver_info && ($ver_info->status = TRUE) && ($ver_info->data->status == "success")){
            $auth_code = $ver_info->data->authorization->authorization_code;
            
            //do something with $auth_code. $auth_code can be used to charge the customer next time
           date_default_timezone_set('Africa/Lagos');
			$pay_date = date("Y-m-d H:i:s");
			
			$data = array(
                
				'status'=>"paid",
				'order_status'=>"pending",
				'pay_date'=>$pay_date,
            );
			
			 
			
			$this->Billing_model->verify_status($ref,$data);
			$this->session->set_flashdata('success-msg', '<div class="alert alert-success text-center">Your Payment was successful</div>');
			$order_id = $this->input->get('reference', TRUE);

$data['order'] = $order_id;

		$data['title']='Payment Successful';
		$this->cart->destroy();
		$user_id = $this->session->userdata('user_id'); 
		 $data['user']=$this->Account_Model->get_user();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('payment-succss', $data);
		 $this->load->view('templates/footer');
				
        }
        
        else{
            //do something else
			
		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your Payment was not successful. Please Try again later</div>');
		$data['user']=$this->Account_Model->get_user();
		
		        $data['title'] = 'Payment Details';
 
 		$data['cart']  = $this->cart->contents();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('payment', $data);
		
        $this->load->view('templates/footer');	
        }
    }
    
   
    
    public function callback(){
        $trxref = $this->input->get('trxref', TRUE);
        $ref = $this->input->get('reference', TRUE);
        
        //do something e.g. verify the transaction
        if($trxref === $ref){
            $this->verify($trxref);
        }
    }
    
  
    
  
}