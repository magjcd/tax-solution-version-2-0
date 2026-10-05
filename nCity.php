<main id="main" class="main">

	<div class="pagetitle">
		<h1>City</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active">City</li>
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
							<form action="index.php?page=nCity" method="post" class="form-inline">
								<div class="form-group">
									<input type="text" class="form-control" name="ctNm" placeholder="City Name">
								</div>

								<div class="form-group">
									<input type="submit" name="" class="btn btn-primary" value="Add">
								</div>

							</form>

							<?php
							if (isset($_POST['ctNm'])) {
								$ContObj->nCity($_POST['ctNm']);
							}
							?>
							<?php
							// Creating Object for Listing Branch Offices
							$vCity = $ContObj->viewCity();
							?>

							<?php
							// if Data is available inside $RepCntObj-> Object for listing of BOs
							if ($vCity) {
							?>
								<table class="table table-striped">
									<tr>
										<th>City Name</th>
										<th>Action</th>
									</tr>
									<?php
									if (isset($_SESSION['admin'])) {
										foreach ($vCity as $data) {
											echo "<tr><td>". $data['id'] . strtoupper($data['cityNm']) . "</td><td style='width: 30px;'>
														<a href='index?page=updCity&eid=" . $data['id'] . "&eNm=" . $data['cityNm'] . "' id='edit'><i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
										}
									} else {
										foreach ($vCity as $data) {
											echo "<tr><td>" . $data['cityNm'] . "</td><td style='width: 30px;'></td></tr>";
										}
									}
									?>
								</table>

							<?php
							} else {
								echo "<div class='success-msg'>No City is Available</div>";
							}
							?>


						</div>
					</div>
				</div>
	</section>
</main>