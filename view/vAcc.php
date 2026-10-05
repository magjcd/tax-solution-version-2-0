<main id="main" class="main sub-body">

	<div class="pagetitle">
		<h1 class="main-text-color">View Account</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active">View Account</li>
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
							$accDet = $ContObj->vSAcc();
							$dt = date('Y-m-d', strtotime('+100 day'));
							?>
								<form style="text-align: center;" class="form-inline">

									<div class="form-group">
										<input type="date" name="fd" id="fd" class="form-control" value="<?php echo date('Y-01-01'); ?>">
									</div>

									<div class="form-group">
										<input type="date" name="td" id="td" class="form-control" value="<?php echo date('Y-m-d'); ?>">
									</div>

									<div class="form-group">
										<input type="text" id="vSAcc" list="vSAccc" name="vSAcc" class="gjFldL form-control" autofocus="autofocus" onclick="this.select();">
										<datalist id="vSAccc">

											<?php foreach ($accDet as $accDtDet) { ?>
												<option value="<?php echo $accDtDet['id']; ?>|<?php echo $accDtDet['clientNm']; ?>|<?php echo $accDtDet['busNm']; ?>|<?php echo $accDtDet['cityNm'] ?>|<?php echo $accDtDet['sHdNm']; ?>">
													<?php echo $accDtDet['clientNm']; ?> - <?php echo $accDtDet['busNm']; ?> - <?php echo $accDtDet['headNm']; ?> - <?php echo $accDtDet['cnicNo']; ?> - <?php echo $accDtDet['sHdNm']; ?> - <?php echo $accDtDet['cityNm']; ?></option>
											<?php } ?>

										</datalist>
									</div>
								</form>
								<!-- </div> -->




								<div class="sDwAcc">

									<!--<div id="box">-->
									<!--	<div id="loader"></div>-->
									<!--	<h3 id="loaderNm">SAWREVA</h3>-->
									<!--	<h6 id="loadingNm">Loading...</h6>-->
									<!--</div>		-->

								</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>