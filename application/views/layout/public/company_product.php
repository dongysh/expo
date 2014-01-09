<div class="space_10"></div>
<div class="product_info_title"><?=$product_result->row(0)->title_en?></div>
<div class="space_15"></div>
<div class="company_img_and_about_us">
	<div class="company_imgs">
		<?if($real_img_num > 0):?>
		<?$this->load->view('layout/public/images_js')?>
		<?else:?>
		<?$this->load->view('layout/public/no_images_js')?>
		<?endif;?>
	</div>
	<div class="product_info">
		<?if($product_result->row(0)->version != '' && $product_result->row(0)->version != NULL):?>
		<div class="product_info_mdoel">Model: <?=htmlspecialchars($product_result->row(0)->version)?></div>
		<?endif;?>
		<?if($product_result->row(0)->min_order != '' && $product_result->row(0)->min_order != NULL):?>
		<div class="product_info_minnum">Minimum Order: <?=htmlspecialchars($product_result->row(0)->min_order)?>&nbsp;<?=htmlspecialchars($product_result->row(0)->min_order_unit)?></div>
		<?endif;?>
		<?if($product_result->row(0)->last_pay != '' && $product_result->row(0)->last_pay != NULL):?>
		<div class="product_info_delivery">Delivery days: <?=htmlspecialchars($product_result->row(0)->last_pay)?></div>
		<?endif;?>
		<div class="product_info_payment">Payment Terms:
		<?$a = 1;?>
		<?foreach($pay_types as $key => $row):?>
		<?=$pay_types[$key]?>
		<?if($a != count($pay_types)):?>
		<?=','?>
		<?endif;?>
		<?$a++;?>
		<?endforeach;?>
		</div>
		<?if($product_result->row(0)->cert != '' && $product_result->row(0)->cert != NULL):?>
		<div id="product_info_cert" class="product_info_cert">Certification: <?=$product_result->row(0)->cert?></div>
		<?endif;?>
		<?if($product_result->row(0)->descript_en != '' && $product_result->row(0)->descript_en != NULL):?>
		<?$descript_en = str_replace("<", '&nbsp;', $product_result->row(0)->descript_en)?>
		<?$descript_en = str_replace(">", '&nbsp;', $descript_en)?>
		<?$descript_en = htmlspecialchars($descript_en)?>
		<?$descript_en = str_replace("\r\n", '<br />', $descript_en)?>
		<?$descript_en = str_replace("\r", '<br />', $descript_en)?>
		<?$descript_en = str_replace("\n", '<br />', $descript_en)?>
		<div id="product_info_descript" class="product_info_descript">Brief Description: <?=$descript_en?></div>
		<?endif;?>
		<?if($this->session->userdata('user_session')):?>
		<?$user_session = $this->session->userdata('user_session')?>
		<?$favorites = $this->Favorit->check_favorites_by_product_id($user_session['id'], $product_result->row(0)->id)?>
		<?else:?>
		<?$favorites = false?>
		<?endif;?>
		<div class="space_10"></div>
		<div class="favorites p_favorites">
			<img <?($favorites) ? img_src('f_2.png') : img_src('f_1.png')?> width="20" height="20" /> <span class="<?=($favorites) ? 'added' : 'add'?>" href="<?=$product_result->row(0)->id?>"><?=($favorites) ? 'Added' : 'Add'?> to My Favorites</span>
		</div>
	</div>
	<div class="product_qrcode">
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
		<img border="0" src="<?=$this->config->item('user_base_url')?>td_code/show?value=<?=base_url().$base_result->row(0)->short_name.'-products/'.$seo_name.'_'.$product_result->row(0)->id?>.html" width="100" height="100" />
		<div class="product_qr_code_content">
			Product<br />
			QR Code
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="space_15"></div>
<?if(($product_result->row(0)->descript_detail_en == '' || $product_result->row(0)->descript_detail_en == NULL) && ($product_result->row(0)->video_link == '' || $product_result->row(0)->video_link == NULL)):?>
<div class="product_detail_title">Product Details</div>
<div class="space_15"></div>
<span class="fcb2">This product does not have corresponding detailed product introduction now, we will complete relevant contents as soon as possible</span>
<?else:?>
<?if($product_result->row(0)->descript_detail_en != '' && $product_result->row(0)->descript_detail_en != NULL):?>
<div class="product_detail_title">Product Details</div>
<div class="descript_detail">
<?=$product_result->row(0)->descript_detail_en?>
</div>
<?endif;?>
<?if($product_result->row(0)->video_link != '' || $product_result->row(0)->video_link != NULL):?>
<div class="space_15"></div>
<div class="product_detail_title">Related Videos</div>
<div class="space_15"></div>
<?=$product_result->row(0)->video_link?>
<?endif;?>
<?endif;?>