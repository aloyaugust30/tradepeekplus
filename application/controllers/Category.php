<?php
class Category extends CI_Controller {

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

        }

 	
	
  public function product()
        {
			
	$category = $this->uri->segment(3);
      
		 
        if (empty($category))
        {
            show_404();
        }
		$cat = str_replace("-"," ",$category);
		
        $data['title'] = $cat . ' - Tradpeek Plus ';
		$data['cat'] = $cat ;
 		
		$config['total_rows'] = $this->Product_model->totalcategory($cat);
  
  $config['base_url'] = base_url()."category/product/";
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
   

  $query = $this->Product_model->get_category($cat,20,$this->uri->segment(3));
  
  $data['product'] = null;
  
  if($query){
   $data['product'] =  $query;
  }
 		
 
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('categories', $data);
		$this->load->view('templates/side');
        $this->load->view('templates/footer');
		
        }
		
		
public function category()
        {
			
	$category = $this->uri->segment(3);
      
		 
        if (empty($category))
        {
            show_404();
        }
		$cat = str_replace("-"," ",$category);
		
        $data['title'] = $cat . ' - Tradpeek Plus ';
		$data['cat'] = $cat ;
 		
		$config['total_rows'] = $this->Product_model->totalcat($cat);
  
  $config['base_url'] = base_url()."category/category/";
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
   

  $query = $this->Product_model->get_cat($cat,20,$this->uri->segment(3));
  
  $data['product'] = null;
  
  if($query){
   $data['product'] =  $query;
  }
 		
 
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('category', $data);
		$this->load->view('templates/side');
        $this->load->view('templates/footer');
		
        }
		
		
		
    
    
}