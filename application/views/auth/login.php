<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block">
							<img src="<?php echo base_url('assets/user/img/bpjsktn-logo.svg')?>" class="img-fluid" alt="...">
						</div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Login Page</h1>
								</div>
								<form class="user" action="<?php echo site_url('auth/login/auth');?>" method="post">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Email Address...">
										<input type="hidden" name="token" class="form-control" id="token" value="<?= TOKEN_ADMIN ?>">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
									</div>
									<div class="form-group form-check">
                    <input type="checkbox" class="form-check-input chk-activation" id="chk-activation" name="chk-activation" value="<?= CAPTCHA_SECRET_KEY ?>">
                    <label class="form-check-label small" for="exampleCheck1">I am not robot</label>
										<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
									</div>
									<hr>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Login
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
