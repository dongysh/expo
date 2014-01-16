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
                if(isset($_POST['callback']))
                {
                    redirect($_POST['callback']);
                    return;
                }
				redirect(base_url());
                return;
			}
			$this->Company->update_descript($user_session['id'], trim($this->input->post('descript')));
            if(isset($_POST['callback']))
            {
                redirect($_POST['callback']);
                return;
            }
			redirect(base_url());
            return;
		}
		$data['result'] = $this->Company->find_by_id($user_session['id']);
		$this->load->view('purchase/index', $data);
	}
}
