<?php
/**
 * 
 */
class Ofuser_model extends CI_Model {
	
	var $table = 'ofUser';
	
	function __construct() {
		parent::__construct();
	}
	
	function create_im($username, $id, $pwd) {
		$user_name = explode("@", $username);
		$user_name = $user_name[0];
		$user_name = str_replace(".", '_', $user_name);
		$user_name = $user_name.'_'.$id;
		$time = time();
		for($i=strlen(time()); $i<12; $i++) {
			$time = '0'.$time;
		}
		$data = array(
			'username' => $user_name,
			'plainPassword' => $pwd,
			'encryptedPassword' => NULL,
			'name' => $username,
			'email' => $username,
			'creationDate' => $time,
			'modificationDate' => $time
		);
		$this->db->insert($this->table, $data);
	}
	
	function reset_pwd($id, $pwd) {
		$this->db->where('id', $id);
		$result = $this->db->get('companies');
		$username = $result->row(0)->login_name;
		$user_name = explode("@", $username);
		$user_name = $user_name[0];
		$user_name = str_replace(".", '_', $user_name);
		$user_name = $user_name.'_'.$id;
		$time = time();
		for($i=strlen(time()); $i<12; $i++) {
			$time = '0'.$time;
		}
		$data = array(
			'plainPassword' => $pwd,
			'modificationDate' => $time
		);
		$this->db->where('username', $user_name);
		$this->db->update($this->table, $data);
	}
}
