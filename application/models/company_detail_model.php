<?
/**
 * 
 */
class Company_detail_model extends CI_Model {
	
	var $table = 'company_details';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function find_by_company_id($company_id) {
		$this->db->where('company_id', $company_id);
		return $this->db->get($this->table);
	}
	
	function get_logo($company_id) {
		$this->db->where('company_id', $company_id);
		$result = $this->db->get($this->table);
		if($result->num_rows()) {
			return $result->row(0)->path;
		}
		return false;
	}
}
