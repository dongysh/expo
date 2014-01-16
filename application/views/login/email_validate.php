<<<<<<< HEAD
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<?js('jquery')?>
<?js('jquery.sliderkit.1.6.min')?>
<?js('jquery.easing.1.3')?>
<?js('jquery.validate.min')?>
<?css('global')?>
<?css('register')?>
</head>
<body>
<!--  header  -->
<div class="header">
    <div class="head">
        <div class="headWrap">
            <h1 class="logo"><a href="<?=base_url()?>" title="global-expo.com">global-expo.com</a></h1>
            <div class="head_welcome">welcome to global-expo.cn</div>
        </div>
    </div>
</div>
=======
<?php $this->load->view('layout/header')?>
<?php $this->load->view('layout/static/top_sign')?>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
<form id="form-validate">
    <p>请输入激活您的账号</p>
    <ul class="form-list">
    <?php if (isset($email)):?>
        <li>
            <span><?php echo $email?></span>
        </li>
    <?php endif;?>
        <li>
            <label class="required" for="email_address"><em>*</em>邮件地址：</label>
            <input type="text" value="<?php echo @$login_name?>" name="email" id="email_address">
            <span class="send_error"></span>
        </li>
    </ul>
    <input type="button" id="click_send_email" value="发送邮件" />
</form> 
<<<<<<< HEAD

=======
<?php $this->load->view('layout/footer')?>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
<script type="text/javascript">
    $(document).ready(function(){
        $("#form-validate").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Email地址不能为空！",
                    email: "Email地址不正确！"
                }
            }
        });

        $('#click_send_email').click(function() {
            if ($(this).val() != '正在发送...') {
                $(this).val('正在发送...');
                $.ajax({
                    type : 'POST',
<<<<<<< HEAD
                    url : "<?=base_url()?>login/emailSendInfo",
=======
                    url : "<?php echo base_url()?>login/emailSendInfo",
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
                    data: {email:$('#email_address').val()},
                    success : function(json) {
                        if (json['status'] == 1) {
                            setTimeout(function(){
                                $('#click_send_email').val('重新发送');
                                $('.send_error').html('邮件发送成功！如果5分钟后未收到邮件请重新发送。');
                            }, 5000);
                         } else {
                             $('#click_send_email').val('发送邮件');
                             $('.send_error').html(json['error']);
                         }
                    }
                });
            }
        })
    });
<<<<<<< HEAD
</script>
<?$this->load->view('layout/footer')?>
=======
</script>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
