<?
/**
 * 
 */
class Search extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('area_model', 'Area');
		$this->load->model('industry_model', 'Industry');
		$this->load->model('favorit_model', 'Favorit');
		$this->load->model('company_model', 'Company');
		$this->load->model('company_certification_model', 'CompanyCertification');
		$this->load->model('company_image_model', 'CompanyImage');
		$this->load->model('company_detail_model', 'CompanyDetail');
		$this->load->model('product_model', 'Product');
		$this->load->model('product_image_model', 'ProductImage');
<<<<<<< HEAD
		header("Content-type: text/html;charset=utf-8");
=======
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
	}
	
	function index() {
		if(!isset($_POST['key_word'])) {
			redirect(base_url());
		}else{
			$key_word = trim($this->input->post('key_word'));
		}
		if($key_word == '') {
			redirect(base_url());
		}
		$key_word = urlencode($key_word);
<<<<<<< HEAD
		redirect(base_url().'search/result/1/?kw='.$key_word.'&type='.$_POST['type']);
=======
		redirect(base_url().'search/result/1/?kw='.$key_word.'&type=1');
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
	}
	
	function result($pg = 1) {
		if(!is_numeric($pg)) {
			$pg = 1;
		}
		if(!isset($_GET['kw'])) {
			redirect(base_url());
		}else{
			$key_word = trim($this->input->get('kw'));
		}
		$key_word = urldecode($key_word);
		$key_word = str_replace('\"', '&quot;', $key_word);
		$key_word = str_replace('!', '', $key_word);
		$key_word = str_replace('@', '', $key_word);
		$key_word = str_replace('#', '', $key_word);
		$key_word = str_replace('$', '', $key_word);
		$key_word = str_replace('^', '', $key_word);
		$key_word = str_replace('&', '', $key_word);
		$key_word = str_replace('*', '', $key_word);
		$key_word = str_replace('?', '', $key_word);
		$key_word = str_replace('|', '', $key_word);
		$key_word = str_replace('+', '', $key_word);
		$key_word = str_replace('<', '', $key_word);
		$key_word = str_replace('>', '', $key_word);
		if($key_word == '') {
			redirect(base_url());
		}
<<<<<<< HEAD
		if($this->input->get('type') == '1') {
			$data['company_nums'] = $this->Company->count_by_key_word($key_word);
			$config['per_page'] = '4';
			$config['base_url'] = base_url().'search/result';
			$config['total_rows'] = $data['company_nums'];
			$this->pagination->initialize($config);
			$data['nums'] = $data['company_nums'];
			$data['pg_link'] = $this->pagination->create_links();
			$data['company_ls'] = $this->Company->pg_s($key_word,($pg-1)*$config['per_page'],$config['per_page']);
			$data['pg_link_repair'] = 'kw='.$key_word.'&type=1';
			//$data['pg_link_repair'] = $_SERVER['REDIRECT_QUERY_STRING'];
		}elseif ($this->input->get('type') == '2') {
			$data['product_nums'] = $this->Product->count_by_key_word($key_word);
			$config['per_page'] = '4';
			$config['base_url'] = base_url().'search/result/';
			$config['total_rows'] = $data['product_nums'];
			$this->pagination->initialize($config);
			$data['nums'] = $data['product_nums'];
			$data['pg_link'] = $this->pagination->create_links();
			$data['product_ls'] = $this->Product->pg_s($key_word,($pg-1)*$config['per_page'],$config['per_page']);
			$data['pg_link_repair'] = 'kw='.$key_word.'&type=2';
			//$data['pg_link_repair'] = $_SERVER['REDIRECT_QUERY_STRING'];
		}else {
			redirect(base_url());
=======
		//数据库搜索
		if($this->input->get('type') == '1') {
			$company_nums = $this->Company->count_by_key_word($key_word);
			$num = ($pg-1)*10;
			$config['base_url'] = base_url().'search/result/';
			$config['total_rows'] = $this->Product->count_by_key_word($key_word);
			if($config['total_rows'] < 1) {
				redirect(base_url().'search/result/1/?kw='.$key_word.'&type=2');
			}
			$this->pagination->initialize($config);
			$data['pg_link'] = $this->pagination->create_links();
			$data['product_ls'] = $this->Product->pg_s($key_word, $num);
			$data['company_nums'] = $company_nums;
			$data['product_nums'] = $config['total_rows'];
			$data['pg_link_repair'] = $_SERVER['REDIRECT_QUERY_STRING'];
		}else{
			$product_nums = $this->Product->count_by_key_word($key_word);
			$num = ($pg-1)*10;
			$config['base_url'] = base_url().'search/result/';
			$config['total_rows'] = $this->Company->count_by_key_word($key_word);
			$this->pagination->initialize($config);
			$data['pg_link'] = $this->pagination->create_links();
			$data['company_ls'] = $this->Company->pg_s($key_word, $num);
			$data['company_nums'] = $config['total_rows'];
			$data['product_nums'] = $product_nums;
			$data['pg_link_repair'] = $_SERVER['REDIRECT_QUERY_STRING'];
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		}
		$data['industry_1and2_result'] = $this->Industry->get_lv1_and_lv2();
		$data['list_type'] = $this->input->get('type');
		$data['key_word'] = $key_word;
		$data['bread'] = 'Searching&nbsp;:&nbsp;<span class="fcorange">"'.$key_word.'"</span>';
		$seo['title'] = 'Global Expo Online - Product Search:'.$key_word;
<<<<<<< HEAD
		$seo['keywords'] = $key_word.' Manufacturers, n '.$key_word.' Suppliers, '.$key_word.' Exporters';
=======
		$seo['keywords'] = $key_word.' Manufacturers, '.$key_word.' Suppliers, '.$key_word.' Exporters';
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		$seo['description'] = 'Global Expo Online B2B is a leading online B2B marketplace for manufacturers, suppliers and exporters to find the largest online B2B International companies and also to find trade leads, sell offers, product catalogs & quality products.';
		$data['seo'] = $seo;
		$this->load->view('search/result', $data);
	}
}
