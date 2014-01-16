<?
/**
 * 
 */
class Favorites extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('favorit_model', 'Favorit');
	}
	
	function add_or_del() {
		$uri = uri_string();
		$uri = explode('/', $uri);
		$class = $uri[2];
		$com_pro = $uri[3];
		$id = $uri[4];
		if(!$this->session->userdata('user_session')) {
			$data = array(
				'status' => 1,
				'url' => base_url().'login'
			);
			json($data);
		}
		if($com_pro == 'product') {
			$company_id = 0;
			$product_id = $id;
		}else{
			$company_id = $id;
			$product_id = 0;
		}
		$user_session = $this->session->userdata('user_session');
		if($class == 'add') {
			$success = $this->Favorit->add($user_session['id'], $company_id, $product_id);
			if($success) {
				$data = array(
					'status' => 2,
					'msg' => 'Add to my favourite is sucessful.'
				);
				json($data);
			}else{
				$data = array(
					'status' => 0,
					'msg' => 'Add to my favourite is failure, please try it again.'
				);
				json($data);
			}
		}elseif($class == 'added'){
			$success = $this->Favorit->del($user_session['id'], $company_id, $product_id);
			if($success) {
				$data = array(
					'status' => 3,
					'msg' => 'Sucessfully deleted from add to my favourites.'
				);
				json($data);
			}else{
				$data = array(
					'status' => 0,
					'msg' => 'Delete is unsucessful from add to my favourites, please try it again.'
				);
				json($data);
			}
		}else{
			$data = array(
				'status' => 0,
				'msg' => 'unknow error'
			);
			json($data);
		}
	}
}
