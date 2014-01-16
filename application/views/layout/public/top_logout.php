<div class="frame_div top_login">
	<p class="top_login_info">
		<span>Welcome</span>
		<span class="bold" style="color: black"><?$user_session = $this->session->userdata('user_session')?><?=$user_session['show_name']?></span>&nbsp;&nbsp;|&nbsp;
		<span><a href="<?=base_url()?>login/out">Sign Out</a></span>
	</p>
	<p class="top_login_menu">
		<span><a href="<?=base_url()?>home/user/global_expo" target="_blank">Profile</a></span>&nbsp;&nbsp;|&nbsp;
		<span><a href="<?=base_url()?>home/user/message" target="_blank">Messages</a></span>&nbsp;&nbsp;|&nbsp;
		<span><a href="<?=base_url()?>home/user/favorit" target="_blank">Favorites</a></span>
	</p>
	<div class="clear"></div>
</div>