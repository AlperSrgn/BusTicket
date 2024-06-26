<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="shortcut icon" href="img/elements/fav.png">
	
	<meta name="author" content="colorlib">
	
	<meta name="description" content="">
	
	<meta name="keywords" content="">
	
	<meta charset="UTF-8">
	
	
	<title>Bilet Arama</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
	<?php  $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="service-area section-gap relative">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6" style="color: black;">
					
					<div class="box_main_1">
						<div class="card-header" style="border-color: white;">
							<i class="fas fa-search fa-lg"></i> Sefer ara
						</div>
						<div class="card-body">
							<form action="<?php echo base_url() ?>tiket/cekjadwal?>" method="get">
								<div class="form-group">
									<label for="exampleInputEmail1">Tarih Seçiniz</label>
									<input placeholder="Tarih Seçiniz" type="text" class="form-control datepicker"
										name="tanggal" required="">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Nereden</label>
									<select name="asal" class="form-control js-example-basic-single" required>
										<option value="" selected disabled="">Kalkış Yeri Seçin</option>
										<?php foreach ($asal as $row ) { ?>
										<option value="<?php echo $row['hedef_kod'] ?>">
											<?php echo strtoupper($row['yolculuk_sehir']) ?>
											<br> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Nereye</label>
									<select name="tujuan" class="form-control js-example-basic-single">
										<option value="" selected disabled="">Varış Yeri Seçin</option>
										<?php foreach ($tujuan as $row ) { ?>
										<option value="<?php echo $row['yolculuk_sehir'] ?>">
											<?php echo strtoupper($row['yolculuk_sehir']); ?></option>
										<?php } ?>
									</select>
								</div>
								<a style="background-color: #f44a40;" href="<?php echo base_url() ?>tiket" class="btn btn-danger pull-left">Sıfırla </a>
								<button type="submit" class="btn btn-primary pull-right" style="background-color: #40e0d0; border-color: #40e0d0">Sefer bul </button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-6" style="color: black;">
					<div class="box_main_1" style="height: 800px">
						<div class="card-header" style="border-color: white;">
							<i class="fas fa-info fa-lg"></i> Otogar Bilgileri
						</div>
						<div class="card-body">
							<table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
								<thead>
									<tr>
										<th style="text-align:center;">Şehir</th>
										<th>Otogar </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($list as $value) { ?>
									<tr>
										<td style="text-align:center;vertical-align:middle">
											<?php echo strtoupper($value['yolculuk_sehir']) ?></td>
										<td style="vertical-align:middle;"><?php echo $value['terminal_adi'] ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
	</section>
	
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<!-- js -->

	<?php $this->load->view('frontend/include/base_js'); ?>
	<script type="text/javascript">
		$(function () {
			var date = new Date();
			date.setDate(date.getDate());

			$(".datepicker").datepicker({
				startDate: date,
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.js-example-basic-single').select2();
		});
	</script>
</body>

</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">How to book tickets?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<ol class="ordered-list" align="justify"><span class="center_content2">
					<li>Select date and select your origin and destination terminal/city in order to search for available schedules.
							<li>Search for tickets then click on the <b>Select </b> button on the ticket you want to book.
							</li>
							<li>The system will redirect you to seat selection page where you have to <b>select any seats</b> [Max.4 seats at a time]</li>
							<li>After selection of seats, click on the <b>Next </b>button to proceed. </li>
							<li>Fill up your ticket details by providing customer's details such as Passenger's Name, Age and other required <b>Customer Identity</b>. With it, select any of the available bank [as a Payment Method] to book tickets.</li>
							<li>After submitting the form, the bookings are done <b>[temporarily]</b>. The system will provide you with a <b>QR Code</b> and you've to make payments.</li>
							<li>All the payment instructions are provided in the tickets page.</li>
							<li>Following that, click on the <b>Payment Confirmation</b> button to submit your payment details with an attachment of <b>proof image</b>.</li>
							<li>At last, you payment request will be sent for <b>verification</b>. </li>
							<li>You will also receive an <b>E-Ticket</b> onces after the payment gets verified. </li>
							<li>If you have made a payment, bring proof of payment at the time of departure and exchange it one hour before departure. </li>
						</span></ol>
					<w:worddocument></w:worddocument>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>