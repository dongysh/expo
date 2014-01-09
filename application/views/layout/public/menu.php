<div class="industry">
	<div class="categories">
		<a href="<?=base_url()?>categories">Categories</a>
	</div>
	<ul class="lv1">
		<?foreach($industry_1and2_result as $key=>$row):?>
		<li class="arrows">
			<?=$industry_1and2_result[$key]['title_en']?>
			<ul class="lv2">
				<li class="title_again">
				<?=$industry_1and2_result[$key]['title_en']?>
				</li>
				<?foreach($industry_1and2_result[$key]['lv2_info'][0] as $key_2=>$row_2):?>
				<li>
					<?$seo_link = industry_link($industry_1and2_result[$key]['lv2_info'][0][$key_2]['title_en']);?>
					<a href="<?=base_url().$seo_link.'_'.$industry_1and2_result[$key]['lv2_info'][0][$key_2]['id']?>"><?=$industry_1and2_result[$key]['lv2_info'][0][$key_2]['title_en']?></a>
				</li>
				<?endforeach;?>
			</ul>
		</li>
		<?endforeach;?>
	</ul>
</div>