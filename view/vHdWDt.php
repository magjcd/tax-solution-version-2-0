<main id="main" class="main">

<div class="pagetitle">
  <h1>Sub-Header Wise Report</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Sub-Header Wise Report</li>
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
			// $ContObj->dirLogChk();
			$vShdAcc = $ContObj->vShdAcc();

			if(isset($_POST['msg']) && $_POST['msg'] != ''){
				$msgRes = $ContObj->dirMsg($_POST['msg']);
			}
			?>

			<form action="index.php?page=msg" method="post" id="hdWDt" class="form-inline">
				<div class="form-group">
					<input type="date" class="form-control" id="fd" name="fd" value="<?php echo date('Y-01-01'); ?>">
				</div>

				<div class="form-group">
					<input type="date" class="form-control" id="td" name="td" value="<?php echo date('Y-m-d'); ?>">
				</div>
			
				<!-- <div class="form-group">
					</div> -->
					
					<div class="form-group">
					<input type="text" class="form-control" id="hdDet" name="hdDet" list="hdData" autofocus="autofocus">
					<datalist id="hdData">
						<?php 
						if($vShdAcc){
							foreach($vShdAcc as $vShdAccDet){
								?>
								<option value="<?php echo $vShdAccDet['id']; ?>|<?php echo $vShdAccDet['subHeadNm']; ?>"><?php echo $vShdAccDet['subHeadNm']; ?></option>
								<?php
							}
						}
							?>
					</datalist>
				</div>
			</form>

			<div class="sDwAcc">
			<!-- <div id="box">
				<div id="loader"></div>
				<h3 id="loaderNm">SAWREVA</h3>
				<h6 id="loadingNm">Loading...</h6>
			</div> -->		
			</div>
		  
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>