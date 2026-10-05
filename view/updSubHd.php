<main id="main" class="main">

<div class="pagetitle">
  <h1>Update Sub Header Account</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Update Sub Header Account</li>
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
			if(isset($_GET['eid'])){
				$eId = $_GET['eid'];
				$subHd = $_GET['subHd'];
				$hdId = $_GET['hdId'];
				$hdNm = $_GET['hdNm'];

				include('./autoLoad.php');
				$ContObj = new Controller();
				$hdAccDet = $ContObj->vHdAcc();
			?>			
				<form action="index?page=updSubHd&eid=<?php echo $_GET['eid']; ?>&subHd=<?php echo $_GET['subHd']; ?>&hdId=<?php echo $_GET['hdId']; ?>&hdNm=<?php echo $_GET['hdNm']; ?>" method="post" class="form-inline">

				<div class="form-group">
					<input type="text" class="form-control" name="updSHdNm" value="<?php echo $subHd; ?>">
				</div>

				<div class="form-group">
					<select name="updHdNm" class="form-control">
						<?php
						if($hdAccDet){
							foreach($hdAccDet as $hdAccDetData){	
								?>
								<option <?php if($hdId == $hdAccDetData['id']){ ?> selected="selected" <?php } ?>

								value="<?php echo $hdAccDetData['id']; ?>|<?php echo $hdAccDetData['headNm']; ?>"><?php echo $hdAccDetData['headNm']; ?>
								</option>
								<?php 
							}
						}
							?>
					</select>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="update" value="Update">
				</div>

				</form>


			<?php

			if(isset($_POST['update'])){
				$ContObj->updSHdAcc($eId,$_POST['updSHdNm'],$_POST['updHdNm']);
			}

			//end main IF
			}
			?>
		  
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>

