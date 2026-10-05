<main id="main" class="main">

<div class="pagetitle">
  <h1>Branch office</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Branch office</li>
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
			if(isset($_POST['boNm'])){
				$ContObj->bo($_POST['boNm']);
			}
			// Creating Object for Listing Branch Offices
			$vBrOff = $ContObj->viewBrOff();
			?>

			<form action="index.php?page=bo" method="post" class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="boNm" placeholder="Branch Office">
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Add">
				</div>
				
			</form>

			<table id="users" class="table table-striped">
			<tr><th>Tax Off. Unit Name</th><th>Action</th></tr>	
			<?php
			// if Data is available inside $RepCntObj-> Object for listing of BOs
			if($vBrOff){
			if(isset($_SESSION['admin'])){
				foreach ($vBrOff as $data) {

					echo "<tr><td>".$data['brOffNm']."</td><td style='width: 30px;'>
					<a href='index.php?page=updBo&eid=".$data['id']."&eNm=".$data['brOffNm']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
				}
			}else{
				foreach ($vBrOff as $data) {
					echo "<tr><td>".$data['brOffNm']."</td><td style='width: 30px;'></td></tr>";
				}
			}
			?>
			</table>
			<?php
			}else{
				echo "<div class='success-msg'>No Branch Office is Available</div>";
			}
			?>
		  
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>