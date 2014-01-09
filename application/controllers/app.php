<?
/**
 * 
 */
class App extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->config->load('custom');
	}
	
	function index() {
		$seo['title'] = 'Trade Information Exchange Platform - China Business';
		$seo['keywords'] = 'Trade Information Exchange Platform, Trade Leads, Providers, Exporters, Suppliers Directory';
		$seo['description'] = 'China Business is a B2B portal in China which offers online marketing for Business to Business trade leads to importers';
		$data['seo'] = $seo;
		$this->load->view('app/index', $data);
	}
}
