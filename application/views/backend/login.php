<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin Login</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url() ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Custom styles for this template-->
	<link href="<?= base_url() ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-xl-5 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">

						<div class="row justify-content-center">
							<div class="col-lg-11">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"><i class="fas fa-bus"></i> Admin Giriş Paneli</h1>
									</div>
									<form class="user" method="post" action="<?= base_url('backend/login/cekuser') ?>">
										<div class="form-group">
											<input required="" type="text" class="form-control form-control-user" name="username"
												aria-describedby="emailHelp" placeholder="Kullanıcı adı">
										</div>
										<div class="form-group">
											<input required="" type="password" class="form-control form-control-user" name="password"
												placeholder="Şifre">
										</div>
										<button type="submit" class="btn btn-success btn-block">
											Giriş Yap
										</button>
										</div>
    										<a href="<?php echo base_url() ?>" class="btn btn-success btn-block" style="background-color:#40e0d0; border-color:#40e0d0; width: 305px; margin: 0 auto">Anasayfa</a>
										
									</form>
									<hr>
									<!-- <p align="center" class="login-box-msg">Your IP : <?= $ipaddres; ?></p> -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<?= "<script>".$this->session->flashdata('message')."</script>"?>
	<script src="<?= base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>
</body>

</html>
