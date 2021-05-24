<?php
class Product extends CI_Controller {

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

       public function product($slug = NULL)
        {
              
		$data['product'] = $this->Product_model->get_product($slug);
		
		if (empty($data['product']))
        {
                show_404();
        }
        $data['title'] = $data['product']['title'].' - Tradpeek Plus';
 		$prod_id = $data['product']['prod_id'];
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
		
        $this->load->view('product-details', $data);
		
        $this->load->view('templates/footer');
		
        }

        public function places($slug = NULL)
        {
               $data['places_item'] = $this->home_model->get_places($slug);

        if (empty($data['places_item']))
        {
                show_404();
        }

        $data['title'] = $data['places_item']['title'];

        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('places', $data);
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