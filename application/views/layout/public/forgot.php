<form action="<?=base_url()?>password/forgot" method="post">
<div class="frame_div">
	<div class="forget_reset">
		<p>
			Forget Your Password ?
		</p>
		<div class="forget_txt">
			To request a new password , please enter your most current registered email in global-expo.cn.
		</div>
		<div class="forget_input">
			<?if($this->session->flashdata('login_name')):?>
			Enter your email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="login_name" value="<?=$this->session->flashdata('login_name')?>" />
			<?else:?>
			Enter your email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="login_name" />
			<?endif;?>
		</div>
		<div class="forget_error">
			<?if($this->session->flashdata('msg')):?>
			<?=$this->session->flashdata('msg')?>
			<?endif;?>
		</div>
		<div class="forget_submit">
			<input type="submit" value=" " />
		</div>
	</div>
</div>
</form>