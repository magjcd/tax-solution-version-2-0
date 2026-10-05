<main id="main" class="main">

	<div class="pagetitle">
		<h1>Registered Representatives</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active">Registered Representatives</li>
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
							$viewUsers = $ContObj->viewUsersC();
							?>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Full Name</th>
										<th>User Name</th>
										<th>Email</th>
										<th>Status</th>
										<th>Role</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<?php
								foreach ($viewUsers as $data) {

									if ($data['role'] != 'taxmagadmin') {
										if ($data['status'] != 'inactive') {
											echo "<tbody><tr>
											<td>" . $data['name'] . "</td><td>" . $data['userName'] . "</td><td>" . $data['userEmail'] . "</td><td>" . ucfirst($data['status']) . "</td><td>" . ucfirst($data['role']) . "</td>&nbsp;&nbsp;<td style='width: 30px;'>
											<a href='index.php?page=updUser&eid=" . $data['id'] . "' id='edit'>
											<i class='fa fa-edit fa-lg fa-fw'></i></a></td>
											
											<td style='width:30px;'> 
											<a href='index.php?page=chgStat&sid=" . $data['id'] . "&stat=" . $data['status'] . "' id='cs'>
											<i class='fas fa-user-slash fa-lg fa-fw'></i></a></td>

											<td style='width:30px;'> 
											<a href='index.php?page=resetPass&rid=" . $data['id'] . "' id='cs'>
											<i class='fa fa-exchange fa-lg fa-fw'></i></a></td>
											
											</tr>";
											} else {
												echo "<tr style='color: red;'><td>" . $data['name'] . "</td><td>" . $data['userName'] . "</td><td>" . $data['userEmail'] . "</td><td>" . ucfirst($data['status']) . "</td><td>" . ucfirst($data['role']) . "</td><td style='width: 30px;'>
											<a href='index.php?page=updUser&eid=" . $data['id'] . "' id='edit' alt='Edit'>
											<i class='fa fa-edit fa-lg fa-fw'></i></a></td>
											
											<td style='width:30px;'> 
											<a href='index.php?page=chgStat&sid=" . $data['id'] . "&stat=" . $data['status'] . "' id='cs'>
											<i class='fas fa-user-slash fa-lg fa-fw'></i></a></td>
											
											<td style='width:30px;'> 
											<a href='index.php?page=resetPass&rid=" . $data['id'] . "' id='cs'>
											<i class='fa fa-exchange fa-lg fa-fw'></i></a></td>

											</tr></tbody>";
										}
									} else {
										echo "<tbody><tr><td>" . $data['name'] . "</td><td>" . $data['userName'] . "</td><td>" . $data['userEmail'] . "</td><td>" . ucfirst($data['status']) . "</td><td>" . ucfirst($data['role']) . "</td><td style='width: 30px;'></td></tr></tbody>";
									}
								}

								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>