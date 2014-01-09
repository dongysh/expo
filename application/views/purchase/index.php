<?$this->load->view('layout/header')?>
<?$this->load->view('layout/public/top_logout')?>
<div class="space_15"></div>
<?$this->load->view('layout/public/top_search')?>
<div class="space_15"></div>
<div class="space_15"></div>
<?$this->load->view('layout/static/purchase')?>
<div class="space_15"></div>
<div class="space_15"></div>
<script type="text/javascript">
	$(window).load(function() {
		$("#skip").click(function() {
			window.location.href = "<?=base_url()?>";
		});
	});
</script>
<?$this->load->view('layout/footer')?>
