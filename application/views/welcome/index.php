<?$this->load->view('layout/header')?>
<?if($this->session->userdata('user_session')):?>
<?$this->load->view('layout/public/top_logout')?>
<?else:?>
<?$this->load->view('layout/public/top_login')?>
<?endif;?>
<div class="space_15"></div>
<?$this->load->view('layout/public/top_search')?>
<div class="space_15"></div>
<div class="frame_div main">
	<div class="main_left">
		<?$this->load->view('layout/public/menu');?>
		<div class="space_15"></div>
		<?$this->load->view('layout/static/download');?>
	</div>
	<div class="main_right">
		<div class="banner_app">
			<?$this->load->view('layout/public/banner');?>
			<?$this->load->view('layout/public/app');?>
			<div class="clear"></div>
		</div>
		<div class="space_15"></div>
		<div class="space_15"></div>
		<?$this->load->view('layout/static/hot_products')?>
		<?$this->load->view('layout/static/top_global_suppliers')?>
	</div>
	<div class="clear"></div>
</div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	jQuery(window).load(function(){
		$(".photoslider-bullets").mouseenter(function() {
			$(this).stop();
		});
		jQuery(".photoslider-bullets").sliderkit({
			auto:true,
			circular:true,
			mousewheel:false,
			shownavitems:5,
			panelfx:"fading",
			panelfxspeed:3000,
			panelfxeasing:"easeOutExpo" // "easeOutExpo", "easeInOutExpo", etc.
		});
		jQuery(".photoslider-bullets1").sliderkit({
			auto:false,
			circular:true,
			mousewheel:false,
			shownavitems:5,
			panelfx:"fading",
			panelfxspeed:3000,
			panelfxeasing:"easeOutExpo" // "easeOutExpo", "easeInOutExpo", etc.
		});
		jQuery(".photoslider-bullets2").sliderkit({
			auto:false,
			circular:true,
			mousewheel:false,
			shownavitems:5,
			panelfx:"fading",
			panelfxspeed:3000,
			panelfxeasing:"easeOutExpo" // "easeOutExpo", "easeInOutExpo", etc.
		});
	});	
	$(window).load(function() {
		$(".sliderkit-nav-clip ul").show();
		menu_active();
		
		//function
		function menu_active() {
			$(".arrows").mouseenter(function() {
				$(this).find(".lv2").show(150);
				$(this).css('border-left', '1px solid #999999');
				$(this).css('border-top', '1px solid #999999');
				$(this).css('border-bottom', '1px solid #999999');
				$(this).css('background', 'none');
				$(this).find(".lv1_a").css('font-weight', 'bold');
				$(this).find(".lv1_a").css('color', '#33488c');
			});
			$(".arrows").mouseleave(function() {
				$(this).find(".lv2").hide(0);
				$(this).css('border-left', '1px solid #dddddd');
				$(this).css('border-top', '1px solid #dddddd');
				$(this).css('border-bottom', '1px solid #dddddd');
				$(this).css('background', 'url("<?=base_url()?>webroot/images/industry_li_bg.png") no-repeat 170px 11px');
				$(this).find(".lv1_a").css('font-weight', 'normal');
				$(this).find(".lv1_a").css('color', '#555555');
			});
		}
	});
</script>
<?$this->load->view('layout/footer')?>
