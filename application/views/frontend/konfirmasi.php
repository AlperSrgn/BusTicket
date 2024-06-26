<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/elements/fav.png">
		
		<meta name="author" content="colorlib">
		
		<meta name="description" content="">
		
		<meta name="keywords" content="">
		
		<meta charset="UTF-8">
		
		<title>Get Tickets</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-6">
						
						<div class="card wobble animated">
					  <div class="card-header">
					  Ödeme Doğrulama
					  </div>
					  <div class="card-body">
					    <form action="<?= base_url() ?>tiket/insertkonfirmasi" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputEmail1">Rezervasyon Kodu</label>
										<input type="text" id="" class="form-control" id="" name="kd_order" value="<?= $id ?>" placeholder="Ticket Code">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Bankan</label>
										<select class="form-control" name="bank_km">
											<option value="" selected disabled="">Banka Seç</option>
											<option value="New Leaf Bank" >New Leaf Bank</option>
											<option value="Zenith Bank">Zenith Bank</option>
											<option value="WestView Bank">WestView Bank</option>
											<option value="Aurora">Aurora</option>
											<option value="RoyalCrown Bank">RoyalCrown Bank</option>
										</select>
										
											<?php foreach ($bank as $row) { ?>
											<option value="<?php echo $row['kd_bank'] ?>"><?php echo $row['nama_bank']; ?></option>
											<?php } ?>
										</select> -->
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Hesap Numarası</label>
										<input type="number" class="form-control" name="nomrek" value="" placeholder="Hesap Numarası">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Gönderenin Adı</label>
										<input type="text" class="form-control" name="nama" value="" placeholder="Gönderenin Adı">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Ödeme Miktarı</label>
										<input type="number" class="form-control" name="total" value="<?= $total ?>" placeholder="Total price" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">İşlem Fotoğrafı yükle</label>
										<input type="file" class="form-control" name="userfile" required="">
									</div>
									<button type="submit" class="btn btn-success pull-right">Gönder </button>
								</form>
					  </div>
					</div>
					</div>
			</section>
			
			<?php $this->load->view('frontend/include/base_footer'); ?>
			<!-- js -->
			<?php $this->load->view('frontend/include/base_js'); ?>
		</body>
	</html>