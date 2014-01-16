<?
/**
 * Class Welcome
 * @property Industry_model $Industry
 * @property New_banner_model $banner_model
 */
class Welcome extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('industry_model', 'Industry');
        $this->load->model('new_banner_model', 'banner_model');
	}
	
	function index() {
		$result = $this->Industry->get_lv1_and_lv2();
		$data['industry_1and2_result'] = $result;
		$seo['title'] = 'Global B2B Marketplace-Online Marketing,Trade Leads,Providers,Exporters,Suppliers Directory:Global Expo Online';
		$seo['keywords'] = 'Export,Import,Manufacturers,Suppliers,Exporters,Traders,Importers,Buyers,wholesaler,Importer Directory, Suppliers Directory, China Manufacturers,B2B Online Suppliers,marketplace, globalsources,Ecommerce';
		$seo['description'] = 'Reliable China Manufacturers & Pre-Qualify Products,All Products Made In China.  Global Expo Online is a B2B portal in China which offers online marketing for Business to Business trade leads to importers. As the largest B2B Marketplace,we offer instant B2B solutions by online business directory and yellow pages of China manufacturers, China suppliers .';
		$data['seo'] = $seo;
		$data['icp'] = TRUE;
        $data['banner_list'] = $this->banner_model->ls();
		$this->load->view('welcome/index', $data);
	}
}
