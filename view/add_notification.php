<main id="main" class="main">

<div class="pagetitle">
  <h1>Add Notification</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Add Notification</li>
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
			
			// Creating Object for Listing Add Notifications
			$ContObj->adminLogChk();
			$retTpDet = $ContObj->retTpData();
			// $listNotifications = $ContObj->listNotifications();
			?>

			<form action="index.php?page=add_notification" name="notification_form" method="post">
                
				<div class="form-group">
                    <label>Issuance Date</label>
					<input type="date" class="gjFldL form-control" name="notification_date" id="notification_date" value="<?php echo date('Y-m-d'); ?>" dir="rtl" >
					<span class="error" style="color: red;" id="error_notification_date"></span>
				</div>

                <div class="form-group">
                    <label>Last Date</label>
					<input type="date" class="gjFldL form-control" name="last_date" id="last_date" value="<?php echo date('Y-m-d'); ?>" dir="rtl" >
					<span class="error" style="color: red;" id="error_last_date"></span>
				</div>

				<div class="form-group">
                    <label>Notification Type</label>
					<select name="notification_type" id="notification_type" class="gjFldL form-control" autofocus="autofocus">
						<option value="">Select Notification Type</option>
						<option disabled="disabled">----------------------------</option>
						<?php
						if($retTpDet){
							foreach ($retTpDet as $retTpDet) {
								?>
								<option value="<?php echo $retTpDet['id']; ?>">
									<?php echo $retTpDet['feeTp']; ?>
								</option>
								<?php
							}
						}
						?>
					</select>
					<span class="error" style="color: red;" id="error_notification_type"></span>
				</div>

				<div class="form-group">
                    <label>Notification Text</label><br />
                    <textarea name="notification_text" id="notification_text" rows="10" cols="200" placeholder="Start writing your notification text here......."></textarea><br />
					<span class="error" style="color: red;" id="error_notification_text"></span>
                </div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" id="add_notification" value="Add Notification">
				</div>
				
			</form>
			<div id="list_notification"></div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>