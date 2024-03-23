<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/elements/fav.png">
		
		<meta name="author" content="colorlib">
		
		<meta name="description" content="">
		
		<meta name="keywords" content="">
		
		<meta charset="UTF-8">
		
		
		<title>Anadolu EXPRESS</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay" style="background-color: #ececec;"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						
						<form action="<?php echo base_url() ?>tiket/gettiket/" method="post">
						<input type="hidden" name="tgl" value="<?php echo $tglberangkat ?>">

							<?php $i = 1; foreach ($kursi as $row ) { ?>
							<div class="box_main_1" style="height: 550px;">
								<div class="card-header" style="color:black; background-color:white">
									<i class="fas fa-id-card fa-lg"></i>  Koltuk No: <?php echo $row; ?>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="CN">Yolcu adı</label>
										<input type="text" id="" class="form-control" id="" name="nama[]" placeholder="Ad" required>
										<input type="hidden" name="kursi[]" value="<?php echo $row ?>">
									</div>
									<div class="form-group" style="margin-top: 80px;">
										<select name="tahun[]" class="form-control js-example-basic-single" required>
											<option value="" selected disabled="">Yaş</option>
											<?php
											$thn_skr = 100;
											for ($x = $thn_skr; $x >= 1; $x--) {
											?>
											<option value="<?php echo $x ?>"><?php echo $x ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="col-md-5" >
							<div class="card mb-5 box_main_1" style="width: 600px; height:550px" >
								<div class="card-header" style="color:black; background-color:white; ">
									<i class="fas fa-user fa-lg"></i>  Müşteri Bilgileri
								</div>
								<div class="card-body">
									<div class='form-group'>
										<div class='col-sm-12'>
											<input name='no_ktp' required="" maxlength='64' class='form-control required' placeholder='Kimlik No' type='text' title='ID number must be filled.' value="<?php echo $this->session->userdata('ktp') ?>"></div>
									</div>
										<div class='form-group'>
											<div class='col-sm-12'>
												<input name='nama_pemesan' required="" maxlength='64' class='form-control required' placeholder='Müşteri İsmi' type='text' title='Customer name is required' value="<?php echo $this->session->userdata('nama_lengkap') ?>"></div>
										</div>
											<div class='form-group'>
												<div class='col-sm-12'>
													<input name='hp' required="" maxlength='16' class='form-control required' placeholder='Cep Telefonu' type='text' title='Required Field' value="<?php echo $this->session->userdata('telpon') ?>"></div>
											<div>
												<div class='form-group'>
													<div class='col-sm-12'>
													<textarea name='alamat' cols='20' rows='3' id='alamat' required="" maxlength='256' class='form-control required' placeholder='Adres' title='Address Required.' ><?php echo $this->session->userdata('alamat')?></textarea></div>
												</div>
												<div class='form-group'>
													<div class='col-sm-12'>
														<input name='email' required="" maxlength='64' class='form-control' placeholder='Email' type='text' value="<?php echo $this->session->userdata('email')?>"></div>
												</div>
											</div>
												      <div style="margin: 50px 50px 20px 50px; color: white;"><a href='javascript:history.back()' class='btn btn-danger pull-left'>Geri Dön</a></div>  
													  <button class="btn btn-success pull-right" style="background-color: #40e0d0; border-color: #40e0d0; margin: 0 50px 20px 50px;">Bileti Al</button>
												</div>
								</div>
										
									                
								</section>
								
								<?php $this->load->view('frontend/include/base_footer'); ?>
								<!-- js -->
								<?php $this->load->view('frontend/include/base_js'); ?>
								<script type="text/javascript">
									$(document).ready(function() {
									$('.js-example-basic-single').select2();
									});
								</script>
							</body>
						</html>