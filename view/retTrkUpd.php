<main id="main" class="main">

<div class="pagetitle">
  <h1>Update Return Tracker</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Update Return Tracker</li>
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
			$idUpd = $_GET['rTrkEid'];
			$retTpDetUpd = $ContObj->retTpPrvData($idUpd);
			$retTpDet = $ContObj->retTpData();
			$revEarnDet = $ContObj->revEarnData();

			// Sending Representative information for saving in Database in order to recongnize transaction
			// $repDet = explode("_",$_SESSION['taxmagrep']);
			// $repId = $repDet[0];
			// $repNm = $repDet[1];

			// echo '<pre>';
			// print_r($retTpDetUpd);
			// echo '</pre>';
			if($retTpDetUpd){
				foreach($retTpDetUpd as $retTpDetUpdS){
			?>

					<form id="retTrkUpd" class="form-group">
						<div class="form-group">
							<input type="date" class="gjFldL form-control" id="retTDtUpd" value="<?php echo date('Y-m-d'); ?>" dir="rtl" >
						</div>

						<div class="form-group">
							<select id="retTypeUpd" class="gjFldL form-control" autofocus="autofocus">
								<!-- <option value="">Select Return Type</option> -->
								<option disabled="disabled">----------------------------</option>
								<?php
								foreach($retTpDet as $clDtUpd){
									?>
									<option <?php if($retTpDetUpdS['feeTpId'] == $clDtUpd['id']){ ?> selected="selected" <?php } ?> value="<?php echo $clDtUpd['id']; ?>|<?php echo $clDtUpd['feeTp']; ?>"><?php echo $clDtUpd['feeTp']; ?></option>
									<?php
								}
								?>
							</select>
						</div>
						
						<div class="form-group">
							<select id="taxYrUpd" class="gjFldL form-control" dir="rtl">
								<!-- <option>Select Tax Year</option> -->
								<?php
								$txyear = 2000;
								for($i = $txyear; $i <= 2050; $i++){
								?>
									<option <?php if($retTpDetUpdS['feeYr'] == $i){ ?> selected="selected" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</div>


						<div class="form-group">
							<input type="text" id="clientDtUpd" list="clientDetUpd" name="clientDetUpd" class="gjFldL form-control" 
							autofocus="autofocus" onclick="this.select()" autocomplete="off">
							<datalist id="clientDetUpd">
							</datalist>
						</div>

						<div class="form-group">
							<input type="number" class="gjFldL form-control" id="barCdUpd" value="<?php echo $retTpDetUpdS['barCd']; ?>" dir="rtl">
						</div>

						<div class="form-group">
							<input type="date" class="gjFld form-control" id="subDtUpd" value="<?php echo $retTpDetUpdS['subDt']; ?>">
						</div>

						<div class="form-group">
							<input type="number" class="gjFld form-control" id="payfeeUpd" value="<?php echo $retTpDetUpdS['drAmt']; ?>" dir="rtl">
						</div>

						<div class="form-group">
							<input type="text" class="gjFldL form-control" id="remUpd" value="<?php echo $retTpDetUpdS['description']; ?>">
						</div>

						<div class="form-group">
							<div id="feetext" class="form-control" style="display: none;"></div>
						</div>

						<div class="form-group">
							<input type="text" id="idUpd" value="<?php echo $idUpd; ?>"  style="display: none;" class="form-control">
						</div>

						<div class="form-group">
							<select id="earnedRevUpd" class="form-control" style="display: none;">
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

						<div class="form-group">
							<input type="submit" class="gjFldL btn btn-primary" id="payUpd" value="Update" accesskey="u">
						</div>
					</form>

					<table>
					</table>

				<table id="retTrkDataUpd">
					
				</table>
				<div id="fb"></div>

			<?php }} ?>
		  
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>

