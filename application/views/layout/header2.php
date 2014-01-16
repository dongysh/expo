<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <?$this->load->view('layout/public/seo')?>
    <?css('global')?>
    <?css('index')?>
    <?css('common')?>
    <?css('register')?>
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