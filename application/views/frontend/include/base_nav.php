<header id="header" id="home">
		    <div class="container">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="<?php echo base_url() ?>"><h3><b>Anadolu EXPRESS</b></h3></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu"><a href="<?php echo base_url() ?>">ANASAYFA</a></li>
			          <li><a href="<?php echo base_url() ?>tiket">BİLET AL</a></li>
			          <li class="menu"><a href="<?php echo base_url() ?>tiket/cektiket">Hakkımızda</a></li>
			          <?php if ($this->session->userdata('username')) { ?>
				      	<li class="menu-has-children"><a href="#">Merhaba, <?php echo $this->session->userdata('nama_lengkap'); ?></a>
						<ul>
							<li><a href="<?php echo base_url() ?>profile/profilesaya/<?php echo $this->session->userdata('kd_pelanggan') ?>"><i class="fas fa-id-card"></i> Profilim</a></li>
							<li><a href="<?php echo base_url() ?>profile/tiketsaya/<?php echo $this->session->userdata('kd_pelanggan') ?>"><i class="fas fa-ticket-alt"></i> Biletlerim</a></li>
							<li><a href="<?php echo base_url() ?>login/logout"><i class="fas fa-sign-out-alt"></i> Çıkış</a></li>
						</ul>
						</li>
				      <?php }else{ ?>  
				  	  <li class="menu wobble"><a href="<?php echo base_url() ?>login/Daftar">KAYIT OL</a></li>
 					  <li><a href="<?php echo base_url() ?>login">GİRİŞ YAP</a></li>
				  	  <?php } ?>
			        </ul>
			      </nav>   		
		    	</div>
		    </div>
		  </header>