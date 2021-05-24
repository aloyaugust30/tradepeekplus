<?php
class Vendor extends CI_Controller {

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
				 $this->load->model('Vendor_model');

        }

        

 public function logout(){
		
		
        $this->load->library('session');
         
        
        if($this->session->has_userdata('ven_id')){
            //$this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            //unset($_SESSION['user_data']);
             
            redirect(base_url().'account/vendors');
        }
        
        
    }

 
 public function index()
        {
		             
        $data['title'] = 'Vendor Dashboard - Tradpeek Plus';
		
	
		
        $this->load->view('vendor/templates/header', $data);
		$this->load->view('vendor/templates/nav');
		
        $this->load->view('vendor/index', $data);
		
        $this->load->view('vendor/templates/footer');
        }
		
		

 public function new_product(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Vendor_model'); 
		 $this->load->helper('url_helper');
		
		
		
        $data['title'] = 'New Product';
		 $this->form_validation->set_rules('title','Product Title', 'trim|required');
        $this->form_validation->set_rules('price','Price', 'trim|required');
        $this->form_validation->set_rules('quantity','Quantity', 'trim|required');
		$this->form_validation->set_rules('description','Description', 'trim|required');
		$this->form_validation->set_rules('keyword','keyword', 'trim|required');
		$this->form_validation->set_rules('model','Model', 'trim|required');
		$this->form_validation->set_rules('category','Category', 'trim|required');
		$this->form_validation->set_rules('sub_category','Sub Category', 'trim|required');
		
        
        if($this->form_validation->run() == false){
                   
                    $this->load->view('vendor/templates/header', $data);
					$this->load->view('vendor/templates/nav');
                    $this->load->view('vendor/new-product');
                    $this->load->view('vendor/templates/footer');
                  
        }else{
            
            $config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['overwrite'] = false;
			$config['max_size']             = 1500;
			
			$new_name = rand(0000, 9999).$_FILES["pic1"]['name'];
			$config['file_name'] = $new_name; 

			$this->load->library('upload', $config);
			
				
							
			if ( ! $this->upload->do_upload('pic1')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('vendor/templates/header', $data);
					$this->load->view('vendor/templates/nav');
                    $this->load->view('vendor/new-product', $error);
                    $this->load->view('vendor/templates/footer');
			}else{
								
					$image=$this->upload->data();
					
				
			 
        $config2['upload_path'] = './uploads/';   // Directory 
	$config2['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config2['max_size']             = 1500;
	
	$new_name2 = rand(0000, 9999).$_FILES["pic2"]['name'];
	$config2['file_name'] = $new_name2;


	$this->upload->initialize($config2); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic2');  // File Name
	$image1=$this->upload->data(); // store the name of the file 
		
	
	
	
	$config3['upload_path'] = './uploads/';   // Directory 
	$config3['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config3['max_size']             = 1500;

	$new_name3 = rand(0000, 9999).$_FILES["pic3"]['name'];
	$config3['file_name'] = $new_name3;


	$this->upload->initialize($config3); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic3');  // File Name
	$image2=$this->upload->data(); // store the name of the file 
	

	
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
	$date = date("Y-m-d H:i:s");
	
	$featured = "No";
	$prod_id= rand(00000000,99999999);
	$ven_id = $this->session->userdata('ven_id');
	
 
    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
		'price' => $this->input->post('price'),
        'quantity' => $this->input->post('quantity'),
		'description' => $this->input->post('description'),
		'model' => $this->input->post('model'),
		'category' => $this->input->post('category'),
		'sub_category' => $this->input->post('sub_category'),
		'date' => $date,
		'ven_id' => $ven_id,
		'featured' => $featured,
		'pic1' => $image['file_name'],
		'pic2' => $image1['file_name'],
		'pic3' => $image2['file_name'],
		'prod_id'=>$prod_id,
		
		
		
    );
if ($this->input->post('meta-description')) $data['meta_desc'] = $this->input->post('meta-description');
if ($this->input->post('keyword')) $data['keyword'] = $this->input->post('keyword');
if ($this->input->post('manufacturer')) $data['manufacturer'] = $this->input->post('manufacturer');


		$this->Vendor_model->set_product($data);
    
 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product successfully added</div>'); 
		
		
        redirect(base_url("vendor/new_product"));
            
                

			}
		}
 }
 
 
 
 public function edit_product(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Vendor_model');
		$this->load->model('product_model'); 
		 $this->load->helper('url_helper');
	
	$prod_id = $this->uri->segment(3);	
	$data['product']=$this->product_model->get_product_by_id($prod_id);
		
        $data['title'] = 'Edit Product - Tradpeek Plus';
		 $this->form_validation->set_rules('title','Product Title', 'trim|required');
        $this->form_validation->set_rules('price','Price', 'trim|required');
        $this->form_validation->set_rules('quantity','Quantity', 'trim|required');
		$this->form_validation->set_rules('description','Description', 'trim|required');
		$this->form_validation->set_rules('keyword','keyword', 'trim|required');
		$this->form_validation->set_rules('model','Model', 'trim|required');
		$this->form_validation->set_rules('category','Category', 'trim|required');
		$this->form_validation->set_rules('sub_category','Sub Category', 'trim|required');
		
        
        if($this->form_validation->run() == false){
                   
                    $this->load->view('vendor/templates/header', $data);
					$this->load->view('vendor/templates/nav');
                    $this->load->view('vendor/edit-product', $data);
                    $this->load->view('vendor/templates/footer');
                  
        }else{
            
            $config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['overwrite'] = false;
			$config['max_size']             = 1500;
			
			$new_name = rand(0000, 9999).$_FILES["pic1"]['name'];
			$config['file_name'] = $new_name; 

			$this->load->library('upload', $config);
			
				
							
			if ( ! $this->upload->do_upload('pic1')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('vendor/templates/header', $data);
					$this->load->view('vendor/templates/nav');
                    $this->load->view('vendor/edit-product', $error);
                    $this->load->view('vendor/templates/footer');
			}else{
								
					$image=$this->upload->data();
					
				
			 
        $config2['upload_path'] = './uploads/';   // Directory 
	$config2['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config2['max_size']             = 1500;
	
	$new_name2 = rand(0000, 9999).$_FILES["pic2"]['name'];
	$config2['file_name'] = $new_name2;


	$this->upload->initialize($config2); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic2');  // File Name
	$image1=$this->upload->data(); // store the name of the file 
		
	
	
	
	$config3['upload_path'] = './uploads/';   // Directory 
	$config3['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config3['max_size']             = 1500;

	$new_name3 = rand(0000, 9999).$_FILES["pic3"]['name'];
	$config3['file_name'] = $new_name3;


	$this->upload->initialize($config3); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic3');  // File Name
	$image2=$this->upload->data(); // store the name of the file 
	

	
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
	
	
	$featured = "No";
	$prod_id = $this->uri->segment(3);
	
 
    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
		'price' => $this->input->post('price'),
        'quantity' => $this->input->post('quantity'),
		'description' => $this->input->post('description'),
		'model' => $this->input->post('model'),
		'category' => $this->input->post('category'),
		'sub_category' => $this->input->post('sub_category'),
		'meta_desc' => $this->input->post('meta-description'),
		'keyword' => $this->input->post('keyword'),
		
		'featured' => $featured,
		'pic1' => $image['file_name'],
		'pic2' => $image1['file_name'],
		'pic3' => $image2['file_name'],
		
	
		
    );

		$this->Vendor_model->update_product($prod_id,$data);
    
 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product successfully updated</div>'); 
		
		
        redirect(base_url("vendor/edit_product/".$prod_id));
            
                

			}
		}
 }
 
 
 
 public function products()
        {
		$data['title'] = 'All Products - Tradpeek Plus';
			
      
	
	$config['total_rows'] = $this->Vendor_model->totalproducts();
  
  $config['base_url'] = base_url()."vendor/products/";
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
   

  $query = $this->Vendor_model->all_products(20,$this->uri->segment(3));
  
  $data['product'] = null;
  
  if($query){
   $data['product'] =  $query;
  }
        $this->load->view('vendor/templates/header', $data);
		$this->load->view('vendor/templates/nav');
		$this->load->view('vendor/all-products', $data);
		$this->load->view('vendor/templates/footer');

        }		

public function profile ()
{
		$data['title'] = 'My Profile - Tradpeek Plus';
		$ven_id = $this->uri->segment(3);
		$data['user']=$this->Vendor_model->get_user();
		
        $this->load->view('vendor/templates/header', $data);
		$this->load->view('vendor/templates/nav');
		$this->load->view('vendor/profile', $data);
		$this->load->view('vendor/templates/footer');	
	
	
}
 

public function edit_profile()
    {
		
       
        
        $data['title'] = 'Edit Profile - Dashboard.';
		
			$ven_id = $this->session->userdata('ven_id');
       $data['user']=$this->Vendor_model->get_user();
        
  		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required');
		$this->form_validation->set_rules('shname','Shop Name', 'required');
		$this->form_validation->set_rules('bname','Bank', 'required');
		$this->form_validation->set_rules('accname','Account Name', 'required');
		$this->form_validation->set_rules('accnum','Account Number', 'required');
      
	
        if ($this->form_validation->run() === FALSE)
        {
         $this->load->view('vendor/templates/header', $data);
		$this->load->view('vendor/templates/nav');
		$this->load->view('vendor/edit-profile', $data);
		$this->load->view('vendor/templates/footer');	
 
        }
        else
		
        {
			$ven_id = $this->session->userdata('ven_id');       
       		 
            $data = array(
				
                'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'phone' => $this->input->post('phone'),
				'shname' => $this->input->post('shname'),
				'bname' => $this->input->post('bname'),
				'accname' => $this->input->post('accname'),
				'accnum' => $this->input->post('accnum'),
				
				
				
            );
			 
		

		$this->Vendor_model->update_profile($ven_id,$data);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have Updated Your profile </div>');
		 
		 
        
     redirect( base_url() . 'vendor/profile/'.$ven_id);   
 
		
			
		
        }
    
	}
	
public function orders()
        {
		$data['title'] = 'Oder History | Tradpeek Plus';
		 
		 $data['order'] = $this->Vendor_model->get_order_history();
          $this->load->view('vendor/templates/header', $data);
		$this->load->view('vendor/templates/nav');
		$this->load->view('vendor/order-history', $data);
		$this->load->view('vendor/templates/footer');
        }

public function order_details()
        {
			$order_id = $this->uri->segment(3);
		$data['title'] = 'Order History | Tradpeek Plus';
	
		 $data['order'] = $this->Vendor_model->get_order_details($order_id);
          $this->load->view('vendor/templates/header', $data);
		$this->load->view('vendor/templates/nav');
		$this->load->view('vendor/order-history-details', $data);
		$this->load->view('vendor/templates/footer');
        }
		
			
 
    
}