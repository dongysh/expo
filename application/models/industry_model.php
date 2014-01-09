<?
/**
 * 
 */
class Industry_model extends CI_Model {
	
	var $table = 'industries';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_lv1_and_lv2() {
		$this->db->select('id, title, title_en');
		$this->db->where('level', '1');
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		$result_array = $result->result_array();
		foreach($result_array as $key=>$row) {
			$result_array[$key]['lv2_info'] = array();
			$lv2_result = $this->get_by_industry_id($result_array[$key]['id']);
			array_push($result_array[$key]['lv2_info'], $lv2_result);
		}
		return $result_array;
	}
	
	function get_lv3_and_lv4($industry_id) {
		$this->db->select('id, title, title_en');
		$this->db->where('level', '3');
		$this->db->where('industry_id', $industry_id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		$result_array = $result->result_array();
		foreach($result_array as $key=>$row) {
			$result_array[$key]['lv2_info'] = array();
			$lv2_result = $this->get_by_industry_id($result_array[$key]['id']);
			array_push($result_array[$key]['lv2_info'], $lv2_result);
		}
		return $result_array;
	}
	
	function get_lv_now($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result1 = $this->db->get($this->table);
		$this->db->where('id', $result1->row(0)->industry_id);
		$this->db->where('available', '1');
		$result2 = $this->db->get($this->table);
		$this->db->where('industry_id', $result2->row(0)->id);
		$this->db->where('available', '1');
		$result3 = $this->db->get($this->table);
		return $result3->result_array();
	}
	
	function get_by_industry_id($industry_id) {
		$this->db->select('id, title, title_en');
		$this->db->where('industry_id', $industry_id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	
	function check_level($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		if($result->num_rows()) {
			return $result->row(0)->level;
		}else{
			return false;
		}	
	}
	
	function find_title_en($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		if($result->num_rows()) {
			return $result->row(0)->title_en;
		}else{
			return false;
		}	
	}
	
	function find_parent_title_en($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		$this->db->where('id', $result->row(0)->industry_id);
		$result1 = $this->db->get($this->table);
		return $result1->row(0)->title_en;
	}
	
	function find_parent_id($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		$this->db->where('available', '1');
		$this->db->where('id', $result->row(0)->industry_id);
		$result1 = $this->db->get($this->table);
		return $result1->row(0)->id;
	}
	
	function find_parent2_id($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		$this->db->where('available', '1');
		$this->db->where('id', $result->row(0)->industry_id);
		$result1 = $this->db->get($this->table);
		$this->db->where('available', '1');
		$this->db->where('id', $result1->row(0)->industry_id);
		$result2 = $this->db->get($this->table);
		return $result2->row(0)->id;
	}
	
	function find_parent2_title_en($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		$this->db->where('available', '1');
		$this->db->where('id', $result->row(0)->industry_id);
		$result1 = $this->db->get($this->table);
		$this->db->where('available', '1');
		$this->db->where('id', $result1->row(0)->industry_id);
		$result2 = $this->db->get($this->table);
		return $result2->row(0)->title_en;
	}
	
	function find_parent3_title_en($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		$this->db->where('available', '1');
		$this->db->where('id', $result->row(0)->industry_id);
		$result1 = $this->db->get($this->table);
		$this->db->where('available', '1');
		$this->db->where('id', $result1->row(0)->industry_id);
		$result2 = $this->db->get($this->table);
		$this->db->where('available', '1');
		$this->db->where('id', $result2->row(0)->industry_id);
		$result3 = $this->db->get($this->table);
		return $result3->row(0)->title_en;
	}
	
	function check_lv3_has_next($id) {
		$this->db->where('industry_id', $id);
		$this->db->where('available', '1');
		$this->db->where('level', '4');
		$result = $this->db->get($this->table);
		if($result->num_rows()) {
			return TRUE;
		}
		return false;
	}
	
	function find_child($id) {
		$this->db->where('industry_id', $id);
		$this->db->where('available', '1');
		$result = $this->db->get($this->table);
		return $result->result_array();
	}
	
	function check_industry_id($id) {
		$this->db->where('id', $id);
		$this->db->where('available', '1');
		$result1 = $this->db->get($this->table);
		$this->db->where('industry_id', $id);
		$this->db->where('available', '1');
		$result2 = $this->db->get($this->table);
		if($result1->num_rows() == 1 && $result2->num_rows() == 0) {
			return $result1->row(0)->title_en;
		}
		return FALSE;
	}
}