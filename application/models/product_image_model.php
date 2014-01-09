<?
/**
 * 
 */
class Product_image_model extends CI_Model {
	
	var $table = 'product_images';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_one_img($product_id) {
		$this->db->where('product_id', $product_id);
		$this->db->order_by('created', 'desc');
		$this->db->limit(1);
		$result = $this->db->get($this->table);
		if($result->num_rows()) {
			return $result->row(0)->path;
		}
		return false;
	}
	
	function find_by_product_id($product_id) {
		$this->db->where('product_id', $product_id);
		return $this->db->get($this->table);
	}
}
