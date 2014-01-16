<div class="product_info_title"><?=$product_result->row(0)->title_en?></div>
<div class="space_15"></div>
<div class="company_imgs">
	<?if($real_img_num > 0):?>
	<?$this->load->view('layout/public/images_js')?>
	<?else:?>
	<?$this->load->view('layout/public/no_images_js')?>
	<?endif;?>
</div>
<div class="product_info_1">
	<div class="product_info_title_1">
		Main Features
	</div>
	<div class="product_info_mdoel_1">Model: 
	<?if($product_result->row(0)->version != '' && $product_result->row(0)->version != NULL):?>
		<?=htmlspecialchars($product_result->row(0)->version)?>
	<?endif;?>
	</div>
	<div class="product_info_minnum_1">Minimum Order: 
	<?if($product_result->row(0)->min_order != '' && $product_result->row(0)->min_order != NULL):?>
		<?=htmlspecialchars($product_result->row(0)->min_order)?>&nbsp;<?=htmlspecialchars($product_result->row(0)->min_order_unit)?>
	<?endif;?>
	</div>
	<div class="product_info_delivery_1">Delivery days: 
	<?if($product_result->row(0)->last_pay != '' && $product_result->row(0)->last_pay != NULL):?>
		<?=htmlspecialchars($product_result->row(0)->last_pay)?>
	<?endif;?>
	</div>
	<div class="product_info_payment_1">Payment Terms:
	<?$a = 1;?>
	<?foreach($pay_types as $key => $row):?>
	<?=$pay_types[$key]?>
	<?if($a != count($pay_types)):?>
	<?=','?>
	<?endif;?>
	<?$a++;?>
	<?endforeach;?>
	</div>
	<div id="product_info_cert" class="product_info_cert_1">Certification: 
	<?if($product_result->row(0)->cert != '' && $product_result->row(0)->cert != NULL):?>
		<?=htmlspecialchars($product_result->row(0)->cert)?>
	<?endif;?>
	</div>
	<div id="product_info_descript" class="product_info_descript_1">Brief Description:
	<?if($product_result->row(0)->descript_en != '' && $product_result->row(0)->descript_en != NULL):?>
	<?$descript_en = str_replace("<", '&nbsp;', $product_result->row(0)->descript_en)?>
	<?$descript_en = str_replace(">", '&nbsp;', $descript_en)?>
	<?$descript_en = htmlspecialchars($descript_en)?>
	<?$descript_en = str_replace("\r\n", '<br />', $descript_en)?>
	<?$descript_en = str_replace("\r", '<br />', $descript_en)?>
	<?$descript_en = str_replace("\n", '<br />', $descript_en)?>
	<?=$descript_en?>
	<?endif;?>
	</div>
	<?if($this->session->userdata('user_session')):?>
	<?$user_session = $this->session->userdata('user_session')?>
	<?$favorites = $this->Favorit->check_favorites_by_product_id($user_session['id'], $product_result->row(0)->p_id)?>
	<?else:?>
	<?$favorites = false?>
	<?endif;?>
	<div class="space_10"></div>
	<div class="favorites p_favorites">
		<img <?($favorites) ? img_src('f_2.png') : img_src('f_1.png')?> width="20" height="20" /> <span class="<?=($favorites) ? 'added' : 'add'?>" href="<?=$product_result->row(0)->p_id?>"><?=($favorites) ? 'Added' : 'Add'?> to My Favorites</span>
	</div>
	<div class="product_qr_code_frame">
		<?$seo_name = str_replace(' & ', '-', $product_result->row(0)->title_en_first)?>
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
		<img border="0" src="<?=$this->config->item('user_base_url')?>td_code/show?value=<?=base_url().$base_result->row(0)->short_name.'-products/'.$seo_name.'_'.$product_result->row(0)->p_id?>.html" width="100" height="100" />
		<div class="product_qr_code_content">
			Product<br />
			QR Code
		</div>
	</div>
</div>
<div class="company_info">
	<div class="company_info_top">
		Supplier Details
	</div>
	<div class="company_info_title">
		<a href="<?=base_url().$base_result->row(0)->short_name?>"><?=$base_result->row(0)->full_name_en?></a>
	</div>
	<?if(isset($detail_result) && $detail_result->row(0)->main_product_en):?>
	<div class="company_info_main_pro">
		<span>Main Products:</span>
		<?=htmlspecialchars($detail_result->row(0)->main_product_en)?>
	</div>
	<?endif;?>
	<div class="space_10"></div>
	<?if($detail_result->row(0)->tel1 != '' && $detail_result->row(0)->tel1 != NULL && $detail_result->row(0)->tel2 != '' && $detail_result->row(0)->tel2 != NULL && $detail_result->row(0)->tel3 != '' && $detail_result->row(0)->tel3 != NULL):?>
	<div class="company_info_tel">
		Tel: <?=htmlspecialchars($detail_result->row(0)->tel1).'-'.htmlspecialchars($detail_result->row(0)->tel2).'-'.htmlspecialchars($detail_result->row(0)->tel3)?>
	</div>
	<?endif;?>
	<?$country = $this->Area->get_en_add($detail_result->row(0)->area_id)?>
	<?if($country != ''):?>
	<div class="company_info_country">
		Region: <?=$country?> China
	</div>
	<?endif;?>
	<?if($detail_result->row(0)->email != '' && $detail_result->row(0)->email != NULL):?>
		<div class="company_info_email">
			Email: <?=htmlspecialchars($detail_result->row(0)->email)?>
		</div>
	<?endif;?>
	<?if($this->session->userdata('user_session')):?>
	<?$user_session = $this->session->userdata('user_session')?>
	<?$favorites = $this->Favorit->check_favorites_by_company_id($user_session['id'], $base_result->row(0)->id)?>
	<?else:?>
	<?$favorites = false?>
	<?endif;?>
	<div class="company_info_favorites">
		<div class="favorites c_favorites">
			<img <?($favorites) ? img_src('f_2.png') : img_src('f_1.png')?> width="20" height="20" /> <span class="<?=($favorites) ? 'added' : 'add'?>" href="<?=$base_result->row(0)->id?>"><?=($favorites) ? 'Added' : 'Add'?> to My Favorites</span>
		</div>
	</div>
	<div class="company_info_cert">
	<?$cert_result = $this->CompanyCertification->get_by_company_id($base_result->row(0)->id)?>
	<?if($cert_result->num_rows()):?>
		<a target="_blank" href="<?=base_url()?>global-expo-certificate.html"><img border="0" <?img_src('cert_normal.png')?> width="40" height="40" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<?if($cert_result->num_rows() == 2):?>
		<a target="_blank" href="<?=base_url()?>global-expo-certificate.html"><img border="0" <?img_src('cert_ten.png')?> width="40" height="40" /></a>
		<?endif;?>
	<?endif;?>
	</div>
</div>
<div class="clear"></div>