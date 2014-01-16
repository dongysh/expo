<?php
/**
 * Created by PhpStorm.
 * User: duankelin
 * Date: 1/9/14
 * Time: 9:09 PM
 */
class Exhibition_model extends CI_Model {

    var $table = 'new_exhibition';
    var $media_table = "new_cooperate_media";
    var $exhibition_company_table = "new_exhibition_company";

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    //查询最新展会 $count条
    function find_latest($count,$per_page,$page)
    {
        if($count<=0)
        {
            return false;
        }
//        if(($per_page-1)*$page+1>$count)
//        {
//            return false;
//        }
        $this->db->select($this->table.'.*,personal_locations.title as location,personal_locations.title_en as location_en');
        $this->db->from($this->table);
        $this->db->join('personal_locations', $this->table.'.location_id = personal_locations.id', 'left');
        $this->db->order_by($this->table.".created", "desc");
        $this->db->limit($per_page,($page-1)*$per_page);
        $result = $this->db->get();
        if($result->num_rows()>0) {
            return $result;
        }
    }

    function find_exhibition_latest($per_page,$page,$location_id=0,$time_m=0,$kw="")
    {
        $this->db->select($this->table.'.*,personal_locations.title as location,personal_locations.title_en as location_en');
        $this->db->from($this->table);
        $this->db->join('personal_locations', $this->table.'.location_id = personal_locations.id', 'left');
        if($location_id>0)
        {
            $this->db->where($this->table.'.location_id',$location_id);
        }
        if($time_m>0)
        {
            $this->db->where($this->table.'.show_time_start like','%-'.$time_m.'-%');
        }
        if($kw!='')
        {
            $this->db->where($this->table.'.show_name like','%'.$kw.'%');
        }
        $this->db->where($this->table.'.show_time_start <',date('Y-m-d',time()));
        $this->db->where($this->table.'.show_time_end >',date('Y-m-d',time()));
        $this->db->order_by("new_exhibition.show_time_end", "asc");
        $this->db->limit($per_page,($page-1)*$per_page);
        $result = $this->db->get();
        if($result->num_rows()>0) {
            return $result;
        }
        else
        {
            return false;
        }
    }

    function find_exhibition_in_future($per_page,$page,$location_id=0,$time_m=0,$kw="")
    {
        $this->db->select($this->table.'.*,personal_locations.title as location,personal_locations.title_en as location_en');
        $this->db->from($this->table);
        $this->db->join('personal_locations', $this->table.'.location_id = personal_locations.id', 'left');
        if($location_id>0)
        {
            $this->db->where($this->table.'.location_id',$location_id);
        }
        if($time_m>0)
        {
            $this->db->where($this->table.'.show_time_start like','%-'.$time_m.'-%');
        }
        if($kw!='')
        {
            $this->db->where($this->table.'.show_name like','%'.$kw.'%');
        }
        $this->db->where($this->table.'.show_time_start >',date('Y-m-d',time()));
        $this->db->order_by("new_exhibition.show_time_start", "asc");
        $this->db->limit($per_page,($page-1)*$per_page);
        $result = $this->db->get();
        if($result->num_rows()>0) {
            return $result;
        }
        else
        {
            return false;
        }
    }

    function find_exhibition_history($per_page,$page,$location_id=0,$time_m=0,$kw="")
    {

        $this->db->select($this->table.'.*,personal_locations.title as location,personal_locations.title_en as location_en');
        $this->db->from($this->table);
        $this->db->join('personal_locations', $this->table.'.location_id = personal_locations.id', 'left');
        if($location_id>0)
        {
            $this->db->where($this->table.'.location_id',$location_id);
        }
        if($time_m>0)
        {
            $this->db->where($this->table.'.show_time_start like','%-'.$time_m.'-%');
        }
        if($kw!='')
        {
            $this->db->where($this->table.'.show_name like','%'.$kw.'%');
        }
        $this->db->where($this->table.'.show_time_end <',date('Y-m-d',time()));
        $this->db->order_by("new_exhibition.show_time_start", "desc");
        $this->db->limit($per_page,($page-1)*$per_page);
        $result = $this->db->get();
        if($result->num_rows()>0) {
            return $result;
        }
        else
        {
            return false;
        }
    }

