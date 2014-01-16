<?$this->load->view('layout/header1')?>
<!--  header end  -->
<div class="wrap">
    <div class="content turnWrap02">
        <div class="bread_crumbs"><a href="<?=base_url()?>" class="curr">首页</a><span class="gt">&gt;</span><a href="<?=base_url()?>exhibition/ls" class="curr">数字展会</a><span class="gt">&gt;</span><span><?=$result['show_name']?></span></div>
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
    <!--                <div class="ui-select">-->
    <!--                    <div class="selectMod"><span class="select-input">请选择</span><span class="select-drop"><b class="arrow arrow-d"></b></span></div>-->
    <!--                    <ul class="select-list">-->
    <!--                        <li class="hover">请选择</li>-->
    <!--                        <li>农业</li>-->
    <!--                        <li>服饰</li>-->
    <!--                        <li>汽车及摩托车配件</li>-->
    <!--                        <li>农业</li>-->
    <!--                        <li>服饰</li>-->
    <!--                    </ul>-->
    <!--                </div>-->
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
        <div class="exhibition_item">
            <div class="textPic_item">
                <a class="pic" href="javascript:void(0)"><img src="<?php echo $this->config->item('upload_url_prefix').'exhibition/'.$result['show_logo'];?>" alt="" /></a>
                <div class="details"><h4><a href="javascript:void(0)"><?=$result['show_name']?></a></h4>
                    <p class="date"><?=$result['show_time_start'].'——'.$result['show_time_end']?></p>
                    <p><span class="label">所在国家：</span><?=$result['location']?></p>
                    <p><span class="label">地址：</span><?=$result['show_address']?></p>
                    <p class="sum"><a class="apply_btn<?php if($is_applied) echo ' applied_btn';?>" data-ex-id = "<?=$result['id']?>" href="javascript:void(0)"><?php if($is_applied) echo '已报名';else echo '报名观展';?></a><a href="#expo_company_list">查看展商</a>| <a id="expo_show_map_btn" href="javascript:void(0)" img_url="<?php if(isset($result['show_map'])&&$result['show_map']) echo $this->config->item('upload_url_prefix').'exhibition/'.$result['show_map'];?>">查看展位图</a>| <a href="javascript:void(0)">查看买家见面会</a></p>
                </div>
            </div>
        </div>
        <div class="colmain">
            <div class="mode_box exhibition_mode">
                <ul class="hd tab_hd change_tab_btn">
                    <li class="curr">展会介绍</li>
                    <li>日程安排</li>
                </ul>
                <div class="bd">
                    <div class="tab_con intro_text tab_inner current_tab">
                        <?=$result['show_content']?>
                    </div>
                    <div class="tab_con schedule tab_inner">
                        <?=$result['programme']?>
                    </div>
                </div>
                <div class="">

                </div>
            </div>
            <div class="mode_box company_mode">
                <?php if(isset($company)):?>
                <div class="hd" id="expo_company_list"><h2>展商列表</h2></div>
                <div class="bd">
                    <table class="company_table">
                        <thead>
                        <tr>
                            <th class="col_01">展位号</th>
                            <th class="col_02">公司名称</th>
                            <th class="col_03">所在国</th>
                            <th class="col_04">主要产品</th>
                            <th class="col_05">联系人二维码</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($company->result_array() as $key=>$value):?>
                        <tr>
                            <td class="col_01"><?=$value['position']?></td>
                            <td class="col_02"><?=$value['full_name']?></td>
                            <td class="col_03"><?=$value['location']?></td>
                            <td class="col_04"><?=$value['main_product']?></td>
                            <td class="col_05"><img src="<?=base_url()?>td_code/show?value=<?=$value['td_code']?>&size=4" alt="" /></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="aside">
            <div class="mod_style02 companyLogo_mode">
                <div class="hd"><h2>组委会</h2></div>
                <div class="bd"><img src="images/s_logo.jpg" alt="" /></div>
            </div>
            <div class="mod_style02 otherCompany_mode">
                <div class="hd"><h2>联合主办</h2></div>
                <div class="bd">
                        <?=$result['combine_sponsor']?>
<!--                    <ul class="text_list">-->
<!--                        <li><a href="javascript:void(0)" title="">温州市商务局</a></li>-->
<!--                        <li><a href="javascript:void(0)">上海市商务委员会</a></li>-->
<!--                    </ul>-->
                </div>
            </div>
            <div class="mod_style02 supportCompany_mode">
                <div class="hd"><h2>支持单位</h2></div>
                <div class="bd">
                    <?=$result['support_unit']?>
<!--                    <ul class="text_list">-->
<!--                        <li><a href="javascript:void(0)" title="">温州市商务局</a></li>-->
<!--                        <li><a href="javascript:void(0)" title="">中国国际贸易促进委员会</a></li>-->
<!--                        <li><a href="javascript:void(0)">上海市商务委员会</a></li>-->
<!--                    </ul>-->
                </div>
            </div>
            <?php if(isset($media)):?>
            <div class="mod_style02 friendCompany_mode">
                <div class="hd"><h2>合作媒体</h2></div>
                <div class="bd">
                    <ul class="pic_list">
                        <?php foreach($media->result_array() as $key=>$value):?>
                            <li class="first"><a href="javascript:void(0)" title="<?=$value['cooperate_name']?>"><img src="<?=base_url().'webroot/'.$value['cooperate_logo']?>" alt="" /></a></li>
<!--                            <li><a href="javascript:void(0)" title=""><img src="images/s_logo.jpg" alt="" /></a></li>-->
<!--                            <li><a href="javascript:void(0)"><img src="images/s_logo.jpg" alt="" /></a></li>-->
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<style>
    .tab_inner
    {
        display:none;
    }
    .current_tab
    {
        display:block;
    }
</style>
<script>
    function bindChangeTab()
    {
        $('.change_tab_btn li').unbind('click').bind('click',function(){
            $('.tab_inner').removeClass('current_tab');
            $('.tab_inner').eq($(this).index()).addClass('current_tab');
            $('.change_tab_btn li').removeClass('curr');
            $(this).addClass('curr');
        });
    }
    function show_expo_map()
    {
        $('#expo_show_map_btn').unbind('click').bind('click',function(){
            var img_url = $(this).attr('img_url');
            if(img_url)
            {
                window.open (img_url);
            }
            else
            {
                alert('暂无展位图');
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
    $(function(){
        bindChangeTab();
        show_expo_map();
        bindKeyWordSearch();
        bind_apply_exhibition();
    });
</script>
<?$this->load->view('layout/footer')?>