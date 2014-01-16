

<?
/**
 * 买家见面会页面
 */
class New_buyersmeet_model extends CI_Model {
	
	var $table = 'new_buyersmeet';
	
	function __construct() {
		parent::__construct();
		$this->load->database();

	}
	/**
	 * [见面会的数目]
	 * @return [type] [description]
	 */
	function count_meets()
    {
      	$this->db->from($this->table);
		return $this->db->count_all_results();
    }

	/**
	 * [分页]
	 * @param  [type] $page     [description]
	 * @param  [type] $per_page [description]
	 * @return [type]           [description]
	 */
	function page($page,$per_page)
    {
       $this->db->select('new_buyersmeet.*,show_name,show_name_en,personal_locations.title as country_cn,personal_locations.title_en as country_en');
       $this->db->from($this->table);
       $this->db->join('personal_locations', 'new_buyersmeet.location_id = personal_locations.id', 'left');
       $this->db->join('new_exhibition', 'new_buyersmeet.exhibition_id = new_exhibition.id', 'left');
       $this->db->order_by('meet_time', 'desc');
       $this->db->limit($per_page, $per_page*($page-1));
       return $this->db->get();
    }

    function get_meet_detail_by_meetId($id)
    {
       $this->db->select('new_buyersmeet.*,show_name,show_name_en,show_logo,personal_locations.title as country_cn,personal_locations.title_en as country_en');
       $this->db->from($this->table);
       $this->db->join('personal_locations', 'new_buyersmeet.location_id = personal_locations.id', 'left');
       $this->db->join('new_exhibition', 'new_buyersmeet.exhibition_id = new_exhibition.id', 'left');
       $this->db->where('new_buyersmeet.id', $id);
       return $this->db->get();
    }
}