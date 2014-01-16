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
</script>
<?$this->load->view('layout/footer')?>