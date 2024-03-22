<!DOCTYPE html>
<html>
	<head>
		<title>Thank you</title>
		<meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		
	</head>
	<body style="font-family: tahoma; font-size: 12px;">
		<center>
		<table class="wrapper" width="600px" style="padding: 0; margin: 0; border-collapse: collapse; border: solid 1px #fd7521;">
			<tr class="header" style="background-color:#484B51;">
				<td style="padding-right:10px;" align="left">
					<a href="<?= base_url() ?>" target="_blank">
						<h4>BUS TICKET BOOKING</h4>
					</a>
				</td>
				<td style="padding-right:10px;" align="right">
					<a href="<?= base_url() ?>" target="_blank">
						<img height="45" src="https://cdn4.iconfinder.com/data/icons/dot/256/bus.png" alt="">
					</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p style="text-align: justify; padding: 10px;">
						Dear Customer,<br>
						Thank you for using BTBS.
					</p>
					<p style="text-align: justify; padding: 10px;">
					Here's a Summary of Your Purchases:
						<table width="100%" style="font-size: 14px; margin: 10px;">
								<tr>
								<td>
								Account Number Transfer Manual
									</td><td>:</td>
									<td>
										<strong><?= $sendmail['nomrek_bank']; ?></strong>
									</td>
								</tr>
								<tr>
								<td>
								On behalf of
									</td><td>:</td>
									<td>
										<strong><?= $sendmail['nasabah_bank']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Recipient Bank
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['nama_bank']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Amount paid
									</td>
									<td>:</td>
									<td>
										<?php $total = $count * $sendmail['harga_jadwal'] ?>
										<strong>$ <?= number_format((float)($total),0,",","."); ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Booking Number
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['kd_order']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Purchase Description
									</td>
									<td>:</td>
									<td>
										<strong>Schedule Code <?= $sendmail['kd_jadwal'] ?></strong><br>
										<strong>Depart <?= hari_indo(date('N',strtotime($sendmail['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$sendmail['tgl_berangkat_order'].''))).', '.date('H:i',strtotime($sendmail['jam_berangkat_jadwal'])); ?></strong><br>
										<strong><?= $count; ?> Seat</strong>
									</td>
								</tr>
								<tr>
									<td>
									Purchase Date
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['tgl_beli_order']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Valid until
									</td>
									<td>:</td>
									<td>
										<strong><?php $expired = hari_indo(date('N',strtotime($sendmail['expired_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$sendmail['expired_order'].''))).', '.date('H:i',strtotime($sendmail['expired_order'])); echo $expired;?></strong>
									</td>
								</tr>
									</table>
								</p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" >
									<tr>
										<td>
											<div class="col-md-12 col-xs-12">
												<h4>How to Transfer Via</h4>
												<div class="hr hr8 hr-double hr-dotted"></div>
												<div class="row">
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>ATM</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Pay Guide</li>
																<li>Select Menu <span class="label">Other Transactions</span></li>
																<li>Select <span class="label">Transfer</span></li>
																<li>Select <span class="label">To account <?= $sendmail['nama_bank'];; ?> </span></li>
																<li>Enter Account Number <span class="label"><?= $sendmail['nomrek_bank']; ?></span></li>
																<li>Select <span class="label">Right</span></li>
																<li>Select <span class="label">Yes</span></li>
																<li>Take your proof of payment</li>
																<li>Finished</li>
															</ol>
														</div>
													</div>
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>MOBILE BANKING</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Login Mobile Banking</li>
																<li>Select <span class="label">m-Transfer</span></li>
																<li>Select <span class="label">BCA Account</span></li>
																<li>Enter Account Number<span class="label"><?= $sendmail['nomrek_bank'] ?></span></li>
																<li>Click <span class="label">Send</span></li>
																<li>VA information will be displayed</li>
																<li>Click <span class="label">OK</span></li>
																<li>Input <span class="label">PIN</span></li>
																<li>Mobile Banking</li>
																<li>Proof of payment is displayed</li>
																<li>Finished</li>
															</ol>
														</div>
													</div>
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>INTERNET BANKING</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Select <span class="label">Fund Transactions</span></li>
																<li>Select <span class="label">Transfer to BCA Account</span></li>
																<li>Enter Account Number <span class="label"><?= $sendmail['nomrek_bank'] ?></span></li>
																<li></li>
																<li>Click <span class="label">Continue</span></li>
																<li>Input Response <span class="label">KeyBCA Appli 1</span></li>
																<li>Click <span class="label">Send</span></li>
																<li>Proof of payment is displayed</li>
																<li>Finished</li>
															</ol>
														</div>
													</div>
												</div>
											</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p style="padding:10px;">
										<br>
										Best regards,<br>
										<span style="color:#fd7521;"><strong>Bus Ticket Booking System</strong></span>
										<br>
										<br>
									</p>
								</td>
							</tr>
							<tr>
								
							</tr>
							<tr class="footer" style="font-size: 10px; background-color: #484B51;color:#ffffff;">
								<td style="padding-left:10px; padding-right:10px;">
									<?= date("Y"); ?> &copy; BTBS
								</td>
								<td align="right" style="padding-left:10px; padding-right:10px;">
									<img height="30" src="https://cdn4.iconfinder.com/data/icons/dot/256/bus.png" border="0">
								</td>
							</tr>
						</table>
						</center>
					</body>
				</html>