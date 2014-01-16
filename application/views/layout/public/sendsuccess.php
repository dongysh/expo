<form action="<?=base_url()?>password/forgot" method="post">
<div class="frame_div">
	<div class="forget_reset">
		<p>
			Get email with password-reset link
		</p>
		<div class="send_mail_success">
			<div class="space_20"></div>
			Email:<span class="fcblue"><?=$login_name?></span><br />
			<div class="space_10"></div>
			We have sent a password reset email to the above email address.<br />
			Please open your inbox, and follow the instructions in the email to create a new password.<br />
			<div class="space_20"></div>
			What should I do if I didn't receive the email?<br />
			You might not receive the our email due to errors with the Internet. Please check your email<br /> 
			address or wait for a while.<br />
			If you still can't receive email after a few while, please:<br />
			<div class="space_10"></div>
			<div class="send_mail_success_ul">
				<ul>
					<li>Check your spam folder</li>
					<li><a id="resend" href="<?=base_url()?>password/forgot">Request a new one</a></li>
				</ul>
				<div class="back_home_link">
					<a href="<?=base_url()?>">Back to Home</a>
				</div>
			</div>
		</div>
	</div>
</div>
</form>