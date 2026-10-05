<main id="main" class="main">

	<div class="pagetitle">
		<h1>Update Client Profile</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Update Client Profile</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">

			<!-- Left side columns -->
			<div class="col-lg-12">
				<div class="row">

					<!-- Sales Card -->
					<div class="card">
						<div class="card-body">
							<?php

							if (isset($_GET['eid'])) {
								include 'controller/ClientUpdConfig.php';
								$datas = $ContObj->clientDet($_GET['eid']);

								if (isset($_POST['UpdClient'])) {
									$result = $ContObj->clientUpd($_GET['eid'], $_POST['busStatus'], $_POST['uID'], $_POST['cName'], $_POST['cAddr'], $_POST['cnicNo'], $_POST['cCity'], $_POST['tou'], $_POST['bussName'], $_POST['ptclNo'], $_POST['CellNo1'], $_POST['rtoCno2'], $_POST['bussAdd'], $_POST['branchOff'], $_POST['feeAppl'], $_POST['classification'], $_POST['rto'], $_POST['bussCat'], $_POST['fbrId'], $_POST['pass'], $_POST['pinC'], $_POST['linked'], $_POST['Cemail'], $_POST['NTNno'], $_POST['NTNfee'], $_POST['NTNdor'], $_POST['STRNno'], $_POST['STRNfee'], $_POST['STRNdor'], $_POST['whtAg'], $_POST['whtFee'], $_POST['WHTdor'], $_POST['SRBno'], $_POST['SRBfee'], $_POST['SRBdor'], $_POST['BRBno'], $_POST['BRBfee'], $_POST['BRBdor'], $_POST['PRBno'], $_POST['PRBfee'], $_POST['PRBdor'], $_POST['KPKno'], $_POST['KPKfee'], $_POST['KPKdor']);

								// 	echo '<pre>';
								// 	print_r($result);
								}
							?>

								<form class="col g-3 mt-3" action="index.php?page=ClientUpd&eid=<?php echo $_GET['eid']; ?>" method="post" class="form-inline">
									<!-- <div class="row "> -->

									<div class="col g-3 ">
										<?php
										foreach ($datas as $clData) {
										?>
											<div class="form-group">
												<select name="busStatus" class="reqFlab form-control" <?php echo (isset($result['busStatus']) ? 'style="border: 1px solid red;"' : ''); ?> autofocus>
													<option value="">Select Business Status</option>
													<option disabled="disabled">------------------------------------</option>
													<?php
													if ($drpDnStat) {
														foreach ($drpDnStat as $data) {
															// if ($clData['busStatNm'] == $data['statNm']) {
															// 	echo 'Found';
															// }
													?>
															<option
																<?php //if($data['id'] == $busStatVarId){ echo "selected='selected'"; } 
																?>
																<?php if ($data['id'] == $clData['busStatId']) {
																	echo "selected='selected'";
																} ?>
																value="<?php echo $data['id']; ?> | <?php echo $data['statNm']; ?>">
																<?php echo $data['statNm']; ?></option>
													<?php
														}
													}
													?>

												</select>
												<span class="error" style="color: red;"><?php echo (isset($result['busStatus']) ? $result['busStatus'] : ''); ?></span>
											</div>

											<div class="form-group">
												<input type="text" class="form-control" name="uID" placeholder="User ID" value="<?php
																																if (strlen($clData['userId']) > 0) {
																																	echo $clData['userId'];
																																} else {
																																	echo $uID;
																																} ?>">
											</div>

											<div class="form-group">
												<input type="text" class="form-control" name="cName" placeholder="Client Name" value="<?php
																																		if (strlen($clData['clientNm']) > 0) {
																																			echo $clData['clientNm'];
																																		} else {
																																			echo $cName;
																																		} ?>" class="reqFlab"

													<?php echo (isset($result['cName']) ? 'style="border: 1px solid red;"' : ''); ?>>
												<span class="error" style="color: red;"><?php echo (isset($result['cName']) ? $result['cName'] : ''); ?></span>
											</div>

											<div class="form-group">
												<textarea name="cAddr" class="form-control" cols="10" rows="3" placeholder="Client Address"><?php
																																			if (strlen($clData['clientAddr']) > 0) {
																																				echo $clData['clientAddr'];
																																			} else {
																																				echo $cAddr;
																																			} ?></textarea>
											</div>

											<div class="form-group">
												<input type="text" class="form-control" name="cnicNo" placeholder="CNIC / NTN without Dashes" value="<?php
																																						if (strlen($clData['cnicNo']) > 0) {
																																							echo $clData['cnicNo'];
																																						} else {
																																							echo $cnicNo;
																																						} ?>" class="reqFlab" dir="ltr"


													<?php echo (isset($result['cnicNo']) ? 'style="border: 1px solid red;"' : ''); ?>>
												<span class="error" style="color: red;"><?php echo (isset($result['cnicNo']) ? $result['cnicNo'] : ''); ?></span>
											</div>

											<div class="form-group">
												<select name="cCity" class="reqFlab form-control" <?php echo (isset($result['cCity']) ? 'style="border: 1px solid red;"' : ''); ?>>
													<option value="">Select City</option>
													<option disabled="disabled">------------------------------------</option>
													<?php
													if ($drpDnCity) {
														foreach ($drpDnCity as $data) {
													?>
															<option <?php if ($clData['cityId'] == $data['id']) { ?> selected='selected' <?php } ?>
																value="<?php echo $data['id']; ?>|<?php echo $data['cityNm']; ?>"><?php echo $data['cityNm']; ?></option>
													<?php
														}
													}
													?>
												</select>
												<span class="error" style="color: red;"><?php echo (isset($result['cCity']) ? $result['cCity'] : ''); ?></span>
											</div>

											<div class="form-group">
												<select name="tou" class="form-control">
													<option value="">Select Tax Office Unit</option>
													<option disabled="disabled">------------------------------------</option>
													<?php
													if ($drpDnTou) {
														foreach ($drpDnTou as $data) {
													?>
															<option <?php if ($clData['touId'] == $data['id']) { ?> selected='selected' <?php } ?>
																value="<?php echo $data['id']; ?> | <?php echo $data['taxOffName']; ?>">
																<?php echo $data['taxOffName']; ?></option>
													<?php
														}
													}
													?>
												</select>
											</div>

											<div class="form-group">
												<input type="text" name="bussName" placeholder="Business Name" value="<?php
																														if (strlen($clData['busNm']) > 0) {
																															echo $clData['busNm'];
																														} else {
																															echo $bussName;
																														} ?>" class="reqFlab form-control">
												<span class="error" style="color: red;"><?php echo (isset($result['bussName']) ? $result['bussName'] : ''); ?></span>
											</div>

											<div class="form-group">
												<input type="text" name="ptclNo" class="form-control" placeholder="PTCL No." value="<?php
																																	if (strlen($clData['ptclNo']) > 0) {
																																		echo $clData['ptclNo'];
																																	} else {
																																		echo $ptclNo;
																																	} ?>">
											</div>

											<div class="form-group">
												<input type="text" name="CellNo1" class="form-control" placeholder="Cell No. 1" value="<?php
																																if (strlen($clData['cellNo1']) > 0) {
																																	echo $clData['cellNo1'];
																																} else {
																																	echo $CellNo1;
																																} ?>">
											</div>

											<div class="form-group">
												<input type="text" name="rtoCno2" class="form-control" placeholder="Cell No. 2" value="<?php
																																if (strlen($clData['cellNo2']) > 0) {
																																	echo $clData['cellNo2'];
																																} else {
																																	echo $rtoCno2;
																																} ?>">
											</div>

											<div class="form-group">
												<textarea name="bussAdd" class="form-control" cols="10" rows="3" placeholder="Business Address"><?php
																																				if (strlen($clData['busAddr']) > 0) {
																																					echo trim($clData['busAddr']);
																																				} else {
																																					echo trim($bussAdd);
																																				} ?></textarea>
											</div>

											<div class="form-group">
												<select name="branchOff" class="form-control">
													<option value="">Select a Branch Office</option>
													<option disabled="disabled">------------------------------------</option>
													<?php
													if ($drpDnBrOff) {
														foreach ($drpDnBrOff as $data) {
													?>
															<option <?php if ($clData['boId'] == $data['id']) { ?> selected='selected' <?php } ?>
																value="<?php echo $data['id']; ?> | <?php echo $data['brOffNm']; ?>">
																<?php echo $data['brOffNm']; ?></option>
													<?php
														}
													}
													?>

												</select>
											</div>

											<div class="form-group">
												<select name="feeAppl" class="form-control">
													<option value="">Select Fees Applied</option>
													<?php
													if ($feeAppl) {
														foreach ($feeAppl as $data) {
													?>
															<option <?php if ($clData['feeAppl'] == $data['feeAplVal']) { ?> selected='selected' <?php } ?> value="<?php echo $data['feeAplVal']; ?>">
																<?php echo $data['feeAplVal']; ?>
															</option>
													<?php
														}
													}
													?>
												</select>
											</div>

											<div class="form-group">
												<select name="classification" class="form-control">
													<option value="">Select Classification</option>
													<option disabled="disabled">------------------------------------</option>
													<?php
													if ($cls) {
														foreach ($cls as $data) {
													?>
															<option <?php if ($clData['classification'] == $data['clsVal']) { ?> selected='selected' <?php } ?> value="<?php echo $data['clsVal']; ?>">
																<?php echo $data['clsVal']; ?>
															</option>
													<?php
														}
													}
													?>
												</select>
											</div>

											<div class="form-group">
												<select name="rto" class="form-control">
													<option value="">Select RTO</option>
													<option disabled="disabled">------------------------------------</option>
													<?php
													if ($drpDnRto) {
														foreach ($drpDnRto as $data) {
													?>
															<option <?php if ($clData['rtoId'] == $data['id']) { ?> selected='selected' <?php } ?>
																value="<?php echo $data['id']; ?> | <?php echo $data['rtoName']; ?>">
																<?php echo $data['rtoName']; ?></option>
													<?php
														}
													}
													?>
												</select>
											</div>

											<div class="form-group">
												<select name="bussCat" class="form-control">
													<option value="">Select Business Category</option>
													<option disabled="disabled">------------------------------------</option>
													<?php
													if ($drpDnBusCat) {
														foreach ($drpDnBusCat as $data) {
													?>
															<option <?php if ($clData['busCatId'] == $data['id']) { ?> selected='selected' <?php } ?>
																value="<?php echo $data['id']; ?> | <?php echo $data['busCatNm']; ?>">
																<?php echo $data['busCatNm']; ?></option>
													<?php
														}
													}
													?>
												</select>
											</div>

											<div class="form-group">
												<input type="text" name="fbrId" class="form-control" placeholder="FBR ID" value="<?php echo $clData['fbrId']; ?>">
											</div>

											<div class="form-group">
												<input type="text" name="pass" class="form-control" placeholder="Abc*123xyz" value="<?php echo $clData['password']; ?>">
											</div>

											<div class="form-group">
												<input type="number" name="pinC" class="form-control" placeholder="Pin Code" value="<?php echo $clData['pinCd']; ?>">
											</div>

											<!-- </div>

					<div class="col-lg-6 col-md-6"> -->

											<div class="form-group">
												<select name="linked" class="form-control">
													<option value="">Linked With Advocate</option>
													<option disabled="disabled">------------------------------------</option>
													<?php
													if ($drpDnLnkAcc) {
														foreach ($drpDnLnkAcc as $data) {
													?>
															<option <?php if ($clData['linkId'] == $data['id']) { ?> selected='selected' <?php } ?>
																value="<?php echo $data['id']; ?> | <?php echo $data['linkNm']; ?>">
																<?php echo $data['linkNm']; ?></option>
													<?php
														}
													}
													?>
												</select>
											</div>

											<div class="form-group">
												<input type="text" name="Cemail" class="form-control" placeholder="email@domain.com" value="<?php echo $clData['emId']; ?>" <?php echo (isset($result['email']) ? 'style="border: 1px solid red;"' : ''); ?>>
												<span class="error" style="color: red;"><?php echo (isset($result['email']) ? $result['email'] : ''); ?></span>
											</div>

											<div class="form-group">
												<input type="text" name="NTNno" class="form-control" placeholder="NTN Numbr" value="<?php echo $clData['ntnNo']; ?>">
											</div>

											<div class="form-group">
												<input type="number" name="NTNfee" class="form-control" placeholder="Income Tax Fees" value="<?php
																																				if ($clData['ntnFee'] != 0) {
																																					echo $clData['ntnFee'];
																																				}
																																				?>">
											</div>

											<div class="form-group">
												<input type="date" name="NTNdor" class="form-control" value="<?php echo $clData['ntnDt']; ?>">
											</div>

											<fieldset>
												<legend>STRN</legend>

												<div class="form-group">
													<input type="text" name="STRNno" class="form-control" placeholder="STRN Number" value="<?php echo $clData['strnNo']; ?>">
												</div>

												<div class="form-group">
													<input type="number" name="STRNfee" class="form-control" placeholder="STRN Fees" value="<?php
																																			if ($clData['strnFee'] != 0) {
																																				echo $clData['strnFee'];
																																			}
																																			?>">
												</div>

												<div class="form-group">
													<input type="date" name="STRNdor" class="form-control" value="<?php echo $clData['strnDt']; ?>">
												</div>
											</fieldset>

											<fieldset>
												<legend>With Holding Tax</legend>
												<div class="form-group">
													<select name="whtAg" class="form-control">
														<option value="">WHT AGENT ?</option>
														<option disabled="disabled">------------------------------------</option>
														<?php
														if ($whAgt) {
															foreach ($whAgt as $data) {
														?>
																<option <?php if ($clData['whAgt'] == $data['whAgtVal']) { ?>
																	selected='selected' <?php } ?> value="<?php echo $data['whAgtVal']; ?>">
																	<?php echo $data['whAgtVal']; ?>
																</option>
														<?php
															}
														}
														?>
													</select>
												</div>

												<div class="form-group">
													<input type="number" name="whtFee" class="form-control" placeholder="WHT Fees" value="<?php echo $whtFee; ?>">
												</div>

												<div class="form-group">
													<input type="date" name="WHTdor" class="form-control" value="<?php echo $clData['whDt']; ?>">
												</div>
											</fieldset>

											<fieldset>
												<legend>SRB</legend>
												<div class="form-group">
													<input type="text" name="SRBno" placeholder="SRB" class="form-control" value="<?php echo $clData['srbNo']; ?>">
												</div>

												<div class="form-group">
													<input type="number" name="SRBfee" class="form-control" placeholder="SRB Fees" value="<?php
																																			if ($clData['srbFee'] != 0) {
																																				echo $clData['srbFee'];
																																			}
																																			?>">
												</div>

												<div class="form-group">
													<input type="date" name="SRBdor" class="form-control" value="<?php echo $clData['srbDt']; ?>">
												</div>
											</fieldset>

											<fieldset>
												<legend>BRB</legend>
												<div class="form-group">
													<input type="text" name="BRBno" class="form-control" placeholder="BRB" value="<?php echo $clData['brbNo']; ?>">
												</div>

												<div class="form-group">
													<input type="number" name="BRBfee" class="form-control" placeholder="BRB Fees" value="<?php
																																			if ($clData['brbFee'] != 0) {
																																				echo $clData['brbFee'];
																																			}
																																			?>">
												</div>

												<div class="form-group">
													<input type="date" name="BRBdor" class="form-control" value="<?php echo $clData['brbDt']; ?>">
												</div>
											</fieldset>

											<fieldset>
												<legend>PRB</legend>

												<div class="form-group">
													<input type="text" name="PRBno" class="form-control" placeholder="PRB" value="<?php echo $clData['prbNo']; ?>">
												</div>

												<div class="form-group">
													<input type="number" name="PRBfee" class="form-control" placeholder="PRB Fees" value="<?php
																																			if ($clData['prbFee'] != 0) {
																																				echo $clData['prbFee'];
																																			}
																																			?>">
												</div>

												<div class="form-group">
													<input type="date" name="PRBdor" class="form-control" value="<?php echo $clData['prbDt']; ?>">
												</div>
											</fieldset>

											<fieldset>
												<legend>KPK</legend>

												<div class="form-group">
													<input type="text" name="KPKno" class="form-control" placeholder="KPK" value="<?php echo $clData['kpkNo']; ?>">
												</div>

												<div class="form-group">
													<input type="number" name="KPKfee" class="form-control" placeholder="KPK Fees" value="<?php
																																			if ($clData['kpkFee'] != 0) {
																																				echo $clData['kpkFee'];
																																			}
																																			?>">
												</div>

												<div class="form-group">
													<input type="date" name="KPKdor" class="form-control" value="<?php echo $clData['kpkDt']; ?>">
												</div>
											</fieldset>
										<?php
										}
										?>
									</div>

									<div class="col-12" style="text-align: center;">
										<button type="submit" class="btn btn-primary" name="UpdClient" accesskey="u">Update</button>

										<input type="reset" name="reset" class="btn btn-danger" value="Reset">
									</div>

								</form>
							<?php

							} else {
								echo "No Rec";
							}

							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>