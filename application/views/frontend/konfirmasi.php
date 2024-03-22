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
		<title>Get Tickets</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-6">
						<!-- Default Card Example -->
						<div class="card wobble animated">
					  <div class="card-header">
					  Payment Confirmation
					  </div>
					  <div class="card-body">
					    <form action="<?= base_url() ?>tiket/insertkonfirmasi" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputEmail1">Booking Code</label>
										<input type="text" id="" class="form-control" id="" name="kd_order" value="<?= $id ?>" placeholder="Ticket Code">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Your BANK</label>
										<select class="form-control" name="bank_km">
											<option value="" selected disabled="">Select Bank</option>
											<option value="New Leaf Bank" >New Leaf Bank</option>
											<option value="Zenith Bank">Zenith Bank</option>
											<option value="WestView Bank">WestView Bank</option>
											<option value="Aurora">Aurora</option>
											<option value="RoyalCrown Bank">RoyalCrown Bank</option>
										</select>
										<!-- Log on to codeastro.com for more projects -->
										<!-- <select class="form-control" name="bank" required>
											<option value="" selected disabled="">Select Bank</option>
											<?php foreach ($bank as $row) { ?>
											<option value="<?php echo $row['kd_bank'] ?>"><?php echo $row['nama_bank']; ?></option>
											<?php } ?>
										</select> -->
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Account number</label>
										<input type="number" class="form-control" name="nomrek" value="" placeholder="Account number">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Name of the sender</label>
										<input type="text" class="form-control" name="nama" value="" placeholder="Name of the sender">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Payment Amount</label>
										<input type="number" class="form-control" name="total" value="<?= $total ?>" placeholder="Total price" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Upload Transaction Photo</label>
										<input type="file" class="form-control" name="userfile" required="">
									</div>
									<button type="submit" class="btn btn-success pull-right">Submit </button>
								</form>
					  </div>
					</div>
					</div>
			</section>
			<!-- End banner Area -->
			<!-- start footer Area -->
			<?php $this->load->view('frontend/include/base_footer'); ?>
			<!-- js -->
			<?php $this->load->view('frontend/include/base_js'); ?>
		</body>
	</html>