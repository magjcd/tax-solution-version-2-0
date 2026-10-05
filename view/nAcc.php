<main id="main" class="main">

<div class="pagetitle">
  <h1>Sub-Account</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Sub-Account</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-12">
          <div class="card info-card sales-card">
			<?php
			$vSHdAcc = $ContObj->vShdAcc();
			$vCity = $ContObj->viewCity();
			$vAcc = $ContObj->vAcc();

			if(isset($_POST['subHead'])){
				$ContObj->nAccount($_POST['accNm'],$_POST['subHead'],$_POST['city']);
			}
			?>
			<form action="index?page=nAcc" method="post" class="form-inline">
				<div class="form-group">
					<select name="subHead" class="form-control">
						<option value="">Select a Sub Header</option>
						<option disabled="disabled">--------------------------------------</option>
						<?php
						foreach ($vSHdAcc as $data) {
						?>
						<option value="<?php echo $data['id']?>|<?php echo $data['subHeadNm']?>|<?php echo $data['hdId']?>|<?php echo $data['headNm']?>"><?php echo $data['subHeadNm']?></option>
						<?php
						}
						?>
					</select>
				</div>
				
				<div class="form-group">
					<input type="text" class="form-control" name="accNm" placeholder="Account Name">
				</div>

				<div class="form-group">
					<select name="city" class="form-control">
						<option value="">Select a City</option>
						<option disabled="disabled">--------------------------------------</option>
						<?php foreach($vCity as $ctData){ ?>
						<option value="<?php echo $ctData['id']; ?>|<?php echo $ctData['cityNm']; ?>">
							<?php echo $ctData['cityNm']; ?></option>
					<?php } ?>
					</select>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Add">
				</div>
			</form>

			<?php
		// if Data is available inside $RepCntObj-> Object for listing of BOs
		if($vAcc){
			?>
	

	<div style="overflow-x:auto;">
	<table id="users" class="table table-striped">
	<tr><th>Sub-Header Name</th><th>Header Name</th><th style="text-align: center;">Action</th></tr>	
	<?php

		foreach ($vAcc as $data) {

			if($data['registerarNm'] != 'SYSTEM GENERATED'){
				echo "<tr><td>".$data['clientNm']."</td><td>".$data['sHdNm']."</td>
				<td style='width: 30px; text-align: center;'>
				<a href='index?page=updLedAcc&eid=".$data['id']."&accNm=".$data['clientNm']."&subHdId=".$data['sHdId']."&subHdNm=".$data['sHdNm']."&hdId=".$data['hdId']."&hdNm=".$data['headNm']."&ctId=".$data['cityId']."&ctNm=".$data['cityNm']."' id='edit'>
				<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
			}else{
				echo "<tr><td>".$data['clientNm']."</td><td>".$data['sHdNm']."</td><td style='width: 200px; text-align: center;'>".$data['registerarNm']."</td></tr>";
			}

		}
	?>
	</table>
	</div>
	<?php
	}else{
		echo "<div class='success-msg'>No Branch Office is Available</div>";
	}
	?>
		  
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>