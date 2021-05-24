<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {
	public function __construct(){
		parent :: __construct();
		$this->load->library('cart');
		$this->load->model('Cart_model',"sc");
		$this->load->helper('form');
		$this->load->library('session');
        $this->load->library('form_validation');
		$this->load->helper('url_helper');
		$this->load->helper('text');
	}
	public function index()
	{
		$data['datas'] = $this->sc->product_list();
		$this->load->view('shoppingcart',$data);
	}

	
	function add()
	{
	// Set array for send data.
	
	$data = array(
        'id'      => $this->input->post('id'),
        'qty'     => $this->input->post('quantity'),
        'price'   => $this->input->post('price'),
        'name'    => $this->input->post('name'),
        'image' => $this->input->post('pic1'),
		'desc' => $this->input->post('desc'),
		'slug' => $this->input->post('slug'),
		'ven_id' => $this->input->post('ven_id'),
);

		$this->cart->insert($data);
	// This function add items into cart.
	
	 redirect(base_url().'cart/checkout');
	// This will show insert data in cart.
	}
	
	function update()
	{
	// Set array for send data.
	$rowid = $this->uri->segment(3);
	$data = array(
	
        'rowid' => $rowid,
        'qty'   => $this->input->post('qty'),
);

$this->cart->update($data);
	// This function add items into cart.
	
	 redirect(base_url().'cart/checkout');
	// This will show insert data in cart.
	}

	


	function remove() {
	$rowid = $this->uri->segment(3);
	// Check rowid value.
	if ($rowid==="all"){
	// Destroy data which store in session.
		$this->cart->destroy();
	}else{
	// Destroy selected rowid in session.
	$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);
	// Update cart data, after cancel.
	$this->cart->update($data);
	}
	 redirect(base_url().'cart/checkout');
	// This will show cancel data in cart.
	}




	function update_cart(){
	// Recieve post values,calcute them and update
	$rowid = $_POST['rowid'];
	$price = $_POST['price'];
	$amount = $price * $_POST['qty'];
	$qty = $_POST['qty'];

	$data = array(
		'rowid' => $rowid,
		'price' => $price,
		'amount' => $amount,
		'qty' => $qty
		);
	$this->cart->update($data);
	echo $data['amount'];
	}

function destroy_cart() {
	$this->cart->destroy();
	 redirect(base_url().'cart/checkout');
	// This will show cancel data in cart.
	}

public function checkout()
        {
              
		
        $data['title'] = 'Check Out';
 
 		$data['cart']  = $this->cart->contents();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('checkout', $data);
		
        $this->load->view('templates/footer');
		
        }	
		
				
}

?>