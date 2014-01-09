<div class="contacts">
	<div class="contacts_top"></div>
	<div class="contacts_middle">
		<div class="contacts_title"><a href="<?=base_url().$base_result->row(0)->short_name?>"><?=$base_result->row(0)->full_name_en?></a></div>
		<?if(isset($detail_result)):?>
		<?if($detail_result->row(0)->email != '' && $detail_result->row(0)->email != NULL):?>
		<div class="contacts_email">Email: <?=htmlspecialchars($detail_result->row(0)->email)?></div>
		<?endif;?>
		<?if($detail_result->row(0)->first_name != '' && $detail_result->row(0)->first_name != NULL && $detail_result->row(0)->last_name != '' && $detail_result->row(0)->last_name != NULL):?>
		<div class="contacts_contact">Contact: <?=htmlspecialchars($detail_result->row(0)->first_name).'&nbsp;'.htmlspecialchars($detail_result->row(0)->last_name)?></div>
		<?endif;?>
		<?if($detail_result->row(0)->tel2 != '' && $detail_result->row(0)->tel2 != NULL && $detail_result->row(0)->tel3 != '' && $detail_result->row(0)->tel3 != NULL):?>
		<div class="contacts_tel">Tel: <?='86-'.htmlspecialchars($detail_result->row(0)->tel2).'-'.htmlspecialchars($detail_result->row(0)->tel3)?></div>
		<?endif;?>
		<?if($detail_result->row(0)->fax2 != '' && $detail_result->row(0)->fax2 != NULL && $detail_result->row(0)->fax3 != '' && $detail_result->row(0)->fax3 != NULL):?>
		<div class="contacts_fax">Fax: <?='86-'.htmlspecialchars($detail_result->row(0)->fax2).'-'.htmlspecialchars($detail_result->row(0)->fax3)?></div>
		<?endif;?>
		<?if($detail_result->row(0)->mobile1 != '' && $detail_result->row(0)->mobile1 != NULL && $detail_result->row(0)->mobile2 != '' && $detail_result->row(0)->mobile2 != NULL):?>
		<div class="contacts_country">Mobile: <?=htmlspecialchars($detail_result->row(0)->mobile1).'-'.htmlspecialchars($detail_result->row(0)->mobile2)?></div>
		<?endif;?>
		<?$country = $this->Area->get_en_add($detail_result->row(0)->area_id)?>
		<?if($country != ''):?>
		<div class="contacts_country">Region: <?=$country?> China</div>
		<?endif;?>
		<?if($detail_result->row(0)->address_en != '' && $detail_result->row(0)->address_en != NULL):?>
		<div class="contacts_address">Address: <?=htmlspecialchars($detail_result->row(0)->address_en)?></div>
		<?endif;?>
		<?if($detail_result->row(0)->zip != '' && $detail_result->row(0)->zip != NULL):?>
		<div class="contacts_zip">Zip: <?=htmlspecialchars($detail_result->row(0)->zip)?></div>
		<?endif;?>
		<?if($detail_result->row(0)->url != '' && $detail_result->row(0)->url != NULL):?>
		<?
			$http = substr($detail_result->row(0)->url, 0, 4);
			if(strtolower($http) == 'http') {
				$http = $detail_result->row(0)->url;
			}else{
				$http = 'http://'.$detail_result->row(0)->url;
			}
		?>
		<div class="contacts_website"><a href="<?=$http?>" target="_blank">Company Website&nbsp;&nbsp;&gt;&gt;</a></div>
		<?endif;?>
		<?endif;?>
		<div class="space_10"></div>
		<?if($this->session->userdata('user_session')):?>
		<?$user_session = $this->session->userdata('user_session')?>
		<?$favorites = $this->Favorit->check_favorites_by_company_id($user_session['id'], $base_result->row(0)->id)?>
		<?else:?>
		<?$favorites = false?>
		<?endif;?>
		<div class="favorites c_favorites">
			<img <?($favorites) ? img_src('f_2.png') : img_src('f_1.png')?> width="20" height="20" /> <span class="<?=($favorites) ? 'added' : 'add'?>" href="<?=$base_result->row(0)->id?>"><?=($favorites) ? 'Added' : 'Add'?> to My Favorites</span>
		</div>
		<!-- <div class="space_10"></div>
		<div class="im_btn favorites" id="im_start">
			<img <?img_src('im_1.png')?> width="20" height="20" /> <span class="add">Contact Supplier</span>
		</div> -->
		<?if(isset($detail_result)):?>
		<?if(($detail_result->row(0)->twitter != '' && $detail_result->row(0)->twitter != NULL) || ($detail_result->row(0)->facebook != '' && $detail_result->row(0)->facebook != NULL) || ($detail_result->row(0)->linkedin != '' && $detail_result->row(0)->linkedin != NULL)):?>
		<div class="space_15"></div>
			<?if($detail_result->row(0)->twitter != '' && $detail_result->row(0)->twitter != NULL):?>
			<a href="<?=$detail_result->row(0)->twitter?>" target="_blank"><img border="0" <?img_src('twitter.png')?> /></a>
			<?endif;?>
			<?if($detail_result->row(0)->facebook != '' && $detail_result->row(0)->facebook != NULL):?>
			<a href="<?=$detail_result->row(0)->facebook?>" target="_blank"><img border="0" <?img_src('facebook.png')?> /></a>
			<?endif;?>
			<?if($detail_result->row(0)->linkedin != '' && $detail_result->row(0)->linkedin != NULL):?>
			<a href="<?=$detail_result->row(0)->linkedin?>" target="_blank"><img border="0" <?img_src('linkedin.png')?> /></a>
			<?endif;?>
		<?endif;?>
		<?endif;?>
	</div>
	<div class="contacts_bottom"></div>
</div>