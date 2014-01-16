<div class="industry">
	<div class="categories m2_categories">
		<?=$industry_title_en?>
	</div>
	<ul class="lv1">
		<?foreach($industry_3and4_result as $key=>$row):?>
		<?if($industry_3and4_result[$key]['lv2_info'][0]):?>
			<li class="arrows">
		<?else:?>
			<li class="no_bg_arrows">
		<?endif;?>
			<?if($industry_3and4_result[$key]['lv2_info'][0]):?>
			<div class="span"><?=$industry_3and4_result[$key]['title_en']?></div>
			<?else:?>
			<?$seo_link = industry_link($industry_3and4_result[$key]['title_en']);?>
			<div class="span"><a href="<?=base_url().$seo_link.'_'.$industry_3and4_result[$key]['id']?>"><?=$industry_3and4_result[$key]['title_en']?></a></div>
			<?endif;?>
			<?if($industry_3and4_result[$key]['lv2_info'][0]):?>
			<ul class="lv2">
				<li class="title_again">
				<?=$industry_3and4_result[$key]['title_en']?>
				</li>
				<?foreach($industry_3and4_result[$key]['lv2_info'][0] as $key_2=>$row_2):?>
				<li>
					<?$seo_link = industry_link($industry_3and4_result[$key]['lv2_info'][0][$key_2]['title_en']);?>
					<a href="<?=base_url().$seo_link.'_'.$industry_3and4_result[$key]['lv2_info'][0][$key_2]['id']?>"><?=$industry_3and4_result[$key]['lv2_info'][0][$key_2]['title_en']?></a>
				</li>
				<?endforeach;?>
			</ul>
			<?endif;?>
		</li>
		<?endforeach;?>
	</ul>
</div>