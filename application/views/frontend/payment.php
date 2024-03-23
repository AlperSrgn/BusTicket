<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/elements/fav.png">
		
		<meta name="author" content="colorlib">
		
		<meta name="description" content="">
		
		<meta name="keywords" content="">
		
		<meta charset="UTF-8">
		
		<title>Payment</title>
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
					<div class="col-lg-10">
						
						<div class="box_main_1" style="height:auto; width:auto">
							<div class="card-header" align="center">
								<b><i class="fas fa-ticket fa-lg" style="color:#000000"></i> Rezervasyon No <?= $tiket[0]['kd_order']; ?></b>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th scope="col">Bilet</th>
												<th scope="col">Seyehat No [Otobüs No]</th>
												<th scope="col">Kalkış</th>
												<th scope="col">Koltuk No.</th>
												<th scope="col">Ücret</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach ($tiket as $row) { ?>
											<tr>
												<?php $now = hari_indo(date('N',strtotime($row['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$row['tgl_berangkat_order'].''))).', '.date('H:i',strtotime($row['jam_berangkat_jadwal']));?>
												<th scope="row"><?= $row['kd_tiket']; ?></th>
												<td><?= $row['kd_jadwal']." [".$row['kd_bus'].']' ?></td>
												<td><?= $now?></td>
												<td><?= $row['no_kursi_order']; ?></td>
												<td>$<?= $row['harga_jadwal']; ?></td>
											</tr>
											<?php } ?>
											<td colspan="5"> <b class="pull-right">Toplam $<?php $total = $count * $tiket[0]['harga_jadwal'] ; echo $total ?></b></td>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-10">
						
						<div class="box_main_1" style="height:auto">
							<div class="card-header" align="center" style="color:#000000">
								<i class="fas fa-ticket fa-lg"></i> Süreci
							</div>
							<div class="card-body" align="center">
								<h4>Lütfen Ödemenizi Tamamlayın!</h4><br>
								<h6>Ödemeniz için kalan süre</h6>
								<h1><p id="expired"></p></h1>
								<p>(Before <?php $expired = hari_indo(date('N',strtotime($tiket[0]['expired_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$tiket[0]['expired_order'].''))).', '.date('H:i',strtotime($tiket[0]['expired_order'])); echo $expired;?>)</p>
								<hr>
								<div class="medium-title col-12 mb-20">
									<h4><p>Lütfen ödemeyi aşağıdaki hesap numarasına transfer edin.</p></h4>
								</div>
								<div class="offset-lg-1 col-lg-10 offset-sm-0 col-sm-12">
									<div class="row">
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="<?= base_url().$tiket[0]['photo_bank'] ?>" height="50" width="150" alt="Bank Logo" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value="<?= $tiket[0]['nomrek_bank']; ?> of <?= $tiket[0]['nama_bank'] ?>"><h4 id="myInput"><?= number_format((float)($tiket[0]['nomrek_bank']),0,"-","-"); ?> of <?= $tiket[0]['nama_bank'] ?></h4></p>
										</div>
										<div class="col-md-3 copy-link">
											<button onclick="myFunction()" class="btn btn-outline-primary"><i class="fas fa-copy"></i> Hesap No Kopyala</button>
										</div>
									</div>
								</div>
								<div class="col-12 medium-title regular-text mt-20">
									<h4><b> <p> Toplam Tutar:</p></b></h4>
								</div>
								<div class="col-12 bigger-title text-orange">
									<h3 ><p>$<?= number_format($total,0,',','.') ;?></p></h3>
								</div>
								<div class="col-14 mt-15 mb-15">
									<hr>
									<div class="col-md-8 mt-sm-30">
										<h3 class="mb-20">ÖDEME REHBERİ</h3>
										<div class="" style="color:#000000">
    										<ul class="ordered-list" align="left" style="list-style-type: disc; margin-left: 20px;">
        										<li><?= $tiket[0]['nama_bank']; ?> ATM Kartınızı Takın</li>
        										<li>ATM Şifrenizi Girin</li>
        										<li>Diğer İşlem Menüsünü Seçin</li>
        										<li>Transfer menüsünü ve <?= $tiket[0]['nama_bank']; ?> Hesabına Seçin</li>
        										<li>Yapılacak Hesap numarasını girin <?= $tiket[0]['nama_bank']; ?></li>
        										<li>Transfer edilecek para miktarını girin</li>
        										<li>ATM ekranı işlem verilerinizi gösterecektir,</li>
        										<li>Veriler doğruysa "EVET" (Tamam) seçin</li>
        										<li>Tamamlandı (Fiş ATM makinesinden çıkacaktır)</li>
        										<li>ATM Kartınızı Alın</li>
    										</ul>
										</div>

									</div>
								</div>
								<a href="<?= base_url('tiket/konfirmasi/'.$tiket[0]['kd_order'].'/'.$total) ?>" class="btn btn-primary pull-center" style="background-color:#40e0d0; border-color:#40e0d0">Ödeme onayı için gönder </a>
							</div>
						</div>
					</div>
				</section>
				
				<?php $this->load->view('frontend/include/base_footer'); ?>
				<!-- js -->
				<?php $expired1 = tanggal_ing(date('Y-m-d',strtotime($tiket[0]['expired_order']))).', '.date('Y',strtotime($tiket[0]['expired_order'])).' '.date('H:i',strtotime($tiket[0]['expired_order']))?>
				<script>
				function myFunction() {
				var copyText = document.getElementById("myInput");
				copyText.select();
				document.execCommand("copy");
				swal("Copy", "Successfully Copied Account Number", "info");
				}
				</script>
				<script>
				
				var countDownDate = new Date("<?= $expired1 ?>").getTime();
				
				var x = setInterval(function() {
				
				var now = new Date().getTime();
				
				var distance = countDownDate - now;
				
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				// Output the result in an element with id="demo"
				document.getElementById("expired").innerHTML = hours + " Saat : "
				+ minutes + " Dakika : " + seconds + " Saniye ";
				
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("expired").innerHTML =  "Payment Time Complete";
				}
				}, 1000);
				</script>
				<?php $this->load->view('frontend/include/base_js'); ?>
			</body>
		</html>