<div class="frame_div site_top">
	<div class="site_top_logo">
		<a href="<?=base_url()?>"><img border="0" <?img_src('logo.png')?> /></a>
	</div>
	<p class="site_top_info">
		<span>Welcome</span>
		<span class="bold" style="color: black"><?$user_session = $this->session->userdata('user_session')?><?=$user_session['show_name']?></span>&nbsp;&nbsp;|&nbsp;
		<span><a href="<?=base_url()?>login/out">Sign Out</a></span>
	</p>
	<form action="<?=base_url()?>search/index" method="post">
	<div class="site_top_search">
		<div class="site_top_search_right">
		  	<input id="submit1" type="submit" value=" " />
		</div>
		<div class="site_top_search_left">
			<input id="search" type="text" name="key_word" value="" /> 
		</div>
	</div>
	</form>
	<div class="clear"></div>
</div>