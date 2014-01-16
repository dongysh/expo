<?$this->load->view('layout/header1')?>
<!--  header end  -->
<div class="wrap">
    <div class="content turnWrap03">
        <div class="h20"></div>
        <div class="pageFilter clearfix">
            <form action="<?=base_url()?>exhibition/ls" method="get">
                <div class="col_item">
                    <label class="keyName">展会所在国家</label>
                    <select name="country" class="selectMod">
                        <option value="0">请选择</option>
                        <?php foreach($personal_locations->result_array() as $key => $value):?>
                            <option value="<?=$value['id']?>"><?=$value['title']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col_item">
                    <label class="keyName">展会举办月</label>
                    <select name="time" class="selectMod">
                        <option value="0">请选择</option>
                        <option value="01">一月</option>
                        <option value="02">二月</option>
                        <option value="03">三月</option>
                        <option value="04">四月</option>
                        <option value="05">五月</option>
                        <option value="06">六月</option>
                        <option value="07">七月</option>
                        <option value="08">八月</option>
                        <option value="09">九月</option>
                        <option value="10">十月</option>
                        <option value="11">十一月</option>
                        <option value="12">十二月</option>
                    </select>
                </div>
                <div class="col_item search_item">
                    <div class="search_keyItem">
                        <input name="kw" class="input_txt" id="key_word_input" type="text" value=""/>
                        <input class="btn btn_style03" type="submit" value="搜索" />
                        <label class="keyText ico" id="key_word_label">关键词搜索</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="colmain">
            <?php if($latest_exhibition):?>
            <div class="mode_box exhibition_mode">
                <div class="hd">
                    <h2 id="latest">最新展会</h2>
                </div>
                <div class="bd">
                    <ul class="exhibition_list">
                        <?php foreach($latest_exhibition->result_array() as $key => $value):?>
                            <li>
                                <h2><a href="<?=base_url().'exhibition/detail/'.$value['id']?>"><?=$value['show_name']?></a></h2>
                                <p class="about">xxxxxxxxxx</p>
                                <div class="imgZh"> <a href="<?=base_url().'exhibition/detail/'.$value['id']?>" class="pic"><img alt="" src="<?php echo $this->config->item('upload_url_prefix').'exhibition/' . $value['show_logo'];?>"></a>
                                    <div class="details">
                                        <h4><a href="javascript:void(0)"><?=$value['show_time_start'].'-'.$value['show_time_end']?></a></h4>
                                        <p><span class="label">所在国家：</span><?=$value['location']?></p>
                                        <p><span class="label">地址：</span><?=$value['show_address']?></p>
                                        <div class="sum">
                                            <p class="sum"><a data-ex-id = "<?=$value['id']?>" href="javascript:void(0);" class="apply_btn<?php if($latest_applied[$key]) echo ' applied_btn';?>"><?php if($latest_applied[$key]) echo '已报名';else '报名观展';?></a><a href="<?=base_url().'exhibition/detail/'.$value['id']?>#expo_company_list"> 查看展商>></a></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <div class="pagination">
                        <?php if($latest_page>1):?>
                            <span class="page-prev">上一页</span>
                            <a href="<?=base_url()?>exhibition/ls/<?=($latest_page-1).'-'.$near_page.'-'.$history_page?>#latest" class="page-prev">上一页</a>
                        <?php endif;?>
                        <?php for($i=1;$i<=$latest_total;$i++):?>
                            <a class="<?php if($i==$latest_page) echo'page-cur'?>" href="<?=base_url()?>exhibition/ls/<?=$i.'-'.$near_page.'-'.$history_page?>#latest"><?=$i?></a>
                        <?php endfor;?>
                        <?php if($latest_page<$latest_total):?>
                            <a href="<?=base_url()?>exhibition/ls/<?=($latest_page+1).'-'.$near_page.'-'.$history_page?>#latest" class="page-next">下一页</a>
                            <span class="page-next">下一页</span>
                        <?php endif;?>
                        <span class="page-skip">共<?=$latest_total?>页，到第<input type="text" class="page-num">页<button type="button" class="page-submit" name="page_submit" id="latest_page_submit">确定</button></span>
                    </div>

                </div>
            </div>
            <?php endif;?>

            <?php if($near_exhibition):?>
            <div class="mode_box exhibition_mode">
                <div class="hd" id="near">
                    <h2>即将开始的展会</h2><a class="more" href="javascript:void(0)">更多&gt;&gt;</a>
                </div>
                <div class="bd">
                    <ul class="exhibition_list">
                        <?php foreach($near_exhibition->result_array() as $key => $value):?>
                            <li>
                                <h2><a href="<?=base_url().'exhibition/detail/'.$value['id']?>"><?=$value['show_name']?></a></h2>
                                <p class="about">xxxxxxxxxx</p>
                                <div class="imgZh"> <a href="<?=base_url().'exhibition/detail/'.$value['id']?>" class="pic"><img alt="" src="<?php echo $this->config->item('upload_url_prefix').'exhibition/' . $value['show_logo'];?>"></a>
                                    <div class="details">
                                        <h4><a href="javascript:void(0)"><?=$value['show_time_start'].'-'.$value['show_time_end']?></a></h4>
                                        <p><span class="label">所在国家：</span><?=$value['location']?></p>
                                        <p><span class="label">地址：</span><?=$value['show_address']?></p>
                                        <div class="sum">
                                            <p class="sum"><a data-ex-id = "<?=$value['id']?>" href="javascript:void(0);" class="apply_btn<?php if($near_applied[$key]) echo ' applied_btn';?>"><?php if($near_applied[$key]) echo '已报名';else '报名观展';?></a><a href="<?=base_url().'exhibition/detail/'.$value['id']?>#expo_company_list"> 查看展商>></a></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <div class="pagination">
                        <?php if($near_page>1):?>
                            <span class="page-prev">上一页</span>
                            <a href="<?=base_url()?>exhibition/ls/<?=$latest_page.'-'.($near_page-1).'-'.$history_page?><?=$url_end?>#near" class="page-prev">上一页</a>
                        <?php endif;?>
                        <?php for($i=1;$i<=$near_total;$i++):?>
                            <a class="<?php if($i==$near_page) echo'page-cur'?>" href="<?=base_url()?>exhibition/ls/<?=$latest_page.'-'.$i.'-'.$history_page?><?=$url_end?>#near"><?=$i?></a>
                            <?php if($i == 10) {echo '...';$i=$near_total;}?>
                        <?php endfor;?>
                        <?php if($near_page<$near_total):?>
                            <a href="<?=base_url()?>exhibition/ls/<?=$latest_page.'-'.($near_page+1).'-'.$history_page?><?=$url_end?>#near" class="page-next">下一页</a>

                            <span class="page-next">下一页</span>
                        <?php endif;?>
                        <span class="page-skip">共<?=$near_total?>页，到第<input type="text" class="page-num">页<button type="button" class="page-submit" name="page_submit" id="near_page_submit">确定</button></span>
                    </div>
                </div>
            </div>
            <?php endif;?>

            <?php if($history_exhibition):?>
            <div class="mode_box exhibition_mode">
                <div class="hd" id="history">
                    <h2>历史展会回顾</h2><a class="more" href="javascript:void(0)">更多&gt;&gt;</a>
                </div>
                <div class="bd">
                    <ul class="exhibition_list">
                        <?php foreach($history_exhibition->result_array() as $key => $value):?>
                            <li>
                                <h2><a href="<?=base_url().'exhibition/detail/'.$value['id']?>"><?=$value['show_name']?></a></h2>
                                <p class="about">xxxxxxxxxx</p>
                                <div class="imgZh"> <a href="<?=base_url().'exhibition/detail/'.$value['id']?>" class="pic"><img alt="" src="<?php echo $this->config->item('upload_url_prefix').'exhibition/' . $value['show_logo'];?>"></a>
                                    <div class="details">
                                        <h4><a href="javascript:void(0)"><?=$value['show_time_start'].'-'.$value['show_time_end']?></a></h4>
                                        <p><span class="label">所在国家：</span><?=$value['location']?></p>
                                        <p><span class="label">地址：</span><?=$value['show_address']?></p>
                                        <div class="sum">
                                            <p class="sum"><a data-ex-id = "<?=$value['id']?>" href="javascript:void(0);" class="apply_btn<?php if($history_applied[$key]) echo ' applied_btn';?>"><?php if($history_applied[$key]) echo '已报名';else echo'报名观展';?></a><a href="<?=base_url().'exhibition/detail/'.$value['id']?>#expo_company_list"> 查看展商>></a></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <div class="pagination">
                        <?php if($history_page>1):?>
                            <span class="page-prev">上一页</span>
                            <a href="<?=base_url()?>exhibition/ls/<?=$latest_page.'-'.$near_page.'-'.($history_page-1)?><?=$url_end?>#history" class="page-prev">上一页</a>
                        <?php endif;?>
                        <?php for($i=1;$i<=$history_total;$i++):?>
                            <a class="<?php if($i==$history_page) echo'page-cur'?>" href="<?=base_url()?>exhibition/ls/<?=$latest_page.'-'.$near_page.'-'.$i?><?=$url_end?>#history"><?=$i?></a>
                        <?php endfor;?>

                        <?php if($history_page<$history_total):?>
                            <a href="<?=base_url()?>exhibition/ls/<?=$latest_page.'-'.$near_page.'-'.($history_page+1)?><?=$url_end?>#history" class="page-next">下一页</a>
                            <span class="page-next">下一页</span>
                        <?php endif;?>
                        <span class="page-skip">共<?=$history_total?>页，到第<input type="text" class="page-num">页<button type="button" class="page-submit" name="page_submit" id="history_page_submit">确定</button></span>
                    </div>
