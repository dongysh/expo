<?php
session_start();
class Appuser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->config->load('custom');
        $this->load->helper(array('string', 'captcha', 'code', 'email'));
        $this->load->model('ofuser_model', 'Ofuser');
        $this->load->model('company_model', 'Company');
        $this->load->model('company_personal_model', 'CompanyPersonal');
        $this->load->model('personal_industry_model', 'PersonalIndustry');
        $this->load->model('personal_location_model', 'PersonalLocation');
        $this->load->model('input_buyers_model', 'InputBuyers');
		$this->load->model('app_user_model', 'Appuser');
	}

	public function index() {
	    $appuser = $this->Appuser->find_by_app_id($_SESSION['oauth_user']['id']);
        $userInfo = $this->Company->is_validate($appuser['user_id']);
        if($appuser && $userInfo) {
            $result = $this->Company->find_by_id($appuser['user_id']);
            //$name_result = $this->CompanyPersonal->get_user_name_by_company_id($appuser->user_id);
            if($result->row(0)->first_name) {
                $show_name = $result->row(0)->first_name;
            }else{
                $show_name_array = explode('@', $result->row(0)->login_name);
                $show_name = $show_name_array[0];
            }
            
            $session_data = array(
                'id' => $result->row(0)->company_id,
                'login_name' => $result->row(0)->login_name,
                'ip' => $this->input->ip_address(),
                'show_name' => $show_name
            );
            $this->session->set_userdata('user_session', $session_data);
            
            if(isset($_SESSION['oauth_referer']) && !empty($_SESSION['oauth_referer'])) {
                redirect($_SESSION['oauth_referer']);
            } else {
                redirect(base_url());
            } 
        } elseif($appuser && !$userInfo) {
            redirect(base_url().'login/email_validate?login_name='.$userInfo['login_name']);
        } else {
            if($this->session->userdata('user_session')) {
                redirect(base_url());
            }
            $data['code'] = code($this->config->item('code_path'));
            $this->session->set_userdata('code', $data['code']['code']);
            $data['industry_result'] = $this->PersonalIndustry->find();
            $data['recommend_location'] = $this->PersonalLocation->find_recommend();
            $data['location_result'] = $this->PersonalLocation->find();
            $data['user'] = $_SESSION['oauth_user'];
            $this->load->view('appuser/index', $data);
        }
	}

    private function _check_login_name($login_name)
    {
        return $this->Company->check_login_name($login_name);
    }
	
	public function ajax_reg() 
    {
        $data = $this->validate($this->input->post());//数据验证
        if (empty($data)) {
            $this->db->trans_start();
            $company_id = $this->Company->create_from_web2($this->input->post());
            $this->CompanyPersonal->create_from_web($company_id, $this->input->post());
            $this->Ofuser->create_im(trim($this->input->post('login_name')), $company_id, '');
            $this->InputBuyers->addtoTableInputBuyer($this->input->post(), $company_id);
            $this->Appuser->insert($company_id, $_SESSION['oauth_user']['id'], $_SESSION['oauth_user']['type']);
            $this->db->trans_complete();
            
            $session_data = array(
                'id' => $company_id,
                'login_name' => trim($this->input->post('login_name')),
                'ip' => $this->input->ip_address(),
                'show_name' => trim($this->input->post('first_name'))
            );
            $this->session->set_userdata('user_session', $session_data);

            if(isset($_SESSION['oauth_user']['email']) && !empty($_SESSION['oauth_user']['email'])) {
                $query = $this->CompanyPersonal->find_by_company_id($company_id);
                $res = $query->row_array();
                //匹配完成推送N个卖家以Email推送给买家
                $InputBuyersData = $this->InputBuyers->getInputBuyersData($res['personal_location_id']);
                if ($InputBuyersData) {
                    $this->senEmailToMeCompany($session_data, $InputBuyersData);
                }
                $data = array(
                    'status' => 1,
                    'url' => base_url().'purchase.html',
                );
            } else {
                //发送邮件进行验证。
                $this->sendUserEmailValidate($this->input->post(), $company_id);
                $data = array(
                    'status' => 1,
                    'url' => base_url().'login',
                );
            }            
        }
        json($data);
    }

    private function sendUserEmailValidate($postData, $company_id)
    {
        $mail_to = $postData['login_name'];
        $mail_subject = '感谢您的注册  -- 请点击如下链接进行 激活！';
        $url = base_url().'login?industry_id='. $postData['personal_industry_id'] .'&company_id=' . $company_id . '&validate_user=1';
        $mail_message = '<a href="'. $url . '" title="">' . $url . '</a>';
        $mail_from = 'service@global-expo.cn';
        $mail_name = $postData['first_name'];
        sendEmails($mail_to, $mail_subject, $mail_message, $mail_from, $mail_name);
    }
    
    private function validate($pastData)
    {
        $error_nums = 0;
        $error_data['login_name_error'] = '';
        $error_data['personal_industry_id_error'] = '';
        $error_data['name_error'] = '';
        $error_data['company_name_error'] = '';
        $error_data['personal_location_id_error'] = '';
        $error_data['tel_error'] = '';
        $error_data['code_error'] = '';
        
        if(!preg_match('/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/', trim($pastData['login_name']))) {
            $error_data['login_name_error'] = 'Please enter a valid Email address';
            $error_nums++;
        } else {
            $login_name = trim($pastData['login_name']);
            $can_reg = $this->_check_login_name($login_name);
            if(!$can_reg) {
                $error_data['login_name_error'] = 'This account already exists';
                $error_nums++;
            }
        }

        if($pastData['personal_industry_id'] < 1) {
            $error_data['personal_industry_id_error'] = 'Please select your business industry';
            $error_nums++;
        }
        
        if(trim($pastData['first_name']) == '') {
            $error_data['name_error'] = 'Please enter your name';
            $error_nums++;
        }
        if($pastData['company_name'] == '') {
            $error_data['company_name_error'] = 'Please enter your company name';
            $error_nums++;
        }
        if($pastData['personal_location_id'] < 1) {
            $error_data['personal_location_id_error'] = 'Please select your company location';
            $error_nums++;
        }
        if(trim($pastData['tel1']) != '' && !preg_match('/^[0-9]+$/', trim($pastData['tel1']))) {
            $error_data['tel_error'] = 'Please enter numbers';
            $error_nums++;
        }
        if(trim($pastData['tel2']) != '' && !preg_match('/^[0-9]+$/', trim($pastData['tel2']))) {
            $error_data['tel_error'] = 'Please enter numbers';
            $error_nums++;
        }
        if(trim($pastData['tel3']) != '' && !preg_match('/^[0-9]+$/', trim($pastData['tel3']))) {
            $error_data['tel_error'] = 'Please enter numbers';
            $error_nums++;
        }
        if(trim($pastData['tel4']) != '' && !preg_match('/^[0-9]+$/', trim($pastData['tel4']))) {
            $error_data['tel_error'] = 'Please enter numbers';
            $error_nums++;
        }
        if(strtoupper(trim($pastData['code'])) != $this->session->userdata('code')) {
            $error_data['code_error'] = 'Enter the characters in the image';
            $error_nums++;
        }
        if ($error_nums) {
            $data = array(
                'status' => 2,
                'login_name_error' => $error_data['login_name_error'],
                'personal_industry_id_error' => $error_data['personal_industry_id_error'],
                'name_error' => $error_data['name_error'],
                'company_name_error' => $error_data['company_name_error'],
                'personal_location_id_error' => $error_data['personal_location_id_error'],
                'tel_error' => $error_data['tel_error'],
                'code_error' => $error_data['code_error'],
            );
        }
        return !empty($data) ? $data : '';
    }

    private function senEmailToMeCompany($session_data, $InputBuyersData)
    {
        $mail_to = $session_data['login_name'];
        $mail_subject = '感谢您的加入 -- 我们推荐如下商家可供你选择！';
        $mail_message = $this->InputBuyers->getEmailContent($InputBuyersData);
        $mail_from = 'service@global-expo.cn';
        sendEmails($mail_to, $mail_subject, $mail_message, $mail_from);
    }

}

?>