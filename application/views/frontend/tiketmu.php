<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/elements/fav.png">
		
		<meta name="author" content="colorlib">
		
		<meta name="description" content="">
		
		<meta name="keywords" content="">
		
		<meta charset="UTF-8">
		
		<title>Biletlerim</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<div class="generic-banner">
			<br>
			<h2 class="" align="center">Biletlerim</h2>
			<div class="container ">
				<div class="row d-flex justify-content-center">
					<?php foreach ($tiket as $row) { ?>
					<div class="col-sm-3">
						&nbsp;
						<div class="card " style="width: 18rem;">
							<img class="card-img-top" src="<?php echo base_url($row['qrcode_order']) ?>" alt="Card image cap" >
							<div class="card-body" align="left">
								<?php if ($row['status_order'] == '3'){ ?>
									<a href="#" class="card-link">Yönetici Tarafından İptal Edildi</a>
								<?php }else {?>
								<a href="<?php echo base_url().$row['qrcode_order'] ?>" class="card-link" download>Qr Kodu İndir</a><?php }?>
								<h5 class="card-title">Rezervasyon Kodu : <?php echo $row['kd_order']; ?></h5>
								<p>İsim : <?php echo $row['nama_order']; ?>
								 <br>Rezervasyon Tarihi : <?php echo $row['tgl_beli_order']; ?></br>
								 Ödeme Durumu : <?php if ($row['status_order'] == '1') { ?>
									<i class='btn-danger'>Ödenmedi</i>
									<?php }else if ($row['status_order'] == '3'){ ?>
										<i class='btn-warning'>İptal Edildi</i>
									<?php }else{?>
									
									<i class='btn-success'>Ödendi</i>
									<?php } ?>
									<hr>
									<?php if ($row['status_order'] == '1') { ?>
									<a href="<?php echo base_url('tiket/payment/'.$row['kd_order']) ?>" class="btn btn-primary">Ödeme Kontrolü</a>
									<?php }else if ($row['status_order'] == '3'){ ?>
										<a href="<?php echo base_url('tiket/') ?>" class="btn btn-warning pull-right">Başka Rezervasyon</a>
									<?php }else {?>
									<!-- <a href="<?php echo base_url('backend/home/refund') ?>" class="btn btn-danger" >Batal Tiket</a> -->
									<a href="<?php echo base_url('assets/backend/upload/etiket/'.$row['kd_order'].'.pdf') ?>" class="btn btn-success pull-right" download>Bilet yazdır</a>
									<?php } ?>
								</div>
							</div>
						</div>
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						<?php } ?>
					</div>
				</div>
				<br><br>
				</div>
				
				<?php $this->load->view('frontend/include/base_footer'); ?>
				<!-- js -->
				<?php $this->load->view('frontend/include/base_js'); ?>
			</body>
		</html>