<?$this->load->view('layout/header')?>
<<<<<<< HEAD
<!--  header end  -->
<div class="wrap">
	<div class="content">
		<div class="h20"></div>
		<div class="colmain">
			<div class="proSearch_mode">
				<div class="result_crumbs_bd">产品分类 <span class="gt">&gt;</span>
					<?if($this->uri->segment(2) == 'index'):?>
						&nbsp;&nbsp;
					<?else:?>
						<a href="javascript:void(0)" class="curr"><?=$industry[0]['title']?>（<?=$product_nums?>）</a>
					<?endif;?>
				</div>
				<ul class="proSearch_list textPic_list">
					<?foreach($product_ls->result() as $row):?>
					<li class="hover">
						<?$path = $this->ProductImage->get_one_img($row->p_id)?>
						<?if($path):?>
							<a class="pic" href="javascript:void(0)">
							<img src="<?=base_url()?>webroot/user_upload/sma/<?=substr($path, 0 ,2)?>/<?=$path?>.jpg" alt="" /></a>
						<?else:?>
							<a class="pic" href="javascript:void(0)">
							<img src="<?=base_url()?>webroot/images/no_img_m.jpg" alt="" /></a>
						<?endif;?>

						<div class="details"><h4><a href="<?=base_url()?>index.php/product/pro_detail/<?=$row->p_id?>"><?=$row->title?></a></h4>
							<div class="pro_text"><?=$row->descript?></div>
							<p><span class="label">公司：</span><a href="javascript:void(0)"><?=$row->full_name?></a></p>
							<p><span class="label">型号：</span><?=$row->version?></p>
							<p><span class="label">起订量：</span><?=$row->min_order?></p>
							<p><span class="label">证书：</span><?=$row->cert?></p>
							<div class="sum"><a href="javascript:void(0)" title="询盘" class="consult_btn">询盘</a><a href="<?=base_url()?>index.php/product/favorite_pro/<?=$row->p_id?>" title="收藏产品" class="collect_btn">收藏产品</a></div>
						</div>
					</li>
					<?endforeach;?>
				</ul>
				<div class="pagination">
					<span class="link"><?=$pg_link?></span>
				</div>
			</div>
		</div>
		<div class="aside marginTop">
			<div class="mod download_mode">
				<div class="hd"><h2>免费下载</h2></div>
				<div class="bd">
					<div class="dl_col01">
						<span class="thumb"><img src="<?=base_url()?>webroot/images/thumb.jpg" alt="" /></span>
						<h3>Global Expo</h3>
						<p class="down_area"><a href="javascript:void(0)" title="下载客户端">下载客户端</a></p>
						<p class="con">anytime and Anywhere Keep in Touch with Your Counterparts and suppliers</p>
					</div>
					<div class="dl_col02">
						<a href="javascript:void(0)" title="App Store" class="appStore_btn"><img src="<?=base_url()?>webroot/images/appStore.jpg" alt="" /></a>
						<a href="javascript:void(0)" title="App Store" class="androidAPK_btn"><img src="<?=base_url()?>webroot/images/androidAPK.jpg" alt="" /></a>
					</div>
					<div class="dl_col03">
						<h4>其他下载方式：</h4>
						<p><a href="javascript:void(0)" title="一键安装">一键安装</a>|<a href="javascript:void(0)" title="发送短信">发送短信</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
=======
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
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
<?$this->load->view('layout/footer')?>