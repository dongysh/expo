<?$this->load->view('layout/header1')?>
<!--  header end  -->
<div class="wrap">
    <?foreach($meet_detail->result() as $meet_detail):?>
    <div class="content">
        <div class="bread_crumbs"><a href="javascript:void(0)" class="curr">首页</a><span class="gt">&gt;</span><a href="<?=base_url()?>meet/ls" class="curr">买家见面会</a><span class="gt">&gt;</span><span><?=$meet_detail->show_name?></span></div>
        <div class="meet_head">
            <div class="meet_list">
                <h4><a href="javascript:void(0)"><?=$meet_detail->meet_name?></a><a href="<?=base_url()?>meet/signUp/<?=$meet_detail->id?>" class="apply_btn">报名参加买家见面会</a></h4>
                        <p><span class="col_item"><strong class="label">时   间：</strong><?=$meet_detail->meet_time?></span></p>
                        <p><span class="col_item"><strong class="label">发起人：</strong><?=$meet_detail->meet_initiator?></span>
                        <span class="col_item"><strong class="label">见面会联系人：</strong><?=$meet_detail->meet_real_name?></span></p>
                        <p><span class="col_item"><strong class="label">所在国家：</strong><?=$meet_detail->country_cn?></span>
                        <span class="col_item"><strong class="label">见面会联系电话：</strong><?=$meet_detail->meet_tel?></span></p>
                        <p><span class="col_item"><strong class="label">地   址：</strong><?=$meet_detail->meet_address?></span>
                        <span class="col_item"><strong class="label">见面会联系邮箱：</strong><?=$meet_detail->meet_email?></span></p>
            </div>
        </div>
        <div class="mode_box exhibition_mode">
            <ul class="hd tab_hd" id="buyers_meet_detail">
                <li class="curr">见面会介绍</li>
                <li>见面会安排安排</li>
            </ul>
            <div class="bd">
                <div class="tab_con intro_text meet_detail">
                    <div class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></div>
                    <?=$meet_detail->meet_content?>
                </div>
                <div class="tab_con intro_text meet_detail" style="display: none">
                   <?=$meet_detail->meet_schedule?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#buyers_meet_detail>li").unbind('click').bind('click',  function() {
                    var cur_index = $(this).index();
                    $(this).siblings('li').removeClass('curr');
                    $(this).addClass('curr');
                    $(".meet_detail").css({
                        display: 'none'
                    });
                    $(".meet_detail").eq(cur_index).css({
                        display: 'block'
                    });
                });
            });
        </script>
    </div>
    <?endforeach;?>
</div>
<?$this->load->view('layout/footer')?>
