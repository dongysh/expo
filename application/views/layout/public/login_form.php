<form action="<?=base_url()?>login/check" method="post">
	<div class="sign_in_form">
		<div class="login_input">
			<div class="space_20"></div>
			<div class="login_input_label">Email:</div>
			<div class="login_input_text">
				<input type="text" name="login_name" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="login_input">
			<div class="space_20"></div>
			<div class="login_input_label">Password:</div>
			<div class="login_input_text">
				<input type="password" name="password" />
			</div>
			<div class="clear"></div>
		</div>
		<input type="hidden" name="referer" value="<?=$referer?>" />
		<div class="login_error">
			<?if($this->session->flashdata('status')):?>
			<span><?=$this->session->flashdata('status')?></span>
			<?endif;?>
		</div>
		<div class="login_button">
		    <?php if (isset($_GET['industry_id'])) :?>
		        <input type="hidden" name="industry_id" value="<?php echo $_GET['industry_id'];?>" />
		    <?php endif;?>
		    <?php if (isset($_GET['company_id'])) :?>
		        <input type="hidden" name="company_id" value="<?php echo $_GET['company_id'];?>" />
		    <?php endif;?>
		    <?php if (isset($_GET['validate_user'])) :?>
		        <input type="hidden" name="validate_user" value="<?php echo $_GET['validate_user'];?>" />
		    <?php endif;?>
			<div class="submit_btn"><input type="submit" name="login" value=" " /></div>
			<div class="forgetpwd"><a href="<?=base_url()?>password/forgot">Forgot Password ?</a></div>
		</div>
		<div class="account">
			<span>Don't have an account ?</span>
			<div class="content">
				Rate and review businesses that you have dealt with.<br /> 
				Once registered, you'll have the right to review any of<br /> 
				China's best industuries listings! Registration is easy!
			</div>
			<div class="join_free">
				<a href="<?=base_url()?>join">Join free now!</a>
			</div>
		</div>
	</div>
</form>