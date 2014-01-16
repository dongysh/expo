<<<<<<< HEAD
<?$this->load->view('layout/header2');?>
<div class="space_15"></div>

=======
<?$this->load->view('layout/header')?>
<?$this->load->view('layout/public/top_logout')?>
<div class="space_15"></div>
<?$this->load->view('layout/public/top_search')?>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
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
