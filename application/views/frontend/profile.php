<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/elements/fav.png">
		
		<meta name="author" content="colorlib">
		
		<meta name="description" content="">
		
		<meta name="keywords" content="">
		
		<meta charset="UTF-8">
		
		<title>Profilim</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<style type="text/css">
		.text-block {
		position: absolute;
		bottom: 20px;
		right: 20px;
		background-color: black;
		color: white;
		padding-left: 20px;
		padding-right: 20px;
		}
		</style>
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class=" relative">
			<div class="container">
				<div class="section-top-border">
					<h3 class="mb-30" align="center">PROFİL BİLGİLERİM</h3>
					<div class="row d-flex justify-content-center">
						<div class="box_main_1">
							
							<div class="card" align="center" style="color: black; border-color:white;">
								<div class="card-header" style="border-color: grey; background-color: white; margin-bottom:50px">
									<i class="fas fa-user fa-lg"></i> Hesap Bilgileri
								</div>
								<div class="card-body" align="left">
									<div class="row">
										<div class="col-sm-8">
											
											<p class="card-text"><?php echo $profile['kimlik_no_musteri'] ?></p>
											<h5 class="card-title">İsim</h5>
											<p class="card-text"><?php echo $profile['muster_adi'] ?></p>
											<h5 class="card-title">Email</h5>
											<p class="card-text"><?php echo $profile['musteri_email']?></p>
											<h5 class="card-title">Telefon Numarası</h5>
											<p class="card-text"><?php echo $profile['musteri_telefon'] ?></p>
										</div>
										<div class="col-sm-14">
											<h5 class="card-title">Adres</h5>
											<p class="card-text"><?php echo $profile['musteri_adres']?></p>
											<p class="btn btn-primary" style="background-color: #fde910; border-color: black; color:black;">Hesabı Düzenle</button></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Profili Düzenle</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?php echo base_url('profile/editprofile') ?>" method="post" enctype="multipart/form-data">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-14">
												
												<div class="row form-group">
													<label for="nama" class="control-label">İsim/label>
													<input type="text" class="form-control" name="nama" value="<?php echo $profile['muster_adi']?>" >
												</div>
												<div class="row form-group">
													<label for="nama" class="control-label">Email</label>
													<input type="email" class="form-control" name="email" value="<?php echo $profile['musteri_email']?>" >
												</div>
												<div class="row form-group">
													<label for="nama" class="control-label">Cep Telefonu</label>
													<input type="text" class="form-control" name="hp" value="<?php echo $profile['musteri_telefon']?>" >
												</div>
												<div class="row form-group">
													<label for="nama" class="control-label">Adres</label>
													<input type="text" class="form-control" name="alamat" value="<?php echo $profile['musteri_adres']?>" >
												</div>
												<div class="row form-group">
													<label for="" class="control-label">Profil Fotoğrafı</label>
													<img src="<?php echo base_url($profile['musteri_foto'])?>" alt="<?php echo $this->session->userdata('ktp') ?>" style="width:150px;height:150px"><input type="file" class="form-control" value="<?php echo base_url($this->session->userdata('nama_lengkap')) ?>" name="img"  >
												</div>
											</div>
										</div>
									</div>
								</div>
									<button class="btn btn-danger" data-dismiss="modal">Kapat</button>
									<button type="submit" class="btn btn-primary" >Değişiklikleri Kaydet</button>
							</form>
						</div>
					</div>
				</div>
				
				<?php $this->load->view('frontend/include/base_footer'); ?>
				
				<?php $this->load->view('frontend/include/base_js'); ?>
			</body>
		</html>