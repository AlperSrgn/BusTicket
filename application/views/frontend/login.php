<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Log on to codeastro.com for more projects -->
		<!-- Site Title -->
		<title>BUS TICKET BOOKING</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body class="">
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="generic-banner">
			<div class="container">
				<div class="row height align-items-center justify-content-center">
					<div class="col-lg-5">
						<div class="card card-login mx-auto mt-10">
							<div class="card-header">Customer Login Panel</div>
							<div class="card-body" align="left">
								<?php echo $this->session->flashdata('pesan'); ?>
								<form action="<?php echo base_url() ?>login/cekuser" method="post">
									<div class="form-group">
										<div class="form-label-group">
											<input type="text" id="username" name="username" class="form-control" placeholder="Username/Email" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="form-label-group">
											<input type="password" name="password" class="form-control" placeholder="Password" required="required">
										</div>
									</div>
									<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" value="remember-me">
												Remember Password
											</label>
										</div>
									</div>
									<button class="btn btn-success btn-block">Login as Customer</button>
								</form>
								<div class="text-center">
									<p><a class="d-block mt-3" href="<?php echo base_url() ?>login/daftar">Register Now</a>
									<hr>
									<b><a class="d-block mt-3" style="font-size:15px;" href="<?php echo base_url() ?>backend/login">Login as Admin</a></b>
									<!-- <a class="d-block small" href="<?php echo base_url() ?>login/lupapassword">Forgot Password</a> -->
								</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Log on to codeastro.com for more projects -->
		<!-- start footer Area -->
		<?php $this->load->view('frontend/include/base_footer'); ?>
		<!-- js -->
		<?php $this->load->view('frontend/include/base_js'); ?>
	</body>
</html>