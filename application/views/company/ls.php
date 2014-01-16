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
<<<<<<< HEAD













<?$this->load->view('layout/header1')?>
<!--  header end  -->
<div class="wrap">
    <div class="content turnWrap">
        <div class="bread_crumbs"><a href="javascript:void(0)" class="curr">首页</a><span class="gt">&gt;</span><a href="javascript:void(0)" class="curr">数字展会</a><span class="gt">&gt;</span><span>中华工业技术展</span></div>
        <div class="company_header"><img src="<?=base_url()?>webroot/images/shop_img.png" alt="" /></div>
        <div class="colmain">
            <div class="mode_box goods_mode">
                <div class="hd"><h2>产品展示</h2><a href="javascript:void(0)" title="更多" class="more">更多&gt;</a></div>
                <div class="bd">
                    <ul class="pic_list clearfix">
                        <?php foreach($product_all->result_array() as $key=>$value):?>
                        <li><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url().'webroot/upload/'.$product_img[$key].'.jpg'?>" alt="" /></a>
                            <h4><a href="javascript:void(0)"><?=$value['title']?></a></h4>
                        </li>
                        <?php endforeach;?>

                    </ul>

                    <div class="pagination">
                        <?php echo $this->pagination->create_links();?>
<!--                        <span class="page-prev">上一页</span>-->
<!--                        <a class="page-prev" href="javascript:void(0)">上一页</a>-->
<!--                        <span class="page-cur">1</span>-->
<!--                        <a href="javascript:void(0)">2</a>-->
<!--                        <a href="javascript:void(0)">3</a>-->
<!--                        <span class="page-break">...</span>-->
<!--                        <a href="javascript:void(0)">14</a>-->
<!--                        <a class="page-next" href="javascript:void(0)">下一页</a>-->
<!--                        <span class="page-next">下一页</span>-->
                        <span class="page-skip">共<?=$page_count?>页，到第<input class="page-num" type="text" />页<button id="page_submit" name="page_submit" class="page-submit" type="button">确定</button></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="aside">
            <div class="mod contact_mode">
                <div class="hd"><h2>联络方式</h2></div>
                <div class="bd">
                    <div class="contact_detail">
                        <h3 class="name"><a href="javascript:void(0)" title=""><?=$base_result->row_array()['full_name']?></a></h3>
                        <p><span class="label">电子邮件:</span><?=$detail_result->row_array()['email']?></p>
                        <p><span class="label">联系人:</span><?=$detail_result->row_array()['last_name_ch'].$detail_result->row_array()['first_name_ch']?></p>
                        <p><span class="label">电话号码:</span><?=$detail_result->row_array()['tel1'].'-'.$detail_result->row_array()['tel2'].'-'.$detail_result->row_array()['tel3']?></p>
                        <p><span class="label">传真:</span><?=$detail_result->row_array()['fax1'].'-'.$detail_result->row_array()['fax2'].'-'.$detail_result->row_array()['fax3']?></p>
<!--                        <p><span class="label">地区:</span>中国山东青岛</p>-->
                        <p><span class="label">地址:</span><?=$detail_result->row_array()['address']?></p>
                        <p><span class="label">邮政编码:</span><?=$detail_result->row_array()['zip']?></p>
                    </div>
                    <div class="sum"><a class="consult_btn" title="在线咨询" href="javascript:void(0)">在线咨询</a><a class="collect_btn" title="收藏产品" href="javascript:void(0)">收藏产品</a></div>
                </div>
            </div>
            <div class="aside_weixin"><img src="<?=base_url()?>webroot/images/aside_weixin.png" alt="" /></div>
        </div>
    </div>

































































=======
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
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
<<<<<<< HEAD
<?$this->load->view('layout/footer')?>
<div class="footer">
    <div class="footerWrap">
        <div class="ft_nav"><a href="javascript:void(0)">About Us</a><a href="javascript:void(0)">Contact Us</a><a href="javascript:void(0)">Global-expo Certificate</a><a href="javascript:void(0)">Terms of Us</a><a href="javascript:void(0)">Help Center</a></div>
        <div class="copyright">Copyright&copy;2012 www.global-expo.cn</div>
    </div>
</div>
<div class="rightNav">
    <ul>
        <li class="weixin_c"><img src="<?=base_url()?>webroot/images/s_weixin.jpg" alt="" /></li>
        <li class="service_c"><img src="<?=base_url()?>webroot/images/service_ico.jpg" alt="" /><b class="sum">2</b></li>
    </ul>
</div>
</body>
</html>

<?//$this->load->view('layout/header')?>
<?//if($this->session->userdata('user_session')):?>
<?//$this->load->view('layout/public/site_logout')?>
<?//else:?>
<?//$this->load->view('layout/public/site_login')?>
<?//endif;?>
<!--<div class="space_15"></div>-->
<?//$this->load->view('layout/public/company_logo')?>
<!--<div class="space_15"></div>-->
<!--<div class="frame_div main">-->
<!--	<div class="main_left">-->
<!--		--><?//$this->load->view('layout/public/contact')?>
<!--		<div class="space_15"></div>-->
<!--		--><?//$this->load->view('layout/public/company_qrcode')?>
<!--	</div>-->
<!--	<div class="main_right">-->
<!--		--><?//$this->load->view('layout/public/company_products')?>
<!--	</div>-->
<!--	<div class="clear"></div>-->
<!--</div>-->
<!--<div class="space_15"></div>-->
<!--<div class="space_15"></div>-->
<!--<script type="text/javascript">-->
<!--	$(".c_favorites span").click(function() {-->
<!--		var now = $(this);-->
<!--		$.ajax({-->
<!--			type : "POST",-->
<!--			async: false,-->
<!--			url : "--><?//=base_url()?><!--favorites/add_or_del/" + now.attr('class') + '/company/' + now.attr('href'),-->
<!--			data : $("form").serialize(),-->
<!--			success : function(json) {-->
<!--				if(json['status'] == 1) {-->
<!--					window.open(json['url']);-->
<!--				}else if(json['status'] == 2) {-->
<!--					now.attr('class', 'added');-->
<!--					now.text('Added to My Favorites');-->
<!--					now.parent().find("img:eq(0)").attr('src', '--><?//=base_url()?><!--webroot/images/f_2.png');-->
<!--					$.fancybox.open('<div class="lightbox_content">'+json['msg']+'</div>'+close_btn, {-->
<!--						modal: true-->
<!--					});-->
<!--					close_lightbox();-->
<!--				}else if(json['status'] == 3) {-->
<!--					now.attr('class', 'add');-->
<!--					now.text('Add to My Favorites');-->
<!--					now.parent().find("img:eq(0)").attr('src', '--><?//=base_url()?><!--webroot/images/f_1.png');-->
<!--					$.fancybox.open('<div class="lightbox_content">'+json['msg']+'</div>'+close_btn, {-->
<!--						modal: true-->
<!--					});-->
<!--					close_lightbox();-->
<!--				}else if(json['status'] == 0) {-->
<!--					$.fancybox.open('<div class="lightbox_content">'+json['msg']+'</div>'+close_btn, {-->
<!--						modal: true-->
<!--					});-->
<!--					close_lightbox();-->
<!--				}else{-->
<!--					$.fancybox.open('<div class="lightbox_content">'+'unknow error'+'</div>'+close_btn, {-->
<!--						modal: true-->
<!--					});-->
<!--					close_lightbox();-->
<!--				}-->
<!--			}-->
<!--		});-->
<!--		return false;-->
<!--	});-->
<!--</script>-->
<?$this->load->view('layout/footer')?>






















































=======
<?$this->load->view('layout/footer')?>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
