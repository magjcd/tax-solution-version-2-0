<main id="main" class="main">

<div class="pagetitle">
  <h1>Edit Account</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Edit Account</li>
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
			if(isset($_POST['subHead'])){
					$ContObj->updLedAcc($_POST['accId'],$_POST['subHead'],$_POST['accNm'],$_POST['city']);
				}
			if(isset($_GET['eid'])){
				$vSHdAcc = $ContObj->vShdAcc();
				$vCity = $ContObj->viewCity();
				$vAcc = $ContObj->vAcc();
				$eId = $_GET['eid'];
				$accNm = $_GET['accNm'];
				$sHdId = $_GET['subHdId'];
				$sHdNm = $_GET['subHdNm'];
				$hdId = $_GET['hdId'];
				$hdNm = $_GET['hdNm'];
				$ctId = $_GET['ctId'];
				$ctNm = $_GET['ctNm'];
				?>

				<form action="index?page=updLedAcc&eid=<?php echo $eId; ?>&accNm=<?php echo $accNm; ?>&subHdId=<?php echo $sHdId; ?>&subHdNm=<?php echo $sHdNm; ?>&hdId=<?php echo $hdId; ?>&hdNm=<?php echo $hdNm; ?>&ctId=<?php echo $ctId; ?>&ctNm=<?php echo $ctNm; ?>" method="post" class="form-inline">
					<div class="form-group">	
						<select name="subHead" class="form-control">
							<?php
							foreach ($vSHdAcc as $data) {
							?>

							<option <?php if($sHdId == $data['id']){ echo 'selected="selected"'; } ?> value="<?php echo $data['id']; ?>|<?php echo $data['subHeadNm']; ?>|<?php echo $data['hdId']; ?>|<?php echo $data['headNm']; ?>"><?php echo $data['subHeadNm']; ?></option>
							<?php
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="accId" value="<?php echo $eId; ?>" hidden="true">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="accNm" placeholder="Account Name" value="<?php echo $accNm; ?>">
					</div>
					
					<div class="form-group">
						<select name="city" class="form-control">
							<?php foreach($vCity as $ctData){ ?>
							<option <?php if($ctId == $ctData['id']){ echo 'selected="selected"'; } ?> value="<?php echo $ctData['id']; ?>|<?php echo $ctData['cityNm']; ?>">
								<?php echo $ctData['cityNm']; ?></option>
						<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="UPDATE">
					</div>
				</form>
				<?php
				}
				?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>