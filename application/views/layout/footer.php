<<<<<<< HEAD
<div class="footer">
	<div class="footerWrap">
		<div class="ft_nav">
			<a href="<?=base_url()?>about.html">About Us</a>
			<a href="<?=base_url()?>contact.html">Contact Us</a>
			<a href="<?=base_url()?>global-expo-certificate.html">Global-expo Certificate</a>
			<a href="<?=base_url()?>terms-of-use.html">Terms of Us</a>
			<a href="<?=base_url()?>account-membership.html">Help Center</a></div>
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
=======
	<div class="footer_bg">
		<div class="footer">
			<div class="foot_links">
				<a href="<?=base_url()?>about.html">About Us</a>
			</div>
			<div class="foot_links">
				<a href="<?=base_url()?>contact.html">Contact Us</a>
			</div>
			<div class="foot_links">
				<a href="<?=base_url()?>global-expo-certificate.html">Global-expo Certificate</a>
			</div>
			<div class="foot_links">
				<a href="<?=base_url()?>terms-of-use.html">Terms of Use</a>
			</div>
			<div class="foot_links">
				<a href="<?=base_url()?>account-membership.html">Help Center</a>
			</div>
			<div class="clear"></div>
			<div class="space_15"></div>
			<div class="copyright">Copyright @ 2012 www.global-expo.cn</div>
			<div class="space_15"></div>
			<?if(isset($icp)):?>
			<div class="icp">
				<a href="http://www.miitbeian.gov.cn" target="_blank">沪ICP备13004961-2号</a>
			</div>
			<div class="space_15"></div>
			<?endif;?>
		</div>
	</div>
	<script type="text/javascript">
		var close_btn = '<br /><br /><br /><br /><div class="close_lightbox_btn">OK</div>';
		function close_lightbox() {
			$('.close_lightbox_btn').click(function() {
				$.fancybox.close();
			});
		}
	</script>
	</body>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
</html>