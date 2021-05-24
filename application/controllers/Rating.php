<?php
class Rating extends CI_Controller {

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
				$this->load->model('Rating_model');

        }

        public function add()
    {
		
     
		
		$data = array(
        'prod_id' => $prod_id = $this->input->post('prod_id'),
		'fname' => $this->session->userdata('fname'),
        'rate'=> $this->input->post('count2'),
		'review'=>$this->input->post('review'),
		'date'=>date("Y-m-d H:i:s"),
    );
		 $this->rate($prod_id);
		 $this->Rating_model->add_rating($data);
		 
      echo "Form Submitted Succesfully";  
	  
	}
	
	 public function rate($prod_id)
        {
		
		
		$data['rating'] = $this->Rating_model->get_rating_number($prod_id);
		echo $data['rating'];
		
		$data = array(
        'rating' => $rating,
	
    );
	
		$this->Rating_model->update_rating($prod_id ,$data);
      
    }

        public function products()
        {
		
        $data['title'] = 'Tradpeek Plus - All Products ';
 		
		$config['total_rows'] = $this->Product_model->totalproducts();
  
  $config['base_url'] = base_url()."home/products/";
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
        $this->load->view('templates/footer');
		
        }
		
		
	
 public function how()
        {
		$data['title'] = 'How It Works';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('how');
		 $this->load->view('templates/footer');
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