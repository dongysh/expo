<div class="frame_div company_logo">
	<table>
		<tr height="100">
			<td width="190" class="company_logo_img">
				<?if(isset($detail_result) && strlen($detail_result->row(0)->path) == 32):?>
				<a href="<?=base_url().$base_result->row(0)->short_name?>"><img border="0" src="<?=base_url()?>webroot/user_upload/sma/<?=substr($detail_result->row(0)->path, 0, 2)?>/<?=$detail_result->row(0)->path?>.jpg" width="120" height="90" /></a>
				<?else:?>
				<a href="<?=base_url().$base_result->row(0)->short_name?>"><img border="0" <?img_src('no_img_m.jpg')?> /></a>
				<?endif;?>
			</td>
			<td width="600" class="company_logo_title">
				<table>
					<tr height="100">
						<td class="company_logo_img">
							<?=htmlspecialchars($base_result->row(0)->full_name_en)?>
						</td>
					</tr>
				</table>
			</td>
			<td class="company_logo_cert">
				<?$result = $this->CompanyCertification->get_by_company_id($base_result->row(0)->id)?>
				<?if($result->num_rows()):?>
				<a target="_blank" href="<?=base_url()?>global-expo-certificate.html"><img border="0" <?img_src('cert_normal_b.png')?> width="50" height="50" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<?if($result->num_rows() == 2):?>
				<a target="_blank" href="<?=base_url()?>global-expo-certificate.html"><img border="0" <?img_src('cert_ten_b.png')?> width="50" height="50" /></a>
				<?endif;?>
				<?endif;?>
			</td>
		</tr>
	</table>
</div>