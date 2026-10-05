<main id="main" class="main">

	<div class="pagetitle">
		<h1>Add Representative</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active">Add Representative</li>
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
							$ContObj->adminLogChk();

							$uNm = $fNm = $uPwd = $cPwd = $eAddr = "";

							if (isset($_POST['userNm'])) {
								if (empty($_POST['userNm'])) {
								} else {
									$uNm = $_POST['userNm'];
								}

								if (empty($_POST['fNm'])) {
								} else {
									$fNm = $_POST['fNm'];
								}

								if (empty($_POST['uPwd'])) {
								} else {
									$uPwd = $_POST['uPwd'];
								}

								if (empty($_POST['cPwd'])) {
								} else {
									$cPwd = $_POST['cPwd'];
								}

								if (empty($_POST['eAddr'])) {
								} else {
									$eAddr = $_POST['eAddr'];
								}
							}


							?>
							<?php
							if (isset($_POST['userNm'])) {
								$ContObj->nUserC($_POST['userNm'], $_POST['fNm'], $_POST['uPwd'], $_POST['cPwd'], $_POST['eAddr'], $_POST['status'], $_POST['role']);
							}
							?>
							<form action="index?page=nUser" method="post" class="form-group">

							<div class="form-group">
								<input type="text" name="userNm" class="form-control" value="<?php echo $uNm; ?>" placeholder="User Name">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" name="fNm" value="<?php echo $fNm; ?>" placeholder="Full Name">
							</div>

							<div class="form-group">
								<input type="password"class="form-control" name="uPwd" value="<?php echo $uPwd; ?>" placeholder="********">
							</div>

							<div class="form-group">
								<input type="password" class="form-control" name="cPwd" value="<?php echo $cPwd; ?>" placeholder="********">
							</div>

							<div class="form-group">
								<input type="email" class="form-control" name="eAddr" value="<?php echo $eAddr; ?>" placeholder="email@domain.com">
							</div>

							<div class="form-group">
								<select name="status" class="form-control">
									<option value="">Select Status</option>
									<option value="active">Active</option>
									<option value="inactive">Inactive</option>
								</select>
							</div>

							<div class="form-group">
								<select name="role" class="form-control">
									<option value="">Select a Role</option>
									<option value="taxmagrep">Representative</option>
									<option value="taxmagdir">Director</option>
								</select>
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" id="cUser" value="Add">
								<input type="reset" class="btn btn-danger" name="reset" value="Reset">
							</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>