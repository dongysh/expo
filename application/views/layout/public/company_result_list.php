<div class="h20"></div>
<div class="colmain">
	<div class="proSearch_mode">
		<div class="result_crumbs_bd">共搜索到 <em class="num"><?=$company_nums?></em> 个公司</div>
		<ul class="proSearch_list textPic_list">
			<?foreach($company_ls->result() as $row):?>
			<li class="hover">
				<?$company_result = $this->CompanyDetail->find_by_company_id($row->id)?>
				<?if($company_result->num_rows() && strlen($company_result->row(0)->path) == 32):?>
					<a class="pic" href="<?=base_url().$row->short_name?>"><img src="<?=base_url()?>webroot/user_upload/sma/<?=substr($company_result->row(0)->path, 0 ,2)?>/<?=$company_result->row(0)->path?>.jpg" alt="" /></a>
				<?else:?>
					<a class="pic" href="<?=base_url().$row->short_name?>"><img src="<?=base_url()?>webroot/images/no_img_m.jpg" alt="" /></a>
				<?endif;?>
				<div class="details">
					<h4><a href="<?=base_url().$row->short_name?>"><?=$row->full_name?></a></h4>
					<p><span class="label">所在国家：</span>中国</p>
					<p><span class="label">认证：</span><?=$company_result->row(0)->cert?></p>
					<div class="pro_text">主营产品：<?=$company_result->row(0)->main_product?></div>
					<div class="sum">
						<a href="javascript:void(0)" title="询盘" class="consult_btn">询盘</a>
						<span class="favorites c_favorites"><a href="<?=$company_result->row(0)->company_id?>" title="收藏产品" class="collect_btn">收藏产品</a></span>
					</div>

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