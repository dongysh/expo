<<<<<<< HEAD
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
=======
<?$i = 1;?>
<?foreach($product_ls->result() as $row):?>
<div class="space_15"></div>
<div class="">
	<div class="search_img">
		<?$path = $this->ProductImage->get_one_img($row->p_id)?>
		<?if($path):?>
		<img src="<?=base_url()?>webroot/user_upload/sma/<?=substr($path, 0 ,2)?>/<?=$path?>.jpg" width="120" height="90" />
		<?else:?>
		<img src="<?=base_url()?>webroot/images/no_img_m.jpg" width="120" height="90" />
		<?endif;?>
	</div>
	<div class="search_info">
		<div class="search_product_title">
			<?$seo_name = str_replace(' & ', '-', $row->title_en_first)?>
			<?$seo_name = str_replace(' &', '-', $seo_name)?>
			<?$seo_name = str_replace('& ', '-', $seo_name)?>
			<?$seo_name = str_replace('&', '-', $seo_name)?>
			<?$seo_name = str_replace(' ', '-', $seo_name)?>
			<?$seo_name = str_replace('\'', '', $seo_name)?>
			<?$seo_name = str_replace(',', '-', $seo_name)?>
			<?$seo_name = str_replace(';', '-', $seo_name)?>
			<?$seo_name = str_replace('(', '-', $seo_name)?>
			<?$seo_name = str_replace(')', '-', $seo_name)?>
			<?$seo_name = str_replace('[', '-', $seo_name)?>
			<?$seo_name = str_replace(']', '-', $seo_name)?>
			<?$seo_name = str_replace('/', '-', $seo_name)?>
			<?$seo_name = str_replace('%', '-', $seo_name)?>
			<?$seo_name = str_replace('"', '-', $seo_name)?>
			<?$seo_name = strtolower($seo_name)?>
			<?if(isset($pg_link_repair)):?>
			<?$industry_link_result = $this->Product->get_industry_link_by_product_id($row->p_id)?>
			<?$industry_link = @$industry_link_result->row(0)->title_en?>
			<?$industry_link = industry_link($industry_link)?>
			<?$industry_id = @$industry_link_result->row(0)->id?>
			<?$link_name = $industry_link.'_'.$industry_id?>
			<?endif;?>
			<a target="_blank" href="<?=base_url().$link_name?>/<?=$seo_name?>_<?=$row->p_id?>.html"><?=htmlspecialchars($row->title_en)?></a>
		</div>
		<?if($row->version != ''):?>
		<div class="version">
			Model: <?=$row->version?>
		</div>
		<?endif;?>
		<?if($row->cert != ''):?>
		<div class="cert">
			Certification: <?=$row->cert?>
		</div>
		<?endif;?>
		<div class="space_10"></div>
		<?if($this->session->userdata('user_session')):?>
		<?$user_session = $this->session->userdata('user_session')?>
		<?$favorites = $this->Favorit->check_favorites_by_product_id($user_session['id'], $row->p_id)?>
		<?else:?>
		<?$favorites = false?>
		<?endif;?>
		<div class="favorites p_favorites">
			<img <?($favorites) ? img_src('f_2.png') : img_src('f_1.png')?> width="20" height="20" /> <span class="<?=($favorites) ? 'added' : 'add'?>" href="<?=$row->p_id?>"><?=($favorites) ? 'Added' : 'Add'?> to My Favorites</span>
		</div>
	</div>
	<div class="search_detail">
		<?$company = $this->Company->find_by_id($row->c_id)?>
		<div class="search_product_company_title">
			<a target="_blank" href="<?=base_url().$company->row(0)->short_name?>"><?=$company->row(0)->full_name_en?></a>
		</div>
		<?$company_detail = $this->CompanyDetail->find_by_company_id($row->c_id)?>
		<?if($company_detail->num_rows() && $company_detail->row(0)->area_id != 0):?>
		<div class="search_product_company_location">
			<?=$this->Area->get_en_add($company_detail->row(0)->area_id)?> China
		</div>
		<?endif;?>
		<?$cert_result = $this->CompanyCertification->get_by_company_id($row->c_id)?>
		<div class="space_10"></div>
		<?if($cert_result->num_rows()):?>
		<div>
			<a target="_blank" href="<?=base_url()?>global-expo-certificate.html"><img border="0" <?img_src('cert_normal.png')?> width="40" height="40" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
			<?if($cert_result->num_rows() == 2):?>
			<a target="_blank" href="<?=base_url()?>global-expo-certificate.html"><img border="0" <?img_src('cert_ten.png')?> width="40" height="40" /></a>
			<?endif;?>
		</div>
		<?endif;?>
	</div>
</div>
<div class="clear"></div>
<?if($i != $product_ls->num_rows()):?>
<div class="hr"></div>
<?endif;?>
<?$i++;?>
<?endforeach;?>
<div class="space_15"></div>
<?if(!isset($custom_link)):?>
<span class="link"><?=$pg_link?></span>
<?else:?>
<span class="link">
	<a href="1">First</a>&nbsp;&nbsp;
	<?if($pg_now == 1):?>
	<a href="<?=base_url().$link_name.'/'.$pg_now?>">Prev</a>&nbsp;&nbsp;
	<?else:?>
	<a href="<?=base_url().$link_name.'/'.($pg_now-1)?>">Prev</a>&nbsp;&nbsp;
	<?endif;?>
	<?for($a = 1; $a <= $pg_num; $a++):?>
	<?if($a == $pg_now):?>
	<span class="fcorange"><?=$a?></span>&nbsp;&nbsp;
	<?else:?>
	<a href="<?=base_url().$link_name.'/'.$a?>"><?=$a?></a>&nbsp;&nbsp;
	<?endif;?>
	<?endfor;?>
	<?if($pg_now == $pg_num):?>
	<a href="<?=base_url().$link_name.'/'.$pg_now?>">Next</a>&nbsp;&nbsp;
	<?else:?>
	<a href="<?=base_url().$link_name.'/'.($pg_now+1)?>">Next</a>&nbsp;&nbsp;
	<?endif;?>
	<a href="<?=base_url().$link_name.'/'.$pg_num?>">Last</a>
</span>
<?endif;?>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
