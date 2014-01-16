<?$this->load->view('layout/header')?>
<!--  header end  -->
<div class="wrap">
	<div class="content">
		<div class="h20"></div>
		<div class="colmain">
			<div class="proSearch_mode">
				<div class="result_crumbs_bd">产品分类 <span class="gt">&gt;</span>
					<?if($this->uri->segment(2) == 'index'):?>
						&nbsp;&nbsp;
					<?else:?>
						<a href="javascript:void(0)" class="curr"><?=$industry[0]['title']?>（<?=$product_nums?>）</a>
					<?endif;?>
				</div>
				<ul class="proSearch_list textPic_list">
					<?foreach($product_ls->result() as $row):?>
					<li class="hover">
						<?$path = $this->ProductImage->get_one_img($row->p_id)?>
						<?if($path):?>
							<a class="pic" href="javascript:void(0)">
							<img src="<?=base_url()?>webroot/user_upload/sma/<?=substr($path, 0 ,2)?>/<?=$path?>.jpg" alt="" /></a>
						<?else:?>
							<a class="pic" href="javascript:void(0)">
							<img src="<?=base_url()?>webroot/images/no_img_m.jpg" alt="" /></a>
						<?endif;?>

						<div class="details"><h4><a href="<?=base_url()?>index.php/product/pro_detail/<?=$row->p_id?>"><?=$row->title?></a></h4>
							<div class="pro_text"><?=$row->descript?></div>
							<p><span class="label">公司：</span><a href="javascript:void(0)"><?=$row->full_name?></a></p>
							<p><span class="label">型号：</span><?=$row->version?></p>
							<p><span class="label">起订量：</span><?=$row->min_order?></p>
							<p><span class="label">证书：</span><?=$row->cert?></p>
							<div class="sum"><a href="javascript:void(0)" title="询盘" class="consult_btn">询盘</a><a href="<?=base_url()?>index.php/product/favorite_pro/<?=$row->p_id?>" title="收藏产品" class="collect_btn">收藏产品</a></div>
						</div>
					</li>
					<?endforeach;?>
				</ul>
				<div class="pagination">
					<span class="link"><?=$pg_link?></span>
				</div>
			</div>
		</div>
		<div class="aside marginTop">
			<div class="mod download_mode">
				<div class="hd"><h2>免费下载</h2></div>
				<div class="bd">
					<div class="dl_col01">
						<span class="thumb"><img src="<?=base_url()?>webroot/images/thumb.jpg" alt="" /></span>
						<h3>Global Expo</h3>
						<p class="down_area"><a href="javascript:void(0)" title="下载客户端">下载客户端</a></p>
						<p class="con">anytime and Anywhere Keep in Touch with Your Counterparts and suppliers</p>
					</div>
					<div class="dl_col02">
						<a href="javascript:void(0)" title="App Store" class="appStore_btn"><img src="<?=base_url()?>webroot/images/appStore.jpg" alt="" /></a>
						<a href="javascript:void(0)" title="App Store" class="androidAPK_btn"><img src="<?=base_url()?>webroot/images/androidAPK.jpg" alt="" /></a>
					</div>
					<div class="dl_col03">
						<h4>其他下载方式：</h4>
						<p><a href="javascript:void(0)" title="一键安装">一键安装</a>|<a href="javascript:void(0)" title="发送短信">发送短信</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?$this->load->view('layout/footer')?>