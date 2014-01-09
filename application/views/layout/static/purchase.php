<div class="frame_div">
	<form action="" method="post">
	<p class="purchasing_title">
		To better find excellent suppliers, please enter detailed purchasing demand.
	</p>
	<div class="space_15"></div>
	<textarea name="descript" class="purchasing_content"><?=$result->row(0)->descript?></textarea>
	<div class="space_15"></div>
	<div class="space_15"></div>
	<div class="purchasing_btns">
		<div class="purchasing_skip">
			<input id="skip" type="button" value=" " />
		</div>
		<div class="purchasing_submit">
			<input id="finish" type="submit" value=" " />
		</div>
		<div class="clear"></div>
	</div>
	</form>
</div>