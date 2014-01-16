<?
/**
 * 
 */
class Company_certification_model extends CI_Model {
	
	var $table = 'company_certifications';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_by_company_id($company_id) {
		$this->db->where('company_id', $company_id);
		return $this->db->get($this->table);
	}
}
