<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 语言切换
 * Created by PhpStorm.
 * User: henry
 * Date: 11/15/13
 * Time: 2:51 PM
 */

class Language extends CI_Controller {

    function switchLocale() {
        $locale = $this->uri->segment(2);
        $this->input->set_cookie('locale', $locale, 365 * 24 * 60 * 60);

        redirect('', 'refresh');
    }

}