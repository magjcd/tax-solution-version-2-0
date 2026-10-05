<main id="main" class="main sub-body">

<div class="pagetitle">
  <h1 class="main-text-color">General Journal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">General Journal
</li>
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
			<div class="message"></div>
		  <?php
			$ClientDt = $ContObj->viewGjClients();
			$repPrevBal = $ContObj->prevBalRep();
			// Creating Object for Listing Status
			$vFeeTp = $ContObj->viewFeeTp();
			$repLedAccs = $ContObj->repLedAccs();
			
			if($ClientDt){

				$jdt = isset($_POST['gjDt']) ? $_POST['gjDt'] : "";
				$ft = isset($_POST['fTp']) ? $_POST['fTp'] : "";
				$fYr = isset($_POST['fYr']) ? $_POST['fYr'] : "";
				$desc = isset($_POST['desc']) ? $_POST['desc'] : "";
				$dr = isset($_POST['dr']) ? $_POST['dr'] : "";
				$cr = isset($_POST['cr']) ? $_POST['cr'] : "";
				$repLedAcc = isset($_POST['repLedAcc']) ? $_POST['repLedAcc'] : "";

				// Error Keys
				$date = null;
				$account = null;
				$fee_type = null;
				$fee_year = null;
				if(isset($_POST['accNm'])){

					// Sending Representative information for saving in Database in order to recongnize transaction
					$repDet = explode("_",$_SESSION['taxmagrep']);
					$repId = $repDet[0];
					$repNm = $repDet[1];

					// Sending information to Controller for saving in Database alongwith Representative information
					$add = $ContObj->nGj($jdt,$_POST['accNm'],$ft,$fYr,$desc,$dr,$cr,$repId,$repNm,$repLedAcc);
					// echo '<pre>';
					// print_r($add);
					// exit();

					// $date = array_key_exists('date',$add) ? $add['date'] : '';
					// $account = array_key_exists('account',$add) ? $add['account'] : '';
					// $wrong = array_key_exists('wrong',$add) ? $add['wrong'] : '';
					// $fee_type = array_key_exists('fee_type',$add) ? $add['fee_type'] : '';
					// $fee_year = array_key_exists('fee_year',$add) ? $add['fee_year'] : '';
				}

				
			?>
			<div class="full-width">
			<div style="text-align: center; font-weight: bold;"><?php echo date('l jS F Y'); ?></div>
			<?php if($repPrevBal){
				foreach($repPrevBal as $repPrevData){
				$gjPrBl = $repPrevData['bal'];	
				?>
			<div id="repPrevBal">Your Previous Balance is: <?php echo number_format($repPrevData['bal'],2); ?></div>
			<?php }} ?>
			<span id="bal"></span>
			
			<form action="index.php?page=ngj" class="form-inline was-validated" method="post" style="text-align: center;">

				<!-- HIDDEN Account of Representative -->
				<select name="repLedAcc" hidden="true">
					<?php 
					if($repLedAccs){
						foreach($repLedAccs as $repLedAcc){
							?>
							<option value="<?php echo $repLedAcc['id']; ?>|<?php echo $repLedAcc['hdId']; ?>|<?php echo $repLedAcc['headNm']; ?>|<?php echo $repLedAcc['sHdId']; ?>|<?php echo $repLedAcc['sHdNm']; ?>|<?php echo $repLedAcc['clientNm']; ?>"><?php echo $repLedAcc['clientNm']; ?></option>
							<?php 
						}
					}
						?>
				</select>


				<div class="form-group">
					<input type="date" name="gjDt" class="gjFldM form-control" value="<?php echo date('Y-m-d'); ?>" onkeydown="return false">
					<span class="error"><?php echo $date; ?></span>
				</div>

				<div class="form-group">
					<input type="text" list="accNm" name="accNm" id="accNmDet" class="gjFldL form-control" autofocus="autofocus" 
					onclick="this.select();">
				
				
					<datalist id="accNm">
						<?php
						foreach ($ClientDt as $data){
							?>
							<option value="<?php echo $data['id']; ?>|<?php echo $data['clientNm']; ?>|<?php echo $data['cityId']; ?>|<?php echo $data['cityNm']; ?>|<?php echo $data['hdId']; ?>|<?php echo $data['headNm']; ?>|<?php echo $data['sHdId']; ?>|<?php echo $data['sHdNm']; ?>|<?php echo $data['busNm']; ?>">
								<?php echo $data['clientNm']; ?> - <?php echo $data['busNm']; ?> - <?php echo $data['cnicNo']; ?> - <?php echo $data['cityNm']; ?>
								</option>
							<?php
						}
						?>
						</datalist>
					<span class="error"><?php echo $account; ?></span>
				</div>

				<div class="form-group">
					<select name="fTp" class="gjFldM form-control">
					<option value="">Fees Type</option>
					<option disabled="disabled">-------------------------------------------</option>
					<?php 
					if($vFeeTp){
						foreach($vFeeTp as $vFeeData){
					?>
					<option value="<?php echo $vFeeData['id']; ?>|<?php echo $vFeeData['feeTp']; ?>">
						<?php echo $vFeeData['feeTp']; ?></option>
					<?php }} ?>
					</select>
					<div class="invalid-feedback"><?php echo $fee_type; ?></div>
				</div>

				<div class="form-group">
					<select name="fYr" class="gjFld form-control" dir="rtl">
						<option>Year</option>
						<?php
						$txyear = 2000;
						for($i = $txyear; $i <= 2050; $i++){
						?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					</select>
					
					<div class="invalid-feedback"><?php echo $fee_year; ?></div>
				</div>

				<div class="form-group">
					<input type="text" name="desc" placeholder="Description" class="gjFldL form-control" value="<?php echo $desc; ?>">
				</div>

				<div class="form-group">
					<input type="number" name="dr" placeholder="Debit" dir="rtl" class="gjFld form-control" value="<?php echo $dr; ?>">
				</div>

				<div class="form-group">
					<input type="number" name="cr" placeholder="Credit" dir="rtl" class="gjFld form-control" value="<?php echo $cr; ?>">
				</div>
					<button type="submit" name ="addGj" value="Add" class="gjFld btn btn-primary">Add</button>
			</form>
			<div class="rowGap">&nbsp;</div>
			<?php
			}

			$vGjEnt = $ContObj->vGjEnt();
			if($vGjEnt){
				?>

					<div style="width: 100%; overflow-x: auto;">
					<table style="width: 100%;" class="table table-striped">

						<tr>
							<th>Account Name</th>
							<th>Trans. Date & Time</th>
							<th>Bus. Name</th>
							<th>City</th>
							<th>Fees Type</th>
							<th>Fees Year</th>
							<th>Description</th>
							<th>Debit</th>
							<th>Credit</th>
							<th>Action</th>
						</tr>

						<?php
						foreach ($vGjEnt as $data) {
							?>
							<tr><td><?php echo $data['clientNm']; ?></td><td><?php echo $data['gjDt'].' '.$data['gjTm']; ?></td><td><?php echo $data['busNm']; ?></td><td><?php echo $data['cityNm']; ?></td><td><?php echo $data['feeTp']; ?></td><td><?php echo $data['feeYr']; ?></td><td><?php echo $data['description']; ?></td><td><?php echo number_format($data['drAmt'],0); ?></td><td><?php echo number_format($data['crAmt'],0); ?></td>
								<td>
									<?php echo "
									<a href='index.php?page=gjEntUpd&gjEid=".$data['id']."' id='edit'>
							<i class='fa fa-edit fa-lg fa-fw'></i></a>"; 
							?>
							</td>
							</tr>
							<?php
						}
						$totDrCr = $ContObj->totDrCrgj();
						foreach ($totDrCr as $DrCr) {
						$gjCurBl = ($DrCr['drAmt']-$DrCr['crAmt']);	
						?>
						<tr><th colspan="7" style="text-align: center;">Total Amount</th><th><?php echo number_format($DrCr['drAmt'],0); ?></th><th><?php echo number_format($DrCr['crAmt'],0); ?></th><th></th></tr>
						<?php } ?>
					</table>
				</div>
					<div id="repPrevBal" style="padding: 5px; margin-top: 5px;">Your Current Balance is: <?php echo (number_format($gjPrBl+$gjCurBl,0)); ?></div>
				</div>
				<?php
			}

			// echo '<pre>';
		  	// print_r($ContObj->$messages); die();
			?>

		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>