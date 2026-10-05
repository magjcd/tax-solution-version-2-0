<main id="main" class="main sub-body">

	<div class="pagetitle">
		<h1 class="main-text-color">New Client</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">New Client</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">

			<!-- Left side columns -->
			<div class="col-lg-12">
				<div class="row">

					<!-- Sales Card -->
					<div class="card sub-body">
						<div class="card-body">
							<?php
							include 'controller/nClientConfig.php';
							// Object for sending Form Data to Controller
							if (isset($_POST['busStatus'])) {
								$new_client = $ContObj->nClient($_POST['busStatus'], $_POST['cName'], $_POST['cCity'], $_POST['bussName'], $_POST['accNat'], $_POST['cnicNo'], $_POST['ntnNo']);
								// echo '<pre>';
								// print_r($new_client);
							}

							$cName = (isset($_POST['cName']) ? $_POST['cName'] : '');
							$cnicNo = (isset($_POST['cnicNo']) ? $_POST['cnicNo'] : '');
							$ntnNo = (isset($_POST['ntnNo']) ? $_POST['ntnNo'] : '');
							$bussName = (isset($_POST['bussName']) ? $_POST['bussName'] : '');
							?>
							<form action="index.php?page=nClient" method="post" class="form-group mt-3" style="">
								<div class="mb-3">
									<select name="busStatus" id="busStatus" class="form-control" autofocus>
										<option value="">Select Business Status</option>
										<option disabled="disabled">------------------------------------</option>
										<?php
										if ($drpDnStat) {
											foreach ($drpDnStat as $data) {
										?>
												<option <?php if ($data['id'] == $busStatVarId) {
															echo "selected='selected'";
														} ?> value="<?php echo $data['id']; ?>|<?php echo $data['statNm']; ?>">
													<?php echo $data['statNm']; ?></option>
										<?php
											}
										}
										?>
									</select>
									<span class="error" style="color: goldenrod;"><?php echo (isset($new_client['busStatus']) ? $new_client['busStatus'] : ''); ?></span>
								</div>

								<div class="mb-3">
									<input type="text" name="cName" class="form-control" placeholder="Client Name" value="<?php echo $cName; ?>">
									<span class="error" style="color: goldenrod;"><?php echo (isset($new_client['cName']) ? $new_client['cName'] : ''); ?></span>
								</div>

								<div class="mb-3" id="client_cnic_no">
									<input type="number" id="cnicNo" name="cnicNo" class="form-control" placeholder="CNIC without Dashes" value="<?php echo $cnicNo; ?>" pattern="^[\d]{13}" title="4310212345671">
									<span class="error" style="color: goldenrod;"><?php echo (isset($new_client['cnicNo']) ? $new_client['cnicNo'] : ''); ?></span>
								</div>

								<div class="mb-3" id="client_ntn">
									<input type="text" id="ntnNo" name="ntnNo" class="form-control" placeholder="NTN without Dashes" value="<?php echo $ntnNo; ?>">
								</div>
								<div class="mb-3">
									<select name="cCity" class="form-control">
										<option value="">Select City</option>
										<option disabled="disabled">------------------------------------</option>
										<?php
										if ($drpDnCity) {
											foreach ($drpDnCity as $data) {
										?>
												<option <?php if ($data['id'] == $ctVarId) {
															echo "selected='selected'";
														} ?> value="<?php echo $data['id']; ?>|<?php echo $data['cityNm']; ?>"><?php echo $data['cityNm']; ?></option>
										<?php
											}
										}
										?>

									</select>
									<span class="error" style="color: goldenrod;"><?php echo (isset($new_client['cCity']) ? $new_client['cCity'] : ''); ?></span>
								</div>
								<div class="mb-3">
									<input type="text" name="bussName" class="form-control" placeholder="Business Name" value="<?php echo $bussName; ?>">
									<span class="error" style="color: goldenrod;"><?php echo (isset($new_client['bussName']) ? $new_client['bussName'] : ''); ?></span>
								</div>
								<div class="mb-3">
									<?php
									if ($hidAccNat) {
									?>
										<select name="accNat" style="display: none;" class="form-control">
											<?php
											foreach ($hidAccNat as $hidAccNatData) {
											?>
												<option value="<?php echo $hidAccNatData['hdId']; ?>|<?php echo $hidAccNatData['headNm']; ?>|<?php echo $hidAccNatData['id']; ?>|<?php echo $hidAccNatData['subHeadNm']; ?>"></option>
											<?php
											}
											?>
										</select>
									<?php
									}
									?>
								</div>
								<div class="mb-3">
									<button type="submit" name="AddClient" class="btn btn-primary">Add</button>
									<input type="reset" name="reset" class="btn btn-danger" value="Reset">
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>