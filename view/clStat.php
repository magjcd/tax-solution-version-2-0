<main id="main" class="main">

<div class="pagetitle">
  <h1>Status List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Status List</li>
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
			if(isset($_POST['cStatus'])){
				$ContObj->cStatus($_POST['cStatus']);
			}
			// Creating Object for Listing Status
			$vStatus = $ContObj->viewStatus();
			?>
			
			<form action="index?page=clStat" method="post" class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="cStatus" placeholder="Indivisual"><br />
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Add">
				</div>
			</form>
			
			<table id="users" class="table table-striped">
			<tr><th>Status Name</th><th>Action</th></tr>	
			<?php
			// if Data is available inside $RepCntObj-> Object for listing of Status
			if($vStatus){
			if(isset($_SESSION['admin'])){
				foreach ($vStatus as $data) {

					echo "<tr><td>".$data['statNm']."</td><td style='width: 30px;'>
					<a href='index.php?page=updClStat&eid=".$data['id']."&eNm=".$data['statNm']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
				}
			}else{
				foreach ($vStatus as $data) {
					echo "<tr><td>".$data['statNm']."</td><td style='width: 30px;'></td></tr>";
				}
			}
			?>
			</table>
			</div>
			<?php
			}else{
				echo "<div class='success-msg'>No Status is Available</div>";
			}
			?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>