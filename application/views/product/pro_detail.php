<?$this->load->view('layout/header1')?>
<!--  header end  -->
<div class="wrap">
<?foreach($pro_detail->result() as $row):?>
  <div class="content">
    <div class="bread_crumbs"><a href="<?=base_url()?>">首页</a><span class="gt">&gt;</span>
      <?if(isset($industry1)):?>
      <a href="<?=base_url()?>index.php/product/result/<?=$industry[0]['industry1_id']?>/"><?=$industry1?></a><span class="gt">&gt;</span>
      <?endif;?><?if(isset($industry2)):?>
      <a href="<?=base_url()?>index.php/product/result_two/<?=$industry[0]['industry2_id']?>/"><?=$industry2?></a><span class="gt">&gt;</span>
      <?endif;?><?if(isset($industry3)):?>
      <a href="<?=base_url()?>index.php/product/result_three/<?=$industry[0]['industry3_id']?>/"><?=$industry3?></a><span class="gt">&gt;</span>
      <?endif;?><?if(isset($industry4)):?>
      <a href="<?=base_url()?>index.php/product/result_four/<?=$industry[0]['industry4_id']?>/"><?=$industry4?></a>
      <?endif;?>
    </div>
    <div class="detail_head">
      <div class="probox">
		<div class="gallery">
			<div class="picView" id="picView"> <a rel="gal1" id="view" class="view jqzoom" href="#" style="outline-style: none; text-decoration: none;" title=""><div class="zoomPad"><img class="pic" src="<?=base_url()?>webroot/images/220x220.jpg" title=""></div></a></div>
			<div class="picsWrap" id="pics_wrap"> <a href="javascript:;" class="scrollL" hidefocus="true" title="上一张">上一张</a>
				<div class="picsList" id="picsList">
				  <ul id="thumblist">
					<li class="cur"> <a href="javascript:;" class="zoomThumbActive"> <img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" title=""> </a> </li>
					<li> <a href="javascript:;" class=""> <img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" title=""> </a> </li>
					<li> <a href="javascript:;" class=""> <img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" title=""> </a> </li>
				  </ul>
				</div>
				<a href="javascript:;" class="scrollR" hidefocus="true" title="下一张">下一张</a>
			</div>
		</div>
          <div class="property">
          	<div class="property_detail">
          	<h2><?=$row->title?></h2>
            <p><span>型号：</span><?=$row->version?></p>
            <p><span>最小订量：</span><?=$row->min_order?></p>
            <p><span>交货天数：</span><?=$row->last_pay?></p>
            <p><span>付款方式：</span><?=$paytype?></p>
            <p><span>认证：</span><?=$row->cert?></p>
            <p><span>简要说明：</span><?=$row->descript?></p>
            <div class="sum"><a class="consult_btn" title="在线咨询" href="javascript:void(0)">在线咨询</a><a class="collect_btn" title="收藏宝贝" href="<?=base_url()?>index.php/product/favorite_pro/<?=$row->id?>">收藏宝贝</a></div>
            </div>
            <div class="wecart"><img src="<?=base_url()?>webroot/images/aside_weixin.png" /></div>
          </div>
      </div>
          <div class="aside">
          	<div class="mod contact_mode">
				<div class="hd"><h2>供应商信息</h2></div>
				<div class="bd">
					<div class="contact_detail">
						<h3 class="name"><a title="" href="javascript:void(0)"><?=$row->full_name?></a></h3>
						<p><span class="label">主营产品:</span><?=$row->main_product?></p>
						<p><span class="label">所在地区:</span><?=$row->address?></p>
						<p><span class="label">电子邮件:</span><?=$row->email?></p>
					</div>
					<div class="sum"><a href="<?=base_url()?>index.php/product/favorite_com/<?=$row->company_id?>/<?=$row->id?>" class="fav" title="收藏公司">收藏公司</a></div>
				</div>
			</div>
          </div>
    </div>
    
    <div class="mode_box Pro_detail">
  		<div class="hd"><h2>产品详细信息</h2></div>
        <div class="bd">
        	<div class="detail_about">
            	<?=$row->descript_detail?>
            </div>
        </div>
    </div>
  </div>
   <?endforeach;?>
</div>
<?$this->load->view('layout/footer')?>