<?$this->load->view('layout/header')?>
<?if($this->session->userdata('user_session')):?>
<?$this->load->view('layout/public/site_logout')?>
<?else:?>
<?$this->load->view('layout/public/site_login')?>
<?endif;?>
<?$this->load->view('layout/static/app')?>
<script type="text/javascript">
	jQuery(function() {
		$(".app_btn div").click(function() {
			$(".app_btn div").attr('class', 'app_btn_no');
			$(this).attr('class', 'app_btn_current');
			window.clearInterval(id);
			id = window.setInterval('auto()', 5000);
			var num = $(this).attr('data-position')*1;
			$('.app_move').animate({
				'left': ('-'+(num-1)*580+'px')
			}, 350, 'linear');
		});
		var id = window.setInterval('auto()', 5000);
	});
	
	function auto() {
		if($('.app_move').css('left') == '0px' || $('.app_move').css('left') == '0') {
			$('.app_move').animate({
				'left': '-=580px'
			}, 350, 'linear');
			$(".app_btn div").attr('class', 'app_btn_no');
			$(".app_btn div:eq(1)").attr('class', 'app_btn_current');
		}else if($('.app_move').css('left') == '-580px' || $('.app_move').css('left') == '-580') {
			$('.app_move').animate({
				'left': '-=580px'
			}, 350, 'linear');
			$(".app_btn div").attr('class', 'app_btn_no');
			$(".app_btn div:eq(2)").attr('class', 'app_btn_current');
		}else if($('.app_move').css('left') == '-1160px' || $('.app_move').css('left') == '1160') {
			$('.app_move').animate({
				'left': '-=580px'
			}, 350, 'linear');
			$(".app_btn div").attr('class', 'app_btn_no');
			$(".app_btn div:eq(3)").attr('class', 'app_btn_current');
		}else if($('.app_move').css('left') == '-1740px' || $('.app_move').css('left') == '1740') {
			$('.app_move').animate({
				'left': '0px'
			}, 350, 'linear');
			$(".app_btn div").attr('class', 'app_btn_no');
			$(".app_btn div:eq(0)").attr('class', 'app_btn_current');
		}
	}
</script>
<?$this->load->view('layout/footer')?>