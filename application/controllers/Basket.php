<?php
class Basket extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                
                $this->load->helper('url_helper');
				$this->load->helper('text');
				$this->load->library('javascript');
				$this->load->library('cart');
				$this->load->library('session');
 				$this->load->library('pagination');
				$this->load->library('form_validation');
				$this->load->model('Basket_model');
				$this->load->model('Account_Model');
				$this->load->model('Rating_model');
				$this->load->library('cart');
if(! $this->session->userdata('user_id')){
			
    $this->load->library('user_agent');  // load user agent library
    // save the redirect_back data from referral url (where user first was prior to login)
    $this->session->set_userdata('redirect_back', $this->agent->referrer() );  
    redirect(base_url().'account/login');
}

        }

       public function product($slug = NULL)
        {
              
		$data['product'] = $this->Product_model->get_product($slug);
		
		if (empty($data['product']))
        {
                show_404();
        }
        $data['title'] = $data['product']['title'];
 
 
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('product-details', $data);
		
        $this->load->view('templates/footer');
		
        }

  public function add()
        {
			
			

		$data['title'] = 'Add to basket as the Celebrant';
		
		$this->form_validation->set_rules('ownprice','Your Price', 'required');
		
	
	
        if ($this->form_validation->run() === FALSE)
        {
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('basket', $data);
		 $this->load->view('templates/footer');
		 
		}else{
			
			$user_id = $this->session->userdata('user_id');
	$length = 8;

$code = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
date_default_timezone_set('Africa/Lagos');
			$date = date("Y-m-d H:i:s");
	$data = array(
        		
				'prod_id' => $this->input->post('prod_id'),
				'ownprice' => $this->input->post('ownprice'),
				'user_id'  => $user_id,
				'code'  => $code,
				'date'  => $date,
  		
		
		
    );

	
		$this->Basket_model->insert_new($data);
		$this->cart->destroy();
		
        
        redirect(base_url().'basket/order/'.$code);
			 
		 
	  }
        }		
		
	
 public function details()
        {
		$data['title'] = 'Oder Details';
		 $code = $this->uri->segment(3);	
		 $data['order'] = $this->Basket_model->get_order($code);
		 $order= $this->Basket_model->get_order($code);
		 foreach($order as $product) {
			
		$prod_id = $product['prod_id']; 
		 }
		 $data['rate'] = $this->Rating_model->get_rate($prod_id);
		
		$data['rating'] = $this->Rating_model->get_rating_number($prod_id);
		
		$rating = $this->Rating_model->get_rating_total($prod_id);
		foreach ($rating as $rate1){
		
		$rating2= $rate1['rate'];
			
		}
		$rate = array(
        'rating' => $rating2,
	
    );
	
		$this->Rating_model->update_rating($prod_id ,$rate);
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('celebrant-order');
		 $this->load->view('templates/footer');
        }
		
		
			
		
		
		
 public function order()
        {
		$data['title'] = 'Oder Details';
		 $code = $this->uri->segment(3);	
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Basket_model->get_order($code);
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/order-details');
		 $this->load->view('dashboard/templates/footer');
        }
		
	public function help()
        {
		$data['title'] = 'Freelancer';
		  $this->load->view('templates/header', $data);	
        
		$this->load->view('templates/nav');
        $this->load->view('help');
		 $this->load->view('templates/footer');
        }
		
	public function faq()
        {
		$data['title'] = 'Frequently Asked Questions';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('faq');
		 $this->load->view('templates/footer');
        }

	public function privacy()
        {
		$data['title'] = 'Privacy Policy';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('privacy');
		 $this->load->view('templates/footer');
        }

    
    
    
}