<main id="main" class="main sub-body">

<div class="pagetitle">
  <h1 class="main-text-color">View Date wise Return Tracker</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">View Date wise Return Tracker</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="card sub-body">
          <div class="card-body">
				<?php
				$gjDet = $ContObj->vRTEntDt(); //This function works for both GJ and for Return Tracker
				?>

				<div class="form-group">
					<input type="text" name="retTrk" id="retTrk" class="form-control" list="vRT" autofocus>
					<datalist id="vRT">
						<?php if($gjDet){
							foreach($gjDet as $gjData){
							?>

						<option value="<?php echo $gjData['gjDt'] ?>"><?php echo $gjData['gjDt'] ?></option>
					<?php }}?>
					</datalist>
				</div>

					
					<div id="vRetTrk" style="width: 100%;">

						<div id="box">
							<div id="loader"></div>
							<h3 id="loaderNm">SAWREVA</h3>
							<h6 id="loadingNm">Loading...</h6>
						</div>		

					</div>

		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>