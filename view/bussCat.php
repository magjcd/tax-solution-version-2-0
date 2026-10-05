<main id="main" class="main">

<div class="pagetitle">
  <h1>Business Category</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Business Category</li>
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
			if(isset($_POST['bussCat'])){
				$ContObj->busCat($_POST['bussCat']);
			}
			// Creating Object for Listing Status
			$vBussCat = $ContObj->viewBussCat();
			?>

		  	<form action="index.php?page=bussCat" method="post" class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="bussCat" placeholder="Business Category">
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Add">
				</div>
			</form>
			
			
			<?php
			// if Data is available inside $RepCntObj-> Object for listing of Status
			if($vBussCat){
			?>
			<table id="users" class="table table-striped">
			<tr><th>Bussiness Category</th><th>Action</th></tr>	
			<?php
			if(isset($_SESSION['admin'])){
				foreach ($vBussCat as $data) {

					echo "<tr><td>".$data['busCatNm']."</td><td style='width: 30px;'>
					<a href='index?page=updBussCat&eid=".$data['id']."&eNm=".$data['busCatNm']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
				}
			}else{
				foreach ($vBussCat as $data) {
					echo "<tr><td>".$data['busCatNm']."</td><td style='width: 30px;'></td></tr>";
				}
			}
			?>
			</table>
			<?php
			}else{
				echo "<div class='success-msg'>No Business Category is Available</div>";
			}
			?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>