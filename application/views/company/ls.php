<?$this->load->view('layout/header')?>
<?if($this->session->userdata('user_session')):?>
<?$this->load->view('layout/public/site_logout')?>
<?else:?>
<?$this->load->view('layout/public/site_login')?>
<?endif;?>
<div class="space_15"></div>
<?$this->load->view('layout/public/company_logo')?>
<div class="space_15"></div>
<div class="frame_div main">
	<div class="main_left">
		<?$this->load->view('layout/public/contact')?>
		<div class="space_15"></div>
		<?$this->load->view('layout/public/company_qrcode')?>
	</div>
	<div class="main_right">
		<?$this->load->view('layout/public/company_products')?>
	</div>
	<div class="clear"></div>
</div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
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
</script>
<?$this->load->view('layout/footer')?>