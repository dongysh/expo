<?
/**
 * 
 */
class Company_image_model extends CI_Model {
	
	var $table = 'company_images';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function find_by_company_id($company_id) {
		$this->db->where('company_id', $company_id);
		return $this->db->get($this->table);
	}
}
