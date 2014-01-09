<?$this->load->view('layout/header')?>
<?$this->load->view('layout/static/top_sign')?>
<div class="space_15"></div>
<?if($this->session->flashdata('reset_pwd_success')):?>
<div id="flash_success" class="frame_div">
	<div class="flash_success">
		<?=$this->session->flashdata('reset_pwd_success')?>
	</div>
</div>
<?endif;?>
<div class="space_15"></div>
<?$this->load->view('layout/static/sign_in')?>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	$(window).load(function() {
		$("#flash_success").click(function() {
			$(this).animate({
				opacity: 0,
			}, 150, '', hide1);
		});
	});
	
	function hide1() {
		$("#flash_success").animate({
			height: 0,
			border: 0
		}, 200, '', hide2);
	}
	
	function hide2() {
		$("#flash_success").hide();
	}
</script>
<?$this->load->view('layout/footer')?>
