<?
/**
 * 
 */
class Industry extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('area_model', 'Area');
		$this->load->model('industry_model', 'Industry');
		$this->load->model('product_model', 'Product');
		$this->load->model('product_image_model', 'ProductImage');
		$this->load->model('company_model', 'Company');
		$this->load->model('company_detail_model', 'CompanyDetail');
		$this->load->model('area_model', 'Area');
		$this->load->model('company_certification_model', 'CompanyCertification');
		$this->load->model('favorit_model', 'Favorit');
	}
	
	function index($pg = 1) {
		$uri_str = uri_string();
		$uri_array = explode('_', $uri_str);
		$industry_id = (int)$uri_array[1];
		
		$uri_str = uri_string();
		$uri_array1 = explode('/', $uri_str);
		if(isset($uri_array1[1])) {
			if(!is_numeric($uri_array1[1])) {
				show_404();
			}
			$industry_id1 = (int)$uri_array1[1];
		}else{
			$industry_id1 = 1;
		}
		$level = $this->Industry->check_level($industry_id);
		if($level < 2 || $level > 4){
			show_404();
		}
		switch($level) {
			case 2 :$this->lv2($industry_id); break;
			case 3 :$this->lv3($industry_id, $industry_id1); break;
			case 4 :$this->lv4($industry_id, $industry_id1); break;
		}
	}
	
	function lv2($industry_id){
		$result = $this->Industry->get_lv3_and_lv4($industry_id);
		$data['industry_3and4_result'] = $result;
		
		$industry_title_en = $this->Industry->find_title_en($industry_id);
		$data['industry_title_en'] = $industry_title_en;
		
		$industry_parent_title_en = $this->Industry->find_parent_title_en($industry_id);
		
		$lv2_product_result = $this->Product->find_lv2_product_by_industry2_id($industry_id);
		$data['lv2_product_result'] = $lv2_product_result;
		
		$lv2_all_product_result = $this->Product->find_lv2_all_product_by_industry2_id($industry_id);
		$company_id_array = array();
		foreach($lv2_all_product_result->result() as $row) {
			if(!in_array($row->id, $company_id_array)) {
				array_push($company_id_array, $row->id);
			}
		}
		$data['company_id_array'] = $company_id_array;
		
		$data['bread'] = $industry_parent_title_en.'&nbsp;&gt;&nbsp;'.$industry_title_en;
		$seo['title'] = $industry_title_en.' Products, '.$industry_title_en.' Manufacturers, '.$industry_title_en.' Suppliers and Exporters Directory';
		$seo['keywords'] = $industry_title_en.', '.$industry_title_en.' Products, '.$industry_title_en.' Manufacturers, '.$industry_title_en.' Suppliers, '.$industry_title_en.' Exporters';
		$seo['description'] = 'Choosing selected '.$industry_title_en.' products from reliable '.$industry_title_en.' manufacturers or '.$industry_title_en.' suppliers from Global Expo Online. We have countless superior products for your selection.';
		$data['seo'] = $seo;
		$this->load->view('industry/lv2', $data);
	}
	
	function lv3($industry_id, $pg){
		$has_next = $this->Industry->check_lv3_has_next($industry_id);
		if($has_next) {
			show_404();
		}
		
		$result = $this->Industry->get_lv_now($industry_id);
		$need_del_id = 0;
		foreach($result as $key => $row) {
			if($result[$key]['id'] == $industry_id) {
				$need_del_id = $key;
				break;
			}
		}
		unset($result[$need_del_id]);
		$data['lv_now'] = $result;
		
		$industry_title_en = $this->Industry->find_title_en($industry_id);
		$data['industry_title_en'] = $industry_title_en;
		
		$industry_parent_title_en = $this->Industry->find_parent_title_en($industry_id);
		$industry_parent_id = $this->Industry->find_parent_id($industry_id);
		$seo_lv2_link = industry_link($industry_parent_title_en).'_'.$industry_parent_id;
		$industry_parent2_title_en = $this->Industry->find_parent2_title_en($industry_id);
		
		//分页
		$product_nums = $this->Product->count_by_lv3($industry_id);
		$num = ($pg-1)*10;
		$config['base_url'] = base_url().industry_link($industry_title_en).'_'.$industry_id;
		$config['total_rows'] = $product_nums;
		
		$this->pagination->initialize($config);
		$data['pg_link'] = $this->pagination->create_links();
		$data['product_ls'] = $this->Product->pg_lv3($industry_id, $num);
		$data['product_nums'] = $product_nums;
		
		if($product_nums > 10) {
			$data['custom_link'] = TRUE;
		}
		if($product_nums % 10) {
			$pg_num = (int)($product_nums / 10) + 1;
		}else{
			$pg_num = $product_nums / 10;
		}
		$data['product_nums'] = $product_nums;
		$data['pg_num'] = $pg_num;
		$data['pg_now'] = $pg;
		$data['link_name'] = industry_link($industry_title_en).'_'.$industry_id;
		$data['bread'] = $industry_parent2_title_en.'&nbsp;&gt;&nbsp;<a href="'.base_url().$seo_lv2_link.'">'.$industry_parent_title_en.'</a>&nbsp;&gt;&nbsp;'.$industry_title_en;
		$seo['title'] = $industry_title_en.' Products, '.$industry_title_en.' Export Company Directory-Global Expo Online';
		$seo['keywords'] = $industry_title_en.' Products, '.$industry_title_en.' Export Company, '.$industry_title_en.' Export Company Directory';
		$seo['description'] = 'Global '.$industry_title_en.' Supplier Directory, '.$industry_title_en.' Manufacturers, '.$industry_title_en.' Factories, '.$industry_title_en.' Export Company, '.$industry_title_en.' Suppliers, Exporters, '.$industry_title_en.' Producers, Wholesalers, Distributors, '.$industry_parent_title_en.'.';
		$data['seo'] = $seo;
		$this->load->view('industry/lv3', $data);
	}
	
	function lv4($industry_id, $pg){
		$result = $this->Industry->get_lv_now($industry_id);
		$need_del_id = 0;
		foreach($result as $key => $row) {
			if($result[$key]['id'] == $industry_id) {
				$need_del_id = $key;
				break;
			}
		}
		unset($result[$need_del_id]);
		$data['lv_now'] = $result;
		
		$industry_title_en = $this->Industry->find_title_en($industry_id);
		$data['industry_title_en'] = $industry_title_en;
		
		$industry_parent_title_en = $this->Industry->find_parent_title_en($industry_id);
		$industry_parent2_title_en = $this->Industry->find_parent2_title_en($industry_id);
		$industry_parent2_id = $this->Industry->find_parent2_id($industry_id);
		$seo_lv2_link = industry_link($industry_parent2_title_en).'_'.$industry_parent2_id;
		$industry_parent3_title_en = $this->Industry->find_parent3_title_en($industry_id);
		
		//分页
		$product_nums = $this->Product->count_by_lv4($industry_id);
		$num = ($pg-1)*10;
		$config['base_url'] = base_url().industry_link($industry_title_en).'_'.$industry_id;
		$config['total_rows'] = $product_nums;
		
		$this->pagination->initialize($config);
		$data['pg_link'] = $this->pagination->create_links();
		$data['product_ls'] = $this->Product->pg_lv4($industry_id, $num);
		$data['product_nums'] = $product_nums;
		
		if($product_nums > 10) {
			$data['custom_link'] = TRUE;
		}
		if($product_nums % 10) {
			$pg_num = (int)($product_nums / 10) + 1;
		}else{
			$pg_num = $product_nums / 10;
		}
		
		$data['product_nums'] = $product_nums;
		$data['pg_num'] = $pg_num;
		$data['pg_now'] = $pg;
		$data['link_name'] = industry_link($industry_title_en).'_'.$industry_id;
		$data['bread'] = $industry_parent3_title_en.'&nbsp;&gt;&nbsp;<a href="'.base_url().$seo_lv2_link.'">'.$industry_parent2_title_en.'</a>&nbsp;&gt;&nbsp;'.$industry_parent_title_en.'&nbsp;&gt;&nbsp;'.$industry_title_en;
		$seo['title'] = $industry_title_en.' Products, '.$industry_title_en.' Export Company Directory-Global Expo Online';
		$seo['keywords'] = $industry_title_en.' Products, '.$industry_title_en.' Export Company, '.$industry_title_en.' Export Company Directory';
		$seo['description'] = 'Global '.$industry_title_en.' Supplier Directory, '.$industry_title_en.' Manufacturers, '.$industry_title_en.' Factories, '.$industry_title_en.' Export Company, '.$industry_title_en.' Suppliers, Exporters, '.$industry_title_en.' Producers, Wholesalers, Distributors, '.$industry_parent_title_en.'.';
		$data['seo'] = $seo;
		$this->load->view('industry/lv4', $data);
	}
}
