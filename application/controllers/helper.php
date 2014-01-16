<?
/**
 * 
 */
class Helper extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function about() {
		$seo['title'] = 'Global Expo Online-Global Online marketplace of Manufacturers & Suppliers';
		$seo['keywords'] = 'Global Manufacturers,Global Suppliers,B2B Marketplace,exporters ,importers';
		$seo['description'] = 'Global Expo Online is a Global B2B Marketplace, where you can find quality manufacturers, exporters and importers.Global Expo Online focuses on promoting B2B contacts and transactions between companies and companies in the rest of the world. ';
		$data['seo'] = $seo;
		$data['bread'] = 'Help&nbsp;center&nbsp;&gt;&nbsp;About&nbsp;Us';
		$this->load->view('helper/about', $data);
	}
	
	function contact() {
		$seo['title'] = 'Contact Us | Global Expo Online Contact | B2B Online Marketing Contact Details';
		$seo['keywords'] = 'trading directory,b2b marketplace,B2B Marketplace Guide,b2b websites,marketplace catalogue,B2B Network';
		$seo['description'] = 'Contact Global Expo Online the international B2B directory for quality products trade leads from Manufacturers, Suppliers, Buyers, Sellers, Importers, Exporters, Transporters Business Services for China.';
		$data['seo'] = $seo;
		$data['bread'] = 'Help&nbsp;center&nbsp;&gt;&nbsp;Contact&nbsp;Us';
		$this->load->view('helper/contact', $data);
	}
	
	function global_expo_certificate() {
		$seo['title'] = 'Business to Business Online Marketing | B2B Internet Marketing Agency | Global B2B Marketplace-Global Expo Online';
		$seo['keywords'] = 'Business to Business Online Marketing, B2B Internet Marketing Agency, Global B2B Marketplace, Directory, Ecommerce Solutions, Directories, Trade, Manufacturers';
		$seo['description'] = 'Global Expo Online is a Global B2B Marketplace that provides business to business online marketing services to buyers and sellers across all industries.';
		$data['seo'] = $seo;
		$data['bread'] = 'Help&nbsp;center&nbsp;&gt;&nbsp;global-expo&nbsp;Certificate';
		$this->load->view('helper/global_expo_certificate', $data);
	}
	
	function terms_of_use() {
		$seo['title'] = 'International B2B Marketplace, B2C Business Directories, Global B2B-Global Expo Online';
		$seo['keywords'] = 'B2B Marketplace, B2C Business Directories, Global B2B';
		$seo['description'] = 'Global Expo Online B2B Marketplace Guide - All the free b2b websites and marketplace catalogue in the world.Find new products and business partners on Global Expo Online.Advertise your company and products on the biggest international B2B Network and get found by hundreds of thousands of potential buyers.';
		$data['seo'] = $seo;
		$data['bread'] = 'Help&nbsp;center&nbsp;&gt;&nbsp;Terms&nbsp;of&nbsp;Use';
		$this->load->view('helper/terms_of_use', $data);
	}
	
	function account_membership() {
		$seo['title'] = 'Global Expo Online Help Index, Search Buyers Sellers, Membership Benefits';
		$seo['keywords'] = 'membership benefits,registration help,send messages,use alert preferences,manage contacts';
		$seo['description'] = 'Global Expo Online is the place where you can find trade partners from all over the world. Tell people about your company and your products, b2b network makes it easy for companies from all over the world to find you, and for you to find them. ';
		$data['seo'] = $seo;
		$data['bread'] = 'Help&nbsp;center&nbsp;&gt;&nbsp;Account&nbsp;&amp;&nbsp;Membership';
		$this->load->view('helper/account_membership', $data);
	}
	
	function my_favorites() {
		$seo['title'] = 'Global Expo Online -The world online b2b marketplace and trading directory';
		$seo['keywords'] = 'Online marketing Solutions, Internet marketing Solutions，B2B Marketplace, B2B websites,B2B directory, B2B partners';
		$seo['description'] = 'If you are looking for an online service that will allow you to quickly and efficiently locate potential customer and trade partners, take a closer look at Global Expo Online - a great product for managers of logistic departments and wholesalers! ';
		$data['seo'] = $seo;
		$data['bread'] = 'Help&nbsp;center&nbsp;&gt;&nbsp;My&nbsp;Favorites';
		$this->load->view('helper/my_favorites', $data);
	}
}
