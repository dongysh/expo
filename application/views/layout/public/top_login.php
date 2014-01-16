<div class="frame_div top_login">
	<p class="top_login_info">
		<span><?=_('Welcome to global-expo.cn')?>,</span>
		<span><a class="bold" href="<?=base_url()?>join"><?=_('Join Free')?></a></span>&nbsp;&nbsp;|&nbsp;
		<span><a href="<?=base_url()?>login">Sign In</a></span>
	</p>
	<p class="top_login_menu">
        <span>
            <select id="language-switch">
                <option value="switchLocale/en_US" <?php if ($locale == 'en_US') echo 'selected="selected"';?>>English</option>
                <option value="switchLocale/zh_CN" <?php if ($locale == 'zh_CN') echo 'selected="selected"';?>>简体中文</option>
            </select>
            <script>
                $(function() {
                    $('#language-switch').change(function() {
                        window.location = $(this).val();
                    });
                });
            </script>
        </span>
		<span><a href="<?=base_url()?>home/user/global_expo" target="_blank">Profile</a></span>&nbsp;&nbsp;|&nbsp;
		<span><a href="<?=base_url()?>home/user/message" target="_blank">Messages</a></span>&nbsp;&nbsp;|&nbsp;
		<span><a href="<?=base_url()?>home/user/favorit" target="_blank">Favorites</a></span>
	</p>
	<div class="clear"></div>
</div>