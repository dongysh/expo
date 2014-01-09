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