    //查询将要开始的展会$count条
    function find_latest_count()
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where($this->table.'.show_time_start <',date('Y-m-d',time()));
        $this->db->where($this->table.'.show_time_end >',date('Y-m-d',time()));
        $total =  $this->db->count_all_results();
        return $total;
    }

    function find_near_count()
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where("new_exhibition.show_time_start >",date('Y-m-d',time()));
        $total =  $this->db->count_all_results();
        return $total;
    }

    function find_history_count()
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where("new_exhibition.show_time_end <",date('Y-m-d',time()));
        $total =  $this->db->count_all_results();
        return $total;
    }
    function find_near_future($count,$per_page,$page)
    {
        if($count<=0)
        {
            return false;
        }
//        if(($per_page-1)*$page+1>$count)
//        {
//            return false;
//        }
        $this->db->select($this->table.'.*,personal_locations.title as location,personal_locations.title_en as location_en');
        $this->db->from($this->table);
        $this->db->join('personal_locations', $this->table.'.location_id = personal_locations.id', 'left');
        $this->db->where("new_exhibition.show_time_start >",date('Y-m-d',time()));
        $this->db->order_by("new_exhibition.show_time_start", "asc");
        $this->db->limit($per_page,($page-1)*$per_page);
        $result = $this->db->get();
        if($result->num_rows()>0) {
            return $result;
        }
        return false;
    }

    function find_history($count,$per_page,$page)
    {
        if($count<=0)
        {
            return false;
        }
//        if(($per_page-1)*$page+1>$count)
//        {
//            return false;
//        }
        $this->db->select($this->table.'.*,personal_locations.title as location,personal_locations.title_en as location_en');
        $this->db->from($this->table);
        $this->db->join('personal_locations', $this->table.'.location_id = personal_locations.id', 'left');
        $this->db->where("new_exhibition.show_time_end <",date('Y-m-d',time()));
        $this->db->order_by("new_exhibition.show_time_end", "desc");
        $this->db->limit($per_page,($page-1)*$per_page);
        $result = $this->db->get();
        if($result->num_rows()>0) {
            return $result;
        }

        return false;
    }

    function find_by_id($id)
    {
        if(!$id)
        {
            return false;
        }
        $this->db->select($this->table.'.*,personal_locations.title as location,personal_locations.title_en as location_en');
        $this->db->from($this->table);
        $this->db->join('personal_locations', $this->table.'.location_id = personal_locations.id', 'left');
        $this->db->where($this->table.'.id',$id);
        $result = $this->db->get();
        if($result->num_rows()>0) {
            return $result;
        }
        else
        {
            return false;
        }
    }

    function find_cooperate_media($id)
    {
        if(!$id)
        {
            return false;
        }

        $result = $this->db->get_where($this->media_table,array('exhibition_id'=>$id));
        if($result->num_rows()>0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    function find_company_by_id($id)
    {
        if(!$id)
        {
            return false;
        }
        $this->db->select($this->exhibition_company_table.'.position,companies.full_name,companies.full_name_en,companies.td_code,company_details.main_product,company_details.main_product_en,personal_locations.title as location,personal_locations.title_en as location_en');
        $this->db->from($this->exhibition_company_table);
        $this->db->join('companies',$this->exhibition_company_table.'.company_id = companies.id','left');
        $this->db->join('company_details',$this->exhibition_company_table.'.company_id = company_details.company_id','left');
        $this->db->join('company_personal',$this->exhibition_company_table.'.company_id = company_personal.company_id','left');
        $this->db->join('personal_locations','company_personal.personal_location_id = personal_locations.id','left');
        $this->db->where($this->exhibition_company_table.'.exhibition_id = '.$id);
        $this->db->where($this->exhibition_company_table.'.user_level = 1');
        $this->db->order_by($this->exhibition_company_table.'.position','asc');
        $result = $this->db->get();
        if($result->num_rows()>0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    function apply_exhibition($exhibition_id,$company_id)
    {
        if($exhibition_id>0&&$company_id>0)
        {
            $this->db->select('id');
            $this->db->from($this->exhibition_company_table);
            $condition = array('exhibition_id'=>$exhibition_id,'company_id'=>$company_id,'user_level'=>0);
            $this->db->where($condition);
            $result = $this->db->get();
            if($result->num_rows()>0)
            {
                $row = $result->row_array();
                return  $row['id'];
            }
            $time = date('Y-m-d H:i:s',time());
            $data = array(
                'exhibition_id'=>$exhibition_id,
                'company_id'=>$company_id,
                'user_level'=>0,
                'created'=>$time,
                'last_updated'=>$time
            );
            $this->db->insert($this->exhibition_company_table, $data);
            if($this->db->insert_id()>0)
            {
                return $this->db->insert_id();
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function is_applied($exhibition_id)
    {
        if($exhibition_id>0&&$this->session->userdata('user_session'))
        {
            $this->db->select('id');
            $this->db->from($this->exhibition_company_table);
            $condition = array('exhibition_id'=>$exhibition_id,'company_id'=>$this->session->userdata('user_session')['id'],'user_level'=>0);
            $this->db->where($condition);
            $result = $this->db->get();
            if($result->num_rows()>0)
            {
                $row = $result->row_array();
                return  true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}