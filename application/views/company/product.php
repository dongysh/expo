<<<<<<< HEAD
<?$this->load->view('layout/header1')?>
=======
<?$this->load->view('layout/header')?>
<?if($this->session->userdata('user_session')):?>
<?$this->load->view('layout/public/site_logout')?>
<?else:?>
<?$this->load->view('layout/public/site_login')?>
<?endif;?>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
<div class="space_15"></div>
<?$this->load->view('layout/public/company_logo')?>
<div class="space_15"></div>
<div class="frame_div main">
	<div class="main_left">
		<?$this->load->view('layout/public/contact')?>
		<?if($product_5->num_rows()):?>
		<div class="space_15"></div>
		<?$this->load->view('layout/public/company_product_5')?>
		<?endif;?>
	</div>
	<div class="main_right">
		<?$this->load->view('layout/public/company_product')?>
	</div>
	<div class="clear"></div>
</div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	jQuery(function() {
		if($("#product_info_cert").height() >= 40) {
			$("#product_info_cert").height(40);
		}
		if($("#product_info_descript").height() >= 120) {
			$("#product_info_descript").height(120);
		}
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
	$(window).load(function(){
		var max = <?=$img_num?>;
		$(".ablsolute_border_s").css('width', max*82+'px');
		$(".ablsolute_border_s div").each(function() {
			$(this).click(function() {
				$(".ablsolute_border_s div").css('border-color', '#ffffff');
				$(this).css('border-color', 'orange');
				var num_id = $(this).attr('id');
				num_id = num_id.split('_');
				num_id[1];
				$(".ablsolute_border").animate({
					opacity: "0"
				}, 50, '', function() {$(".ablsolute_border").css('top', '-'+(num_id[1]*1-1)*240+'px'); $(".ablsolute_border").animate({
					opacity: "1"
				}, 150);});
			});
		});
		$(".left_button").click(function() {
			var left = $(".ablsolute_border_s").css('left');
			left = left.split('px');
			left[0];
			if(left[0] % 82 != 0) {
				return false;
			}
			if($(".ablsolute_border_s").css('left') != '0' && $(".ablsolute_border_s").css('left') != '0px') {
				$(".ablsolute_border_s").animate({
					left: '+=82px'
				},250);
			}
		});
		$(".right_button").click(function() {
			var left = $(".ablsolute_border_s").css('left');
			left = left.split('px');
			left[0];
			if(left[0] % 82 != 0) {
				return false;
			}
			if(max > 3) {
				if(left[0]*-1 != (max-3)*82) {
					$(".ablsolute_border_s").animate({
						left: '-=82px'
					},250);
				}
			}
		});
	});
</script>
<?$this->load->view('layout/footer')?>