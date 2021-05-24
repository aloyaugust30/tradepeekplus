<?php
class Product_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
				
        }
		
		
		public function get_product($slug)
{
		$this->db->select('*');
		$this->db->from('vendors');
		$this->db->join('product', 'vendors.ven_id = product.ven_id');
		$this->db->where('product.slug', $slug);
		
		$query = $this->db->get();
        
        return $query->row_array();
		
		

}

function get_all_products($limit=null,$offset=NULL){
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id','DESC');
		  $query = $this->db->get('product');
           return $query->result_array();
 }
 
  function totalproducts(){
  return $this->db->count_all_results('product');
 }
 
 public function get_product_by_id($prod_id)
    {
		
			$this->db->where('prod_id', $prod_id);
			
            $query = $this->db->get('product');
            return $query->result_array();
        }
 
 function update_product($prod_id,$data){
        
        $this->db->where('prod_id',$prod_id);
        return $this->db->update('product', $data);  
		
    }
	
	
function get_ankara(){
	
	
			$this->db->limit(4);
			$this->db->order_by('id','DESC');
			$this->db->where('category', 'Ankara');
		  $query = $this->db->get('product');
           return $query->result_array();
 }

function get_lace(){
		
			$this->db->limit(4);
			$this->db->order_by('id','DESC');
			$this->db->where('category', 'Lace');
		  $query = $this->db->get('product');
           return $query->result_array();
 }
 
function get_men(){
		
			$this->db->limit(4);
			$this->db->order_by('id','DESC');
			$this->db->where('category', 'For Men');
		  $query = $this->db->get('product');
           return $query->result_array();
 }
 
function get_others(){
		
			$this->db->limit(4);
			$this->db->order_by('id','DESC');
			$this->db->where('category', 'Others');
		  $query = $this->db->get('product');
           return $query->result_array();
 }



 
function get_category($cat, $limit=null,$offset=NULL){
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id','DESC');
			$this->db->where('sub_category', $cat);
		  $query = $this->db->get('product');
           return $query->result_array();
 }

 function totalcategory($cat){
 
	
    return $this->db
        ->where('sub_category', $cat)
        ->count_all_results('product');
 }
 

function get_cat($cat, $limit=null,$offset=NULL){
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id','DESC');
			$this->db->where('category', $cat);
		  $query = $this->db->get('product');
           return $query->result_array();
 }

 function totalcat($cat){
 
	
    return $this->db
        ->where('category', $cat)
        ->count_all_results('product');
 }
	
	
public function set_rating()
{
	date_default_timezone_set("Africa/lagos");
    $this->load->helper('url');
	$user_id = $_SESSION['user_id'];
	$fullname = $_SESSION['fullname'];
    $date = date("Y-m-d H:i:s");
	
	
	
 
    $data = array(
        'user_id' => $user_id,
		'fullname' => $fullname,
        'post_id' => $this->input->post('post_id'),
        'comment' => $this->input->post('comment'),
		'count' => $this->input->post('count2'),
		'date'=>$date
		
		
    );



    return $this->db->insert('rating', $data);
}	
	
	
	
 public function get_rating_by_id($post_id)
    {
		
			$this->db->where('post_id', $post_id);
			$this->db->order_by('id','DESC');
            $query = $this->db->get('rating');
            return $query->result_array();
        }
	
public function get_rating_number($post_id)
{
	
    return $this->db
        ->where('post_id', $post_id)
		->count_all_results('rating');
}


public function get_rating_total($post_id)
{
	
	
	
 	$this->db->select_avg('count');
 	$this->db->where('post_id', $post_id);
	$query = $this->db->get('rating');
	return $query->result_array();
}




public function get_rating_post($post_id)
{
$this->db->select('*');
$this->db->from('rating');
$this->db->join('places', 'rating.post_id = places.post_id');
$this->db->where('rating.post_id', $post_id);

$query = $this->db->get();
}


public function set_rate($parameters)  
    {
       $post_id= $parameters['post_id'];
	   $count= $parameters['rate'];
	   $rate_no=$parameters['rate_no'];
       
        $data = array(
        'review' => json_encode($count),
		'review_no' =>$rate_no,
       
       
		
        );
		
          $this->db->where('post_id', $post_id);
          return $this->db->update('places', $data);
        
    }

function search_product($search = 'default', $limit=null,$offset=NULL){
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id','DESC');
		  $this->db->select('*');
        $this->db->from('product');
        $this->db->like('title',$search);
		$this->db->or_like('description',$search);
		$this->db->or_like('category',$search);
		$this->db->or_like('sub_category',$search);

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
 }
 
  function totalsearch($search = 'default'){
 $sql = "select * from product where title like '%$search%' OR description like '%$search%' OR category like '%$search%' OR sub_category like '%$search%'";
        $query = $this->db->query($sql);
        return $query->num_rows();
 }
 
 
}