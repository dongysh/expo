<?
/**
 * 
 */
class Company extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->config->load('custom');
		$this->load->model('favorit_model', 'Favorit');
		$this->load->model('area_model', 'Area');
		$this->load->model('company_model', 'Company');
		$this->load->model('company_detail_model', 'CompanyDetail');
		$this->load->model('company_certification_model', 'CompanyCertification');
		$this->load->model('product_model', 'Product');
		$this->load->model('product_image_model', 'ProductImage');
		$this->load->model('company_image_model', 'CompanyImage');
		$this->load->model('pay_type_model', 'PayType');
		$this->load->model('product_pay_type_model', 'ProductPayType');
	}
	
	function index() {
		$company_short_name = uri_string();
		$result = $this->Company->find_by_short_name($company_short_name);
		if(!$result) {
			show_404();
		}
		
		$detail_result = $this->CompanyDetail->find_by_company_id($result->row(0)->id);
		if($detail_result->num_rows()) {
			$data['detail_result'] = $detail_result;
		}
		
		$product_5 = $this->Product->find_top5_by_company_id($result->row(0)->id);
		$data['product_5'] = $product_5;
		
		$company_img = $this->CompanyImage->find_by_company_id($result->row(0)->id);
		$img_array = array();
		foreach($company_img->result() as $row) {
			array_push($img_array, array(
				'big' => base_url().'webroot/user_upload/big/'.substr($row->path, 0, 2).'/'.$row->path.'.jpg',
				'small' => base_url().'webroot/user_upload/min/'.substr($row->path, 0, 2).'/'.$row->path.'.jpg'
			));
		}
		if($company_img->num_rows() == 0) {
			$data['img_num'] = 1;
			array_push($img_array, array(
				'big' => base_url().'webroot/images/no_img_b.jpg',
				'small' => base_url().'webroot/images/no_img_s.jpg',
			));
		}else{
			$data['img_num'] = $company_img->num_rows();
		}
		$data['real_img_num'] = $company_img->num_rows();
		$data['img_array'] = $img_array;
		
		$data['base_result'] = $result;
		$seo['title'] = $result->row(0)->full_name_en.'-professional supplier in China';
		$seo['keywords'] = 'Manufacturer, Supplier, Exporter, Importer, Wholesaler, Product';
		if($detail_result->num_rows()) {
			$seo['description'] = 'Manufacturer & Exporter of '.$detail_result->row(0)->main_product_en.' from China,to find online business details for prodcuts，Please contact us!';
		}else{
			$seo['description'] = 'Online shopping from the largest selection of Products. All products are available for purchase online.High quality with competitive price!';
		}
		$data['seo'] = $seo;
		$this->load->view('company/index', $data);
	}
	
	function ls() {

		$company_short_name = uri_string();
		$company_short_name = explode('-', $company_short_name);
		$result = $this->Company->find_by_short_name($company_short_name[0]);
		if(!$result) {
			show_404();
		}
		
		$detail_result = $this->CompanyDetail->find_by_company_id($result->row(0)->id);
		if($detail_result->num_rows()) {
			$data['detail_result'] = $detail_result;
		}
        $page = 1;
		if($this->uri->segment(2)>0)
        {
            $page = $this->uri->segment(2);
        }
        $count = $this->Product->find_total_by_company_id($result->row(0)->id);

		$product_all = $this->Product->find_some_by_company_id($result->row(0)->id,$page);
        foreach($product_all->result_array() as $key => $value)
        {
            $product_img[$key] = $this->ProductImage->get_one_img($value['p_id']);
        }
        $this->load->library('pagination');
        $config['base_url'] = base_url().$company_short_name[0].'-products';
        $config['total_rows'] = $count;
        $per_page = 8;
        $config['per_page'] = $per_page;
        $config['num_links'] = 2;
        $config['uri_segment'] = 2;
        $config['prev_link'] = '上一页';
        $config['prev_tag_open'] = "";
        $config['prev_tag_close'] = "";
        $config['cur_tag_open'] = "<span class='page-cur'>";
        $config['cur_tag_close'] = '</span>';
        $config['next_link'] = '下一页';
        $config['next_tag_open'] = "";
        $config['next_tag_close'] = '';
        $config['full_tag_open'] = '';
        $config['full_tag_close'] = '';
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $this->pagination->initialize($config);

        $data['product_img']=$product_img;
		$data['product_all'] = $product_all;
		$data['base_result'] = $result;
        $data['page_count'] = floor($count/$per_page)+1;
		$seo['title'] = 'More kinds of Products for sale online-'.$result->row(0)->full_name_en;
		$seo['keywords'] = 'product price,product type,product list,product for sale';
		$seo['description'] = $result->row(0)->full_name_en.' provides the complete collection of product, including the product types, product introduction, display to give the most comprehensive reference for your purchase.';
		$data['seo'] = $seo;
		$this->load->view('company/ls', $data);
	}
	
	function product() {
		$company_short_name = uri_string();
		$company_short_name = explode('-', $company_short_name);
		$product_id = explode('_', uri_string());
		$result = $this->Company->find_by_short_name($company_short_name[0]);

		if(!$result) {
			show_404();
		}
		
		$is_company_product = $this->Product->check_company_and_product($result->row(0)->id, $product_id[1]);
		if(!$is_company_product) {
			show_404();
		}
		
		$detail_result = $this->CompanyDetail->find_by_company_id($result->row(0)->id);
		if($detail_result->num_rows()) {
			$data['detail_result'] = $detail_result;
		}
		
		$product_5 = $this->Product->find_top5_by_company_id_no_self($result->row(0)->id, $product_id[1]);
		$data['product_5'] = $product_5;
		
		$product_img = $this->ProductImage->find_by_product_id($product_id[1]);
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
		
		$product_result = $this->Product->find_by_id($product_id[1]);
		$data['product_result'] = $product_result;
		
		$pay_type_array = $this->ProductPayType->find_by_product_id($product_id[1]);
		$pay_types = array();
		foreach($pay_type_array as $key => $row) {
			$type_result = $this->PayType->find_by_id($pay_type_array[$key]);
			array_push($pay_types, $type_result->row(0)->title);
		}
		$data['pay_types'] = $pay_types;
		
		$data['base_result'] = $result;
		$seo['title'] = $product_result->row(0)->title_en.' for Sale-'.$result->row(0)->full_name_en;
		$seo['keywords'] = $product_result->row(0)->title_en.', '.$product_result->row(0)->title_en.' price, '.$product_result->row(0)->title_en.' Wholesaler';
		$seo['description'] = 'We are engaged in the Manufacturing,Exporting and Supplying of '.$product_result->row(0)->title_en.',and we provide '.$product_result->row(0)->title_en.' with high quality,welcome to buy.';
		$data['seo'] = $seo;
		$this->load->view('company/product', $data);
	}
}
