<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/css/can-utility-auth.css">
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb border-bottom-dark">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/company/dashboard') ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Change Password</li>
		</ol>
	</nav>
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block">
							<img src="<?php echo base_url('assets/user/img/undraw2.svg') ?>" class="img-fluid" alt="...">
						</div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Change Password</h1>
								</div>
								<form class="user" action="<?php echo site_url('auth/reset/change'); ?>" method="post">
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password" class="form-control form-control-user" id="old_password" name="old_password" placeholder="Old Password">
										</div>
										<div class="col-sm-6">
											<input type="password" class="form-control form-control-user" id="new_password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="New password">
											<?php echo form_error('conf_password'); ?>
										</div>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="conf_password" name="conf_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm Password">
										<?php echo form_error('new_password'); ?>
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Change
									</button>
									<hr>
									<div class="form-group row">
										<div class="col-sm-6">
											<div id="message-new">
												<p class="font-weight-bold mb-1"> New password harus terdiri dari: </p>
												<p id="letter" class="invalid mb-0 small"> Huruf <b> kecil </b> </p>
												<p id="capital" class="invalid mb-0 small"> Huruf <b> kapital (huruf besar) </b> </p>
												<p id="number" class="invalid mb-0 small"> <b>Angka</b> </p>
												<p id="length" class="invalid mb-0 small"> Minimal <b> 8 karakter </b> </p>
											</div>
										</div>
										<div class="col-sm-6">
											<div id="message-conf">
												<p class="font-weight-bold mb-1"> Konfirmasi password harus terdiri dari: </p>
												<p id="letter1" class="invalid mb-0 small"> Huruf <b> kecil </b> </p>
												<p id="capital1" class="invalid mb-0 small"> Huruf <b> kapital (huruf besar) </b> </p>
												<p id="number1" class="invalid mb-0 small"> <b>Angka</b> </p>
												<p id="length1" class="invalid mb-0 small"> Minimal <b> 8 karakter </b> </p>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	/**
	 * author: candra aknes nugroho
	 * version: 1.0.0
	 */

	let myInput = document.getElementById("new_password"),
		letter = document.getElementById("letter"),
		capital = document.getElementById("capital"),
		number = document.getElementById("number"),
		length = document.getElementById("length"),
		myInput1 = document.getElementById("conf_password"),
		letter1 = document.getElementById("letter1"),
		capital1 = document.getElementById("capital1"),
		number1 = document.getElementById("number1"),
		length1 = document.getElementById("length1");

	myInput.onfocus = function() {
		document.getElementById("message-new").style.display = "block";
	}

	myInput.onblur = function() {
		document.getElementById("message-new").style.display = "none";
	}

	myInput.onkeyup = function() {
		let lowerCaseLetters = /[a-z]/g;
		if (myInput.value.match(lowerCaseLetters)) {
			letter.classList.remove("invalid");
			letter.classList.add("valid");
		} else {
			letter.classList.remove("valid");
			letter.classList.add("invalid");
		}

		let upperCaseLetters = /[A-Z]/g;
		if (myInput.value.match(upperCaseLetters)) {
			capital.classList.remove("invalid");
			capital.classList.add("valid");
		} else {
			capital.classList.remove("valid");
			capital.classList.add("invalid");
		}

		let numbers = /[0-9]/g;
		if (myInput.value.match(numbers)) {
			number.classList.remove("invalid");
			number.classList.add("valid");
		} else {
			number.classList.remove("valid");
			number.classList.add("invalid");
		}

		if (myInput.value.length >= 8) {
			length.classList.remove("invalid");
			length.classList.add("valid");
		} else {
			length.classList.remove("valid");
			length.classList.add("invalid");
		}
	}

	myInput1.onfocus = function() {
		document.getElementById("message-conf").style.display = "block";
	}

	myInput1.onblur = function() {
		document.getElementById("message-conf").style.display = "none";
	}

	myInput1.onkeyup = function() {
		let lowerCaseLetters = /[a-z]/g;
		if (myInput1.value.match(lowerCaseLetters)) {
			letter1.classList.remove("invalid");
			letter1.classList.add("valid");
		} else {
			letter1.classList.remove("valid");
			letter1.classList.add("invalid");
		}

		let upperCaseLetters = /[A-Z]/g;
		if (myInput1.value.match(upperCaseLetters)) {
			capital1.classList.remove("invalid");
			capital1.classList.add("valid");
		} else {
			capital1.classList.remove("valid");
			capital1.classList.add("invalid");
		}

		let numbers = /[0-9]/g;
		if (myInput1.value.match(numbers)) {
			number1.classList.remove("invalid");
			number1.classList.add("valid");
		} else {
			number1.classList.remove("valid");
			number1.classList.add("invalid");
		}

		if (myInput1.value.length >= 8) {
			length1.classList.remove("invalid");
			length1.classList.add("valid");
		} else {
			length1.classList.remove("valid");
			length1.classList.add("invalid");
		}
	}
</script>
<!-- <script src="<?= base_url(); ?>assets/plugins/js/can-utility-auth.js"></script> -->