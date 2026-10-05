<main id="main" class="main">

<div class="pagetitle">
  <h1>Update General Journal Entry
</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Update General Journal Entry
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
        <div class="card">
          <div class="card-body">
			
		  
		  <?php
if(isset($_GET['gjEid'])){
//include("./autoLoad.php");
//include(realpath(__DIR__.'/..')."../autoLoad.php");
$ContObj = new Controller();
	$gjEid = $_GET['gjEid'];
	$gjEidDt = $ContObj->modiGjEnt($gjEid);
	
	// Grab Accounts Data
	//$ClientDt = $ContObj->viewClints();
	$ClientDt = $ContObj->viewGjClients();
	// Grabbing Fees Type
	$vFeeTp = $ContObj->viewFeeTp();
	$repLedAccs = $ContObj->repLedAccs();
	// echo "<pre>";
	// print_r($gjEidDt);
	// echo "</pre>";
	foreach ($gjEidDt as $gjEdt) {
?>

<div style="text-align: center; font-weight: bold;"><?php echo date('l jS F Y'); ?></div>

<form action="index.php?page=gjEntUpd&gjEid=<?php echo $_GET['gjEid']; ?>" method="post" class="form-inline"  style="text-align: center;">

	<div class="form-group">
		<!-- HIDDEN Account of Representative -->
		<select name="repLedAcc" hidden="true" class="form-control">
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
	</div>

	<div class="form-group">
		<input type="date" name="gjDt" class="gjFldM form-control" value="<?php echo $gjEdt['gjDt']; ?>" onkeydown="return false">
	</div>


	<div class="form-group">
		<input type="text" list="accDt" name="accDet" class="gjFldL form-control" autofocus="autofocus" 
		onclick="this.select();">
		<datalist id="accDt">
		<?php
		foreach ($ClientDt as $data) {
			?>
			<option value="<?php echo $data['id']; ?>|<?php echo $data['clientNm']; ?>|<?php echo $data['cityId']; ?>|<?php echo $data['cityNm']; ?>|<?php echo $data['busNm']; ?>|<?php echo $data['hdId']; ?>|<?php echo $data['headNm']; ?>|<?php echo $data['sHdId']; ?>|<?php echo $data['sHdNm']; ?>">
				<?php echo $data['clientNm']; ?> - <?php echo $data['busNm']; ?> - <?php echo $data['cnicNo']; ?> - <?php echo $data['cityNm']; ?>
				</option>
			<?php
		}
			?>

		</datalist>
	</div>
<!-- 	<select name="accDet" class="gjFldL">
		<option value="">Select an Account</option>
		<option disabled="disabled">-------------------------------------------</option>
		<?php
		foreach ($ClientDt as $AccData) {
			?>
			<option <?php if($gjEdt['clientId'] == $AccData['id']){?> selected="selected" <?php } ?> value="<?php echo $AccData['id']; ?>|<?php echo $AccData['clientNm']; ?>|<?php echo $AccData['cityId']; ?>|<?php echo $AccData['cityNm']; ?>">
				<?php echo $AccData['clientNm']; ?> - <?php echo $AccData['busNm']; ?> - <?php echo $AccData['cnicNo']; ?> - <?php echo $AccData['cityNm']; ?></option>
			<?php
		}
			?>
		</select> -->

		<div class="form-group">
			<select name="fTp" class="gjFldM form-control">
			<option value="">Fees Type</option>
			<option disabled="disabled">-------------------------------------------</option>
			<?php
			if($vFeeTp){
				foreach($vFeeTp as $vFeeData){
			?>
				<option <?php if($gjEdt['feeTpId'] == $vFeeData['id']){?> selected="selected" <?php } ?> value="<?php echo $vFeeData['id']; ?>|<?php echo $vFeeData['feeTp']; ?>">
					<?php echo $vFeeData['feeTp']; ?></option>
			<?php }} ?>
			</select>
		</div>

		<div class="form-group">
			<select name="fYr" class="gjFld form-control" dir="rtl">
				<option>Year</option>
				<?php
				$txyear = 2000;
				for($i = $txyear; $i <= 2050; $i++){
				?>
					<option <?php if($gjEdt['feeYr'] == $i){ ?> selected="selected" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<input type="text" name="desc" placeholder="Description" class="gjFldL form-control" value="<?php echo $gjEdt['description']; ?>">
		</div>
		<div class="form-group">
			<input type="number" name="dr" placeholder="Debit" dir="rtl" class="gjFld form-control" value="<?php echo $gjEdt['drAmt']; ?>">
		</div>
		<div class="form-group">
			<input type="number" name="cr" placeholder="Credit" dir="rtl" class="gjFld form-control" value="<?php echo $gjEdt['crAmt']; ?>">
		</div>
	<?php } ?>
	<div class="form-group">
		<input type="submit" name ="addGj" value="Update" class="gjFld btn btn-primary">
	</div>
</form>

<?php
if(isset($_POST['desc'])){

		// Sending Representative information for saving in Database in order to recongnize transaction
		$repDet = explode("_",$_SESSION['taxmagrep']);
		$repId = $repDet[0];
		$repNm = $repDet[1];

// Sending Form Data for Updation
$ContObj->gjEntUpd($gjEid,$_POST['gjDt'],$_POST['accDet'],$_POST['fTp'],$_POST['fYr'],$_POST['desc'],$_POST['dr'],$_POST['cr'],$_POST['repLedAcc']);
}
}
?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>



