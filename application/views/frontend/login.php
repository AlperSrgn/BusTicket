<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/elements/fav.png">
		
		<meta name="author" content="colorlib">
		
		<meta name="description" content="">
		
		<meta name="keywords" content="">
		
		<meta charset="UTF-8">
		
		<title>Kullanıcı Girişi</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body class="">
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="generic-banner" style="background-color: white;">
			<div class="container" style="margin-bottom: 100px;">
				<div class="row height align-items-center justify-content-center">
					<div class="box_main_1" style="width: 500px; padding-top:50px;" >
						<div class="card card-login mx-auto mt-10" style="border-color: white;">
							<div class="card-header" style="background-color: white;"><b><i class="fa fa-user fa-lg"></i> GİRİŞ YAP</b></div>
							<div class="card-body" align="left">
								<?php echo $this->session->flashdata('pesan'); ?>
								<form action="<?php echo base_url() ?>login/cekuser" method="post">
									<div class="form-group" >
										<div class="form-label-group" >
											<input type="text" id="username" name="username" class="form-control" placeholder="Kullanıcı Adı/Email" required="required" style="border-radius: 100px;" >
										</div>
									</div>
									<div class="form-group">
										<div class="form-label-group">
											<input type="password" name="password" class="form-control" placeholder="Şifre" required="required" style="border-radius: 100px;">
										</div>
									</div>
									<div class="form-group">

									</div>
									<button class="btn btn-success btn-block" style="background-color: #40e0d0; border-radius: 100px;">Giriş Yap</button>
								</form>
								<div class="text-center" >
									<p><a style="color: black;" class="d-block mt-3" href="<?php echo base_url() ?>login/daftar">Şimdi Kayıt Olun </a>
									<hr>
									<b><a style="color: black;" class="d-block mt-3" style="font-size:15px;" href="<?php echo base_url() ?>backend/login">Admin Girişi</a></b>
									
								</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php $this->load->view('frontend/include/base_footer'); ?>
		
		<?php $this->load->view('frontend/include/base_js'); ?>
	</body>
</html>