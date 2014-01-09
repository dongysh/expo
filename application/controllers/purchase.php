<?
/**
 * 
 */
class Purchase extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->Model('company_model', 'Company');
	}
	
	function index() {
		if(!$this->session->userdata('user_session')) {
			redirect(base_url());
		}
		$user_session = $this->session->userdata('user_session');
		if(isset($_POST['descript'])) {
			if(trim($this->input->post('descript')) == '') {
				redirect(base_url());
			}
			$this->Company->update_descript($user_session['id'], trim($this->input->post('descript')));
			redirect(base_url());
		}
		$data['result'] = $this->Company->find_by_id($user_session['id']);
		$this->load->view('purchase/index', $data);
	}
}
