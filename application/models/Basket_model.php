<?php
class Basket_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
				
        }
		
		
public function insert_new($data){
        
        return $this->db->insert('basket',$data);
      
    }


public function get_order($code)
    {
		
	  
		$this->db->select('*');
		$this->db->from('basket');
		$this->db->join('product', 'product.prod_id = basket.prod_id','left');
		$this->db->join('vendors', 'product.ven_id = vendors.ven_id','left');
		$this->db->where('code',$code);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }

public function get_code($code)
    {
		 
		$this->db->select('*');
		$this->db->from('basket');
		$this->db->join('product', 'product.prod_id = basket.prod_id','left');
		$this->db->where('code',$code);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }


}