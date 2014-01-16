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
		<?$this->load->view('layout/public/menu3');?>
			<div class="space_15"></div>
		<?$this->load->view('layout/static/download');?>
	</div>
	<div class="main_right">
		<div class="search_result_title">
			<div class="only_product_or_company">
				Products (<?=$product_nums?>)
			</div>
		</div>
		<?$this->load->view('layout/public/product_result_list')?>
		<?if($product_nums == 0):?>
			<span class="fcb2">There is no corresponding product under this category, please check other interested categories.</span>
		<?endif;?>
	</div>
	<div class="clear"></div>
</div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	$(window).load(function() {
		$(".p_favorites span").click(function() {
			var now = $(this);
			$.ajax({
				type : "POST",
				async: false,
				url : "<?=base_url()?>favorites/add_or_del/" + now.attr('class') + '/product/' + now.attr('href'),
				data : $("form").serialize(),
				success : function(json) {
					if(json['status'] == 1) {
						window.open(json['url']);
					}else if(json['status'] == 2) {
						now.attr('class', 'added');
						now.text('Added to My Favorites');
						now.parent().find("img:eq(0)").attr('src', '<?=base_url()?>webroot/images/f_2.png');
						$.fancybox.open('<div class="lightbox_content">'+json['msg']+'</div>'+close_btn, {
							modal: true
						});
						close_lightbox();
					}else if(json['status'] == 3) {
						now.attr('class', 'add');
						now.text('Add to My Favorites');
						now.parent().find("img:eq(0)").attr('src', '<?=base_url()?>webroot/images/f_1.png');
						$.fancybox.open('<div class="lightbox_content">'+json['msg']+'</div>'+close_btn, {
							modal: true
						});
						close_lightbox();
					}else if(json['status'] == 0) {
						$.fancybox.open('<div class="lightbox_content">'+json['msg']+'</div>'+close_btn, {
							modal: true
						});
						close_lightbox();
					}else{
						$.fancybox.open('<div class="lightbox_content">'+'unknow error'+'</div>'+close_btn, {
							modal: true
						});
						close_lightbox();
					}
				}
			});
			return false;
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