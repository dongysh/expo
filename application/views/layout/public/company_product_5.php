<div class="contacts">
	<div class="products_top_2"><a href="<?=base_url().$base_result->row(0)->short_name?>-products">more</a></div>
	<div class="contacts_middle">
	<div class="space_15"></div>
	<?foreach($product_5->result() as $row):?>
	<div>
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
	</div>
	<div class="contacts_bottom"></div>
</div>
