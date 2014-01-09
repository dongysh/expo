<div id="last_manufacturers" class="hot_products">
<div class="banner_area sliderkit photoslider-bullets1" style="display: block; height: 180px;">
<div class="sliderkit-nav">
  <div class="sliderkit-nav-clip">
    <ul>
    	<?if(count($company_id_array) > 4):?>
      <li><a href="#">&nbsp;</a></li>
      <li><a href="#">&nbsp;</a></li>
    <?endif;?>
    <?if(count($company_id_array) > 8):?>
      <li><a href="#">&nbsp;</a></li>
    <?endif;?>
    <?if(count($company_id_array) > 12):?>
      <li><a href="#">&nbsp;</a></li>
    <?endif;?>
    <?if(count($company_id_array) > 16):?>
      <li><a href="#">&nbsp;</a></li>
    <?endif;?>
    </ul>
  </div>
</div>
<div class="sliderkit-panels">
	<?if(count($company_id_array) == 0 || count($company_id_array) == 4 || count($company_id_array) == 8 || count($company_id_array) == 12 || count($company_id_array) == 16 || count($company_id_array) == 20):?>
	<div>
	<?endif;?>
  	<?$i = 1;?>
	<?foreach($company_id_array as $key=>$row):?>
	<?if($i == 1 || $i == 5 || $i == 9 || $i == 13 || $i == 17):?>
  <div class="sliderkit-panel">
  	<div class="product_pic_and_title">
  	<?endif;?>
  		<?if($i == 4 || $i == 8 || $i == 12 || $i == 16 || $i == 20):?>
		<div class="product_last">
		<?else:?>
		<div class="product">
		<?endif;?>
			<div class="product_pic">
				<?$path = $this->CompanyDetail->get_logo($company_id_array[$key])?>
				<?if($path):?>
				<img border="0" src="<?=base_url()?>webroot/user_upload/sma/<?=substr($path, 0, 2)?>/<?=$path?>.jpg" width="120" height="90" />
				<?else:?>
				<img border="0" <?img_src('no_img_m.jpg')?> />
				<?endif;?>
			</div>
			<div class="product_title">
				<?$result = $this->Company->find_by_id($company_id_array[$key])?>
				<a href="<?=base_url().$result->row(0)->short_name?>"><?=htmlspecialchars($result->row(0)->full_name_en)?></a>
			</div>
		</div>
	<?if($i == 4 || $i == 8 || $i == 12 || $i == 16 || $i == 20):?>
		<div class="clear"></div>
	</div>
	</div>
	<?endif;?>
	<?$i++?>
  	<?endforeach;?>
  	<?if(count($company_id_array) != 0 && count($company_id_array) != 4 && count($company_id_array) != 8 && count($company_id_array) != 12 && count($company_id_array) != 16 && count($company_id_array) != 20):?>
		<div class="clear"></div>
	</div>
	<?endif;?>
	</div>
</div>
</div>
<div class="clear"></div>
</div>

<div id="new_product" class="hot_products">
<div class="banner_area sliderkit photoslider-bullets1" style="display: block; height: 180px;">
<div class="sliderkit-nav">
  <div class="sliderkit-nav-clip">
    <ul>
    	<?if($lv2_product_result->num_rows() > 4):?>
      <li><a href="#">&nbsp;</a></li>
      <li><a href="#">&nbsp;</a></li>
    <?endif;?>
    <?if($lv2_product_result->num_rows() > 8):?>
      <li><a href="#">&nbsp;</a></li>
    <?endif;?>
    <?if($lv2_product_result->num_rows() > 12):?>
      <li><a href="#">&nbsp;</a></li>
    <?endif;?>
    <?if($lv2_product_result->num_rows() > 16):?>
      <li><a href="#">&nbsp;</a></li>
    <?endif;?>
    </ul>
  </div>
</div>
<div class="sliderkit-panels">
	<?if($lv2_product_result->num_rows() == 0 || $lv2_product_result->num_rows() == 4 || $lv2_product_result->num_rows() == 8 || $lv2_product_result->num_rows() == 12 || $lv2_product_result->num_rows() == 16 || $lv2_product_result->num_rows() == 20):?>
	<div>
	<?endif;?>
  	<?$j = 1;?>
  	<?foreach($lv2_product_result->result() as $row):?>
  	<?if($j == 1 || $j == 5 || $j == 9 || $j == 13 || $j == 17):?>
  <div class="sliderkit-panel">
  	<div class="product_pic_and_title">
  	<?endif;?>
		<?if($j == 4 || $j == 8 || $j == 12 || $j == 16 || $j == 20):?>
		<div class="product_last">
		<?else:?>
		<div class="product">
		<?endif;?>
			<div class="product_pic">
				<?$path = $this->ProductImage->get_one_img($row->p_id);?>
				<?if($path):?>
				<img border="0" src="<?=base_url()?>webroot/user_upload/sma/<?=substr($path, 0, 2)?>/<?=$path?>.jpg" width="120" height="90" />
				<?else:?>
				<img border="0" <?img_src('no_img_m.jpg')?> />
				<?endif;?>
			</div>
			<div class="product_title">
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
				<?$industry_link_result = $this->Product->get_industry_link_by_product_id($row->p_id)?>
				<?$industry_link = $industry_link_result->row(0)->title_en?>
				<?$industry_link = industry_link($industry_link)?>
				<?$industry_id = $industry_link_result->row(0)->id?>
				<a href="<?=base_url().$industry_link?>_<?=$industry_id?>/<?=$seo_name?>_<?=$row->p_id?>.html"><?=htmlspecialchars($row->title_en)?></a>
			</div>
		</div>
	<?if($j == 4 || $j == 8 || $j == 12 || $j == 16 || $j == 20):?>
		<div class="clear"></div>
	</div>
	</div>
	<?endif;?>
	<?$j++?>
	<?endforeach;?>
	<?if($lv2_product_result->num_rows() != 0 && $lv2_product_result->num_rows() != 4 && $lv2_product_result->num_rows() != 8 && $lv2_product_result->num_rows() != 12 && $lv2_product_result->num_rows() != 16 && $lv2_product_result->num_rows() != 20):?>
		<div class="clear"></div>
	</div>
	<?endif;?>
  </div>
</div>
</div>
<div class="clear"></div>
</div>
