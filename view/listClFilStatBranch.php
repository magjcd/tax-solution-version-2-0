<main id="main" class="main sub-body">
	<div class="pagetitle">
		<h1 class="main-text-color">Detailed Return Filing Status By Branch</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active">Detailed Return Filing Status By Branch</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<?php
	$feeTps = $ContObj->viewFeeTpwithFlag();
	// echo "<pre>";
	// print_r($feeTps);
	?>
	<section class="section dashboard">
		<div class="row">
			<!-- Left side columns -->
			<div class="col-lg-12">
				<div class="row">
					<!-- Sales Card -->
					<div class="card">
						<div class="card-body">
							<form action="index?page=listClFilStatBranch" method="POST" style="text-align: center;">
								<div class="form-group">
									<select class="form-control" name="feeTp" id="feeTp">
										<option value="">Select a Fee Type</option>
										<option disabled>------------------------</option>
										<?php foreach ($feeTps as $eachFeeTp) { ?>
											<option value="<?php echo $eachFeeTp['feeTp']; ?>"><?php echo $eachFeeTp['feeTp']; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<input type="date" class="form-control" name="from" value="<?php echo date('Y-m-01') ?>">
									<input type="date" class="form-control" name="to" value="<?php echo date('Y-m-d') ?>">
								</div>
								<input type="submit" name="Sub" class="btn btn-primary" value="Get Data">
							</form>
							</body>
							</html>
							<?php
							if (isset($_POST['feeTp']) && $_POST['feeTp'] != "") {
								$feeTp = $_POST['feeTp'];
								$fd = $_POST['from'];
								$td = $_POST['to'];
								$viewBrOff = $ContObj->viewBrOff();
								if ($viewBrOff) {
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
									foreach ($viewBrOff as $viewBrOffData) {
										$br_off_id = $viewBrOffData['id'];
										
										echo "<div id='repFinActNm'><b>" . $cnt . ' - ' . strtoupper($viewBrOffData['brOffNm']) . "</b></div>";
										echo '<br />';
										?>
										<table>
											<thead>
												<tr>
													<th>Branch Name</th>
													<th>No. of Cases</th>
													<th>Filled</th>
													<th>Pending</th>
													<th>Achieved</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>
														<?php echo strtoupper($viewBrOffData['brOffNm']); ?>
													</td>
												</tr>
											</tbody>
										</table>
										<?php
									}
								}
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