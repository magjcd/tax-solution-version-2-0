<main id="main" class="main">

	<div class="pagetitle">
		<h1>Return Filing Status
</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active">Return Filing Status
</li>
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
							<form action="index?page=clFiled" method="post" class="form-inline">
								<div class="form-group">
									<select name="taxYr" class="gjFldL form-control" dir="rtl">
										<option value="">Select Tax Year</option>
										<?php
										$txyear = 2000;
										for ($i = $txyear; $i <= 2050; $i++) {
										?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<input type="submit" value="GET DATA" class="gjFldL btn btn-primary">
								</div>
							</form>

							<?php
							if (isset($_POST['taxYr'])) {

								$noClFiled = $ContObj->noClFiled($_POST['taxYr']);
								
								$html = '<table class="table table-striped">
								<tr><td colspan="5" style="text-align: center;"></td><td><a href="view/clFiledPdf.php?taxYr=' . $_POST['taxYr'] . '"><i class="fa fa-file-pdf fa-lg fa-fw"></i></a></td></tr>
								<tr><td colspan="6" style="text-align: center;"><h6>for Year ' . $_POST['taxYr'] . '</h6></td></tr>
								<tr>
								<th>Town Name</th>
								<th style="text-align: right;">Cases</th>
								<th style="text-align: right;">Cases Filed</th>
								<th style="text-align: right;">Ach %</th>
								<th style="text-align: right;">Cases Rem</th>
								<th style="text-align: right;">Rem %</th>
								</tr>';
								$tot_cases_no = 0;
								$tot_filed_no = 0;
								$tot_remaining_no = 0;
								foreach ($noClFiled as $noClFiledDet) {


									$ratio = (($noClFiledDet['NoLedCases'] / $noClFiledDet['NoCases']) * 100);
									$pending = ($noClFiledDet['NoCases'] - $noClFiledDet['NoLedCases']);
									$rem = (($pending / $noClFiledDet['NoCases']) * 100);
									$html .= '<tr>
									<td>' . $noClFiledDet['cityNm'] . '</td>
									<td style="text-align: right;">' . $noClFiledDet['NoCases'] . '</td>
									<td style="text-align: right;">' . $noClFiledDet['NoLedCases'] . '</td>
									<td style="text-align: right;">' . number_format($ratio, 2) . '%</td>
									<td style="text-align: right;">' . $pending . '</td>
									<td style="text-align: right;">' . number_format($rem, 2) . '%</td></tr>';
									$tot_cases_no += $noClFiledDet['NoCases'];
									$tot_filed_no += $noClFiledDet['NoLedCases'];
									$tot_remaining_no += $pending;
								}
								
								$html .= '<tr>
								<th>Total no. of Clients Filed</th>
								<th>'.$tot_cases_no.'</th>
								<th>&nbsp;</th>
								<th>'.$tot_filed_no.'</th>
								<th>&nbsp;</th>
								<th>'.$tot_remaining_no.'</th>

								</tr>';
								$html .= '</table>';

								echo $html;
							}

							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>