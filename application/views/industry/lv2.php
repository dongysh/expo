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
<div class="frame_div main">
	<div class="main_left">
		<?$this->load->view('layout/public/menu2');?>
			<div class="space_15"></div>
		<?$this->load->view('layout/static/download');?>
	</div>
	<div class="main_right">
		<img <?img_src('banner/banner.jpg')?> />
		<div class="space_15"></div>
		<div class="space_15"></div>
		<?if($lv2_product_result->num_rows()):?>
		<?$this->load->view('layout/public/lastest_new')?>
		<div class="space_15"></div>
		<?endif;?>
		<?$this->load->view('layout/static/product_recommend')?>
	</div>
	<div class="clear"></div>
</div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	jQuery(window).load(function(){
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
		$(".lastes_new_title").find("div:eq(0)").click(function (){
			$(this).attr('class', 'div1');
			$(this).parent().find("div:eq(1)").attr('class', 'div2');
			$("#new_product").hide();
			$("#last_manufacturers").show();
		});
		$(".lastes_new_title").find("div:eq(1)").click(function (){
			$(this).parent().find("div:eq(0)").attr('class', 'div1_h');
			$(this).attr('class', 'div2_h');
			$("#last_manufacturers").hide();
			$("#new_product").show();
		});
		
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
