<?$this->load->view('layout/header')?>
<?$this->load->view('layout/static/top_sign')?>
<div class="space_15"></div>
<div class="space_15"></div>
<div class="space_15"></div>
<?$this->load->view('layout/public/reset')?>
<div class="space_15"></div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	$(window).load(function() {
		var passwordFormat = /^[0-9a-zA-Z]{6,20}$/;
		$("form").submit(function() {
			var password = $.trim($("#pwd").val());
			var password_confirm = $.trim($("#confirm_pwd").val());
			$(".forget_error").text('');
			if(!passwordFormat.test(password)) {
				$(".forget_error").text('The new password is not in the correct format.');
				return false;
			}else{
				if(password != password_confirm) {
					$(".forget_error").text('The repeated password is inconsistent.');
					return false;
				}
			}
		});
	});
</script>
<?$this->load->view('layout/footer')?>
