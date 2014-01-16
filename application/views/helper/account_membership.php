<<<<<<< HEAD
<?$this->load->view('layout/header2')?>
<div class="space_15"></div>
=======
<?$this->load->view('layout/header')?>
<?if($this->session->userdata('user_session')):?>
<?$this->load->view('layout/public/top_logout')?>
<?else:?>
<?$this->load->view('layout/public/top_login')?>
<?endif;?>
<div class="space_15"></div>
<?$this->load->view('layout/public/top_search')?>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
<div class="space_15"></div>
<?$this->load->view('layout/public/bread')?>
<div class="space_15"></div>
<div class="frame_div main">
	<div class="main_left">
		<?$this->load->view('layout/static/help_menu');?>
	</div>
	<div class="main_right">
		<?$this->load->view('layout/static/account')?>
	</div>
	<div class="clear"></div>
</div>
<div class="space_15"></div>
<div class="space_15"></div>
<?$this->load->view('layout/footer')?>