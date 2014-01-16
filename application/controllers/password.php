<?
/**
 * 
 */
class Password extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('email');
		$this->load->helper('string');
		$this->load->model('ofuser_model', 'Ofuser');
		$this->load->model('company_model', 'Company');
	}
	
	function forgot() {
		if($this->session->userdata('user_session')) {
			redirect(base_url());
		}
		if(isset($_POST['login_name'])) {
			$can_reg = $this->Company->check_login_name(trim($this->input->post('login_name')));
			if($can_reg) {
				$this->session->set_flashdata('msg', 'The Email that you entered is incorrect. Please try again.');
				$this->session->set_flashdata('login_name', trim($this->input->post('login_name')));
				redirect(base_url().'password/forgot');
			}else{
				//建立key
				$key1 = random_string('unique');
				$key2 = md5($key1);
				$key = $key1 . $key2;
				//存入数据库
				$this->Company->set_reset_pwd_key(trim($this->input->post('login_name')), $key);
				//send email
				//CI方法 start
				// $this->email->from('service@global-expo.cn', 'global-expo');
				// $this->email->to(trim($_POST['login_name'])); 
				// $this->email->subject('Reset Your Password on global-expo.cn');
				// $this->email->message("Dear Member,\r\n
// We have received your request for login information on global-expo.cn. Please find below your Member ID,click the link under it and enter a new password:\r\n
// Your Member ID: ".trim($_POST['login_name'])."\r\n
// ".base_url()."password/reset/?sk=".$key."\r\n
// If the link is not clickable, please copy and paste it into your web browser.\r\n
// For security reasons, we recommend you to enter a password that contains at least 6 characters with both numbers and letters in it.\r\n
// We hope you enjoy sourcing with us. Should you have any queries, please feel free to contact us at Service@global-expo.cn\r\n
// Yours Sincerely\r\n
// www.global-expo.cn
// "); 
				// $this->email->send();
				//CI方法 end
				//php 方法
				$sub = "Reset Your Password on global-expo.cn";
				$from = "From: service@global-expo.cn"."\r\n";
				$msg = "Dear Member,\r\n
We have received your request for login information on global-expo.cn. Please find below your Member ID,click the link under it and enter a new password:\r\n
Your Member ID: ".trim($_POST['login_name'])."\r\n
".base_url()."password/reset/?sk=".$key."\r\n
If the link is not clickable, please copy and paste it into your web browser.\r\n
For security reasons, we recommend you to enter a password that contains at least 6 characters with both numbers and letters in it.\r\n
We hope you enjoy sourcing with us. Should you have any queries, please feel free to contact us at Service@global-expo.cn\r\n
Yours Sincerely\r\n
www.global-expo.cn
";
				mail(trim($_POST['login_name']),$sub,$msg,$from);
				$data['login_name'] = trim($_POST['login_name']);
				$this->load->view('password/sendsuccess', $data);
			}
		}else{
			$seo['title'] = 'China Manufacturer,Suppliers,Exporters International Directory from Global Expo Online';
			$seo['keywords'] = 'China producers,China buyers,China agents,China importers,China wholesalers,China producers';
			$seo['description'] = 'Looking for a Supplier ? Welcome to Global Expo Online Now!Find world-class manufacturers and suppliers for your company in Global Expo Online directory.';
			$data['seo'] = $seo;
			$this->load->view('password/forgot');
		}
	}
	
	function reset() {
		if($this->session->userdata('user_session')) {
				redirect(base_url());
			}
		if(isset($_POST['password'])) {
			if(!isset($_GET['sk'])) {
				$this->load->view('password/cant_reset');
			}elseif(count($_GET) != 1) {
				$this->load->view('password/cant_reset');
			}elseif(strlen($_GET['sk']) != 64) {
				$this->load->view('password/cant_reset');
			}else{
				$result = $this->Company->check_sk($this->input->get('sk'));
				if(!$result) {
					$this->load->view('password/cant_reset');
					exit();
				}else{
					if(!preg_match('/^[0-9a-zA-Z]{6,20}$/', trim($this->input->post('password')))) {
						redirect(base_url().'password/reset/?sk='.$this->input->get('sk'));
					}else{
						$this->db->trans_start();	
						$this->Company->change_pwd_by_sk($this->input->get('sk'), trim($this->input->post('password')));
						$this->Ofuser->reset_pwd($result->row(0)->id, trim($this->input->post('password')));
						$this->db->trans_complete();
						$this->session->set_flashdata('reset_pwd_success', 'Revise password successfully, sign in with the new password !');
						redirect(base_url().'login');
					}
				}
			}
		}else{
			if(!isset($_GET['sk'])) {
				$this->load->view('password/cant_reset');
			}elseif(count($_GET) != 1) {
				$this->load->view('password/cant_reset');
			}elseif(strlen($_GET['sk']) != 64) {
				$this->load->view('password/cant_reset');
			}else{
				$result = $this->Company->check_sk($this->input->get('sk'));
				if(!$result) {
					$this->load->view('password/cant_reset');
				}else{
					$data['sk'] = $this->input->get('sk');
					$data['login_name'] = $result->row(0)->login_name;
					$this->load->view('password/reset', $data);
				}
			}
		}
	}
}
