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
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						
						<div class="card mb-5" style="color: black; border-radius: 20px;">
							<div class="card-header">
								<i class="fas fa-info-circle fa-lg"></i> Bilet Bilgileri
							</div>
							<div class="card-body">
								<ul>
									<li><i class="fa-regular fa-circle"></i> Rota: <b><?php echo $asal['yolculuk_sehir']." - ".$jadwal['yolculuk_sehir']." [".$jadwal['sefer_kodu']."]"; ?></b></li>
									<li><i class="fa-regular fa-circle"></i> Otobüs:  <b><?php echo $jadwal['bus_name'];  ?></b></li>
									<li><i class="fa-regular fa-circle"></i> Otobüs Numarası:  <b><?php echo $jadwal['plaka'];  ?></b></li>
									<li><i class="fa-regular fa-circle"></i> Kalkış Yeri: <b><?php echo strtoupper($asal['yolculuk_sehir'])." - ".$asal['terminal_adi']; ?></b></li>
									<li><i class="fa-regular fa-circle"></i> Varış Yeri: <b><?php echo strtoupper($jadwal['yolculuk_sehir'])." - ".$jadwal['terminal_adi']; ?></b></li>
									<li><i class="fa-regular fa-circle"></i> Ücret: <b>$<?php echo number_format((float)($jadwal['ucret']),0,",",".") ; ?></b></li>
									<li><i class="fa-regular fa-circle"></i> Seyehat Tarihi: <b><?php echo nama_hari($tanggal).",".tgl_indo($tanggal) ?></b></li>
									<li><i class="fa-regular fa-circle"></i> Kalkış Saati: <b>at <?php echo $jadwal['kalkis_saat']; ?></b></li>
									<li><i class="fa-regular fa-circle"></i> Varış Saati: <b>at <?php echo $jadwal['varis_saat']; ?> </b></li>
									<li><i class="fa-regular fa-circle"></i> En fazla 4 koltuk seçiniz</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<form action="<?php echo base_url('tiket/afterbeli') ?>" method="get">
							<input type="hidden" name="tgl" value="<?php echo $tanggal ?>">
							<!-- Default Card Example -->
							<div class="card mb-5" style="border-radius: 20px;">
								<div class="card-header" style="color: black;">
									<i class="fas fa-bus fa-lg"></i> Koltuk Seçimi
								</div>
								<table class="" style="color: black;">
									<tr>
									<td class='btn-group' style="float: left;">
											<label class='btn btn-primary' style="margin: 10px 100px 20px 20px; background-color:grey; border-color:black;">
												<a value='' autocomplete='off' disabled='disabled'> <i class="fa-regular fa-user fa-lg"></i>  Şoför</a>
											</label>
									</td>
										<td class='btn-group' width='200'>
											
											<label class='btn btn-default'>
												<input name='kursi[]' value='1' id='1' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '1'), $kursi)) { echo "disabled checked";} ?>>&nbsp;1  <i class="fa-solid fa-couch"></i>
											</label>
											
											<label class='btn btn-default'>
												<input name='kursi[]' value='2' id='2' onclick='cer(this)' autocomplete='off' type='checkbox'<?php if (in_array(array('koltuk_no' => '2'), $kursi)) { echo "disabled checked";} ?>>&nbsp;2  <i class="fa-solid fa-couch"></i>
											</label>
										</td>
										<td class='btn-group' width='130'>
											
											
										</td>
									</tr>
									<tr>
									
										<td class='btn-group' width='200'>
											
											<label class='btn btn-default'>
												<input name='kursi[]' value='3' id='3' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '3'), $kursi)) { echo "disabled checked";} ?>>&nbsp;3  <i class="fa-solid fa-couch"></i>
												</label>				
												<label class='btn btn-default'>
													<input name='kursi[]' value='4' id='4' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '4'), $kursi)) { echo "disabled checked";} ?>>&nbsp;4  <i class="fa-solid fa-couch"></i>
												</label>
											</td>
											<td class='btn-group' width=''>
												
												<label class='btn btn-default'>
													<input name='kursi[]' value='5' id='5' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '5'), $kursi)) { echo "disabled checked";} ?> >&nbsp;5  <i class="fa-solid fa-couch"></i>
												</label>
											</td>
										</tr>
										<tr>
											<td class='btn-group' width='150' >
												
												<label class='btn btn-default'>
													<input name='kursi[]' value='6' id='6' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '6'), $kursi)) { echo "disabled checked";} ?>>&nbsp;6  <i class="fa-solid fa-couch"></i>
													</label>				
													<label class='btn btn-default'>
														<input name='kursi[]' value='7' id='7' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '7'), $kursi)) { echo "disabled checked";} ?>>&nbsp;7  <i class="fa-solid fa-couch"></i>
													</label>
												</td>
												<td class='btn-group' width='200' >
													
													<label class='btn btn-default'>
														<input name='kursi[]' value='8' id='8' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '8'), $kursi)) { echo "disabled checked";} ?>>&nbsp;8  <i class="fa-solid fa-couch"></i>
													</label>
													<label class='btn btn-default'>
														<input name='kursi[]' value='9' id='9' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '9'), $kursi)) { echo "disabled checked";} ?>>&nbsp;9  <i class="fa-solid fa-couch"></i>  
													</label>
												</td>
											</tr>
											<tr>
												<td class='btn-group' width='150'>
													
													<label class='btn btn-default'>
														<input name='kursi[]' value='10' id='10' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '10'), $kursi)) { echo "disabled checked";} ?>>&nbsp;10  <i class="fa-solid fa-couch"></i>
														</label>				
														<label class='btn btn-default'>
															<input name='kursi[]' value='11' id='11' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '11'), $kursi)) { echo "disabled checked";} ?>>&nbsp;11  <i class="fa-solid fa-couch"></i>
														</label>
													</td>
													<td class='btn-group' width='150' style="float: right;" >
														
														<label class='btn btn-default'>
															<input name='kursi[]' value='12' id='12' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '12'), $kursi)) { echo "disabled checked";} ?>>&nbsp;12  <i class="fa-solid fa-couch"></i>
														</label>
													</td>
												</tr>
												<tr>
													<td class='btn-group' width='150' >
														
														<label class='btn btn-default'>
															<input name='kursi[]' value='13' id='13' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '13'), $kursi)) { echo "disabled checked";} ?>>&nbsp;13  <i class="fa-solid fa-couch"></i>
															</label>				
															<label class='btn btn-default'>
																<input name='kursi[]' value='14' id='14' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '14'), $kursi)) { echo "disabled checked";} ?>>&nbsp;14  <i class="fa-solid fa-couch"></i>   
															</label>
														</td>
														<td class='btn-group' width='150' style="float: right;">
															
															<label class='btn btn-default'>
																<input name='kursi[]' value='15' id='15' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '15'), $kursi)) { echo "disabled checked";} ?>>&nbsp;15  <i class="fa-solid fa-couch"></i>
															</label>
														</td>
													</tr>
													<tr>
														<td class='btn-group' width='200'>
															
															<label class='btn btn-default'>
																<input name='kursi[]' value='16' id='16' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '16'), $kursi)) { echo "disabled checked";} ?>>&nbsp;16  <i class="fa-solid fa-couch"></i>
																</label>				
																<label class='btn btn-default'>
																	<input name='kursi[]' value='17' id='17' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '17'), $kursi)) { echo "disabled checked";} ?>>&nbsp;17  <i class="fa-solid fa-couch"></i>   
																</label>
															</td>
															<td class='btn-group' width='150'>
																
																<label class='btn btn-default'>
																	<input name='kursi[]' value='18' id='18' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '18'), $kursi)) { echo "disabled checked";} ?>>&nbsp;18  <i class="fa-solid fa-couch"></i>
																</label>
																<label class='btn btn-default'>
																	<input name='kursi[]' value='19' id='19' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '19'), $kursi)) { echo "disabled checked";} ?>>&nbsp;19  <i class="fa-solid fa-couch"></i>
																</label>
															</td>
														</tr>


														<tr>
															<td class='btn-group' width='150'>
																
																<label class='btn btn-default'>
																	<input name='kursi[]' value='20' id='20' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '20'), $kursi)) { echo "disabled checked";} ?>>&nbsp;20  <i class="fa-solid fa-couch"></i>
																	</label>				
																	<label class='btn btn-default'>
																		<input name='kursi[]' value='21' id='21' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '21'), $kursi)) { echo "disabled checked";} ?>>&nbsp;21  <i class="fa-solid fa-couch"></i>
																	</label>
																</td>
																<td class='btn-group' width='200' >
																	
																	<label class='btn btn-default'>
																		<input name='kursi[]' value='22' id='22' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '22'), $kursi)) { echo "disabled checked";} ?>>&nbsp;22  <i class="fa-solid fa-couch"></i>  
																	</label>
																	<label class='btn btn-default'>
																		<input name='kursi[]' value='23' id='23' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('koltuk_no' => '23'), $kursi)) { echo "disabled checked";} ?>>&nbsp;23  <i class="fa-solid fa-couch"></i>  
																	</label>
																</td>
															</tr>
													</table>
													
													<div class="alert alert-success" role="alert" style="background-color: white; border-color: white">
														<div class='btn-group' >
															<a href="<?php echo base_url('tiket/cekjadwal/'.$tanggal.'/'.$asal['hedef_kod'].'/'.$jadwal['yolculuk_sehir']) ?>" class='btn btn-danger' style="margin-right: 100px; width:100px; background-color:#f44a40">Geri Dön</a>
															<input class="btn btn-info pull-right" disabled="disabled" type="submit" value="Sonraki" style="width:100px; background-color: #40e0d0; border-color: #40e0d0;">
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