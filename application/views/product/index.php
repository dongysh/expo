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
	<div class="main_top">
		<?$this->load->view('layout/public/product_info')?>
	</div>
	<div class="space_15"></div>
	<div class="space_15"></div>
	<div class="main_bottom">
		<?$this->load->view('layout/public/product_detail')?>
	</div>
</div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	jQuery(function() {
		if($("#product_info_cert").height() >= 60) {
			$("#product_info_cert").height(60);
		}
		if($("#product_info_descript").height() >= 100) {
			$("#product_info_descript").height(100);
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
	$(window).load(function() {
		$(".lastes_new_title").find("div:eq(0)").click(function (){
			$(this).attr('class', 'div1');
			$(this).parent().find("div:eq(1)").attr('class', 'div2');
			$("#company_profile").hide();
			$("#product_details").show();
		});
		$(".lastes_new_title").find("div:eq(1)").click(function (){
			$(this).parent().find("div:eq(0)").attr('class', 'div1_h');
			$(this).attr('class', 'div2_h');
			$("#product_details").hide();
			$("#company_profile").show();
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