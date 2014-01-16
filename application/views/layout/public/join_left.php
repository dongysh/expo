<div class="join_left">
	<p class="join_title">
		Register
	</p>
	<p class="join_txt">
		Rate and review businesses that you have dealt with. Once registered, you'll have the right to review any of China's best industuries listings!
	</p>
	<div class="space_20"></div>
	<form action="<?=base_url()?>join/ajax_reg" method="post">
	<?$this->load->view('layout/public/business_account')?>
	<div class="space_20"></div>
	<?$this->load->view('layout/public/contact_information')?>
	</form>
</div>