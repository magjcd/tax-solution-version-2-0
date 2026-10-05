<main id="main" class="main sub-body">

<div class="pagetitle">
  <h1 class="main-text-color">View Date wise General Journal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">View Date wise General Journal</li>
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
				$gjDet = $ContObj->vGjEntDt();
			?>

			<div class="mb-3">
				<input type="text" name="vgj" id="vgj" class="form-control" list="vgjv" placeholder="dd-mm-yyyy" autofocus>
				<datalist id="vgjv">
					<?php if($gjDet){
						foreach($gjDet as $gjData){
						?>

					<option value="<?php echo $gjData['transDt'] ?>"><?php echo $gjData['transDt'] ?></option>
				<?php }}?>
				</datalist>
			</div>

			<div id="fb">

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