<?
/**
 * 
 */
class Categories extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$data['bread'] = 'Categories';
		$seo['title'] = 'Wide range of products from China - Exporters & manufacturers directory|Global Expo Online';
		$seo['keywords'] = 'Product categories,Product directory,Product list,Product export,China manufacturers,suppliers';
		$seo['description'] = 'Wide range of products from China - Exporters & manufacturers directory providing lists of leading China manufacturers,various kinds of products exporters & suppliers.';
		$data['seo'] = $seo;
		$this->load->view('categories/index', $data);
	}
}
