<?
/**
 * 
 */
class Product extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->config->load('custom');
		$this->load->library('pagination');
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
	}
}
