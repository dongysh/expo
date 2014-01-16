<?
/**
 * 
 */
class Home extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->config->load('custom');
		$this->load->helper('string');
		$this->load->model('company_model', 'Company');
	}
	
	function user() {
		$uri = uri_string();
		$uri_array = explode('/', $uri);
		$uri = $uri_array[2];
		if($uri != 'global_expo' && $uri != 'message' && $uri != 'favorit') {
			redirect(base_url());
		}
		if(!$this->session->userdata('user_session')) {
			redirect(base_url().'login');
		}
		$user_session = $this->session->userdata('user_session');
		$unique = random_string('unique');
		$this->Company->create_unique_key($user_session['id'], $unique);
		
		redirect($this->config->item('user_base_url').'home/from_www/'.$user_session['id'].'/'.$unique.'/'.$uri);
	}
}
