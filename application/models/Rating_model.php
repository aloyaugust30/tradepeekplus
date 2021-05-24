<?php
class Rating_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
				
        }
		
		
public function add_rating($data){
        
        return $this->db->insert('rating',$data);
      
    }


public function get_rate($prod_id)
    {
		
	  
		$this->db->select('*');
		$this->db->from('rating');
		$this->db->join('product', 'product.prod_id = rating.prod_id','left');
		$this->db->where('rating.prod_id',$prod_id);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }
public function get_rating_number($prod_id)
{
	
    return $this->db
        ->where('prod_id', $prod_id)
		->count_all_results('rating');
}
	

public function get_rating_total($prod_id)
{
		
 	$this->db->select_avg('rate');
 	$this->db->from('rating');
	$this->db->join('product', 'product.prod_id = rating.prod_id','left');
	$this->db->where('rating.prod_id',$prod_id);
	$result = $this->db->get()->result_array();
	return $result;
}

public function update_rating($prod_id ,$rate)
    {
      
		
          $this->db->where('prod_id', $prod_id);
          return $this->db->update('product', $rate);
        
    }

}