<!--                    <div class="pagination">-->
<!--                        <span class="page-prev">上一页</span><a href="javascript:void(0)" class="page-prev">上一页</a><span class="page-cur">1</span><a href="javascript:void(0)">2</a><a href="javascript:void(0)">3</a><span class="page-break">...</span><a href="javascript:void(0)">14</a><a href="javascript:void(0)" class="page-next">下一页</a><span class="page-next">下一页</span><span class="page-skip">共25页，到第<input type="text" class="page-num">页<button type="button" class="page-submit" name="page_submit" id="page_submit">确定</button></span>-->
<!--                    </div>-->
                </div>
                <?php endif;?>
            </div>
            <?php if(!$history_exhibition&&!$near_exhibition&&!$latest_exhibition) echo "无搜索结果";?>
        </div>
        <?php if($history_exhibition||$near_exhibition||$latest_exhibition):?>
        <div class="aside">
            <div class="mode_box intro_mode">
                <div class="hd">
                    <h2>数字展会介绍</h2>
                </div>
                <div class="nRight">
                    <img src="<?=base_url()?>webroot/images/220x220.jpg" />
                    <p class="font"><i></i><a href="#">中华工业技术展</a></p>
                    <p class="bg"></p>
                </div>
            </div>
            <div class="mode_box contactUs_mode">
                <div class="hd">
                    <h2>联系我们</h2>
                </div>
                <div class="contact_us">
                    <p><span>Address：</span>Room 1607, Modern Commercial Mansion, 218 HengFeng Road, ZhaBei District, Shanghai, China</p>
                    <p><span>Tel：</span>86-21-51286778</p>
                    <p><span>Website：</span>www.global-expo.cn</p>
                    <p><span>Email：</span>maxiaolong@cbuuu.com</p>
                    <p><span>Zip Code：</span>200070</p>
                    </divs>
                </div>
                <div class="mode_box map_box">
                    <div class="hd">
                        <h2>查看地图</h2>
                    </div>
                    <div class="lookMap">
                        <p><img src="<?=base_url()?>webroot/images/map.jpg" /></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
