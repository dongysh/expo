<?$this->load->view('layout/header')?>
<?$this->load->view('layout/static/top_sign')?>
<div class="space_15"></div>
<div class="frame_div">
<?$this->load->view('layout/public/join_left')?>
<?$this->load->view('layout/static/join_right')?>
<div class="clear"></div>
</div>
<div class="space_15"></div>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	$(window).load(function() {
		//换图片
		$(".code_img_change").click(function() {
			$(".code_img").html('changing......');
			$.ajax({
				type : "POST",
				async: false,
				url : "<?=base_url()?>join/ajax_change_code",
				data : $("form").serialize(),
				success : function(json) {
					$(".code_img").html(json['img']);
				}
			});
			return false;
		});
		//检查
		$("#login_name").blur(function() {
			check_email();
		});
		$("#password").blur(function() {
			check_pwd();
		});
		$("#confirm").blur(function() {
			check_confirm();
		});
		$("#last_name").blur(function() {
			check_name();
		});
		$("#company_name").blur(function() {
			check_company();
		});
		$("#tel1").blur(function() {
			check_tel();
		});
		$("#tel2").blur(function() {
			check_tel();
		});
		$("#tel3").blur(function() {
			check_tel();
		});
		$("#tel4").blur(function() {
			check_tel();
		});
		$("#code").blur(function() {
			check_code();
		});
		//提交
		$("form").submit(function() {
			format_error_msg();
			stop_submit_btn();
			check_email();
			check_pwd();
			check_confirm();
			check_industry();
			check_name();
			check_company();
			check_location();
			check_tel();
			check_code();
			$.ajax({
				type : "POST",
				url : "<?=base_url()?>join/ajax_reg",
				data : $("form").serialize(),
				success : function(json) {
					if(json['status'] == 1) {
						window.location.href = json['url'];
					}else if(json['status'] == 2){
						$("#login_name_error").text(json['login_name_error']);
						$("#password_error").html(json['password_error']);
						$("#confirm_error").text(json['confirm_error']);
						$("#personal_industry_id_error").text(json['personal_industry_id_error']);
						$("#name_error").text(json['name_error']);
						$("#company_name_error").text(json['company_name_error']);
						$("#personal_location_id_error").text(json['personal_location_id_error']);
						$("#tel_error").text(json['tel_error']);
						$("#code_error").text(json['code_error']);
						start_submit_btn();
					}else{
						window.location.href = '<?=base_url()?>';
					}
				}
			});
			return false;
		});
	});
	
	function check_email() {
		$("#login_name").val($.trim($("#login_name").val()));
		var email = $("#login_name").val();
		var emailFormat = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
		if(!emailFormat.test(email)) {
			$("#login_name_error").text('Please enter a valid Email address');
			start_submit_btn();
			return false;
		}
		$("#login_name_error").text('');
		check_login_name();
	}
	
	function check_pwd() {
		$("#password").val($.trim($("#password").val()));
		var password = $("#password").val();
		var passwordFormat = /^[0-9a-zA-Z]{6,20}$/;
		if(!passwordFormat.test(password)) {
			$("#password_error").text('Please enter 6-20 characters');
			start_submit_btn();
			return false;
		}
		$("#password_error").html('<span class="fcb2">6-20 characters (a-z,0-9only)</span>');
	}
	
	function check_confirm() {
		$("#password").val($.trim($("#password").val()));
		$("#confirm").val($.trim($("#confirm").val()));
		var password = $("#password").val();
		var confirm = $("#confirm").val();
		if(password != confirm) {
			$("#confirm_error").text('The repeated password is inconsistent');
			start_submit_btn();
			return false;
		}
		$("#confirm_error").text('');
	}
	
	function check_industry() {
		if($("#personal_industry_id").val() == 0) {
			$("#personal_industry_id_error").text('Please select your business industry');
			start_submit_btn();
			return false;
		}
		$("#personal_industry_id_error").text('');
	}
	
	function check_name() {
		$("#first_name").val($.trim($("#first_name").val()));
		$("#last_name").val($.trim($("#last_name").val()));
		var first_name = $("#first_name").val();
		var last_name = $("#last_name").val();
		if(first_name == '' || last_name == '') {
			$("#name_error").text('Please enter your name');
			start_submit_btn();
			return false;
		}
		$("#name_error").text('');
	}
	
	function check_company() {
		$("#company_name").val($.trim($("#company_name").val()));
		var company_name = $("#company_name").val();
		if(company_name == '') {
			$("#company_name_error").text('Please enter your company name');
			start_submit_btn();
			return false;
		}
		$("#company_name_error").text('');
	}
	
	function check_location() {
		if($("#personal_location_id").val() == 0) {
			$("#personal_location_id_error").text('Please select your company location');
			start_submit_btn();
			return false;
		}
		$("#personal_location_id_error").text('');
	}
	
	function check_tel() {
		$("#tel1").val($.trim($("#tel1").val()));
		$("#tel2").val($.trim($("#tel2").val()));
		$("#tel3").val($.trim($("#tel3").val()));
		$("#tel4").val($.trim($("#tel4").val()));
		var tel1 = $("#tel1").val();
		var tel2 = $("#tel2").val();
		var tel3 = $("#tel3").val();
		var tel4 = $("#tel4").val();
		var telFormat = /^[0-9]+$/;
		if((tel1 != '' && !telFormat.test(tel1)) || (tel2 != '' && !telFormat.test(tel2)) || (tel3 != '' && !telFormat.test(tel3)) || (tel4 != '' && !telFormat.test(tel4))) {
			$("#tel_error").text('Please enter numbers');
			start_submit_btn();
			return false;
		}
		$("#tel_error").text('');
	}
	
	function format_error_msg() {
		$("#login_name_error").text('');
		$("#password_error").html('<span class="fcb2">6-20 characters (a-z,0-9only)</span>');
		$("#confirm_error").text('');
		$("#personal_industry_id_error").text('');
		$("#name_error").text('');
		$("#company_name_error").text('');
		$("#personal_location_id_error").text('');
		$("#tel_error").text('');
		$("#code_error").text('');
	}
	
	function stop_submit_btn() {
		$("#submit").css('background-position', '0 -39px');
		$("#submit").css('cursor', 'default');
		$("#submit").attr('disabled', 'disabled');
		$("#submit").parent().find(".img").show();
	}
	
	function start_submit_btn() {
		$("#submit").css('background-position', '0 0');
		$("#submit").css('cursor', 'pointer');
		$("#submit").attr('disabled', false);
		$("#submit").parent().find(".img").hide();
	}
	
	function check_login_name() {
		$.ajax({
			type : "POST",
			url : "<?=base_url()?>join/ajax_check_login_name",
			data : "login_name=" + $.trim($("#login_name").val()),
			success : function(json) {
				if(!json['status']) {
					$("#login_name_error").text(json['value']);
					start_submit_btn();
				}
			}
		});
	}
	
	function check_code() {
		$("#code_error").text('');
		$.ajax({
			type : "POST",
			url : "<?=base_url()?>join/ajax_check_code",
			data : "code=" + $.trim($("#code").val()),
			success : function(json) {
				if(!json['status']) {
					$("#code_error").text(json['value']);
					start_submit_btn();
				}
			}
		});
	}
</script>
<?$this->load->view('layout/footer')?>
