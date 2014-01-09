<?$this->load->view('layout/header')?>
<?if($this->session->userdata('user_session')):?>
<?$this->load->view('layout/public/top_logout')?>
<?else:?>
<?$this->load->view('layout/public/top_login')?>
<?endif;?>
<div class="space_15"></div>
<?$this->load->view('layout/public/top_search')?>
<div class="space_15"></div>
<?$this->load->view('layout/public/bread')?>
<div class="space_15"></div>
<div class="space_15"></div>
<?$this->load->view('layout/static/categories')?>
<div class="space_15"></div>
<div class="space_15"></div>
<?$this->load->view('layout/footer')?>
