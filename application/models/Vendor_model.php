<?php
class Vendor_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		


public function loginAdmin($username, $password){
        //$this->db->where(array('username' = >$username, 'password' => $password));
        $query = $this->db->get_where('admin_table', array('username' => $username, 'password' => $password));   //status sholud be 1
        
        if($query->num_rows() == 1){
            
            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0] = $row->admin_id;
                $userArr[1] = $row->username;
				
                
            }
            $userdata = array(
                'admin_id' => $userArr[0],
                'username' => $userArr[1],
				
                'logged_in'=> TRUE
            );
            $this->session->set_userdata($userdata);
            
            return $query->result();
        }else{
            return false;
        }
    }

 public function set_product($data){
        
        return $this->db->insert('product',$data);
      
    }

function all_products($limit=null,$offset=NULL){
$ven_id = $this->session->userdata('ven_id');	
	
			$this->db->limit($limit, $offset);
			$this->db->where('ven_id', $ven_id);
		  $query = $this->db->get('product');
           return $query->result_array();
 }

 function totalproducts(){
	 $ven_id = $this->session->userdata('ven_id');
  return $this->db
        ->where('ven_id', $ven_id)
        ->count_all_results('product');
 }
 
  public function get_user()
    {
		$ven_id = $this->session->userdata('ven_id');
      
			$this->db->where('ven_id', $ven_id);
            $query = $this->db->get('vendors');
            return $query->result_array();
       
    }
 public function update_profile($ven_id,$data)  
    {		
          $this->db->where('ven_id', $ven_id);
          return $this->db->update('vendors', $data);
        
    } 
public function get_order_history()
    {
		
		$ven_id = $this->session->userdata('ven_id');
      
			$this->db->select('* ');
		$this->db->from('order');
		$this->db->join('order_details', 'order_details.order_id = order.order_id','left');
	$this->db->where('order_details.ven_id', $ven_id);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }
	

public function get_order_details($order_id)
    {
		
		$this->db->select('* ');
		$this->db->from('order_details');
		$this->db->join('order', 'order_details.order_id = order.order_id','left');
		$this->db->join('product', 'order_details.prod_id = product.prod_id','left');
	$this->db->where('order_details.order_id', $order_id);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }
	
public function update_product($prod_id,$data)
    {		
          $this->db->where('prod_id', $prod_id);
          return $this->db->update('product', $data);
        
    }	
	
}