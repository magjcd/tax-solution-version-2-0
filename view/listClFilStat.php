<main id="main" class="main sub-body">



	<div class="pagetitle">

		<h1 class="main-text-color">Detailed Return Filing Status</h1>

		<nav>

			<ol class="breadcrumb">

				<li class="breadcrumb-item"><a href="index.html">Home</a></li>

				<li class="breadcrumb-item active">Detailed Return Filing Status</li>

			</ol>

		</nav>

	</div><!-- End Page Title -->


	<?php
	$feeTps = $ContObj->viewFeeTpwithFlag();
// 	echo "<pre>";
	// print_r(viewFeeTpwithFlag());
	?>
	<section class="section dashboard">

		<div class="row">



			<!-- Left side columns -->

			<div class="col-lg-12">

				<div class="row">



					<!-- Sales Card -->

					<div class="card">

						<div class="card-body">





							<form action="index?page=listClFilStat" method="POST" style="text-align: center;">



								<div class="form-group">

									<select class="form-control" name="feeTp" id="feeTp">

										<option value="">Select a Fee Type</option>

										<option disabled>------------------------</option>

										<?php foreach ($feeTps as $eachFeeTp) { ?>
											<option value="<?php echo $eachFeeTp['feeTp']; ?>"><?php echo $eachFeeTp['feeTp']; ?></option>
										<?php } ?>

									</select>

								</div>



								<!-- <div class="form-group" id="year" style="display: none;">

					<input type="text" class="form-control" name="subYear" value="" dir="rtl" autofocus="autofocus">

				</div> -->



								<!-- <div class="form-group" id="from_to" style="display: none;"> -->
								<div class="form-group" id="" style="">

									<input type="date" class="form-control" name="from" value="<?php echo date('Y-m-01') ?>">

									<input type="date" class="form-control" name="to" value="<?php echo date('Y-m-d') ?>">

								</div>



								<input type="submit" name="Sub" class="btn btn-primary" value="Get Data">

							</form>



							</body>

							</html>

							<?php

							if (isset($_POST['feeTp']) && $_POST['feeTp'] != "") {

								// $subYr = $_POST['subYear'];

								$feeTp = $_POST['feeTp'];

								$fd = $_POST['from'];

								$td = $_POST['to'];



								$viewCity = $ContObj->viewCity();

								if ($viewCity) {

							?>

									<p style="text-align: center;">You are viewing client's status for <strong><?php echo $_POST['feeTp'] ?></strong>
										<?php
										if (isset($_SESSION['taxmagadmin'])) {

										?>

											<a href="view/listClFilStatExcel.php?fd=<?php echo $fd; ?>&td=<?php echo $td; ?>&feeTp=<?php echo $feeTp; ?>" accesskey='x' class="excelFixBtn btn btn-success">
												<i class='fa fa-file-excel-o fa-lg fa-fw'></i>
											</a>

										<?php

										}
										?>
									</p>
							<?php

									$cnt = 1;

									foreach ($viewCity as $viewCityData) {

										$ctId = $viewCityData['id'];



										echo "<div id='repFinActNm'><b>" . $cnt . ' - ' . strtoupper($viewCityData['cityNm']) . "</b></div>";

										echo '<br />

		<table class="table table-striped">';

										echo '<tr>

		<th>Client Name</th>

		<th>Business Name</th>
		
		<th>Contact No.</th>

		<th>Bar Code / CNIC No.</th>

		<th>Submission Date</th>

		<th>Fees Type & Year</th>

		<th>Description</th>

		<th>Amount</th>

		<th>Representative</th>

		</tr>';



										// Sending ID to Grab ledger Details of Clients

										$viewClnt = $ContObj->listNoClByCt($ctId, $feeTp);

// echo '<pre>';
// print_r($viewClnt);

										if ($viewClnt) {

											foreach ($viewClnt as $viewClntData) {



												$clId = $viewClntData['id'];

												//echo $viewClntData['id'].$viewClntData['clientNm'].'<br />';

												// $viewClFil = $ContObj->listFiledCl($clId,$subYr,$feeTp,$fd,$td);
												$viewClFil = $ContObj->listFiledCl($clId, $feeTp, $fd, $td);

												if ($viewClFil) {

													foreach ($viewClFil as $viewClFilData) {

														if ($viewClFilData['drAmt'] != 0) {

															//echo $viewClFilData['drAmt'].'<br />';

															$clNm = $viewClFilData['clientNm'];

															$busNm = $viewClFilData['busNm'];
															
															$cntc_no = $viewClFilData['cellNo1'].', '.$viewClFilData['cellNo2'];

															$barCd = $viewClFilData['barCd'];

															$subDt = $viewClFilData['subDt'];

															$feeTp = $viewClFilData['feeTp'];

															$feeYr = $viewClFilData['feeYr'];

															$description = $viewClFilData['description'];

															$repNm = $viewClFilData['repNm'];

															$filAmt = number_format($viewClFilData['drAmt'], 2);



															echo '<tr><td>' . $clNm . '</td><td>' . $busNm . '</td><td>' . $cntc_no . '</td><td>' . $barCd . '</td><td>' . $subDt . '</td><td>' . $feeTp . ' ' . $feeYr . '</td><td>' . $description . '</td><td>' . $filAmt . '</td><td>' . $repNm . '</td></tr>';
														}
													}
												} else {

													//echo '<tr><td colspan="8" style="text-align: center;"><h4>No Return Tracker has been made in this City yet</h4></td></tr>';

													echo '<tr>

												<td>' . $viewClntData['clientNm'] . '</td>

												<td>' . $viewClntData['busNm'] . '</td>
												
												<td>' . $viewClntData['cellNo1'].', '.$viewClntData['cellNo2'] . '</td>

												<td>' . $viewClntData['cnicNo'] . '</td>

												<td colspan="6" style="text-align: center; color: red;">Yet to be Submitted</td></tr>';
												}
											}
										} else {

											echo '<tr><td colspan="8" style="text-align: center;"><h4>No Client has been added in this City yet</h4></td></tr>';
										}

										echo '</table>

		<br />';

										$cnt++;
									}
								}



								// echo '<br /><br /><br />';
							}

							?>

							<a href="#" class="scrollTop"><i class="fas fa-arrow-up"></i></a>



						</div>

					</div>

				</div>

			</div>

		</div>

	</section>

</main>