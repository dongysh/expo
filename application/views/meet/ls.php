<?$this->load->view('layout/header1')?>
<!--  header end  -->
<div class="wrap">
    <div class="content">
        <div class="bread_crumbs"><a href="<?=base_url()?>" class="curr">首页</a><span class="gt">&gt;</span><a href="<?=base_url()?>meet/ls" class="curr">买家见面会</a><span class="gt">&gt;</span></div>
        <div class="mode_box meet_mode">
            <div class="hd"><h2>买家见面会</h2><a class="more" href="javascript:void(0)">更多&gt;&gt;</a></div>
            <div class="bd">
                <ul class="meet_list">
                   <?foreach($meet_ls->result() as $row):?>
                     <li>
                        <h4><a href="<?=base_url()?>meet/detail/<?=$row->id?>"><?=$row->meet_name?></a></h4>
                        <p><span class="col_item"><strong class="label">时   间：</strong><?=$row->meet_time?></span></p>
                        <p><span class="col_item"><strong class="label">发起人：</strong><?=$row->meet_initiator?></span>
                        <span class="col_item"><strong class="label">见面会联系人：</strong><?=$row->meet_real_name?></span></p>
                        <p><span class="col_item"><strong class="label">所在国家：</strong><?=$row->country_cn?></span>
                        <span class="col_item"><strong class="label">见面会联系电话：</strong><?=$row->meet_tel?></span></p>
                        <p><span class="col_item"><strong class="label">地   址：</strong><?=$row->meet_address?></span>
                         <span class="col_item"><strong class="label">见面会联系邮箱：</strong><?=$row->meet_email?></span></p>
                    </li>
                    <?endforeach;?>
                </ul>
                <div class="pagination">
                   <span class="link"><?=$pg_link?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?$this->load->view('layout/footer')?>
