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
		
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
    <div>
        <div>
            <div style="width: 1000px; margin: 0 auto;">
               
                <div class="box_main_1" style="height: 100%; margin-bottom:50px;">
                   
                    <div class="card mb-5" style="border-color: white;">
                        <div class="card-header" style="border-color: white; background-color:white; color:black;">
                        <i class="fa-solid fa-route fa-lg"></i> SEYAHAT BİLGİLERİ
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Rota [Seyehat Kodu]</th>
                                            <th>Varış Yeri</th>
                                            <th scope="col">Tarih - Saat</th>
                                            <th scope="col">Koltuklar</th>
                                            <th>Ücret</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i=0; $i < count($jadwal)  ; $i++) { ?>
                                        <tr>
                                            <td><?php echo strtoupper($asal['kota_tujuan'])." - ".strtoupper($jadwal[$i]['kota_tujuan'])." [".$jadwal[$i]['kd_jadwal']."]"; ?></td>
                                            <td><?php echo $jadwal[$i]['terminal_tujuan'] ?></td>
                                            <td><?php echo hari_indo(date('N',strtotime($tanggal))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$tanggal.''))).', '.date('H:i',strtotime($jadwal[$i]['jam_berangkat_jadwal'])); ?></td>
                                            <td><?php echo $jadwal[$i]['kapasitas_bus']-$kursi[$i][0]['count(no_kursi_order)'] ?></td>
                                            <td>$<?php echo number_format((float)($jadwal[$i]['harga_jadwal']),0,",","."); ?></td>
                                            <td><a href="<?php echo base_url('tiket/beforebeli/').$jadwal[$i]['kd_jadwal'].'/'.$asal['kd_tujuan'].'/'.$tanggal ?>" class=" btn btn-outline-success">Bilet al</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <a style="background-color: #f44a40;" href="<?php echo base_url('tiket') ?>" class="btn btn-danger pull-left">Geri Dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
				
				<?php $this->load->view('frontend/include/base_footer'); ?>
				<!-- js -->
				<?php $this->load->view('frontend/include/base_js'); ?>
			</body>
		</html>