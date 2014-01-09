<?
/**
 * 
 */
class Company_personal_model extends CI_Model {
	
	var $table = 'company_personal';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_user_name_by_company_id($company_id) {
		$this->db->where('company_id', $company_id);
		$result = $this->db->get($this->table);
		if(!$result->num_rows()) {
			return FALSE;
		}
		if($result->row(0)->first_name == '' || $result->row(0)->last_name == '') {
			return FALSE;
		}
		return $result->row(0)->first_name.'&nbsp;'.$result->row(0)->last_name;
	}
	
	function create_from_web($company_id, $save_data) {
		if(trim($save_data['tel4']) != '') {
			$tel3 = trim($save_data['tel3']).'-'.trim($save_data['tel4']);
		}else{
			$tel3 = trim($save_data['tel3']);
		}
		$data = array(
			'company_id' => $company_id,
			'first_name' => trim($save_data['first_name']),
			'last_name' => trim($save_data['last_name']),
			'sex' => trim($save_data['sex']),
			'personal_industry_id' => trim($save_data['personal_industry_id']),
			'tel1' => trim($save_data['tel1']),
			'tel2' => trim($save_data['tel2']),
			'tel3' => $tel3,
			'company_name' => trim($save_data['company_name']),
			'personal_location_id' => trim($save_data['personal_location_id']),
			'created' => @date('Y-m-d H:i:s', time()),
			'last_updated' => @date('Y-m-d H:i:s', time())
		);
		$this->db->insert($this->table, $data);
	}
	
	function find_by_company_id($company_id) {
		$this->db->where('company_id', $company_id);
		return $this->db->get($this->table);
	}
}
