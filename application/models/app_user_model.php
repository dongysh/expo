<?
/**
 * 
 */
class App_user_model extends CI_Model {
	
	private $table = 'new_app_users';
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function find_by_app_id($app_id) {
		$this->db->where('app_id', $app_id);
		$query = $this->db->get($this->table);
		return $query->num_rows()>0 ? $query->row_array() : false;
	}

	public function find_by_token($token) {
		$this->db->where('token', $token);
		$query = $this->db->get($this->table);
		return $query->num_rows()>0 ? $query->row_array() : false;
	}

	public function insert($user_id, $app_id, $type) {
	    $data = array(
			'user_id' => $user_id,
			'app_id' => $app_id,
			'type' => $type
		);
		$this->db->insert($this->table, $data);
        return $this->db->insert_id();
	}

	public function update($id, array $para) {
		$this->db->where('id', $id);
        $this->db->update($this->table, $para); 
        return $this->db->affected_rows();
	}
}