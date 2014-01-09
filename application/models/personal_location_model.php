<?
/**
 * 
 */
class Personal_location_model extends CI_Model {
	
	var $table = 'personal_locations';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function find_recommend() {
		$this->db->where('recommend', '1');
		return $this->db->get($this->table);
	}
	
	function find() {
		return $this->db->get($this->table);
	}
	
	function get_one($id) {
		$this->db->where('id', $id);
		$result = $this->db->get($this->table);
		return $result->row(0)->title_en;
	}
}
