		<script src="<?= base_url('assets/admin/')?>vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url('assets/admin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url('assets/admin/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="<?= base_url('assets/admin/')?>js/sb-admin-2.min.js"></script>
		<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js')?>"></script>
	</body>

</html>
<script>
  grecaptcha.ready(function() {
		grecaptcha.execute('<?= CAPTCHA_KEY ?>', {action: 'submit'}).then(
			function(token) {
				let response = document.getElementById('g-recaptcha-response');
				response.value = token;
        console.log(token);
		});
	});

	toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "slideDown",
    "hideMethod": "slideUp"
  }

  <?php if($this->session->flashdata('msg') == 'info') : ?>
    toastr.info('Username is Wrong');
  <?php elseif($this->session->flashdata('msg') == 'warning') : ?>
    toastr.warning('Password is Wrong');
  <?php elseif($this->session->flashdata('msg') == 'danger') : ?>
    toastr.error('Captcha Verification Failed');
  <?php elseif($this->session->flashdata('msg') == 'success') : ?>
    toastr.success('Successfully Registered <br> Please Login');
  <?php endif;?>

</script>