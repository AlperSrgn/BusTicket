<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/elemefav.png">
		<meta name="author" content="colorlib">
		

		<meta name="description" content="">
		
		<meta name="keywords" content="">
		
		<meta charset="UTF-8">
		
		<title>Rezervasyon</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-7">
						
						<div class="card box_main_1" style="height: auto;" >
					  <div class="card-header" style="color: black; background-color: white">
					   <i class="fas fa-info-circle fa-lg"></i> Rezervasyon Başarılı, Ödemeye Devam Et
					  </div>
					  <div class="card-body" align="center">
					  	<p class="card-text">Bilet Rezervasyon Kodunuz:</p>
					    <h1 class="card-title"><b><?php echo $tiket; ?></b></h1>
					    <p><img src="<?php echo base_url('assets/frontend/upload/qrcode/'.$tiket) ?>.png"></p>
					    	<a href="<?php echo base_url('assets/frontend/upload/qrcode/'.$tiket) ?>.png" class="btn btn-danger" download>Qr Kodu İndir</a> 
					    	<a href="<?php echo base_url('tiket/payment/'.$tiket) ?>" class="btn btn-success" style="background-color: #40e0d0; border-color: #40e0d0">Ödemeye Geç</a>
							<br>
					  </div>
					</div>
					</div>
			</section>
			
			<?php $this->load->view('frontend/include/base_footer'); ?>
			<!-- js -->
			<?php $this->load->view('frontend/include/base_js'); ?>
		</body>
	</html>