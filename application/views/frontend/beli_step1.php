<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="shortcut icon" href="img/elements/fav.png">
		
		<meta name="author" content="colorlib">
		
		<meta name="description" content="">
		
		<meta name="keywords" content="">
		
		<meta charset="UTF-8">
		
		<title>BUS TICKET BOOKING</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						
						<div class="card mb-5">
							<div class="card-header">
								<i class="fas fa-info-circle"></i> Bilet Bilgileri
							</div>
							<div class="card-body">
								<ul>
									<li>► Rota <b><?php echo $asal['kota_tujuan']." - ".$jadwal['kota_tujuan']." [".$jadwal['kd_jadwal']."]"; ?></b></li>
									<li>► Otobüs Adı  <b><?php echo $jadwal['nama_bus'];  ?></b></li>
									<li>► Otobüs Numarası  <b><?php echo $jadwal['plat_bus'];  ?></b></li>
									<li>► Kalkış Yeri <b><?php echo strtoupper($asal['kota_tujuan'])." - ".$asal['terminal_tujuan']; ?></b></li>
									<li>► Varış Yeri <b><?php echo strtoupper($jadwal['kota_tujuan'])." - ".$jadwal['terminal_tujuan']; ?></b></li>
									<li>► Ücret: <b>$<?php echo number_format((float)($jadwal['harga_jadwal']),0,",",".") ; ?></b></li>
									<li>► Seyehat Tarihi <b><?php echo nama_hari($tanggal).",".tgl_indo($tanggal) ?></b></li>
									<li>► Kalkış SAati <b>at <?php echo $jadwal['jam_berangkat_jadwal']; ?></b></li>
									<li>► Varış Saati <b>at <?php echo $jadwal['jam_tiba_jadwal']; ?> </b></li>
									<li>► Lütfen Koltuk Seçin</li>
									<li>► Maksimum 4 koltuk seçiniz</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<form action="<?php echo base_url('tiket/afterbeli') ?>" method="get">
							<input type="hidden" name="tgl" value="<?php echo $tanggal ?>">
							<!-- Default Card Example -->
							<div class="card mb-5" >
								<div class="card-header">
									<i class="fas fa-bus"></i> Koltuk Seçimi
								</div>
								<table class="">
									<tr>
										<td class='btn-group' width='139'>
											
											<label class='btn btn-default'>
												<input name='kursi[]' value='1' id='1' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '1'), $kursi)) { echo "disabled checked";} ?>>&nbsp;1  <i class="fa-solid fa-couch"></i>
											</label>
											
											<label class='btn btn-default'>
												<input name='kursi[]' value='2' id='2' onclick='cer(this)' autocomplete='off' type='checkbox'<?php if (in_array(array('no_kursi_order' => '2'), $kursi)) { echo "disabled checked";} ?>>&nbsp;2  <i class="fa-solid fa-couch"></i>
											</label>
										</td>
										<td class='btn-group' width='130'>
											
											<label class='btn btn-primary' style="margin-left: 50px;">
												<a value='' autocomplete='off' disabled='disabled'> <i class="fa-regular fa-user fa-lg"></i>  Şoför</a>
											</label>
										</td>
									</tr>
									<tr>
									
										<td class='btn-group' width='139'>
											
											<label class='btn btn-default'>
												<input name='kursi[]' value='3' id='3' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '3'), $kursi)) { echo "disabled checked";} ?>>&nbsp;3  <i class="fa-solid fa-couch"></i>
												</label>				
												<label class='btn btn-default'>
													<input name='kursi[]' value='4' id='4' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '4'), $kursi)) { echo "disabled checked";} ?>>&nbsp;4  <i class="fa-solid fa-couch"></i>
												</label>
											</td>
											<td class='btn-group' width='139'>
												
												<label class='btn btn-default'>
													<input name='kursi[]' value='5' id='5' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '5'), $kursi)) { echo "disabled checked";} ?> >&nbsp;5  <i class="fa-solid fa-couch"></i>
												</label>
											</td>
										</tr>
										<tr>
											<td class='btn-group' width='139'>
												
												<label class='btn btn-default'>
													<input name='kursi[]' value='6' id='6' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '6'), $kursi)) { echo "disabled checked";} ?>>&nbsp;6  <i class="fa-solid fa-couch"></i>
													</label>				
													<label class='btn btn-default'>
														<input name='kursi[]' value='7' id='7' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '7'), $kursi)) { echo "disabled checked";} ?>>&nbsp;7  <i class="fa-solid fa-couch"></i>
													</label>
												</td>
												<td class='btn-group' width='139'>
													
													<label class='btn btn-default'>
														<input name='kursi[]' value='8' id='8' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '8'), $kursi)) { echo "disabled checked";} ?>>&nbsp;8  <i class="fa-solid fa-couch"></i>
													</label>
													<label class='btn btn-default'>
														<input name='kursi[]' value='9' id='9' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '9'), $kursi)) { echo "disabled checked";} ?>>&nbsp;9  <i class="fa-solid fa-couch"></i>  
													</label>
												</td>
											</tr>
											<tr>
												<td class='btn-group' width='139'>
													
													<label class='btn btn-default'>
														<input name='kursi[]' value='10' id='10' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '10'), $kursi)) { echo "disabled checked";} ?>>&nbsp;10  <i class="fa-solid fa-couch"></i>
														</label>				
														<label class='btn btn-default'>
															<input name='kursi[]' value='11' id='11' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '11'), $kursi)) { echo "disabled checked";} ?>>&nbsp;11  <i class="fa-solid fa-couch"></i>
														</label>
													</td>
													<td class='btn-group' width='139'>
														
														<label class='btn btn-default'>
															<input name='kursi[]' value='12' id='12' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '12'), $kursi)) { echo "disabled checked";} ?>>&nbsp;12  <i class="fa-solid fa-couch"></i>
														</label>
													</td>
												</tr>
												<tr>
													<td class='btn-group' width='139'>
														
														<label class='btn btn-default'>
															<input name='kursi[]' value='13' id='13' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '13'), $kursi)) { echo "disabled checked";} ?>>&nbsp;13  <i class="fa-solid fa-couch"></i>
															</label>				
															<label class='btn btn-default'>
																<input name='kursi[]' value='14' id='14' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '14'), $kursi)) { echo "disabled checked";} ?>>&nbsp;14  <i class="fa-solid fa-couch"></i>   
															</label>
														</td>
														<td class='btn-group' width='139'>
															
															<label class='btn btn-default'>
																<input name='kursi[]' value='15' id='15' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '15'), $kursi)) { echo "disabled checked";} ?>>&nbsp;15  <i class="fa-solid fa-couch"></i>
															</label>
														</td>
													</tr>
													<tr>
														<td class='btn-group' width='139'>
															
															<label class='btn btn-default'>
																<input name='kursi[]' value='16' id='16' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '16'), $kursi)) { echo "disabled checked";} ?>>&nbsp;16  <i class="fa-solid fa-couch"></i>
																</label>				
																<label class='btn btn-default'>
																	<input name='kursi[]' value='17' id='17' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '17'), $kursi)) { echo "disabled checked";} ?>>&nbsp;17  <i class="fa-solid fa-couch"></i>   
																</label>
															</td>
															<td class='btn-group' width='139'>
																
																<label class='btn btn-default'>
																	<input name='kursi[]' value='18' id='18' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '18'), $kursi)) { echo "disabled checked";} ?>>&nbsp;18  <i class="fa-solid fa-couch"></i>
																</label>
																<label class='btn btn-default'>
																	<input name='kursi[]' value='19' id='19' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '19'), $kursi)) { echo "disabled checked";} ?>>&nbsp;19  <i class="fa-solid fa-couch"></i>
																</label>
															</td>
														</tr>


														<tr>
															<td class='btn-group' width='139'>
																
																<label class='btn btn-default'>
																	<input name='kursi[]' value='20' id='20' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '20'), $kursi)) { echo "disabled checked";} ?>>&nbsp;20  <i class="fa-solid fa-couch"></i>
																	</label>				
																	<label class='btn btn-default'>
																		<input name='kursi[]' value='21' id='21' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '21'), $kursi)) { echo "disabled checked";} ?>>&nbsp;21  <i class="fa-solid fa-couch"></i>
																	</label>
																</td>
																<td class='btn-group' width='139'>
																	
																	<label class='btn btn-default'>
																		<input name='kursi[]' value='22' id='22' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '22'), $kursi)) { echo "disabled checked";} ?>>&nbsp;22  <i class="fa-solid fa-couch"></i>  
																	</label>
																	<label class='btn btn-default'>
																		<input name='kursi[]' value='23' id='23' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_kursi_order' => '23'), $kursi)) { echo "disabled checked";} ?>>&nbsp;23  <i class="fa-solid fa-couch"></i>  
																	</label>
																</td>
															</tr>
													</table>
													
													<div class="alert alert-success" role="alert" style="background-color: white; border-color: white">
														<div class='btn-group' style="background-color: white;">
															<a href="<?php echo base_url('tiket/cekjadwal/'.$tanggal.'/'.$asal['kd_tujuan'].'/'.$jadwal['kota_tujuan']) ?>" class='btn btn-danger' style="margin-right: 100px; width:100px">Geri Dön</a>
															<input class="btn btn-info pull-right" disabled="disabled" type="submit" value="Sonraki" style="width:100px"">
														</div>
													</div>
													<form>
													
												</div>
											</div>
											
											<div class="col-lg-4">
												
												</div>
											</section>
											
											<?php $this->load->view('frontend/include/base_footer'); ?>
											<!-- js -->
											<script type="text/javascript">
										     jQuery(document).ready(function(){
									     
									          var checkboxes = $("input[type='checkbox']"),
									              submitButt = $("input[type='submit']");

									          checkboxes.click(function() {
									              submitButt.attr("disabled", !checkboxes.is(":checked"));
												  
									          });

									         })
									                                                  
																					                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
										    </script>
											<script type="text/javascript">
											var count=0
											function cer(elem){
											if (elem.checked) {
											count = count + 1;
											if (count>4) {
											count = 4;
											
											elem.checked = false;
											}
											}else{
											count = count-1;
											}
											}
											</script>
											<?php $this->load->view('frontend/include/base_js'); ?>
										</body>
									</html>