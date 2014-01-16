<?php
/**
 * Created by PhpStorm.
 * User: duankelin
 * Date: 1/9/14
 * Time: 9:10 PM
 */

class exhibition extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->config->load('custom');
        $this->load->model('area_model', 'Area');
        $this->load->model('exhibition_model','Exhibition');
        $this->load->model('industry_model', 'Industry');
        $this->load->model('personal_location_model','PersonalLocation');
        //$this->load->helper('MY_string');
    }

    function index() {

        $latest_exhibition = $this->Exhibition->find_latest(10);
        $near_exhibition = $this->Exhibition->find_near_future(10);
        if($latest_exhibition)
        {
            $data['latest_exhibition'] = $latest_exhibition;
        }
        if($near_exhibition)
        {
            $data['near_exhibition'] = $near_exhibition;
        }
        //$seo['title'] = 'More kinds of Products for sale online-'.$result->row(0)->full_name_en;
        $seo['keywords'] = 'product price,product type,product list,product for sale';
        //$seo['description'] = $result->row(0)->full_name_en.' provides the complete collection of product, including the product types, product introduction, display to give the most comprehensive reference for your purchase.';
        $data['seo'] = $seo;
        $data['industry_1and2_result'] = $this->Industry->get_lv1_and_lv2();
        $this->load->view('company/ls', $data);
    }

    function detail()
    {
        $id = $this->uri->segment(3);
        $result = $this->Exhibition->find_by_id($id);
        if($result)
        {
            $data['result'] = $result->row_array();
        }
        $media = $this->Exhibition->find_cooperate_media($id);
        if($media)
        {
            $data['media'] = $media;
        }
        $company = $this->Exhibition->find_company_by_id($id);
        if($company)
        {
            $data['company'] = $company;
        }
        //$seo['title'] = 'More kinds of Products for sale online-'.$result->row(0)->full_name_en;
        $seo['keywords'] = 'product price,product type,product list,product for sale';
        //$seo['description'] = $result->row(0)->full_name_en.' provides the complete collection of product, including the product types, product introduction, display to give the most comprehensive reference for your purchase.';
        $data['seo'] = $seo;
        $data['industry_1and2_result'] = $this->Industry->get_lv1_and_lv2();
        $data['is_applied'] = $this->Exhibition->is_applied($data['result']['id']);
        $data['personal_locations'] = $this->PersonalLocation->find();
        $this->load->view('exhibition/detail', $data);
    }

    function ls() {
        $per_page = 3;
        $pages = $this->uri->segment(3);
        $pages_array_tmp = array(1,1,1);
        if($pages)
        {
            $pages_array_tmp = explode('-',$pages);
        }
        $i=0;
        foreach($pages_array_tmp as $key => $value)
        {
            if($value!='')
            {
                $pages_array[$i] = $value;
                $i++;
            }
        }
        $data['latest_total'] = floor($this->Exhibition->find_latest_count()/$per_page)+1;
        $data['near_total'] = floor($this->Exhibition->find_near_count()/$per_page)+1;
        $data['history_total'] = floor($this->Exhibition->find_history_count()/$per_page)+1;
        $total_key= array('latest','near','history');
        foreach($pages_array as $key => $value)
        {
            if($value<1)
            {
                $pages_array[$key] = 1;
            }
            else if($value>$data[$total_key[$key].'_total'])
            {
                $pages_array[$key] = $data[$total_key[$key].'_total'];
            }
        }
        $data['location_id'] = $this->input->get('country');
        $data['kw'] = $this->input->get('kw');
        $data['time_m'] = $this->input->get('time');
        $data['location_id'] = $this->input->get('country');
        $data['time_m'] = $this->input->get('time');
        $data['kw'] = $this->input->get('kw');
        $data['url_end'] = "?location_id=".$data['location_id']."&time_m=".$data['time_m']."&kw=".$data['kw'];
        $latest_exhibition = $this->Exhibition->find_exhibition_latest($per_page,$pages_array[0],$data['location_id'],$data['time_m'],$data['kw']);
        $near_exhibition = $this->Exhibition->find_exhibition_in_future($per_page,$pages_array[1],$data['location_id'],$data['time_m'],$data['kw']);
        $history_exhibition = $this->Exhibition->find_exhibition_history($per_page,$pages_array[2],$data['location_id'],$data['time_m'],$data['kw']);



        if($latest_exhibition)
        {
            $latest_applied = array();
            foreach($latest_exhibition->result_array() as $key => $value)
            {
                $latest_applied[$key] = $this->Exhibition->is_applied($value['id']);
            }
            $data['latest_applied'] = $latest_applied;
        }

        if($near_exhibition)
        {
            $near_applied = array();
            foreach($near_exhibition->result_array() as $key => $value)
            {
                $near_applied[$key] = $this->Exhibition->is_applied($value['id']);
            }
            $data['near_applied'] = $near_applied;
        }

        if($history_exhibition)
        {
            $history_applied = array();
            foreach($history_exhibition->result_array() as $key => $value)
            {
                $history_applied[$key] = $this->Exhibition->is_applied($value['id']);
            }
            $data['history_applied'] = $history_applied;
        }

        $data['latest_exhibition'] = $latest_exhibition;
        $data['near_exhibition'] = $near_exhibition;
        $data['history_exhibition'] = $history_exhibition;
        $data['latest_page'] = $pages_array[0];
        $data['near_page'] = $pages_array[1];
        $data['history_page'] = $pages_array[2];
        //$seo['title'] = 'More kinds of Products for sale online-'.$result->row(0)->full_name_en;
        $seo['keywords'] = 'product price,product type,product list,product for sale';
        //$seo['description'] = $result->row(0)->full_name_en.' provides the complete collection of product, including the product types, product introduction, display to give the most comprehensive reference for your purchase.';
        $data['seo'] = $seo;
        $data['industry_1and2_result'] = $this->Industry->get_lv1_and_lv2();
        $data['personal_locations'] = $this->PersonalLocation->find();
        $this->load->view('exhibition/ls', $data);
    }

    //ajax_apply
    function exhibition_apply()
    {
        @$exhibition_id = $this->input->post('exhibition_id');
        if(!$this->session->userdata('user_session'))
        {
            $resul=array(
                'result' => false,
                'msg' => '请登录'
            );
        }
        if($exhibition_id>0)
        {
            $company_id = $this->session->userdata('user_session')['id'];
            $apply_re = $this->Exhibition->apply_exhibition($exhibition_id,$company_id);
            if($apply_re>0)
            {
                $resul=array(
                    'result' => true,
                    'msg' => '申请成功'
                );
            }
            else
            {
                $resul=array(
                    'result' => false,
                    'msg' => '申请失败'
                );
            }
        }
        else
        {
            $resul=array(
                'result' => false,
                'msg' => $exhibition_id
            );
        }
        header("Content-type: application/json");
        echo json_encode($resul);
    }

    function apply()
    {
        $this->load->helper(array('string', 'captcha', 'code', 'email'));
        $this->load->model('personal_industry_model', 'PersonalIndustry');
        $id = $this->uri->segment(3);
        if($this->session->userdata('user_session')) {
            if($id>0)
            {
                $company_id = $this->session->userdata('user_session')['id'];
                $apply_re = $this->Exhibition->apply_exhibition($id,$company_id);
                if($apply_re>0)
                {
                    echo"<script>alert('报名成功')</script>";
                }
                else
                {
                    echo"<script>alert('报名失败')</script>";
                }
            }
            else
            {
                echo"<script>alert('没有该展会')</script>";
            }
            redirect(base_url()."exhibition/detail/".$id);
            return;
        }
        $data['code'] = code($this->config->item('code_path'));
        $this->config->item('code_path');
        $this->session->set_userdata('code', $data['code']['code']);
        $data['industry_result'] = $this->PersonalIndustry->find();
        $data['recommend_location'] = $this->PersonalLocation->find_recommend();
        $data['location_result'] = $this->PersonalLocation->find();
        $seo['title'] = 'B2B Directory & China Manufacturers-Join Our Manufacturer Directory';
        $seo['keywords'] = 'China Manufacturer Directory,China B2B Directory,China Manufacturers';
        $seo['description'] = 'Global Expo Online Manufacturers Directory- Best B2B China Products Manufacturer Direcory,Supplier Directory,Exporter Directory,Suppliers Sources,Exporter Sources, Wholesale Source, Out Sources Manufacturers For Global Buyers Sourcing.';
        $data['seo'] = $seo;

        $result = $this->Exhibition->find_by_id($id);
        if($result)
        {
            $data['result'] = $result->row_array();
        }
        $this->load->view('exhibition/apply', $data);
    }
}