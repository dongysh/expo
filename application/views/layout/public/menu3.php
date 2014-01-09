<div class="industry">
	<div class="categories">
		Related Categories
	</div>
	<ul class="lv1">
		<?foreach($lv_now as $key=>$row):?>
		<?$lv_now_child = $this->Industry->find_child($lv_now[$key]['id'])?>
		<?if(count($lv_now_child)):?>
		<li class="arrows">
		<div class="span"><?=$lv_now[$key]['title_en']?></div>
		<?else:?>
		<li class="no_bg_arrows">
		<div class="span">
			<?$seo_link = industry_link($lv_now[$key]['title_en'])?>
			<a href="<?=base_url().$seo_link.'_'.$lv_now[$key]['id']?>"><?=$lv_now[$key]['title_en']?></a>
		</div>
		<?endif;?>
		<?if(count($lv_now_child)):?>
			<ul class="lv2">
				<li class="title_again">
				<?=$lv_now[$key]['title_en']?>
				</li>
				<?foreach($lv_now_child as $key_2=>$row_2):?>
				<li>
					<?$seo_link = industry_link($lv_now_child[$key_2]['title_en'])?>
					<a href="<?=base_url().$seo_link.'_'.$lv_now_child[$key_2]['id']?>"><?=$lv_now_child[$key_2]['title_en']?></a>
				</li>
				<?endforeach;?>
			</ul>
		<?endif;?>
		</li>
		<?endforeach;?>
	</ul>
</div>