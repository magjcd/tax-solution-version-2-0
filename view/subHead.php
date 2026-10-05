<main id="main" class="main">

	<div class="pagetitle">
		<h1>Sub Header</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active">Sub Header</li>
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
							$vSHeadAcc = $ContObj->vShdAcc();
							$vHeadAcc = $ContObj->vHdAcc();
							if (isset($_POST['subHead'])) {
								$ContObj->nSubHead($_POST['hdAcc'], $_POST['subHead']);
							}
							?>

							<form action="index.php?page=subHead" method="post" class="form-inline">

								<div class="form-group">
								<select name="hdAcc" class="form-control">
									<option value="">Select a Header</option>
									<option disabled="disabled">--------------------------------------</option>
									<?php
									foreach ($vHeadAcc as $data) {
									?>
										<option value="<?php echo $data['id'] ?>|<?php echo $data['headNm'] ?>"><?php echo $data['headNm'] ?></option>
									<?php
									}
									?>
								</select>
								</div>

								<div class="form-group">
									<input type="text" class="form-control" name="subHead" placeholder="Sub Header">
								</div>
								
								<div class="form-group">
									<input type="submit" value="Add" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>



					<div class="row">
						<div class="col-12">
							<?php
							// if Data is available inside $RepCntObj-> Object for listing of BOs
							if ($vSHeadAcc) {
							?>


								<table id="users" class="table table-striped">
									<tr>
										<th>Sub-Header Name</th>
										<th>Header Name</th>
										<th style="text-align: center;">Action</th>
									</tr>
									<?php
									//if(isset($_SESSION['admin'])){

									// OLD APPROACH

									foreach ($vSHeadAcc as $data) {
										// if($data['subHeadNm'] != 'Services' && $data['subHeadNm'] != 'Accounts Receivable' && $data['subHeadNm'] != 'Banks'){
										// 	echo "<tr><td>".$data['subHeadNm']."</td><td>".$data['headNm']."</td>

										// 	<td style='width: 30px;'>
										// 	<a href='index?page=updSubHd&eid=".$data['id']."&subHd=".$data['subHeadNm']."&hdId=".$data['hdId']."&hdNm=".$data['headNm']."' id='edit'>
										// 	<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
										// }else{
										// 	echo "<tr><td>".$data['subHeadNm']."</td><td>".$data['headNm']."</td><td></td>";				
										// }


										// NEW APPROACH

										if ($data['registerarNm'] != 'SYSTEM GENERATED') {
											echo "<tr><td>" . $data['subHeadNm'] . "</td><td>" . $data['headNm'] . "</td>

				<td style='width: 30px; text-align: center;'>
				<a href='index?page=updSubHd&eid=" . $data['id'] . "&subHd=" . $data['subHeadNm'] . "&hdId=" . $data['hdId'] . "&hdNm=" . $data['headNm'] . "' id='edit'>
				<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
										} else {
											echo "<tr><td>" . $data['subHeadNm'] . "</td><td>" . $data['headNm'] . "</td><td style='width: 200px; text-align: center;'>" . $data['registerarNm'] . "</td>";
										}
									}
									?>
								</table>
						</div>
					<?php
							} else {
								echo "<div class='success-msg'>No Sub Header is available/div>";
							}
					?>


					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
</main>