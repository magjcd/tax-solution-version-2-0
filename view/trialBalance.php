<main id="main" class="main">

	<div class="pagetitle">
		<h1>Trial Balance</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active" style="color: #fff;">Trial Balance</li>
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

							<form action="index?page=trialBalance" method="POST">
								<div class="form-group">
									<label>Select Data</label>
									<input type="date" name="dt" id="dt" class="form-control" value="<?php echo date('Y-m-d'); ?>">
								</div>

								<div class="form-group">
									<button class="btn btn-primary">Generate</button>
								</div>

							</form>
							<?php
							if (isset($_POST['dt']) && $_POST['dt'] != null) {
							?>
								<div style="width: 100%; text-align: center; font-weight: bold;"><?php //echo date('l jS \of F Y') 
																									?></div>
							<?php
								$vSHeadAcc = $ContObj->vShdAcc();

								if ($vSHeadAcc) {

									echo '<table class="table table-striped">';
									echo '<tr><th>Sub Header</th><th style="text-align: right;">Debit</th><th style="text-align: right;">Credit</th></tr>';
									$drTot = 0;
									$crTot = 0;
									$dt = $_POST['dt'];
									foreach ($vSHeadAcc as $vSHeadAccDet) {
										$trailBal = $ContObj->trialBalData($vSHeadAccDet['id'], $dt);
										foreach ($trailBal as $trailBalDet) {

											echo '<tr><td>' . $sHdNm = $vSHeadAccDet['subHeadNm'] . '</td>';
											if ($trailBalDet['trBal'] >= 0) {
												$drTot += $trailBalDet['trBal'];
												echo '<td style="text-align: right;">' . number_format($trailBalDet['trBal'], 2) . '</td>';
												echo '<td style="text-align: right;"></td>';
											} else {
												$crTot += $trailBalDet['trBal'];
												echo '<td style="text-align: right;"></td>';
												echo '<td style="text-align: right;">' . number_format($trailBalDet['trBal'], 2) . '</td>';
											}
											echo '</tr>';
										}
									}
									echo '<tr><th>Total</th><th style="text-align: right;">' . number_format($drTot, 2) . '</th><th style="text-align: right;">' . number_format($crTot, 2) . '</th></tr>';
									echo '</table>';
								}
							}

							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>