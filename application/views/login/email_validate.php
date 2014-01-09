<?php $this->load->view('layout/header')?>
<?php $this->load->view('layout/static/top_sign')?>
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
<?php $this->load->view('layout/footer')?>
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
                    url : "<?php echo base_url()?>login/emailSendInfo",
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
</script>