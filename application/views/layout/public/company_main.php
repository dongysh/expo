<div class="company_img_and_about_us">
	<div class="company_about_us_content">
	<div class="company_imgs">
		<?if($real_img_num > 0):?>
		<?$this->load->view('layout/public/images_js')?>
		<?else:?>
		<?$this->load->view('layout/public/no_images_js')?>
		<?endif;?>
	</div>
		<?if(isset($detail_result) && $detail_result->row(0)->about_us_en != '' && $detail_result->row(0)->about_us_en != NULL):?>
			<?$about_us = str_replace("<", '&nbsp;', $detail_result->row(0)->about_us_en)?>
			<?$about_us = str_replace(">", '&nbsp;', $about_us)?>
			<?$about_us = htmlspecialchars($about_us)?>
			<?$about_us = str_replace("\r\n", '<br />', $about_us)?>
			<?$about_us = str_replace("\r", '<br />', $about_us)?>
			<?$about_us = str_replace("\n", '<br />', $about_us)?>
			<div class="company_about_us_title">Company Introduction</div>
			<div class="content"><?=$about_us?></div>
		<?else:?>
			<div class="company_about_us_title">Company Introduction</div>
			<span>This company does not have corresponding company introduction now, we will complete relevant contents as soon as possible.</span>
		<?endif;?>
	</div>
	<div class="company_about_us_content_more">
		<span></span>
	</div>
	<div class="clear"></div>
</div>
<div class="space_15"></div>
<div class="products_top_5">
	<div class="products_top_5_title">Product Showcase</div>
	<div class="products_top_5_more"><a href="<?=base_url().$base_result->row(0)->short_name?>-products">More</a></div>
</div>
<div class="clear"></div>
<?if(!$product_5->num_rows()):?>
	<div class="space_15"></div>
	<span class="fcb2">This company does not have corresponding product introduction now, we will complete relevant contents as soon as possible</span>
<?else:?>
	<?foreach($product_5->result() as $row):?>
	<div class="product_each">
		<div class="product_each_img">
			<?$path = $this->ProductImage->get_one_img($row->p_id)?>
			<?if($path && strlen($path) == 32):?>
			<img src="<?=base_url()?>webroot/user_upload/sma/<?=substr($path, 0, 2)?>/<?=$path?>.jpg" width="120" height="90" />
			<?else:?>
			<img <?img_src('no_img_m.jpg')?> width="120" height="90" />
			<?endif;?>
		</div>
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
		<div class="product_each_title"><a href="<?=base_url().$base_result->row(0)->short_name?>-products/<?=$seo_name?>_<?=$row->p_id?>.html"><?=$row->title_en?></a></div>
	</div>
	<?endforeach;?>
	<div class="clear"></div>
<?endif;?>
<div class="clear"></div>
<div class="space_15"></div>
<div class="company_detail">
	<div class="company_detail_title">Company Details</div>
</div>
<div class="clear"></div>
<div class="space_15"></div>
<?if((isset($detail_result) && $detail_result->row(0)->main_product_en != '' && $detail_result->row(0)->main_product_en != NULL) || (isset($detail_result) && $detail_result->row(0)->descript_en != '' && $detail_result->row(0)->descript_en != NULL)):?>
	<?if(isset($detail_result) && $detail_result->row(0)->main_product_en != '' && $detail_result->row(0)->main_product_en != NULL):?>
	<div class="main_product_title">
		Main Products
	</div>
	<div class="space_10"></div>
	<div class="main_product_content">
		<?$main_product_en = str_replace("<", '&nbsp;', $detail_result->row(0)->main_product_en)?>
		<?$main_product_en = str_replace(">", '&nbsp;', $main_product_en)?>
		<?$main_product_en = htmlspecialchars($main_product_en)?>
		<?$main_product_en = str_replace("\r\n", '<br />', $main_product_en)?>
		<?$main_product_en = str_replace("\r", '<br />', $main_product_en)?>
		<?$main_product_en = str_replace("\n", '<br />', $main_product_en)?>
		<?=$main_product_en?>
	</div>
	<?endif;?>
	<div class="clear"></div>
	<div class="space_20"></div>
	<?if(isset($detail_result) && $detail_result->row(0)->descript_en != '' && $detail_result->row(0)->descript_en != NULL):?>
	<div class="main_product_title">
		Basic Information
	</div>
	<div class="space_10"></div>
	<div class="main_product_content">
		<?$descript_en = str_replace("<", '&nbsp;', $detail_result->row(0)->descript_en)?>
		<?$descript_en = str_replace(">", '&nbsp;', $descript_en)?>
		<?$descript_en = htmlspecialchars($descript_en)?>
		<?$descript_en = str_replace("\r\n", '<br />', $descript_en)?>
		<?$descript_en = str_replace("\r", '<br />', $descript_en)?>
		<?$descript_en = str_replace("\n", '<br />', $descript_en)?>
		<?=$descript_en?>
	</div>
	<?endif;?>
<?else:?>
	<span class="fcb2">This company does not have corresponding detailed company introduction now, we will complete relevant contents as soon as possible</span>
<?endif;?>