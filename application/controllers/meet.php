<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-1-10
 * Time: 上午11:06
 */
class meet extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->config->load('custom');
        $this->load->library('pagination');
        $this->load->model('industry_model', 'Industry');
        $this->load->model('new_buyersmeet_model', 'Meet');
        $this->load->model('new_buyersmeet_invite_model', 'Meet_invite');
    }

    function index() {
//        $latest_exhibition = $this->Exhibition->find_latest(10);
//        $near_exhibition = $this->Exhibition->find_near_future(10);
//        if($latest_exhibition)
//        {
//            $data['latest_exhibition'] = $latest_exhibition;
//        }
//        if($near_exhibition)
//        {
//            $data['near_exhibition'] = $near_exhibition;
//        }
//        //$seo['title'] = 'More kinds of Products for sale online-'.$result->row(0)->full_name_en;
        $seo['keywords'] = 'product price,product type,product list,product for sale';
        //$seo['description'] = $result->row(0)->full_name_en.' provides the complete collection of product, including the product types, product introduction, display to give the most comprehensive reference for your purchase.';
        $data['seo'] = $seo;

        $this->load->view('meet/ls', $data);
    }

    /**
     * [买家见面会列表]
     * @return [type] [description]
     */
    function ls() {
        $result = $this->Industry->get_lv1_and_lv2();
        $data['industry_1and2_result'] = $result;
        $seo['keywords'] = 'product price,product type,product list,product for sale';
        //$seo['description'] = $result->row(0)->full_name_en.' provides the complete collection of product, including the product types, product introduction, display to give the most comprehensive reference for your purchase.';
        $data['seo'] = $seo;

        $page = $this->uri->segment(3);
        if(!is_numeric($page)) {
            $page = 1;
        }
        $config['uri_segment'] = 3;
        $data['meet_nums'] = $this->Meet->count_meets();
        $config['per_page'] = '5';
        $config['base_url'] = base_url().'meet/ls/';
        $config['total_rows'] = $data['meet_nums'];
        $config['next_link'] = '下一页';
        $config['prev_link'] = '上一页';
        $config['last_link'] = '末页';
        $config['first_link'] = '首页';
        $this->pagination->initialize($config);
        $data['pg_link'] = $this->pagination->create_links();
        $data['meet_ls'] = $this->Meet->page($page,$config['per_page']);
        //print_r($data['meet_ls']->result());
        $this->load->view('meet/ls',$data);
    }


    /**
     * [买家见面会详细信息]
     * @return [type] [description]
     */
    function detail()
    {
        $result = $this->Industry->get_lv1_and_lv2();
        $data['industry_1and2_result'] = $result;
        //$seo['title'] = 'More kinds of Products for sale online-'.$result->row(0)->full_name_en;
        $seo['keywords'] = 'product price,product type,product list,product for sale';
        //$seo['description'] = $result->row(0)->full_name_en.' provides the complete collection of product, including the product types, product introduction, display to give the most comprehensive reference for your purchase.';
        $data['seo'] = $seo;
        $data['meet_detail'] = $this->Meet->get_meet_detail_by_meetId($this->uri->segment(3));
        $this->load->view('meet/detail', $data);
    }


    /**
     * [报名参加买家见面会]
     * @return [type] [description]
     */
    function signUp()
    {
        $userdata = $this->session->userdata;
        $meet_id = $this->uri->segment(3);
        //echo $meet_id;
        if(isset($userdata['user_session']['id']))
        {
            $company_id = $userdata['user_session']['id'];
            $invite = $this->Meet_invite->select_if_exist($meet_id,$company_id);
            if(empty($invite))
            {
                $id = $this->Meet_invite->apply($meet_id,$company_id);
                if($id)
                {
                    echo "<script>alert('报名成功！');location.href='".base_url()."meet/detail/".$meet_id."';</script>";
                }else
                {
                    echo "<script>alert('很抱歉，报名失败！');location.href='".base_url()."meet/detail/".$meet_id."';</script>";
                }
            }
            else
            {
                 echo "<script>alert('您已经报过名了');location.href='".base_url()."meet/detail/".$meet_id."';</script>";
            }
        }else
        {
            echo "<script>alert('您还没有登录');location.href='".base_url()."meet/detail/".$meet_id."';</script>";
        } 
    }

}