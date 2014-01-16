<div class="h20"></div>
<div class="colmain">
	<div class="proSearch_mode">		
		<div class="result_crumbs_bd">共搜索到 <em class="num"><?=$product_nums?></em> 件产品</div>
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

				<div class="details"><h4><a href="<?=base_url().'product/pro_detail/'.$row->p_id?>"><?=$row->title?></a></h4>
					<div class="pro_text"><?=$row->descript_detail?></div>
					<p><span class="label">公司：</span><a href="<?=base_url().$row->c_short_name?>"><?=$row->c_name?></a></p>
					<p><span class="label">型号：</span><?=$row->version?></p>
					<p><span class="label">起订量：</span><?=$row->min_order?>(<?=$row->min_order_unit?>)</p>
					<p><span class="label">证书：</span><?=$row->cert?></p>
					<div class="sum"><a href="javascript:void(0)" title="询盘" class="consult_btn">询盘</a><a href="javascript:void(0)" title="收藏产品" class="collect_btn">收藏产品</a></div>
				</div>
			</li>
			<?endforeach;?>
		</ul>
		<div class="pagination">
			<span class="link"><?=$pg_link?></span>
		</div>
	</div>
</div>		
<script type="text/javascript">
	$(".link a").each(function(){
		$(this).attr("href", $(this).attr("href")+"?<?=$pg_link_repair?>");
	});
</script>