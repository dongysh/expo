<?
/**
 * 
 */
class Join extends CI_Controller {
    
    function __construct()
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
    }
    
    function index()
    {
        if($this->session->userdata('user_session')) {
            redirect(base_url());
        }
        $data['code'] = code($this->config->item('code_path'));
        $this->session->set_userdata('code', $data['code']['code']);
        $data['industry_result'] = $this->PersonalIndustry->find();
        $data['recommend_location'] = $this->PersonalLocation->find_recommend();
        $data['location_result'] = $this->PersonalLocation->find();
        $seo['title'] = 'B2B Directory & China Manufacturers-Join Our Manufacturer Directory';
        $seo['keywords'] = 'China Manufacturer Directory,China B2B Directory,China Manufacturers';
        $seo['description'] = 'Global Expo Online Manufacturers Directory- Best B2B China Products Manufacturer Direcory,Supplier Directory,Exporter Directory,Suppliers Sources,Exporter Sources, Wholesale Source, Out Sources Manufacturers For Global Buyers Sourcing.';
        $data['seo'] = $seo;
        $this->load->view('join/index', $data);
    }
    
    private function _check_login_name($login_name)
    {
        return $this->Company->check_login_name($login_name);
    }
    
    //ajax
    function ajax_check_login_name()
    {
        if(!isset($_POST['login_name'])){
            json(array('status' => false, 'value' => ''));
        }
        $login_name = trim($this->input->post('login_name'));
        $can_reg = $this->_check_login_name($login_name);
        if($can_reg) {
            json(array('status' => true));
        }else{
            json(array('status' => false, 'value' => 'This account already exists'));
        }
    }

    function ajax_check_code()
    {
        if(!isset($_POST['code'])){
            json(array('status' => false, 'value' => ''));
        }
        if(!$this->session->userdata('code')){
            json(array('status' => false, 'value' => ''));
        }
        if($this->session->userdata('code') == strtoupper(trim($this->input->post('code')))) {
            json(array('status' => true));
        }else{
            json(array('status' => false, 'value' => 'Enter the characters in the image'));
        }
    }

    function ajax_change_code()
    {
        $code = code($this->config->item('code_path'));
        $this->session->set_userdata('code', $code['code']);
        json($code);
    }
    
    function ajax_reg() 
    {
        $data = $this->validate($this->input->post());//数据验证
        if (empty($data)) {
            $this->db->trans_start();
            $company_id = $this->Company->create_from_web($this->input->post());
            $this->CompanyPersonal->create_from_web($company_id, $this->input->post());
            $this->Ofuser->create_im(trim($this->input->post('login_name')), $company_id, trim($this->input->post('password')));
            $this->InputBuyers->addtoTableInputBuyer($this->input->post(), $company_id);
            $this->db->trans_complete();
//             $session_data = array(
//                 'id' => $company_id,
//                 'login_name' => trim($this->input->post('login_name')),
//                 'ip' => $this->input->ip_address(),
//                 'show_name' => trim($this->input->post('first_name')).'&nbsp;'.trim($this->input->post('last_name'))
//             );
            //$this->session->set_userdata('user_session', $session_data);
            //发送邮件进行验证。
            $this->sendUserEmailValidate($this->input->post(), $company_id);
            
            $data = array(
                'status' => 1,
                'url' => base_url().'purchase.html',
            );
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
        $mail_name = $postData['first_name'] . $postData['last_name'];
        sendEmails($mail_to, $mail_subject, $mail_message, $mail_from, $mail_name);
    }
    
    private function validate($pastData)
    {
        $error_nums = 0;
        $error_data['login_name_error'] = '';
        $error_data['password_error'] = '<span class="fcb2">6-20 characters (a-z,0-9only)</span>';
        $error_data['confirm_error'] = '';
        $error_data['personal_industry_id_error'] = '';
        $error_data['name_error'] = '';
        $error_data['company_name_error'] = '';
        $error_data['personal_location_id_error'] = '';
        $error_data['tel_error'] = '';
        $error_data['code_error'] = '';
        if(!preg_match('/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/', trim($pastData['login_name']))) {
            $error_data['login_name_error'] = 'Please enter a valid Email address';
            $error_nums++;
        }else{
            $login_name = trim($pastData['login_name']);
            $can_reg = $this->_check_login_name($login_name);
            if(!$can_reg) {
                $error_data['login_name_error'] = 'This account already exists';
                $error_nums++;
            }
        }
        if(!preg_match('/^[0-9a-zA-Z]{6,20}$/', trim($pastData['password']))) {
            $error_data['password_error'] = 'Please enter 6-20 characters';
            $error_nums++;
        }
        if(trim($pastData['password']) != trim($pastData['confirm'])) {
            $error_data['confirm_error'] = 'The repeated password is inconsistent';
            $error_nums++;
        }
        if($pastData['personal_industry_id'] < 1) {
            $error_data['personal_industry_id_error'] = 'Please select your business industry';
            $error_nums++;
        }
        
        if(trim($pastData['first_name']) == '' || trim($pastData['last_name']) == '') {
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
                'password_error' => $error_data['password_error'],
                'confirm_error' => $error_data['confirm_error'],
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
}
