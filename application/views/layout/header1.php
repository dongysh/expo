<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <?$this->load->view('layout/public/seo')?>
    <?css('global')?>
    <?css('index')?>
    <?css('common')?>
    <?js('jquery')?>
    <?js('jquery.sliderkit.1.6.min')?>
    <?js('jquery.easing.1.3')?>
    <?js('jquery.validate.min')?>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".s_menu_bd").hide();
            $(".menu_hd").unbind('click').bind('click',function(){
                $(this).next(".s_menu_bd").toggle('fast');
            });
            $(".menu_hd").focusout(function() {
                $(this).next(".s_menu_bd").slideUp('fast');
            });
            $(".switchable_nav li:last").hide();
            bindSwitchSearchNav();
            bindSelectSearch();
            function bindSwitchSearchNav()
            {
                $(".switchable_nav li:first").unbind('click').bind('click',function(){
                    $(".switchable_nav li:last").toggle('fast');
                });
            }
            function bindSelectSearch()
            {
                $(".switchable_nav li:last").unbind('click').bind('click',function(){
                    var li_html1 = $(".switchable_nav li:last");
                    $(".switchable_nav").prepend(li_html1);
                    $(".switchable_nav li:last").hide();
                    bindSwitchSearchNav();
                    bindSelectSearch();
                });
            }
            $(".subItem_bd").hide();

            $(".subItem_box").mouseover(function() {
                $(this).children(".subItem_bd").show();
                $(this).addClass('subItem_box_hover');
            });
            $(".subItem_box").mouseout(function() {
                $(this).children(".subItem_bd").hide();
                $(this).removeClass('subItem_box_hover');
            });
            $(" #nav ul ").css({display: "none"}); // banner
            $(" #nav li").hover(function(){
                $(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
            },function(){
                $(this).find('ul:first').css({visibility: "hidden"});
            });

        });
    </script>
</head>
<body>
<div class="header">
    <div class="toolbar">
        <div class="toolbarWrap">
            <div class="quickArea"><a href="javascript:void(0)" title="手机版" class="mobile">手机版</a><span class="sitePipe">|</span><span class="welcome">welcome to global-expo.cn</span><span class="bold" style="color: black"><?$user_session = $this->session->userdata('user_session')?><?=$user_session['show_name']?></span>
                
                <?if($user_session):?>
                <a href="<?=base_url()?>login/out" title="注销">注销</a>
                <?else:?>
                <a href="<?=base_url()?>join" title="注册">注册</a>
                <span class="sitePipe">|</span>
                 <a href="<?=base_url()?>login" title="登录">登录</a>
                 <?endif;?>
            </div>
            <ul class="toolbar_nav">
                <li class="account hover">
                    <div class="s_menu">
                        <a class="menu_hd" href="javascript:void(0)">我的cbuu<b class="arrow arrow-d"></b></a>
                        <ul class="s_menu_bd">
                            <li><a href="javascript:void(0)" title="">下拉菜单01</a></li>
                            <li><a href="javascript:void(0)" title="">下拉菜单02</a></li>
                            <li><a href="javascript:void(0)" title="">下拉菜单03</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sitePipe">|</li>
                <li class="t_fav"><a href="javascript:void(0)" title="我的收藏">我的收藏</a></li>
                <li class="sitePipe">|</li>
                <li class=""><a href="javascript:void(0)" title="我的好友">我的好友</a></li>
                <li class="sitePipe">|</li>
                <li class="language">
                    <div class="s_menu">
                        <a class="menu_hd" href="javascript:void(0)">中文简体<b class="arrow arrow-d"></b></a>
                        <ul class="s_menu_bd">
                            <li><a href="javascript:void(0)" title="">英文</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="head">
        <div class="headWrap">
            <h1 class="logo"><a href="<?=base_url()?>" title="global-expo.com">global-expo.com</a></h1>
            <div class="search">
                <div class="search_con">
                    <form method="post" action="">
                        <div class="search_triggers search_triggers_hover">
                            <ul class="switchable_nav">
                                <li><a href="javascript:void(0)" title="产品">产品</a></li>
                                <li><a href="javascript:void(0)" title="公司">公司</a></li>
                            </ul>
                            <b class="arrow arrow-d"></b>
                        </div>
                        <div class="search_panel_fields">
                            <div class="search_combobox"><label class="ico search_label"></label><input class="input_txt" type="text" /></div>
                        </div>
                        <div class="search_button"><button type="submit" class="btn_search" title="搜索">搜 索</button></div>
                    </form>
                </div>
                <div class="hot_keyword"><strong>热门搜索：</strong><a href="javascript:void(0)" title="">双核平板电脑</a><a href="javascript:void(0)" title="">性感火辣的比基尼</a><a href="javascript:void(0)" title="">鸡尾酒礼服2013</a><a href="javascript:void(0)" title="">LED灯泡</a><a class="more ico" href="javascript:void(0)">更多</a></div>
            </div>
            <div class="weixin">
                <strong class="hd">上手机更方便<i class="close ico"></i></strong>
                <span class="weixin_img"><img src="<?=base_url()?>webroot/images/weixin.jpg" alt="" /></span>
            </div>
        </div>
    </div>
    <div class="mainNav">
        <div class="mainNavWrap">
            <!-- 全部商品分类 -->
            <div class="category">
                <h2 class="category_hd">全部商品分类</h2>
            </div>
            <!-- 全部商品分类 end -->
            <ul class="mainNav_main" id="nav">
                <li class="item item01"><a href="<?=base_url()?>" title="首页">首页</a></li>
                <li class="item item02"><a href="javascript:void(0)" title="产品展示">产品展示<b class="arrow arrow-d"></b></a>
                    <ul class="nav_show_more big_ul">
                        <?php foreach ($industry_1and2_result as $keys => $value):?>
                            <li class="nav_title"><a href="<?=base_url()?>index.php/product/result/<?=$value['id']?>/" title="<?=$value['title']?>"><?=$value['title']?></a>
                                <ul class="nav_show_more small_ul">
                                    <?php foreach ($value['lv2_info'] as $key=>$val):?>
                                        <?php foreach ($val as $k=>$v):?>
                                            <li><a href="<?=base_url()?>index.php/product/result_two/<?=$v['id']?>/" title=""><?=$v['title']?></a></li>
                                        <?php endforeach;?>
                                    <?php endforeach;?>
                                </ul>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </li>
                <li class="item item03"><a href="<?=base_url()?>exhibition/ls" title="数字展会">数字展会</a></li>
                <li class="item item04"><a href="<?=base_url()?>meet/ls" title="买家见面会">买家见面会</a></li>
                <li class="item item05"><a href="javascript:void(0)" title="杂志">杂志</a></li>
            </ul>
        </div>
    </div>
</div>