<?php
class Admin_model extends CI_Model {

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
	
	
			$this->db->limit($limit, $offset);
			
		  $query = $this->db->get('product');
           return $query->result_array();
 }

 function totalproducts(){
  return $this->db->count_all_results('product');
 }
 
  function get_vendors()
    {
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT shname FROM vendors');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }
	
 public function update_product($prod_id,$data)
    {		
          $this->db->where('prod_id', $prod_id);
          return $this->db->update('product', $data);
        
    }
public function delete_product($prod_id)
    {
        $this->db->where('prod_id', $prod_id);
        return $this->db->delete('product');
    }	
	
function all_users($limit=null,$offset=NULL){
	
	
			$this->db->limit($limit, $offset);
			
		  $query = $this->db->get('user_table');
           return $query->result_array();
 }

 function totalusers(){
  return $this->db->count_all_results('user_table');
 }

 public function get_user($user_id)
    {
	
			$this->db->where('user_id', $user_id);
            $query = $this->db->get('user_table');
            return $query->result_array();
       
    } 

public function update_user($user_id,$data)
    {		
          $this->db->where('user_id', $user_id);
          return $this->db->update('user_table', $data);
        
    }

public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('user_table');
    }

function all_vendors($limit=null,$offset=NULL){
	
	
			$this->db->limit($limit, $offset);
			
		  $query = $this->db->get('vendors');
           return $query->result_array();
 }

 function totalvendors(){
  return $this->db->count_all_results('vendors');
 }


 public function get_vendor($ven_id)
    {
	
			$this->db->where('ven_id', $ven_id);
            $query = $this->db->get('vendors');
            return $query->result_array();
       
    } 

public function update_vendor($ven_id,$data)
    {		
          $this->db->where('ven_id', $ven_id);
          return $this->db->update('vendors', $data);
        
    }

public function delete_vendor($ven_id)
    {
        $this->db->where('ven_id', $ven_id);
        return $this->db->delete('vendors');
    }

function all_orders($limit=null,$offset=NULL){
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
		  $query = $this->db->get('order');
           return $query->result_array();
 }

 function totalorders(){
  return $this->db->count_all_results('order');
 }


public function get_order_details($order_id)
    {
		
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('order_details', 'order_details.order_id = order.order_id','left');
		$this->db->join('product', 'order_details.prod_id = product.prod_id','left');
	$this->db->where('order.order_id', $order_id);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }

 
}