<?
/**
 * 
 */
class product_model extends CI_Model {
	
	var $table = "products";
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function count_by_key_word($key_word) {
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->like('products.title_en', $key_word);
		return $this->db->count_all_results();
	}
	
	function pg_s($key_word, $num) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->like('products.title_en', $key_word);
		$this->db->limit(10, $num);
		return $this->db->get();
	}
	
	function find_lv2_product_by_industry2_id($industry2_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first,companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry2_id', $industry2_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'desc');
		$this->db->limit(20, 0);
		return $this->db->get();
	}
	
	function find_lv2_all_product_by_industry2_id($industry2_id) {
		$this->db->select('companies.id');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry2_id', $industry2_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('companies.created', 'desc');
		return $this->db->get();
	}
	
	function count_by_lv3($industry3_id) {
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry3_id', $industry3_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('companies.created', 'desc');
		return $this->db->count_all_results();
	}
	
	function count_by_lv4($industry4_id) {
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry4_id', $industry4_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('companies.created', 'desc');
		return $this->db->count_all_results();
	}
	
	function pg_lv3($industry3_id, $num) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry3_id', $industry3_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'desc');
		$this->db->limit(10, $num);
		return $this->db->get();
	}
	
	function pg_lv4($industry4_id, $num) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry4_id', $industry4_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'desc');
		$this->db->limit(10, $num);
		return $this->db->get();
	}
	
	function find_top5_by_company_id($company_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('companies.id', $company_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'asc');
		$this->db->limit(5, 0);
		return $this->db->get();
	}
	
	function find_top5_by_company_id_no_self($company_id, $self_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.id !=', $self_id);
		$this->db->where('companies.id', $company_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'asc');
		$this->db->limit(5, 0);
		return $this->db->get();
	}
	
	function find_all_by_company_id($company_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('companies.id', $company_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'asc');
		return $this->db->get();
	}

	function check_company_and_product($company_id, $product_id) {
		$this->db->where('company_id', $company_id);
		$this->db->where('id', $product_id);
		$result = $this->db->get($this->table);
		if($result->num_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}
	
	function find_by_id($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}
	
	function check_product_industry($id, $industry_id, $industry_level) {
		$this->db->select('products.id as p_id, products.title_en, companies.id as c_id, cert, version, products.min_order, products.min_order_unit, products.last_pay, products.descript_en, products.title_en_first, products.descript_detail_en, products.video_link');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.id', $id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		if($industry_level == 3){
			$this->db->where('products.industry3_id', $industry_id);
		}elseif($industry_level == 4){
			$this->db->where('products.industry4_id', $industry_id);
		}else{
			return FALSE;
		}
		$this->db->order_by('products.created', 'asc');
		$result = $this->db->get();
		if($result->num_rows() == 1) {
			return $result;
		}
		return FALSE;
	}

	function get_company_id($product_id) {
		$this->db->where('id', $product_id);
		$result = $this->db->get($this->table);
		return $result->row(0)->company_id;
	}

	function get_industry_link_by_product_id($id) {
		$this->db->where('id', $id);
		$result = $this->db->get($this->table);
		if($result->row(0)->industry4_id == '0') {
			$industry_id = $result->row(0)->industry3_id;
		}else{
			$industry_id = $result->row(0)->industry4_id;
		}
		$this->db->where('id', $industry_id);
		return $this->db->get('industries');
	}
}
