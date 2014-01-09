<div id="product_details">
	<?if(($product_result->row(0)->descript_detail_en == '' || $product_result->row(0)->descript_detail_en == NULL) && ($product_result->row(0)->video_link == '' || $product_result->row(0)->video_link == NULL)):?>
	<span class="fcb2">This product does not have corresponding detailed product introduction now, we will complete relevant contents as soon as possible</span>
	<?else:?>
		<?if($product_result->row(0)->descript_detail_en != '' && $product_result->row(0)->descript_detail_en != NULL):?>
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
</div>
<div id="company_profile">
	<?if((isset($detail_result) && $detail_result->row(0)->about_us_en != '' && $detail_result->row(0)->about_us_en != NULL) || (isset($detail_result) && $detail_result->row(0)->descript_en != '' && $detail_result->row(0)->descript_en != NULL)):?>
		<?if(isset($detail_result) && $detail_result->row(0)->about_us_en != '' && $detail_result->row(0)->about_us_en != NULL):?>
		<div class="main_product_title">
			Company Introduction
		</div>
		<div class="space_10"></div>
		<div class="main_product_content">
			<?$about_us_en = str_replace("<", '&nbsp;', $detail_result->row(0)->about_us_en)?>
			<?$about_us_en = str_replace(">", '&nbsp;', $about_us_en)?>
			<?$about_us_en = htmlspecialchars($about_us_en)?>
			<?$about_us_en = str_replace("\r", '<br />', $about_us_en)?>
			<?$about_us_en = str_replace("\n", '<br />', $about_us_en)?>
			<?=$about_us_en?>
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
			<?$descript_en = str_replace("\r", '<br />', $descript_en)?>
			<?$descript_en = str_replace("\n", '<br />', $descript_en)?>
			<?=$descript_en?>
		</div>
		<?endif;?>
	<?else:?>
		<span class="fcb2">This company does not have corresponding detailed company introduction now, we will complete relevant contents as soon as possible</span>
	<?endif;?>
</div>