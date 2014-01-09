<?
/**
 * 
 */
class Product extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->config->load('custom');
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
	}
}
