<?php 
defined("BASEPATH") or exit("no direct script allowed");
class Cart_model extends CI_Model{
	function __construct(){
	parent::__construct();	
		$this->load->library(array('session','cart'));
		$this->load->library('');
		$this->load->helper('url');
		$this->load->database();	
    }
	
	
	public function product_list(){
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('product_id','desc');
		$rs = $this->db->get();
		return $rs->result_array();
	}
	
	public function product_byId($pid){
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('prod_id',$pid);
		$rs = $this->db->get();
		return $rs->row_array();
	}

}
?>