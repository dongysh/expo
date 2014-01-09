<?
/**
 * 
 */
class pay_type_model extends CI_Model {
	
	var $table = 'pay_types';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function find() {
		return $this->db->get($this->table);
	}
	
	function find_by_id($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}
}
