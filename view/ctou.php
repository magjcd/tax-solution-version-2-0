<main id="main" class="main">

<div class="pagetitle">
  <h1>Tax Office Unit</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Tax Office Unit</li>
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
			if(isset($_POST['touNm'])){
				$ContObj->ctou($_POST['touNm']);
			}
			// Creating Object for Listing TOUs
			$vTous = $ContObj->viewCtous();
			?>
			
			<form action="index.php?page=ctou" method="post" class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="touNm" placeholder="Tax Office Unit Name">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Add">
				</div>
			</form>


			<?php
			// if Data is available inside $RepCntObj-> Object for listing of RTOs
			if($vTous){
			?>
			<!-- <div style="overflow-x: hidden; overflow-y: scroll; "> -->
			<table id="users" class="table table-striped">
			<tr><th>Tax Off. Unit Name</th><th>Action</th></tr>	
			<?php
			if(isset($_SESSION['admin'])){
				foreach ($vTous as $data) {
					echo "<tr><td>".$data['taxOffName']."</td><td style='width: 30px;'>
					<a href='index?page=updTou&eid=".$data['id']."&eNm=".$data['taxOffName']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
				}
			}else{
				foreach ($vTous as $data) {
					echo "<tr><td>".$data['taxOffName']."</td><td style='width: 30px;'></td></tr>";
				}
			}
			?>
			</table>
			<!-- </div> -->
			<?php
			}else{
				echo "<div class='success-msg'>No Tax Office Unit is Available</div>";
			}
			?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>