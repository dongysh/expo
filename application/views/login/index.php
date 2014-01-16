<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<?css('global')?>
<?css('register')?>
</head>
<body>
<!--  header  -->
<div class="header">
	<div class="head">
		<div class="headWrap">
			<h1 class="logo"><a href="javascript:void(0)" title="global-expo.com">global-expo.com</a></h1>
			<div class="head_welcome">welcome to global-expo.cn</div>
		</div>
	</div>
</div>
<!--  header end  -->
<div class="wrap">
	<div class="content login_wrap">
		<div class="colmain">
			<div class="login_left"></div>
		</div>
		<div class="aside">
			<div class="login_aside">
				<div class="login_filed">
					<form action = "<?=base_url();?>login/check" method="post">
					<div class="filed"><label class="keyName">Emali：</label><input class="input_txt" type="text" name="login_name" /></div>
					<div class="filed"><label class="keyName">Password：</label><input class="input_txt" type="password" name="password"/></div>
					<div class="filed">
						<?if($this->session->flashdata('status')):?>
						<span><?=$this->session->flashdata('status')?></span>
						<?endif;?>
					</div>
					<?php if (isset($_GET['industry_id'])) :?>
				        <input type="hidden" name="industry_id" value="<?php echo $_GET['industry_id'];?>" />
				    <?php endif;?>
				    <?php if (isset($_GET['company_id'])) :?>
				        <input type="hidden" name="company_id" value="<?php echo $_GET['company_id'];?>" />
				    <?php endif;?>
				    <?php if (isset($_GET['validate_user'])) :?>
				        <input type="hidden" name="validate_user" value="<?php echo $_GET['validate_user'];?>" />
				    <?php endif;?>					
					<div class="filed btn_filed"><span class="btn btn_style02"><input class="inside" type="submit" value="登录" name="login"/></span><a href="<?=base_url()?>password/forgot" title="找回密码" class="forgot_btn">找回密码</a></div>
					</form>
				</div>
				<div class="other_login">
					<h3>使用合作网站账号登录</h3>
					<p>
					<a href="<?=base_url();?>oauth/facebook/" title="facebook">
						<img src="<?=base_url();?>webroot/images/facebook.png" alt="facebook" />
					</a>
					<a href="<?=base_url();?>oauth/twitter/" title="twitter">
						<img src="<?=base_url();?>webroot/images/twitter.png" alt="twitter" />
					</a>
					<a href="<?=base_url();?>oauth/linkedin/" title="inxxx">
						<img src="<?=base_url();?>webroot/images/in.png" alt="linkedin" />
					</a></p>
				</div>
				<div class="other_con">
					<p>Don't have an account ?<br/>Rate and review businesses that you have dealt with.Once registered, you'll have the right to review any of China's best industuries listings! Registration is easy! </p>
					<p><span class="btn btn_style01"><a href="<?=base_url()?>join" title="Join free now!" class="inside">Join free now!</a></span></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?$this->load->view('layout/footer')?>