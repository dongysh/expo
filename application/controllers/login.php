<?
/**
 * 
 */
class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('company_model', 'Company');
		$this->load->model('company_personal_model', 'CompanyPersonal');
		$this->load->helper(array('email'));
		$this->load->model('input_buyers_model', 'InputBuyers');
	}
	
	function index()
	{
		if($this->session->userdata('user_session')) {
			redirect(base_url());
		}
		if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], base_url()) === 0) {
			$data['referer'] = $_SERVER['HTTP_REFERER'];
		}else{
			$data['referer'] = base_url();
		}
		$seo['title'] = 'China Manufacturers Directory,Products Manufacturing Companies,Manufacturer Industry China';
		$seo['keywords'] = 'Manufacturers Marketplace,Manufacturers Business Listings,Wholesale Products Manufacturer,Manufacturers B2B Marketplace,China Manufacturers Marketplace';
		$seo['description'] = 'Looking for China manufacturers directory - Online business marketplace includes top manufacturers business listings, manufacturers companies in China wholesale products manufacturer, products manufacturing industries, China manufacturers marketplace.';
		$data['seo'] = $seo;
		$this->load->view('login/index', $data);
	}
	
	function check()
	{
		if(!isset($_POST['login'])) {
			redirect(base_url());
		}
		//密码为空，可能为facebook、twitter、linkedin平台的用户，在此做一下限制
		if(empty($this->input->post('password'))) {
			$this->session->set_flashdata('status', 'password is null, please re-enter');
		    redirect(base_url().'login');
		} 

		$result = $this->Company->check_login($this->input->post());
		if($result !== false && $result != 'validate_user_failure' && !empty($result)) {
			$name_result = $this->CompanyPersonal->get_user_name_by_company_id($result->row(0)->id);
			if($name_result) {
				$show_name = $name_result;
			}else{
				$show_name_array = explode('@', $result->row(0)->login_name);
				$show_name = $show_name_array[0];
			}
			
			$session_data = array(
				'id' => $result->row(0)->id,
				'login_name' => $result->row(0)->login_name,
				'ip' => $this->input->ip_address(),
				'show_name' => $show_name
			);
			//匹配完成推送N个卖家以Email推送给买家
			if ($this->input->post('industry_id')) {
			    $InputBuyersData = $this->InputBuyers->getInputBuyersData($this->input->post('industry_id'));
			    if ($InputBuyersData) {
			        $this->senEmailToMeCompany($session_data, $InputBuyersData);
			    }
			}
			
			$this->session->set_userdata('user_session', $session_data);
			if(!isset($_POST['referer'])) {
				redirect(base_url());
			}
			if(!(strpos($this->input->post('referer'), base_url()) === 0)) {
				redirect(base_url());
			}
			redirect($this->input->post('referer'));
		} elseif ($result == 'validate_user_failure') {
		    redirect(base_url().'login/email_validate?login_name='.$this->input->post('login_name'));
		} else {
		    $this->session->set_flashdata('status', 'Incorrect email or password, please re-enter');
		    redirect(base_url().'login');
		}
	}
	
	public function email_validate()
    {
        $loginName = isset($_GET['login_name']) ? $_GET['login_name'] : '';
        $data['login_name'] = $loginName;
        $this->load->view('login/email_validate', $data);
    }
	
    public function emailSendInfo()
    {
        if(!preg_match('/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/', trim($this->input->post('email')))) {
            $data['status'] = 0;
            $data['error'] = 'Email格式不对！';
        } else {
            $login_name = trim($this->input->post('email'));
            $can_reg = $this->Company->check_login_name($login_name);
            if(!$can_reg) {
                $company_id = $this->Company->queryUserName($this->input->post('email'));
                $industry = $this->CompanyPersonal->find_by_company_id($company_id);
                $industry_id = $industry->row(0)->personal_industry_id;
                $this->sendUserEmailValidate($this->input->post('email'), $industry_id, $company_id);
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
                $data['error'] = '用户名不存在！';
            }
        }
        json($data);
    }
    
    private function sendUserEmailValidate($login_name, $industry_id, $company_id)
    {
        $mail_to = $login_name;
        $mail_subject = '感谢您的注册  -- 请点击如下链接进行 激活！';
        $url = base_url().'login?industry_id='. $industry_id .'&company_id=' . $company_id . '&validate_user=1';
        $mail_message = '<a href="'. $url . '" title="">' . $url . '</a>';
        $mail_from = 'service@global-expo.cn';
        sendEmails($mail_to, $mail_subject, $mail_message, $mail_from);
    }
	
    private function senEmailToMeCompany($session_data, $InputBuyersData)
    {
        $mail_to = $session_data['login_name'];
        $mail_subject = '感谢您的加入 -- 我们推荐如下商家可供你选择！';
        $mail_message = $this->InputBuyers->getEmailContent($InputBuyersData);
        $mail_from = 'service@global-expo.cn';
        sendEmails($mail_to, $mail_subject, $mail_message, $mail_from);
    }
    
	function out() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
