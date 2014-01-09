<div class="company_products">
	<div class="company_products_title">
		Product Showcase
	</div>
	<div>
		<?if($product_all->num_rows()):?>
		<?foreach($product_all->result() as $row):?>
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
			<div class="product_each_title"><a href="<?=base_url().$base_result->row(0)->short_name?>-products/<?=$seo_name?>_<?=$row->p_id?>.html"><?=htmlspecialchars($row->title_en)?></a></div>
		</div>
		<?endforeach;?>
		<div class="clear"></div>
		<?else:?>
		<div class="space_15"></div>
		<span class="fcb2">This company does not have corresponding product introduction now, we will complete relevant contents as soon as possible</span>
		<?endif;?>
	</div>
</div>
