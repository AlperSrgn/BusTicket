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
		<!--
		CSS
		============================================= -->
		<style type="text/css">
		.combined {
		-webkit-text-stroke: 1px black;
		color: white;
		text-shadow:
		2px  2px 0 #000,
		-1px -1px 0 #000,
		1px -1px 0 #000,
		-1px  1px 0 #000,
		1px  1px 0 #000;
		}
		.border-black{
		  color: blue;
		
		  text-shadow: 
		     2px   0  0   #000, 
		    -2px   0  0   #000, 
		     0    2px 0   #000, 
		     0   -2px 0   #000, 
		     1px  1px 0   #000, 
		    -1px -1px 0   #000, 
		     1px -1px 0   #000, 
		    -1px  1px 0   #000,
		     1px  1px 5px #000;
		}
		</style>
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		
		<?php $this->load->view('frontend/include/base_nav'); ?>
		
		<section class="relative section-gap" id="home" style="margin-bottom: 150px;">
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-center">
					<div class="banner-content col-lg-7 col-md-12">
						
							<h2 class="text-black" >
							Anadolu EXPRESS' e Hoşgeldiniz 		
							</h2>
						<p class="text-black" >
						<strong style="float: left; margin-bottom: 50px">Türkiye'nin dört bir yanını birbirine bağlayan, güvenli ve konforlu yolculukların adresi olan Anadolu EXPRESS, siz değerli yolcularımıza hizmet vermekten gurur duyar. 
						Yılların tecrübesiyle, modern filomuz ve alanında uzman personelimizle, her seyahatinizi keyifli bir deneyime dönüştürmeyi amaçlıyoruz. Yolculuğunuz boyunca ihtiyacınız olan her türlü konfor düşünülmüştür. Geniş koltuklar, ücretsiz Wi-Fi, ve zengin ikram seçenekleriyle kendinizi evinizde hissedeceksiniz. Güvenliğiniz bizim için her şeyden önemli; bu yüzden en son teknoloji güvenlik sistemleriyle donatılmış otobüslerimiz ve profesyonel şoför kadromuzla, sizleri gideceğiniz yere sağ salim ulaştırmak bizim en büyük önceliğimiz. Anadolu EXPRESS olarak, seyahatlerinizde yanınızda olmaktan mutluluk duyarız.</strong></p>
						<a style="border-radius: 100px; background-color: #40e0d0; border-color: black; width:100%; color: black; font-size: 20px" href="<?php echo base_url() ?>tiket" class="btn btn-danger buy_bt">Bilet al   <i class="fa-solid fa-arrow-right"></i></a>
						
					</div>
					<img src="assets\frontend\img\bus.jpg" alt="" style="margin-bottom: 100px ;">
				</div>
			</div>
		</section>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text" >
						<h1 style="color: black;">Anadolu EXPRESS Ayrıcalıkları</h1>
					</div>
				</div>
				<div class="row">
				<div class="col-sm-4">
    				<div class="box_main_1 text-center"> 
        				<img class="img-fluid img-oval" src="<?php echo base_url() ?>assets/frontend/img/bus1.jpg" width="250" height="250" alt="">
        				<div class="padding_15">
           				 	<h2 class="speed_text">SON TEKNOLOJİ ARAÇLAR</h2>
            				<p class="long_text">Yeni Araç Filomuzla Yolculuğunuzun Keyfini Çıkarın</p>
        				</div>
    				</div>
</div>
                  <div class="col-sm-4">
                     <div class="box_main_1 text-center">   
					 <img class="img-fluid img-oval" src="<?php echo base_url() ?>assets/frontend/img/booking.jpg" width="150" height="150" alt="">
                        <div class="padding_15">
                           <h2 class="speed_text">HER PLATFORMDAN ERİŞİM</h2>
                           <p class="long_text">İster mobil ister web üzerinden dilediğiniz zaman bilet rezervasyonu yapın</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="box_main_1 text-center">
					 <img class="img-fluid img-oval" src="<?php echo base_url() ?>assets/frontend/img/wifi.png" width="150" height="150" alt="">                        <div class="padding_15">
                           <h2 class="speed_text">ÜCRETSİZ WIFI HİZMETİNİN KEYFİNİ ÇIKARIN</h2>
                           <p class="long_text">Tüm araçlarımızdaki wifi hizmeti sayesinde yolculuk boyunca online kalın</p>
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