<div class="frame_div top_search">
	<form action="<?=base_url()?>search/index" method="post">
	<div class="top_search_logo">
		<a href="<?=base_url()?>"><img border="0" <?img_src('logo.png')?> /></a>
	</div>
	<div class="top_search_input">
		<div class="search_icon"></div>
		<div class="search_text">
			<input type="text" name="key_word" value="<?=(isset($key_word) ? $key_word : '')?>" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="top_search_button">
		<input type="submit" name="se" value=" " />
	</div>
	<div class="clear"></div>
	</form>
</div>
<div class="space_15"></div>
<div class="frame_div">
	<div class="recommend_words base_font_color">
		<span class="bold black">Related Searches:</span>
		<?$this->load->view('layout/static/recommand_words')?>
	</div>
	<div class="clear"></div>
</div>