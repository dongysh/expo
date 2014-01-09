<?
/**
 * 
 */
class Favorit_model extends CI_Model {
	
	var $table = 'favorites';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function add($self_company_id, $company_id, $product_id) {
		if($company_id == 0) {
			$success = $this->check_product_by_id($product_id);
			if($success) {
				$this->db->where('self_company_id', $self_company_id);
				$this->db->where('company_id', 0);
				$this->db->where('product_id', $product_id);
				$result = $this->db->get($this->table);
				if($result->num_rows()) {
					//update
					$this->db->where('self_company_id', $self_company_id);
					$this->db->where('company_id', 0);
					$this->db->where('product_id', $product_id);
					$data = array(
						'canceled' => 0,
						'last_updated' => @date('Y-m-d H:i:s', time())
					);
					$this->db->update($this->table, $data);
					return true;
				}else{
					//insert
					$data = array(
						'self_company_id' => $self_company_id,
						'company_id' => 0,
						'product_id' => $product_id,
						'canceled' => 0,
						'created' => @date('Y-m-d H:i:s', time()),
						'last_updated' => @date('Y-m-d H:i:s', time())
					);
					$this->db->insert($this->table, $data);
					return true;
				}
			}
		}elseif($product_id == 0) {
			$success = $this->check_company_by_id($company_id);
			if($success) {
				$this->db->where('self_company_id', $self_company_id);
				$this->db->where('company_id', $company_id);
				$this->db->where('product_id', 0);
				$result = $this->db->get($this->table);
				if($result->num_rows()) {
					//update
					$this->db->where('self_company_id', $self_company_id);
					$this->db->where('company_id', $company_id);
					$this->db->where('product_id', 0);
					$data = array(
						'canceled' => 0,
						'last_updated' => @date('Y-m-d H:i:s', time())
					);
					$this->db->update($this->table, $data);
					return true;
				}else{
					//insert
					$data = array(
						'self_company_id' => $self_company_id,
						'company_id' => $company_id,
						'product_id' => 0,
						'canceled' => 0,
						'created' => @date('Y-m-d H:i:s', time()),
						'last_updated' => @date('Y-m-d H:i:s', time())
					);
					$this->db->insert($this->table, $data);
					return true;
				}
			}
		}else{
			return false;
		}
	}
	
	function del($self_company_id, $company_id, $product_id) {
		$this->db->where('self_company_id', $self_company_id);
		$this->db->where('company_id', $company_id);
		$this->db->where('product_id', $product_id);
		$data = array(
			'canceled' => 1
		);
		$this->db->update($this->table, $data);
		return true;
	}
	
	function check_product_by_id($id) {
		$this->db->where('id', $id);
		$result = $this->db->get('products');
		return $result->num_rows();
	}
	
	function check_company_by_id($id) {
		$this->db->where('id', $id);
		$this->db->where('deleted', '0');
		$result = $this->db->get('companies');
		return $result->num_rows();
	}
	
	function check_favorites_by_company_id($self_company_id, $company_id) {
		$this->db->where('self_company_id', $self_company_id);
		$this->db->where('company_id', $company_id);
		$this->db->where('product_id', 0);
		$this->db->where('canceled', 0);
		$result = $this->db->get($this->table);
		return $result->num_rows();
	}
	
	function check_favorites_by_product_id($self_company_id, $product_id) {
		$this->db->where('self_company_id', $self_company_id);
		$this->db->where('company_id', 0);
		$this->db->where('product_id', $product_id);
		$this->db->where('canceled', 0);
		$result = $this->db->get($this->table);
		return $result->num_rows();
	}
}
