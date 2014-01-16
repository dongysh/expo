<?
/**
 * 
 */
class Personal_industry_model extends CI_Model {
	
	var $table = 'personal_industries';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
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
