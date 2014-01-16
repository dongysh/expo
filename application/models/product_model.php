<?
/**
 * 
 */
class product_model extends CI_Model {
	
	var $table = "products";
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function count_by_key_word($key_word) {
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
<<<<<<< HEAD
		$this->db->like('products.title', $key_word);
		return $this->db->count_all_results();
	}

	
	function pg_s($key_word, $start ,$per_page) {
		$this->db->select('products.id as p_id, products.title, companies.id as c_id, companies.full_name as c_name, companies.short_name as c_short_name, cert, version, min_order, min_order_unit');
=======
		$this->db->like('products.title_en', $key_word);
		return $this->db->count_all_results();
	}
	
	function pg_s($key_word, $num) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
<<<<<<< HEAD
		$this->db->like('products.title', $key_word);
		$this->db->limit($per_page, $start);
=======
		$this->db->like('products.title_en', $key_word);
		$this->db->limit(10, $num);
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		return $this->db->get();
	}
	
	function find_lv2_product_by_industry2_id($industry2_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first,companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry2_id', $industry2_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'desc');
		$this->db->limit(20, 0);
		return $this->db->get();
	}
	
	function find_lv2_all_product_by_industry2_id($industry2_id) {
		$this->db->select('companies.id');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry2_id', $industry2_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('companies.created', 'desc');
		return $this->db->get();
	}
<<<<<<< HEAD
	/**
	 * [°´ÐÐÒµ²éÕÒ²úÆ·ÊýÄ¿]
	 * @param  [type] $industry3_id [description]
	 * @return [type]               [description]
	 */
	function count_by_lv1($industry1_id) {
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		if(!empty($industry1_id)){
			$this->db->where('products.industry1_id', $industry1_id);
		}
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('companies.created', 'desc');
		return $this->db->count_all_results();
	}
	function count_by_lv2($industry2_id) {
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry2_id', $industry2_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('companies.created', 'desc');
		return $this->db->count_all_results();
	}
=======
	
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
	function count_by_lv3($industry3_id) {
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry3_id', $industry3_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('companies.created', 'desc');
		return $this->db->count_all_results();
	}
	
	function count_by_lv4($industry4_id) {
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry4_id', $industry4_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('companies.created', 'desc');
		return $this->db->count_all_results();
	}
	
<<<<<<< HEAD
	/**
	 * [ÌØ¶¨ÐÐÒµÀïµÄ²úÆ·]
	 * @param  [type] $industry1_id [ÐÐÒµid]
	 * @param  [type] $num          [description]
	 * @return [type]               [description]
	 */
	function pg_lv1($industry1_id,$page,$per_page) {
		$this->db->select('products.id as p_id, products.title as title, products.descript_detail as descript, full_name, min_order,cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		if(!empty($industry1_id)){
			$this->db->where('products.industry1_id', $industry1_id);
		}
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'desc');
		$this->db->limit($per_page, $per_page*($page-1));
		return $this->db->get();
	}
	function pg_lv2($industry2_id,$page,$per_page) {
		$this->db->select('products.id as p_id, products.title as title, products.descript_detail as descript, full_name, min_order,cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry2_id', $industry2_id);
=======
	function pg_lv3($industry3_id, $num) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry3_id', $industry3_id);
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'desc');
<<<<<<< HEAD
		$this->db->limit($per_page, $per_page*($page-1));
		return $this->db->get();
	}
	function pg_lv3($industry3_id, $page,$per_page) {
		$this->db->select('products.id as p_id, products.title as title, products.descript_detail as descript, full_name, min_order,cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry3_id', $industry3_id);
=======
		$this->db->limit(10, $num);
		return $this->db->get();
	}
	
	function pg_lv4($industry4_id, $num) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry4_id', $industry4_id);
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'desc');
<<<<<<< HEAD
		$this->db->limit($per_page, $per_page*($page-1));
		return $this->db->get();
	}
	
	function pg_lv4($industry4_id, $page,$per_page) {
		$this->db->select('products.id as p_id, products.title as title, products.descript_detail as descript, full_name, min_order,cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.industry4_id', $industry4_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'desc');
		$this->db->limit($per_page, $per_page*($page-1));
		return $this->db->get();
	}
	
	function find_top5_by_company_id($company_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
=======
		$this->db->limit(10, $num);
		return $this->db->get();
	}
	
	function find_top5_by_company_id($company_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('companies.id', $company_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'asc');
		$this->db->limit(5, 0);
		return $this->db->get();
	}
	
	function find_top5_by_company_id_no_self($company_id, $self_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.id !=', $self_id);
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		$this->db->where('companies.id', $company_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'asc');
		$this->db->limit(5, 0);
		return $this->db->get();
	}
	
