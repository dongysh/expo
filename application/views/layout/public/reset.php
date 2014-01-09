<form action="<?=base_url()?>password/reset/?sk=<?=$sk?>" method="post">
<div class="frame_div">
	<div class="forget_reset">
		<p>
			Set a New Password
		</p>
		<div class="reset_input">
			<div class="label">Registered Email: </div><div class="input"><?=$login_name?></div>
		</div>
		<div class="reset_input">
			<div class="label">Enter new password: </div><div class="input"><input id="pwd" type="password" name="password" />
				<span class="fcb2">6-20 characters (a-z,0-9only)</span>
			</div>
		</div>
		<div class="reset_input">
			<div class="label">Repeat new password: </div><div class="input"><input id="confirm_pwd" type="password" name="confirm" /></div>
		</div>
		<div class="forget_error">
		</div>
		<div class="forget_submit">
			<input type="submit" value=" " />
		</div>
	</div>
</div>
</form>