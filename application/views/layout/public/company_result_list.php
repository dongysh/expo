<<<<<<< HEAD
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
=======
<?$i = 1;?>
<?foreach($company_ls->result() as $row):?>
<div class="space_15"></div>
<div class="">
	<div class="search_img">
		<?$company_result = $this->CompanyDetail->find_by_company_id($row->id)?>
		<?if($company_result->num_rows() && strlen($company_result->row(0)->path) == 32):?>
		<img src="<?=base_url()?>webroot/user_upload/sma/<?=substr($company_result->row(0)->path, 0 ,2)?>/<?=$company_result->row(0)->path?>.jpg" width="120" height="90" />
		<?else:?>
		<img src="<?=base_url()?>webroot/images/no_img_m.jpg" width="120" height="90" />
		<?endif;?>
	</div>
	<div class="search_info">
		<div class="search_product_title">
			<a target="_blank" href="<?=base_url().$row->short_name?>"><?=htmlspecialchars($row->full_name_en)?></a>
		</div>
		<?if($company_result->num_rows() && $company_result->row(0)->cert_en != ''):?>
		<div class="cert">
			Certification: <?=htmlspecialchars($company_result->row(0)->cert_en)?>
		</div>
		<?endif;?>
		<div class="space_10"></div>
		<?if($this->session->userdata('user_session')):?>
		<?$user_session = $this->session->userdata('user_session')?>
		<?$favorites = $this->Favorit->check_favorites_by_company_id($user_session['id'], $row->id)?>
		<?else:?>
		<?$favorites = false?>
		<?endif;?>
		<div class="favorites c_favorites">
			<img <?($favorites) ? img_src('f_2.png') : img_src('f_1.png')?> width="20" height="20" /> <span class="<?=($favorites) ? 'added' : 'add'?>" href="<?=$row->id?>"><?=($favorites) ? 'Added' : 'Add'?> to My Favorites</span>
		</div>
	</div>
	<div class="search_detail">
		<?if($company_result->num_rows() && $company_result->row(0)->main_product_en != ''):?>
		<div class="search_product_company_main_product">
			<span>Main Products : </span><?=htmlspecialchars($company_result->row(0)->main_product_en)?>
		</div>
		<?endif;?>
	</div>
</div>
<div class="clear"></div>
<?if($i != $company_ls->num_rows()):?>
<div class="hr"></div>
<?endif;?>
<?$i++;?>
<?endforeach;?>
<div class="space_15"></div>
<span class="link"><?=$pg_link?></span>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