<<<<<<< HEAD
	function find_top5_by_company_id_no_self($company_id, $self_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.id !=', $self_id);
=======
	function find_all_by_company_id($company_id) {
		$this->db->select('products.id as p_id, products.title_en, products.title_en_first, companies.id as c_id, cert, version');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		$this->db->where('companies.id', $company_id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		$this->db->order_by('products.created', 'asc');
<<<<<<< HEAD
		$this->db->limit(5, 0);
=======
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
		return $this->db->get();
	}

	function check_company_and_product($company_id, $product_id) {
		$this->db->where('company_id', $company_id);
		$this->db->where('id', $product_id);
		$result = $this->db->get($this->table);
		if($result->num_rows() == 1) {
			return TRUE;
		}
		return FALSE;
	}
	
	function find_by_id($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}
	
	function check_product_industry($id, $industry_id, $industry_level) {
		$this->db->select('products.id as p_id, products.title_en, companies.id as c_id, cert, version, products.min_order, products.min_order_unit, products.last_pay, products.descript_en, products.title_en_first, products.descript_detail_en, products.video_link');
		$this->db->from('products');
		$this->db->join('companies', 'products.company_id = companies.id', 'left');
		$this->db->where('products.id', $id);
		$this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
		$this->db->where('companies.user_level', '1');
		$this->db->where('companies.deleted', '0');
		if($industry_level == 3){
			$this->db->where('products.industry3_id', $industry_id);
		}elseif($industry_level == 4){
			$this->db->where('products.industry4_id', $industry_id);
		}else{
			return FALSE;
		}
		$this->db->order_by('products.created', 'asc');
		$result = $this->db->get();
		if($result->num_rows() == 1) {
			return $result;
		}
		return FALSE;
	}

	function get_company_id($product_id) {
		$this->db->where('id', $product_id);
		$result = $this->db->get($this->table);
		return $result->row(0)->company_id;
	}

	function get_industry_link_by_product_id($id) {
		$this->db->where('id', $id);
		$result = $this->db->get($this->table);
		if($result->row(0)->industry4_id == '0') {
			$industry_id = $result->row(0)->industry3_id;
		}else{
			$industry_id = $result->row(0)->industry4_id;
		}
		$this->db->where('id', $industry_id);
		return $this->db->get('industries');
	}
<<<<<<< HEAD

    /*2014 01 10 by roc*/

    function find_some_by_company_id($company_id,$page=1,$count=8)
    {
        $this->db->select('products.id as p_id,products.title, products.title_en_first,products.title_en, products.title_en_first, companies.id as c_id, cert, version');
        $this->db->from('products');
        $this->db->join('companies', 'products.company_id = companies.id', 'left');
        $this->db->where('companies.id', $company_id);
        $this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
        $this->db->where('companies.user_level', '1');
        $this->db->where('companies.deleted', '0');
        $this->db->order_by('products.created', 'asc');
        $this->db->limit($count,($page-1)*$count);
        return $this->db->get();
    }
    /**
     * [根据产品id得到产品详细信息]
     * @return [type] [description]
     */
    function get_product_detail_by_productId($product_id)
    {
    	$this->db->select('products.*,full_name,full_name_en,main_product,main_product_en,company_details.company_id,company_details.address,company_details.email');
        $this->db->from('products');
        $this->db->join('companies', 'products.company_id = companies.id', 'left');
        $this->db->join('company_details', 'products.company_id = company_details.company_id', 'left');
        $this->db->where('products.id', $product_id);
        return $this->db->get();
    }
    /**
     * [得到付款方式，有多个用逗号隔开]
     * @param  [type] $product_id [description]
     * @return [type]             [description]
     */
    function get_pay_type_by_productId($product_id)
    {
    	$this->db->select('pay_types.title');
        $this->db->from('products');
        $this->db->join('product_pay_types', 'products.id = product_pay_types.product_id', 'left');
        $this->db->join('pay_types', 'product_pay_types.pay_type_id = pay_types.id', 'left');
        $this->db->where('products.id', $product_id);
        $type = $this->db->get()->result_array();
        $str = '';
        if(count($type)>1)
        {
        	foreach ($type as $key => $value) {
        		$str .= ",".$value['title'];
        	}
        	$str = substr($str, 1);
        }
        else
        {
        	$str = $type[0]['title'];
        }
        return $str;
    }
    /**
     * [获取各级目录id]
     * @return [type] [description]
     */
    function get_industry_id($product_id)
    {
    	$this->db->select('industry1_id,industry2_id,industry3_id,industry4_id');
        $this->db->from($this->table);
        $this->db->where('products.id', $product_id);
        return $this->db->get()->result_array();
    }

    function find_total_by_company_id($company_id)
    {
        $this->db->select('products.id');
        $this->db->from($this->table);
        $this->db->join('companies', 'products.company_id = companies.id', 'left');
        $this->db->where('companies.id', $company_id);
        $this->db->where('companies.server_end >=', @date('Y-m-d H:i:s', time()));
        $this->db->where('companies.user_level', '1');
        $this->db->where('companies.deleted', '0');
        $this->db->order_by('products.created', 'asc');
        return $this->db->count_all_results();
    }
=======
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
}
