<main id="main" class="main">

	<div class="pagetitle">
		<h1>Change Password</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active">Change Password</li>
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
							if (isset($_POST['prePwd'])) {
								$ContObj->ChagePwdC($_POST['prePwd'], $_POST['nPwd'], $_POST['cPwd']);
							}
							?>

							<div class="col-12">
								<form action="index.php?page=changePwd" method="post" style="text-align: center;" class="form-inline">
									<div class="form-group">
										<input type="password" class="form-control" name="prePwd" placeholder="Old Password">
									</div>
									<div class="form-group">

										<input type="password" class="form-control" name="nPwd" placeholder="New Password">
									</div>
									<div class="form-group">

										<input type="password" class="form-control" name="cPwd" placeholder="Confirm Password">
									</div>
									<div class="form-group">

										<input type="submit" class="btn btn-primary" name="" value="Change Password">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>