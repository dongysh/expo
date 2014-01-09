<?$ii = 1;?>
<?$jj = 1;?>
<div class="img_border">
	<div class="big_img_border">
		<div class="ablsolute_border">
			<?foreach($img_array as $key=>$row):?>
			<div id="big_<?=$ii?>"><img src="<?=$img_array[$key]['big']?>" width="320" height="240" /></div>
			<?$ii++?>
			<?endforeach;?>
		</div>
	</div>
	<div class="small_img_border">
		<div class="left_button"></div>
		<div class="slide_border">
			<div class="ablsolute_border_s">
				<?foreach($img_array as $key=>$row):?>
				<div id="small_<?=$jj?>"><img src="<?=$img_array[$key]['small']?>" width="80" height="60" /></div>
				<?$jj++?>
				<?endforeach;?>
			</div>
		</div>
		<div class="right_button"></div>
		<div class="clear"></div>
	</div>
</div>