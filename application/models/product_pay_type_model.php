<?
/**
 * 
 */
class product_pay_type_model extends CI_Model {
	
	var $table = 'product_pay_types';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function find_by_product_id($product_id) {
		$this->db->select('pay_type_id');
		$this->db->where('product_id', $product_id);
		$result = $this->db->get($this->table);
		$array = array();
		foreach($result->result() as $row) {
			array_push($array, $row->pay_type_id);
		}
		return $array;
	}
}
