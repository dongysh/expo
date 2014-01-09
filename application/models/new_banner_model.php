<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 11/20/13
 * Time: 12:52 PM
 */

class New_banner_model extends CI_Model {

    var $table = 'new_banner';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function ls() {
        $this->db->order_by('sort', 'asc');
        $this->db->where('status', 1);
        return $this->db->get($this->table);
    }

}