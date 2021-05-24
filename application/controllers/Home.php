<?php
class Home extends CI_Controller {

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
				$this->load->model('Product_model');
				$this->load->model('Rating_model');

        }

        public function index()
        {
		
        $data['title'] = 'Tradpeek Plus - Home of The best Aso Ebi';
 		
		
 
 
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
		
        }

        public function celebrants()
        {
		
        $data['title'] = 'Tradpeek Plus - All Products ';
 		
		$config['total_rows'] = $this->Product_model->totalproducts();
  
  $config['base_url'] = base_url()."home/celebrants/";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->Product_model->get_all_products(20,$this->uri->segment(3));
  
  $data['product'] = null;
  
  if($query){
   $data['product'] =  $query;
  }
 
 
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('all-product', $data);
		$this->load->view('templates/side');
        $this->load->view('templates/footer');
		
        }
		
public function friends()
        {
		$data['title'] = 'Friends &amp; Family - Tradpeek Plus';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('friends');
		 $this->load->view('templates/footer');
        }
		
				
	
 public function how()
        {
		$data['title'] = 'How It Works';
			
        
        $this->load->view('how');
	
        }
		
		
	public function contact()
        {
		$data['title'] = 'Contact Us';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('contact');
		 $this->load->view('templates/footer');
        }
		
		
		
 public function payment()
        {
			$this->load->helper('url_helper');
		$data['title'] = 'Become a Host';
			
         $this->load->view('templates/header', $data);
		 $this->load->view('templates/nav');
         $this->load->view('payment');
		 $this->load->view('templates/footer');
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