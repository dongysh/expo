<?$this->load->view('layout/header')?>
<div class="wrap">
	<div class="content">
		<? if($nums == 0): ?>
			<?$this->load->view('layout/public/no_result')?>
		<? else: ?>
			<? if ($list_type == 1): ?>
				<?$this->load->view('layout/public/company_result_list')?>
			<? elseif ($list_type == 2): ?>	
				<?$this->load->view('layout/public/product_result_list')?>
			<? else: ?>
				<?redirect(base_url());?>				
			<? endif; ?>
			<?$this->load->view('layout/static/download')?>
		<? endif; ?>
	</div>
</div>
<?$this->load->view('layout/footer')?>