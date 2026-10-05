<main id="main" class="main">

<div class="pagetitle">
  <h1>RTO</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">RTO</li>
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
			if(isset($_POST['rtoNm'])){
				$ContObj->rto($_POST['rtoNm']);
			}
			// Creating Object for Listing RTOs
			$vRtos = $ContObj->viewRtos();
			?>
			<form action="index.php?page=rto" method="post" class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="rtoNm" placeholder="RTO">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Add">
				</div>
			</form>	
			
			<?php
			// if Data is available inside $RepCntObj-> Object for listing of RTOs
			if($vRtos){
			?>
			<table id="users" class="table table-striped">
			<tr><th>RTO Name</th><th>Action</th></tr>	
			<?php
			if(isset($_SESSION['admin'])){
				foreach ($vRtos as $data) {

					echo "<tr><td>".$data['rtoName']."</td><td style='width: 30px;'>
					<a href='index?page=updRto&eid=".$data['id']."&eNm=".$data['rtoName']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
				}
			}else{
				foreach ($vRtos as $data) {
					echo "<tr><td>".$data['rtoName']."</td><td style='width: 30px;'></td></tr>";
				}
			}
			?>
			</table>
			<?php
			}else{
				echo "<div class='success-msg'>No RTO is Available</div>";
			}
			?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>
