<?
/**
 * 
 */
class Company_model extends CI_Model {
	
	var $table = 'companies';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function create_unique_key($id, $unique_key) {
		$this->db->where('id', $id);
		$data = array(
			'unique_key' => $unique_key
		);
		$this->db->update($this->table, $data);
	}
	
	function check_login($save_data)
	{
		$this->db->where('login_name', trim($save_data['login_name']));
		$this->db->where('password', md5(strtolower(trim($save_data['password']))));
		$this->db->where('server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('deleted', '0');
		$result = $this->db->get($this->table);
		if($result->num_rows() == 1) {
		    if (isset($save_data['validate_user']) && $save_data['validate_user'] == 1) {
		        if ($result->row(0)->id == $save_data['company_id']) {
		            $this->updateUservalidatePass($save_data); //激活账号
		            return $this->selectData($save_data);
		        } else {
		            return 'validate_user_failure';
		        }
		    } else {
		        return $this->selectData($save_data);
		    }
		} else {
		    return false;
		}
	}
	
	public function updateUservalidatePass($save_data)
	{
        $this->db->where('id', $save_data['company_id']);
        $data = array(
            'validate_user' => $save_data['validate_user']
        );
        $this->db->update($this->table, $data);
	}
	
	public function selectData($save_data)
	{
        //重新查询
        $this->db->where('login_name', trim($save_data['login_name']));
        $this->db->where('password', md5(strtolower(trim($save_data['password']))));
        $this->db->where('server_end >=', @date('Y-m-d H:i:s', time()));
        $this->db->where('deleted', '0');
        $this->db->where('validate_user', '1');
        $result = $this->db->get($this->table);
        if($result->num_rows() == 1) {
           return $result;
        } else {
           return 'validate_user_failure';
        }
	}
	
	function check_login_name($login_name) {
		$this->db->where('login_name', $login_name);
		$rows = $this->db->count_all_results($this->table);
		if($rows > 0) {
			return FALSE;
		}
		return TRUE;
	}
	
	function create_from_web($save_data) {
		$data = array(
			'login_name' => trim($save_data['login_name']),
			'password' => md5(strtolower(trim($save_data['password']))),
			'user_level' => 2,
			'server_end' => '3000-12-12 00:00:00',
			'is_test' => 0,
			'reg_from' => 1,
			'deleted' => 0,
			'created' => @date('Y-m-d H:i:s', time()),
			'last_updated' => @date('Y-m-d H:i:s', time())
		);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	
	function find_by_id($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}
	
	function update_descript($id, $descript) {
		$this->db->where('id', $id);
		$data = array(
			'descript' => $descript
		);
		$this->db->update($this->table, $data);
	}
	
	function count_by_key_word($key_word) {
		$this->db->where('server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('user_level', '1');
		$this->db->where('deleted', '0');
		$this->db->like('full_name_en', $key_word);
		return $this->db->count_all_results($this->table);
	}

	function pg_s($key_word, $num) {
		$this->db->where('server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('user_level', '1');
		$this->db->where('deleted', '0');
		$this->db->like('full_name_en', $key_word);
		$this->db->limit(10, $num);
		return $this->db->get($this->table);
	}
	
	function set_reset_pwd_key($login_name, $reset_key) {
		$this->db->where('login_name', $login_name);
		$data = array(
			'reset_key' => $reset_key
		);
		$this->db->update($this->table, $data);
	}
	
	function check_sk($reset_key) {
		$this->db->where('reset_key', $reset_key);
		$result = $this->db->get($this->table);
		if($result->num_rows() != 1) {
			return false;
		}else{
			return $result;
		}
	}
	
	function change_pwd_by_sk($reset_key, $password) {
		$password = md5(strtolower($password));
		$this->db->where('reset_key', $reset_key);
		$data = array(
			'password' => $password,
			'reset_key' => NULL
		);
		$this->db->update($this->table, $data);
	}
	
	function find_by_short_name($short_name) {
		$this->db->where('short_name', $short_name);
		$this->db->where('user_level', '1');
		$this->db->where('server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('deleted', '0');
		$result = $this->db->get($this->table);
		if($result->num_rows() == 1) {
			return $result;
		}else{
			return false;
		}
	}
	
	public function queryUserName($login_name)
	{
	    $this->db->where('login_name', $login_name);
		$this->db->where('server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('deleted', '0');
	    $result = $this->db->get($this->table);
	    if($result->num_rows() == 1) {
	        return $result->row(0)->id;
	    }else{
	        return false;
	    }
	}
	
}
