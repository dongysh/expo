<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<?css('global');?>
<?css('register');?>
<?js('jquery')?>
<?js('jquery.sliderkit.1.6.min')?>
<?js('jquery.easing.1.3')?>
<?js('jquery.validate.min')?>
</head>
<body>
<!--  header  -->
<div class="header">
	<div class="head">
		<div class="headWrap">
			<h1 class="logo"><a href="javascript:void(0)" title="global-expo.com">global-expo.com</a></h1>
		</div>
	</div>
</div>
<!--  header end  -->
<div class="wrap">
	<div class="content register_wrap">
		<div class="h20"></div>
		<div class="colmain">
			<div class="hd">
				<h2 class="title">注册</h2>
				<p>Rate and review businesses that you have dealt with. Once registered, you'll have the ability to review any of China's best industuries listings! </p>
			<form action="<?=base_url();?>join/ajax_reg" method="post">
			</div>
			<div class="col_bd">
				<h3>创建您的账户<span class="remark">（带<b class="star">*</b>字为必填项）</span></h3>
				<div class="filed"><label class="keyName"><b class="star">*</b>Emali：</label>
					<input class="input_txt" id = "login_name" type="text" name="login_name" />
							<div class="join_input_error">
                                <span id="login_name_error" class="error"></span>
                            </div>					
				</div>
				<div class="filed"><label class="keyName"><b class="star">*</b>Password：</label>
					<input class="input_txt" id="password" type="password" name="password" />
					<div class="join_input_error">
                        <span id="password_error" class="error"><span class="fcb2"></span></span>
                    </div>					
				</div>
				<div class="filed"><label class="keyName"><b class="star">*</b>Comfirm Password：</label>
					<input class="input_txt" id="confirm" type="password" name="confirm" />
					<div class="join_input_error">
                        <span id="confirm_error" class="error"></span>
                    </div>					
				</div>
				<div class="filed"><label class="keyName"><b class="star">*</b>Industry：</label>
					<div class="ui-select ui-select_hover" style="float:left;border:0">
						<div class="selectMod">
						<select class="reg_select" id="personal_industry_id" name="personal_industry_id">
							<option value="0">---- Select Business Industry ----</option>
							<? foreach ($industry_result->result() as $row): ?>
			                    <option value="<?= $row->id ?>"><?= $row->title_en ?></option>
			                <? endforeach; ?>							
						</select>												
						</div>
		
					</div>
					<div class="join_input_error">
                        <span id="personal_industry_id_error" class="error"></span>
                    </div>					
				</div>
			</div>
			<div class="col_bd">
				<h3>请输入您的联系信息<span class="remark"></span></h3>
				<div class="filed"><label class="keyName"><b class="star">*</b>Name：</label>
					<input class="input_txt" id="first_name"type="text" name="first_name" />
					<div class="join_input_error">
                        <span id="name_error" class="error"></span>
                    </div>					
				</div>
				<div class="filed"><label class="keyName"><b class="star">*</b>Gender：</label><label class="sel_label"><input name="sex" class="input_radio" type="radio" checked value="1"/>Male</label><label class="sel_label"><input name="sex" class="input_radio" type="radio" value="0"/>Female</label>
				    <div class="join_input_error" style="margin:0 0 0 190px;">
                        <span id="name_error" class="error"></span>
                    </div>
				</div>
				<div class="filed"><label class="keyName"><b class="star">*</b>company name：</label>
					<input class="input_txt" type="text" id="company_name" name="company_name" />
					<div class="join_input_error">
                        <span id="company_name_error" class="error"></span>
                    </div>					
				</div>
				<div class="filed"><label class="keyName"><b class="star">*</b>Location：</label>
					<div class="ui-select" style="border:0;float: left;">
						<div class="selectMod" >
						<select class="reg_select" id="personal_location_id" name="personal_location_id">
							<option value="0">---- Select Company Location ----</option>
			                <? foreach ($recommend_location->result() as $row): ?>
			                    <option value="<?= $row->id ?>"><?= $row->title_en ?></option>
			                <? endforeach; ?>
               				 <optgroup label="--------------------------------------"></optgroup>
			                <? foreach ($location_result->result() as $row): ?>
			                    <option value="<?= $row->id ?>"><?= $row->title_en ?></option>
			                <? endforeach; ?>							
						</select>							
						</div>					
					</div>
					<div class="join_input_error">
                        <span id="personal_location_id_error" class="error"></span>
                    </div>					
				
				</div>
				<div class="filed"><label class="keyName"><b class="star">*</b>Tel：</label>
					<input class="input_txt s_w" type="text" id="tel1" name="tel1" /><span class="connet">-</span><input class="input_txt m_w" type="text" id="tel2" name="tel2"  /><span class="connet">-</span><input class="input_txt m_w" type="text" id="tel3" name="tel3" /><span class="connet">-</span><input class="input_txt s_w" type="text" id="tel4" name="tel4" />
					<div class="join_input_error">
                        <span id="tel_error" class="error"></span>
                    </div>					
				</div>
				<div class="filed code_filed"><label class="keyName">Enter the code shown：</label><input class="input_txt m_w" id="code" type="text" name="code" style="float: left"/>
					<div class="code_img" style="width: 170px;height:32px;float: left;"><?=$code['img'] ?>
				</div><a href="javascript:void(0)" class="change_code" style="float:left">换一张</a>
					<div class="join_input_error">
                        <span id="code_error" class="error"></span>
                    </div>				
				</div>
				<div class="agree_filed">As a member of global-expo.cn, I agree to the <span class="highlight">Terms of Use</span></div>
				<div class="filed btn_filed"><span class="btn btn_style01"><input class="inside" type="submit" value="创建我的账户" id="submit" name="submit" /></span></div>
			</div>
			</form>
		</div>
		<div class="aside">
			<div class="register_aside">
				<div class="aside_first">
					<h3 class="title">Already have an account?</h3>
					<p><a href="<?=base_url();?>login" class="sign_btn">sign in now!</a></p>
					<p><a href="javascript:void(0)">Forgot password?</a></p>
				</div>
					<dl class="free_list">
						<dt>why do you join in CBuuu?</dt>
						<dd>Timely contact th suppliers simplify the global trade</dd>
						<dd>Abundant excellent suppliers</dd>
						<dd>Get your own company website and QR code,could be better understood by the buyers</dd>
						<dd>Release the product information with no limit</dd>
					</dl>
					<p class="free_text">ALL FREE!</p>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		format_error_msg();
		$('.change_code').click(function() {
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

		//检查用户名
        $("#login_name").blur(function() {
            check_email();
        });
        $("#password").blur(function() {
            check_pwd();
        });
        $("#confirm").blur(function() {
            check_confirm();
        });
        $("#first_name").blur(function() {
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
                url : "<?=base_url();?>join/ajax_reg",
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
                       window.location.href = "<?=base_url();?>";
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
	    $("#login_name_error").text('Please enter a valid Email address').css('color','red');
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
	    $("#password_error").text('Please enter 6-20 characters').css('color','red');
	    start_submit_btn();
	    return false;
	}
	$("#password_error").html('<span class="fcb2">6-20 characters (a-z,0-9only)<\/span>').css('color','#838383');
	}

	function check_confirm() {
	$("#password").val($.trim($("#password").val()));
	$("#confirm").val($.trim($("#confirm").val()));
	var password = $("#password").val();
	var confirm = $("#confirm").val();
	if(password != confirm) {
	    $("#confirm_error").text('The repeated password is inconsistent').css('color','red');
	    start_submit_btn();
	    return false;
	}
	$("#confirm_error").text('');
	}

	function check_industry() {
	if($("#personal_industry_id").val() == 0) {
	    $("#personal_industry_id_error").text('select your business industry').css('color','red');
	    start_submit_btn();
	    return false;
	}
	$("#personal_industry_id_error").text('');
	}

	function check_name() {
	$("#first_name").val($.trim($("#first_name").val()));
	var first_name = $("#first_name").val();
	if(first_name == '' ) {
	    $("#name_error").text('Please enter your name').css('color','red');
	    start_submit_btn();
	    return false;
	}
	$("#name_error").text('');
	}

	function check_company() {
	$("#company_name").val($.trim($("#company_name").val()));
	var company_name = $("#company_name").val();
	if(company_name == '') {
	    $("#company_name_error").text('Please enter your company name').css('color','red');
	    start_submit_btn();
	    return false;
	}
	$("#company_name_error").text('');
	}

	function check_location() {
	if($("#personal_location_id").val() == 0) {
	    $("#personal_location_id_error").text('select your company location').css('color','red');
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
	    $("#tel_error").text('Please enter numbers').css('color','red');
	    start_submit_btn();
	    return false;
	}
	$("#tel_error").text('');
	}

	function format_error_msg() {
	$("#login_name_error").text('');
	$("#password_error").html('<span class="fcb2">6-20 characters (a-z,0-9only)<\/span>');
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
	    url : "<?=base_url();?>join/ajax_check_login_name",
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
	    url : "<?=base_url();?>join/ajax_check_code",
	    data : "code=" + $.trim($("#code").val()),
	    success : function(json) {
	        if(!json['status']) {
	            $("#code_error").text(json['value']).css('color','red');
	            start_submit_btn();
	        }
	    }
	});
	}	
</script>
<?$this->load->view('layout/footer')?>