<?
class Input_buyers_model extends CI_Model {
    
    var $table = 'input_buyers';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('email');
    }
    
    public function getInputBuyersData($industry_id)
    {
        $this->db->where('industry_id', $industry_id);
        $result = $this->db->get($this->table);
        if(!$result->num_rows()) {
            return false;
        }
        return $result;
    }
    
    public function getEmailContent($inputBuyers)
    {
        $content = '';
        foreach ($inputBuyers->result() as $item) {
            $content .= '<ul>'.
                            '<li>' . $item->company_name . '</li>'.
                            '<li>' . $item->address . '</li>'.
                            '<li>' . $item->tel1 . '</li>'.
                            '<li>' . $item->email1 . '</li>'.
                            '<li>' . $item->url . '</li>'.
                        '<ul>';
        }
        return $content;
    }
    
    public function addtoTableInputBuyer($save_data, $company_id)
    {
        $data = array(
            'id' => $company_id,
            'industry_id' => $save_data['personal_industry_id'],
            'company_name' => $save_data['company_name'],
            'tel1' => $save_data['tel1'],
            'tel2' => $save_data['tel2'],
            'tel3' => $save_data['tel3'],
            'email1' => $save_data['login_name'],
            'personal_location_id' => $save_data['personal_location_id'],
            'status' => 1,
            'created' => @date('Y-m-d H:i:s', time()),
            'last_updated' => @date('Y-m-d H:i:s', time())
        );
        $this->db->insert($this->table, $data);
    }
    
}
