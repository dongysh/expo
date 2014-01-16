<?
/**
 * 
 */
class Area_model extends CI_Model {
	
	var $table = 'areas';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_en_add($id) {
		if($id == 0) {
			return '';
		}
		$this->db->where('id', $id);
		$result1 = $this->db->get($this->table);
		
		$this->db->where('id', $result1->row(0)->area_id);
		$result2 = $this->db->get($this->table);
		
		$first_1 = substr($result1->row(0)->title_en, 0 ,1);
		$first_2 = substr($result2->row(0)->title_en, 0 ,1);
		$first_1 = strtoupper($first_1);
		$first_2 = strtoupper($first_2);
		
		return $first_1.substr($result1->row(0)->title_en, 1, 99).' '.$first_2.substr($result2->row(0)->title_en, 1, 99);
	}
}
