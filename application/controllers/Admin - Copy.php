<?php
class Admin extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                
                $this->load->helper('url_helper');
				$this->load->helper('text');
				$this->load->library('javascript');
				$this->load->library('session');
 				$this->load->library('pagination');
				 $this->load->library('form_validation');

        }

        public function admin(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Admin_model'); 
		 $this->load->helper('url_helper');
		
		
        $data['title'] = 'Admin Login';
        $this->form_validation->set_rules('username','Username', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
                   
                    $this->load->view('templates/header', $data);
					$this->load->view('templates/nav');
                    $this->load->view('admin');
                    $this->load->view('templates/footer');
                  
        }else{
            
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
            if($this->Admin_model->loginAdmin($username, $password)){
                
                $userInfo = $this->Admin_model->loginAdmin($username, $password);
            
                
                    
                
                
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
                redirect(base_url().'admin/index');
				}
            }else{
                $this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
                    $this->load->view('templates/header', $data);
					$this->load->view('templatse/nav');
                    $this->load->view('admin');
                    $this->load->view('templates/footer');
                
            }
        }
    }
    

 public function admin_logout(){
		
		
        $this->load->library('session');
         
        
        if($this->session->has_userdata('admin_id')){
            //$this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            //unset($_SESSION['user_data']);
             
            redirect(base_url().'admin/index');
        }
        
        
    }

 
 public function index()
        {
		             
        $data['title'] = 'Admin Dashboard';
		
	
		
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/index', $data);
		
        $this->load->view('admin/templates/footer');
        }

 public function new_product(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Admin_model'); 
		 $this->load->helper('url_helper');
		
		
        $data['title'] = 'New Product';
		 $this->form_validation->set_rules('title','Product Title', 'trim|required');
        $this->form_validation->set_rules('price','Price', 'trim|required');
        $this->form_validation->set_rules('quantity','Quantity', 'trim|required');
		$this->form_validation->set_rules('description','Description', 'trim|required');
		$this->form_validation->set_rules('keyword','keyword', 'trim|required');
		$this->form_validation->set_rules('model','Model', 'trim|required');
		$this->form_validation->set_rules('category','Category', 'trim|required');
		
        
        if($this->form_validation->run() == false){
                   
                    $this->load->view('admin/templates/header', $data);
					$this->load->view('admin/templates/nav');
                    $this->load->view('admin/new-product');
                    $this->load->view('admin/templates/footer');
                  
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
				$this->load->view('admin/templates/header', $data);
					$this->load->view('admin/templates/nav');
                    $this->load->view('admin/new-product', $error);
                    $this->load->view('admin/templates/footer');
			}else{
					$this->upload->do_upload('pic1');			
					$image=$this->upload->data();
					$config['image_library'] = 'gd2';
                    $config['source_image'] = $image['full_path']; //get original image
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 450;
                    $config['height'] = 600;
                    $this->load->library('image_lib', $config);
					$this->image_lib->resize($image);	
				
			 
        $config2['upload_path'] = './uploads/';   // Directory 
	$config2['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config2['max_size']             = 1500;
	
	$new_name2 = rand(0000, 9999).$_FILES["pic2"]['name'];
	$config2['file_name'] = $new_name2;


	$this->upload->initialize($config2); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic2');  // File Name
	$image1=$this->upload->data(); // store the name of the file 
	$config2['image_library'] = 'gd2';
	$config2['source_image'] = $image1['full_path']; //get original image
	$config2['maintain_ratio'] = FALSE;
	$config2['width'] = 450;
	$config2['height'] = 600;
	$this->load->library('image_lib', $config2);
	$this->image_lib->resize($image1);	
	
	
	
	$config3['upload_path'] = './uploads/';   // Directory 
	$config3['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config3['max_size']             = 1500;

	$new_name3 = rand(0000, 9999).$_FILES["pic3"]['name'];
	$config3['file_name'] = $new_name3;


	$this->upload->initialize($config3); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic3');  // File Name
	$image2=$this->upload->data(); // store the name of the file 
	$config3['image_library'] = 'gd2';
	$config3['source_image'] = $image2['full_path']; //get original image
	$config3['maintain_ratio'] = FALSE;
	$config3['width'] = 450;
	$config3['height'] = 600;
	$this->load->library('image_lib', $config3);
	$this->image_lib->resize($image2);	

	
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
	$date = date("Y-m-d H:i:s");
	
	$featured = "No";
	$prod_id= rand(00000000,99999999);
	
	
 
    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
		'price' => $this->input->post('price'),
        'quantity' => $this->input->post('quantity'),
		'description' => $this->input->post('description'),
		'model' => $this->input->post('model'),
		'category' => $this->input->post('category'),
		'date' => $date,
		'featured' => $featured,
		'pic1' => $image['file_name'],
		'pic2' => $image1['file_name'],
		'pic3' => $image2['file_name'],
		'prod_id'=>$prod_id,
		
		
		
    );
if ($this->input->post('meta-description')) $data['meta_desc'] = $this->input->post('meta-description');
if ($this->input->post('keyword')) $data['keyword'] = $this->input->post('keyword');
if ($this->input->post('manufacturer')) $data['manufacturer'] = $this->input->post('manufacturer');


		$this->Admin_model->set_product($data);
    
 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product successfully added</div>'); 
		
		
        redirect(base_url("admin/new_product"));
            
                

			}
		}
 }
    
}