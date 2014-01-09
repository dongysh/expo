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
<?if($company_nums == 0 && $product_nums == 0):?>
<?$this->load->view('layout/public/no_result')?>
<div class="space_15"></div>
<?$this->load->view('layout/static/categories')?>
<?elseif($company_nums == 0 && $product_nums != 0):?>
<div class="frame_div">
<div class="main_left">
	<?$this->load->view('layout/public/menu');?>
	<div class="space_15"></div>
	<?$this->load->view('layout/static/download');?>
</div>
<div class="main_right">
	<?//只有产品?>
	<div class="search_result_title">
		<div class="only_product_or_company">
			Products (<?=$product_nums?>)
		</div>
	</div>
	<?$this->load->view('layout/public/product_result_list')?>
</div>
</div>
<?elseif($company_nums != 0 && $product_nums == 0):?>
<div class="frame_div">
<div class="main_left">
	<?$this->load->view('layout/public/menu');?>
	<div class="space_15"></div>
	<?$this->load->view('layout/static/download');?>
</div>
<div class="main_right">
	<?//只有公司?>
	<div class="search_result_title">
		<div class="only_product_or_company">
			Comapnies (<?=$company_nums?>)
		</div>
	</div>
	<?$this->load->view('layout/public/company_result_list')?>
</div>
</div>
<?else:?>
<div class="frame_div">
<div class="main_left">
	<?$this->load->view('layout/public/menu');?>
	<div class="space_15"></div>
	<?$this->load->view('layout/static/download');?>
</div>
<div class="main_right">
	<?//都有?>
	<?if($list_type == '1'):?>
	<div class="search_result_title">
		<div class="product_and_company">
			<div class="current">Products (<?=$product_nums?>)</div>
			<div class="no_current">
				<div class="no_current_in"><a href="<?=base_url()?>search/result/1/?kw=<?=$key_word?>&type=2">Companies (<?=$company_nums?>)</a></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<?$this->load->view('layout/public/product_result_list')?>
	<?else:?>
	<div class="search_result_title">
		<div class="company_and_product">
			<div class="left">
				<div class="no_current">
					<a href="<?=base_url()?>search/result/1/?kw=<?=$key_word?>&type=1">Products (<?=$product_nums?>)</a>
				</div>
			</div>
			<div class="current">Companies (<?=$company_nums?>)</div>
			<div class="right"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<?$this->load->view('layout/public/company_result_list')?>
	<?endif;?>
</div>
</div>
<?endif;?>
<div class="clear"></div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	$(window).load(function() {
		menu_active();
		$(".link a").each(function(){
			$(this).attr("href", $(this).attr("href")+"?<?=$pg_link_repair?>");
		});
		
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
		
		$(".c_favorites span").click(function() {
			var now = $(this);
			$.ajax({
				type : "POST",
				async: false,
				url : "<?=base_url()?>favorites/add_or_del/" + now.attr('class') + '/company/' + now.attr('href'),
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
