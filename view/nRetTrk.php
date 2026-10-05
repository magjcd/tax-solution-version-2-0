<main id="main" class="main sub-body">

<div class="pagetitle">
  <h1 class="main-text-color">Return Tracker</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Return Tracker</li>
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
			$retTpDet = $ContObj->retTpData();
			$revEarnDet = $ContObj->revEarnData();
			?>
			<form id="retTrk" class="form-group">
			
				<div class="form-group">
					<input type="date" class="gjFldL form-control" id="retTDt" value="<?php echo date('Y-m-d'); ?>" dir="rtl" >
				</div>

				<div class="form-group">
					<select id="retType" class="gjFldL form-control" autofocus="autofocus">
						<option value="">Select Return Type</option>
						<option disabled="disabled">----------------------------</option>
						<?php
						if($retTpDet){
							foreach ($retTpDet as $retTpDet) {
								?>
								<option value="<?php echo $retTpDet['id']; ?>|<?php echo $retTpDet['feeTp']; ?>">
									<?php echo $retTpDet['feeTp']; ?>
								</option>
								<?php
							}
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<select id="taxYr" class="gjFldL form-control" dir="rtl">
						<option value="">Select Tax Year</option>
						<?php
						$txyear = 2000;
						for($i = $txyear; $i <= 2050; $i++){
						?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group">
					<input type="text" id="clientDt" list="clientDet" name="clientDet" class="gjFldL form-control" 
					autofocus="autofocus" onclick="this.select();" autocomplete="off">
					<datalist id="clientDet">
					</datalist>
				</div>

				<div class="form-group">
					<input type="number" class="gjFldL form-control" id="barCd" value="" placeholder="123456789123456" dir="rtl">
				</div>

				<div class="form-group">
					<input type="date" class="gjFld form-control" id="subDt" value="<?php echo date('Y-m-d'); ?>">
				</div>

				<div class="form-group">
					<input type="number" class="gjFld form-control" id="payfee" value="0" dir="rtl">
				<div class="form-group">
				</div>

				<div class="form-group">
					<input type="text" class="gjFldL form-control" id="rem" placeholder="Remarks">
				</div>

				<div class="form-group">
					<div id="feetext" style="display: none;"></div>
					<select id="earnedRev" style="display: none;">
						<?php 
							foreach($revEarnDet as $revEarned){
						?>
							<option <?php echo $revEarned['hdId']; ?>|<?php echo $revEarned['headNm']; ?>|<?php echo $revEarned['sHdId']; ?>|<?php echo $revEarned['sHdNm']; ?>|<?php echo $revEarned['id']; ?>|<?php echo $revEarned['clientNm']; ?>>
								<?php echo $revEarned['hdId']; ?>|<?php echo $revEarned['headNm']; ?>|<?php echo $revEarned['sHdId']; ?>|<?php echo $revEarned['sHdNm']; ?>|<?php echo $revEarned['id']; ?>|<?php echo $revEarned['clientNm']; ?>
							</option>
						<?php 
							}
						?>
					</select>
				</div>
				<button type="submit" id="pay" class="gjFldL btn btn-primary" accesskey="s">Save</button>

			</form>

			<!-- <table id="fb" class="table table-striped">
			</table> -->

			
			<table id="retTrkData" class="table table-striped">
				<div id="box">
					<div id="loader"></div>
					<h3 id="loaderNm">Talreja</h3>
					<h4 id="loadingNm">Loading...</h4>
				</div>
			</table>
		  
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>

