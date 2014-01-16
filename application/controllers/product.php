<<<<<<< HEAD
﻿<?
=======
<?
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
/**
 * 
 */
class Product extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->config->load('custom');
<<<<<<< HEAD
		$this->load->library('pagination');
=======
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		$this->load->model('area_model', 'Area');
		$this->load->model('favorit_model', 'Favorit');
		$this->load->model('company_model', 'Company');
		$this->load->model('company_detail_model', 'CompanyDetail');
		$this->load->model('industry_model', 'Industry');
		$this->load->model('product_model', 'Product');
		$this->load->model('product_image_model', 'ProductImage');
		$this->load->model('pay_type_model', 'PayType');
		$this->load->model('product_pay_type_model', 'ProductPayType');
		$this->load->model('company_certification_model', 'CompanyCertification');
	}
<<<<<<< HEAD
	/**
	 * [刚进入产品列表的时候]
	 * @return [type] [description]
	 */
	function index() {
		$result = $this->Industry->get_lv1_and_lv2();
		$data['industry_1and2_result'] = $result;
		$seo['title'] = 'Global B2B Marketplace-Online Marketing,Trade Leads,Providers,Exporters,Suppliers Directory:Global Expo Online';
		$seo['keywords'] = 'Export,Import,Manufacturers,Suppliers,Exporters,Traders,Importers,Buyers,wholesaler,Importer Directory, Suppliers Directory, China Manufacturers,B2B Online Suppliers,marketplace, globalsources,Ecommerce';
		$seo['description'] = 'Reliable China Manufacturers & Pre-Qualify Products,All Products Made In China.  Global Expo Online is a B2B portal in China which offers online marketing for Business to Business trade leads to importers. As the largest B2B Marketplace,we offer instant B2B solutions by online business directory and yellow pages of China manufacturers, China suppliers .';
		$data['seo'] = $seo;
		
		$pg = $this->uri->segment(3);
		if(!is_numeric($pg)) {
			$pg = 1;
		}
		$config['uri_segment'] = 3;
		$data['product_nums'] = $this->Product->count_by_lv1();
		$config['per_page'] = '4';
		$config['base_url'] = base_url().'product/index/';
		$config['total_rows'] = $data['product_nums'];
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['last_link'] = '末页';
		$config['first_link'] = '首页';
		$this->pagination->initialize($config);
		$data['pg_link'] = $this->pagination->create_links();
		$data['product_ls'] = $this->Product->pg_lv1('',$pg,$config['per_page']);
		$this->load->view('product/index',$data);
	}
	/**
	 * [产品列表的一级分类页面]
	 * @return [type] [description]
	 */
	function result() {
		$result = $this->Industry->get_lv1_and_lv2();
		$data['industry_1and2_result'] = $result;
		$seo['title'] = 'Global B2B Marketplace-Online Marketing,Trade Leads,Providers,Exporters,Suppliers Directory:Global Expo Online';
		$seo['keywords'] = 'Export,Import,Manufacturers,Suppliers,Exporters,Traders,Importers,Buyers,wholesaler,Importer Directory, Suppliers Directory, China Manufacturers,B2B Online Suppliers,marketplace, globalsources,Ecommerce';
		$seo['description'] = 'Reliable China Manufacturers & Pre-Qualify Products,All Products Made In China.  Global Expo Online is a B2B portal in China which offers online marketing for Business to Business trade leads to importers. As the largest B2B Marketplace,we offer instant B2B solutions by online business directory and yellow pages of China manufacturers, China suppliers .';
		$data['seo'] = $seo;

		$industry1_id = $this->uri->segment(3);
		$data['industry'] = $this->Industry->get_title_by_id($industry1_id);

		$pg = $this->uri->segment(4);
		if(!is_numeric($pg)) {
			$pg = 1;
		}
		$config['uri_segment'] = 4;
		$data['product_nums'] = $this->Product->count_by_lv1($industry1_id);
		$config['per_page'] = '4';
		$config['base_url'] = base_url().'product/result/'.$industry1_id;
		$config['total_rows'] = $data['product_nums'];
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['last_link'] = '末页';
		$config['first_link'] = '首页';
		$this->pagination->initialize($config);
		$data['pg_link'] = $this->pagination->create_links();
		$data['product_ls'] = $this->Product->pg_lv1($industry1_id,$pg,$config['per_page']);
		$this->load->view('product/index',$data);
	}
	/**
	 * [产品分类二级分类页面]
	 * @return [type] [description]
	 */
	function result_two() {
		$result = $this->Industry->get_lv1_and_lv2();
		$data['industry_1and2_result'] = $result;
		$seo['title'] = 'Global B2B Marketplace-Online Marketing,Trade Leads,Providers,Exporters,Suppliers Directory:Global Expo Online';
		$seo['keywords'] = 'Export,Import,Manufacturers,Suppliers,Exporters,Traders,Importers,Buyers,wholesaler,Importer Directory, Suppliers Directory, China Manufacturers,B2B Online Suppliers,marketplace, globalsources,Ecommerce';
		$seo['description'] = 'Reliable China Manufacturers & Pre-Qualify Products,All Products Made In China.  Global Expo Online is a B2B portal in China which offers online marketing for Business to Business trade leads to importers. As the largest B2B Marketplace,we offer instant B2B solutions by online business directory and yellow pages of China manufacturers, China suppliers .';
		$data['seo'] = $seo;

		$industry2_id = $this->uri->segment(3);
		$data['industry'] = $this->Industry->get_title_by_id($industry2_id);

		$pg = $this->uri->segment(4);

		if(!is_numeric($pg)) {
			$pg = 1;
		}
		$config['uri_segment'] = 4;
		$data['product_nums'] = $this->Product->count_by_lv2($industry2_id);
		$config['per_page'] = '4';
		$config['base_url'] = base_url().'product/result_two/'.$industry2_id;
		$config['total_rows'] = $data['product_nums'];
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['last_link'] = '末页';
		$config['first_link'] = '首页';
		$this->pagination->initialize($config);
		$data['pg_link'] = $this->pagination->create_links();
		$data['product_ls'] = $this->Product->pg_lv2($industry2_id,$pg,$config['per_page']);
		$this->load->view('product/index',$data);
	}
	/**
	 * [产品分类三级分类页面]
	 * @return [type] [description]
	 */
	function result_three() {
		$result = $this->Industry->get_lv1_and_lv2();
		$data['industry_1and2_result'] = $result;
		$seo['title'] = 'Global B2B Marketplace-Online Marketing,Trade Leads,Providers,Exporters,Suppliers Directory:Global Expo Online';
		$seo['keywords'] = 'Export,Import,Manufacturers,Suppliers,Exporters,Traders,Importers,Buyers,wholesaler,Importer Directory, Suppliers Directory, China Manufacturers,B2B Online Suppliers,marketplace, globalsources,Ecommerce';
		$seo['description'] = 'Reliable China Manufacturers & Pre-Qualify Products,All Products Made In China.  Global Expo Online is a B2B portal in China which offers online marketing for Business to Business trade leads to importers. As the largest B2B Marketplace,we offer instant B2B solutions by online business directory and yellow pages of China manufacturers, China suppliers .';
		$data['seo'] = $seo;

		$industry3_id = $this->uri->segment(3);
		$data['industry'] = $this->Industry->get_title_by_id($industry3_id);

		$pg = $this->uri->segment(4);

		if(!is_numeric($pg)) {
			$pg = 1;
		}
		$config['uri_segment'] = 4;
		$data['product_nums'] = $this->Product->count_by_lv3($industry3_id);
		$config['per_page'] = '4';
		$config['base_url'] = base_url().'product/result_three/'.$industry3_id;
		$config['total_rows'] = $data['product_nums'];
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['last_link'] = '末页';
		$config['first_link'] = '首页';
		$this->pagination->initialize($config);
		$data['pg_link'] = $this->pagination->create_links();
		$data['product_ls'] = $this->Product->pg_lv3($industry3_id,$pg,$config['per_page']);
		$this->load->view('product/index',$data);
	}
	/**
	 * [产品分类四级分类页面]
	 * @return [type] [description]
	 */
	function result_four() {
		$result = $this->Industry->get_lv1_and_lv2();
		$data['industry_1and2_result'] = $result;
		$seo['title'] = 'Global B2B Marketplace-Online Marketing,Trade Leads,Providers,Exporters,Suppliers Directory:Global Expo Online';
		$seo['keywords'] = 'Export,Import,Manufacturers,Suppliers,Exporters,Traders,Importers,Buyers,wholesaler,Importer Directory, Suppliers Directory, China Manufacturers,B2B Online Suppliers,marketplace, globalsources,Ecommerce';
		$seo['description'] = 'Reliable China Manufacturers & Pre-Qualify Products,All Products Made In China.  Global Expo Online is a B2B portal in China which offers online marketing for Business to Business trade leads to importers. As the largest B2B Marketplace,we offer instant B2B solutions by online business directory and yellow pages of China manufacturers, China suppliers .';
		$data['seo'] = $seo;

		$industry4_id = $this->uri->segment(3);
		$data['industry'] = $this->Industry->get_title_by_id($industry4_id);

		$pg = $this->uri->segment(4);

		if(!is_numeric($pg)) {
			$pg = 1;
		}
		$config['uri_segment'] = 4;
		$data['product_nums'] = $this->Product->count_by_lv4($industry4_id);
		$config['per_page'] = '4';
		$config['base_url'] = base_url().'product/result_four/'.$industry4_id;
		$config['total_rows'] = $data['product_nums'];
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['last_link'] = '末页';
		$config['first_link'] = '首页';
		$this->pagination->initialize($config);
		$data['pg_link'] = $this->pagination->create_links();
		$data['product_ls'] = $this->Product->pg_lv4($industry4_id,$pg,$config['per_page']);
		$this->load->view('product/index',$data);
	}

	/**
	 * [商品详情页面]
	 * @return [type] [description]
	 */
	function pro_detail()
	{
		$result = $this->Industry->get_lv1_and_lv2();
		$data['industry_1and2_result'] = $result;
		$seo['title'] = 'Global B2B Marketplace-Online Marketing,Trade Leads,Providers,Exporters,Suppliers Directory:Global Expo Online';
		$seo['keywords'] = 'Export,Import,Manufacturers,Suppliers,Exporters,Traders,Importers,Buyers,wholesaler,Importer Directory, Suppliers Directory, China Manufacturers,B2B Online Suppliers,marketplace, globalsources,Ecommerce';
		$seo['description'] = 'Reliable China Manufacturers & Pre-Qualify Products,All Products Made In China.  Global Expo Online is a B2B portal in China which offers online marketing for Business to Business trade leads to importers. As the largest B2B Marketplace,we offer instant B2B solutions by online business directory and yellow pages of China manufacturers, China suppliers .';
		$data['seo'] = $seo;

		$data['pro_detail'] = $this->Product->get_product_detail_by_productId($this->uri->segment(3));
		$data['paytype'] = $this->Product->get_pay_type_by_productId($this->uri->segment(3));
		$industry = $this->Product->get_industry_id($this->uri->segment(3));
		$data['industry'] = $industry;
		if(!empty($industry['0']['industry1_id']))
		{
			$ind_title1 = $this->Industry->get_title_by_id($industry['0']['industry1_id']);
			$data['industry1'] = $ind_title1['0']['title'];
		}
		if(!empty($industry['0']['industry2_id']))
		{
			$ind_title2 = $this->Industry->get_title_by_id($industry['0']['industry2_id']);
			$data['industry2'] = $ind_title2['0']['title'];
		}
		if(!empty($industry['0']['industry3_id']))
		{
			$ind_title3 = $this->Industry->get_title_by_id($industry['0']['industry3_id']);
			$data['industry3'] = $ind_title3['0']['title'];
		}
		if(!empty($industry['0']['industry4_id']))
		{
			$ind_title4 = $this->Industry->get_title_by_id($industry['0']['industry4_id']);
			$data['industry4'] = $ind_title4['0']['title'];
		} 
		$this->load->view('product/pro_detail',$data);
	}
	/**
	 * [产品收藏]
	 * @return [type] [description]
	 */
	function favorite_pro()
	{
		$userdata = $this->session->userdata;
        $pro_id = $this->uri->segment(3);
        if(isset($userdata['user_session']['id']))
        {
        	$self_company_id = $userdata['user_session']['id'];
        	$company_id = 0;
	        if( $this->Favorit->add($self_company_id, $company_id, $pro_id))
	        {
	        	echo "<script>alert('收藏产品成功！');location.href='".base_url()."product/pro_detail/".$pro_id."';</script>";
	        }
	        else
	        {
	        	echo "<script>alert('很抱歉，收藏产品失败！');location.href='".base_url()."product/pro_detail/".$pro_id."';</script>";
	        }
        }else
        {
        	echo "<script>alert('您还没有登录,只有登录之后才能收藏');location.href='".base_url()."product/pro_detail/".$pro_id."';</script>";
        }
	}
	/**
	 * [公司收藏]
	 * @return [type] [description]
	 */
	function favorite_com()
	{
		$userdata = $this->session->userdata;
        $company_id = $this->uri->segment(3);
        $pro_id = $this->uri->segment(4);
        if(isset($userdata['user_session']['id']))
        {
        	$self_company_id = $userdata['user_session']['id'];
        	$product_id = 0;
	        if( $this->Favorit->add($self_company_id, $company_id, $product_id))
	        {
	        	echo "<script>alert('收藏公司成功！');location.href='".base_url()."product/pro_detail/".$pro_id."';</script>";
	        }
	        else
	        {
	        	echo "<script>alert('很抱歉，收藏公司失败！');location.href='".base_url()."product/pro_detail/".$pro_id."';</script>";
	        }
        }else
        {
        	echo "<script>alert('您还没有登录,只有登录之后才能收藏');location.href='".base_url()."product/pro_detail/".$pro_id."';</script>";
        }
=======
	
	function index() {
		$industry_string = explode('/', uri_string());
		$industry_id = explode('_', $industry_string[0]);
		$product_id = explode('_', $industry_string[1]);
		$industry_id = $industry_id[1];
		$product_id = $product_id[1];
		
		$industry_title_en = $this->Industry->check_industry_id($industry_id);
		if(!$industry_title_en) {
			show_404();
		}
		
		$industry_level = $this->Industry->check_level($industry_id);
		
		$product_result = $this->Product->check_product_industry($product_id, $industry_id, $industry_level);
		if(!$product_result) {
			show_404();
		}
		
		if($industry_level == 3) {
			$industry_parent_title_en = $this->Industry->find_parent_title_en($industry_id);
			$industry_parent_id = $this->Industry->find_parent_id($industry_id);
			$seo_lv2_link = industry_link($industry_parent_title_en).'_'.$industry_parent_id;
			$industry_parent2_title_en = $this->Industry->find_parent2_title_en($industry_id);
			$seo_lv3_link = industry_link($industry_title_en).'_'.$industry_id;
			$data['bread'] = $industry_parent2_title_en.'&nbsp;&gt;&nbsp;<a href="'.base_url().$seo_lv2_link.'">'.$industry_parent_title_en.'</a>&nbsp;&gt;&nbsp;<a href="'.base_url().$seo_lv3_link.'">'.$industry_title_en.'</a>&nbsp;&gt;&nbsp;'.$product_result->row(0)->title_en;
		}else{
			$industry_parent_title_en = $this->Industry->find_parent_title_en($industry_id);
			$industry_parent2_title_en = $this->Industry->find_parent2_title_en($industry_id);
			$industry_parent2_id = $this->Industry->find_parent2_id($industry_id);
			$seo_lv2_link = industry_link($industry_parent2_title_en).'_'.$industry_parent2_id;
			$industry_parent3_title_en = $this->Industry->find_parent3_title_en($industry_id);
			$seo_lv4_link = industry_link($industry_title_en).'_'.$industry_id;
			$data['bread'] = $industry_parent3_title_en.'&nbsp;&gt;&nbsp;<a href="'.base_url().$seo_lv2_link.'">'.$industry_parent2_title_en.'</a>&nbsp;&gt;&nbsp;'.$industry_parent_title_en.'&nbsp;&gt;&nbsp;<a href="'.base_url().$seo_lv4_link.'">'.$industry_title_en.'</a>&nbsp;&gt;&nbsp;'.$product_result->row(0)->title_en;
		}
		
		$product_img = $this->ProductImage->find_by_product_id($product_id);
		$img_array = array();
		foreach($product_img->result() as $row) {
			array_push($img_array, array(
				'big' => base_url().'webroot/user_upload/big/'.substr($row->path, 0, 2).'/'.$row->path.'.jpg',
				'small' => base_url().'webroot/user_upload/min/'.substr($row->path, 0, 2).'/'.$row->path.'.jpg'
			));
		}
		if($product_img->num_rows() == 0) {
			$data['img_num'] = 1;
			array_push($img_array, array(
				'big' => base_url().'webroot/images/no_img_b.jpg',
				'small' => base_url().'webroot/images/no_img_s.jpg',
			));
		}else{
			$data['img_num'] = $product_img->num_rows();
		}
		$data['real_img_num'] = $product_img->num_rows();
		$data['img_array'] = $img_array;
		
		$pay_type_array = $this->ProductPayType->find_by_product_id($product_id);
		$pay_types = array();
		foreach($pay_type_array as $key => $row) {
			$type_result = $this->PayType->find_by_id($pay_type_array[$key]);
			array_push($pay_types, $type_result->row(0)->title);
		}
		$data['pay_types'] = $pay_types;
		
		$company_id = $this->Product->get_company_id($product_id);
		$base_result = $this->Company->find_by_id($company_id);
		$detail_result = $this->CompanyDetail->find_by_company_id($company_id);
		if($detail_result->num_rows()) {
			$data['detail_result'] = $detail_result;
		}
		$data['base_result'] = $base_result;
		
		$data['product_result'] = $product_result;
		$seo['title'] = $product_result->row(0)->title_en.'-'.$industry_title_en.' Suppliers and Exporters Directory';
		$seo['keywords'] = $product_result->row(0)->title_en.','.$product_result->row(0)->title_en.' price, '.$product_result->row(0)->title_en.' Suppliers';
		$seo['description'] = 'Find Complete Details about '.$product_result->row(0)->title_en.' from '.$industry_title_en.' Supplier or Manufacturer-'.$base_result->row(0)->full_name_en.'.';
		$data['seo'] = $seo;
		$this->load->view('product/index', $data);
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
	}
}
