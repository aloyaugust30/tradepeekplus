<?php
class Page extends CI_Controller {

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

       
public function search()
        {
		$data['title'] = 'Search Result - Tradpeek Plus';
			
        $search = $this->input->post('search');
	
	$config['total_rows'] = $this->Product_model->totalsearch($search);
  
  $config['base_url'] = base_url()."page/search/";
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
   

  $query = $this->Product_model->search_product($search,20,$this->uri->segment(3));
  
  $data['product'] = null;
  
  if($query){
   $data['product'] =  $query;
  }
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('search-result');
		$this->load->view('templates/side');
		 $this->load->view('templates/footer');
	
        }		
		
	
 public function how()
        {
		$data['title'] = 'How It Works - Tradpeek Plus';
			
        
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('how-it-works');
		 $this->load->view('templates/footer');
	
        }
		
		
	public function contact()
        {
		$data['title'] = 'Contact Us - Tradpeek plus';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('contact');
		 $this->load->view('templates/footer');
        }
		
		
		
 public function about()
        {
			$this->load->helper('url_helper');
		$data['title'] = 'About Us - Tradpeek Plus';
			
         $this->load->view('templates/header', $data);
		 $this->load->view('templates/nav');
         $this->load->view('about');
		 $this->load->view('templates/footer');
        }
		
	public function delivery()
        {
		$data['title'] = 'Deliverty Information - Tradpeek Plus';
		  $this->load->view('templates/header', $data);	
        
		$this->load->view('templates/nav');
        $this->load->view('delivery');
		 $this->load->view('templates/footer');
        }
		
	public function faq()
        {
		$data['title'] = 'Frequently Asked Questions - Tradpeek plus';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('faq');
		 $this->load->view('templates/footer');
        }

	public function privacy()
        {
		$data['title'] = 'Privacy Policy - Tradpeek plus';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('privacy');
		 $this->load->view('templates/footer');
        }


public function terms()
        {
		$data['title'] = 'Terms and Coditions - Tradpeek plus';
			
         $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('terms');
		 $this->load->view('templates/footer');
        }

    
    
    
}