<script>
    $(function(){
        bindPageSubmit();
        bindKeyWordSearch();
        bind_apply_exhibition();
    });
    function bindPageSubmit()
    {
        $('#latest_page_submit').unbind('click').bind('click',function(){
            var page = $(this).parent().find('.page-num').val();
            if(page!='')
            {
                window.location.href="<?=base_url()?>exhibition/ls/"+page+"-<?=$near_page.'-'.$history_page?><?=$url_end?>#latest";
            }
        });
        $('#near_page_submit').unbind('click').bind('click',function(){
            var page = $(this).parent().find('.page-num').val();
            if(page!='')
            {
                window.location.href="<?=base_url()?>exhibition/ls/<?=$latest_page?>-"+page+"-<?='-'.$history_page?><?=$url_end?>#near";
            }
        });
        $('#history_page_submit').unbind('click').bind('click',function(){
            var page = $(this).parent().find('.page-num').val();
            if(page!='')
            {
                window.location.href="<?=base_url()?>exhibition/ls/<?=$latest_page.'-'.$near_page?>-"+page+"<?=$url_end?>#history";
            }
        });

    }

    function bindKeyWordSearch()
    {
        $('#key_word_label').unbind('click').bind('click',function(){
            $("#key_word_input").focus();
        });
        $("#key_word_input").unbind('focus').bind('focus',function(){
            $('#key_word_label').hide();
        });
        $("#key_word_input").unbind('blur').bind('blur',function(){
            if($("#key_word_input").val()=='')
            {
                $('#key_word_label').show();
            }

        });
    }
    function apply_exhibition(exhibition_id,callback)
    {
        if(exhibition_id>0)
        {
            var url = "<?=base_url()?>exhibition/exhibition_apply";
            var data = {'exhibition_id':exhibition_id};
            $.ajax({
                url:url,
                dataType:'json',
                data:data,
                type:'post',
                error:function()
                {
                    alert('连接失败');
                },
                success:function(data)
                {
                    if(!data['result'])
                    {
                        alert(data['msg']);
                    }
                    else
                    {
                        alert(data['msg']);
                        callback();
                    }
                }
            });
        }
        else
        {
            alert('参数错误');
        }
    }
    function bind_apply_exhibition()
    {
        $('.apply_btn').not('.applied_btn').unbind('click').bind('click',function(){
            var exhibition_id = parseInt($(this).attr('data-ex-id'));
            var self = $(this);
            if(<?php if(isset($this->session->userdata('user_session')['id'])) echo 'false'; else echo 'true';?>)
            {
                window.open("<?=base_url().'exhibition/apply/'?>"+exhibition_id);
            }
            else
            {
                apply_exhibition(exhibition_id,function(){
                    self.addClass('applied_btn');
                    self.unbind('click');
                    self.html('已报名');
                });
            }
        });
    }
</script>

<?$this->load->view('layout/footer')?>