<?
/**
 * 买家见面会报名
 */
class New_buyersmeet_invite_model extends CI_Model {
	
	var $table = 'new_buyersmeet_invite';
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
  /**
   * [报名参加买家见面会]
   * @return [type] [description]
   */
  function apply($meet_id,$company_id)
  {
      $data = array(
        'buyersmeet_id' => $meet_id,
        'company_id' => $company_id,
      );
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
  }

  function select_if_exist($meet_id,$company_id)
  {
      $this->db->select('id');
      $this->db->from($this->table);
      $this->db->where('buyersmeet_id', $meet_id);
      $this->db->where('company_id', $company_id);
      return $this->db->get()->row();
  }
	
}
