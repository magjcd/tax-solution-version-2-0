<main id="main" class="main">

<div class="pagetitle">
  <h1>Fees Type</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Fees Type</li>
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
			if(isset($_POST['feeTp'])){
				$ContObj->feeTp($_POST['feeTp']);
			}
			// Creating Object for Listing Status
			$vFeeTp = $ContObj->viewFeeTp();
			?>

			<form action="index?page=feeType" method="post" class="form-inline">
				<div class="form-group">
					<input type="text" name="feeTp" class="form-control" placeholder="Fees Type">
				</div>

				<div class="form-group">
					<input type="submit" name="" class="btn btn-primary" value="Add">
				</div>
			</form>

			<table id="users" class="table table-striped">
			<tr><th>Fees Type</th><th>Action</th></tr>	
			<?php
			// if Data is available inside $RepCntObj-> Object for listing of Status
			if($vFeeTp){
			if(isset($_SESSION['admin'])){
				foreach ($vFeeTp as $data) {

					echo "<tr><td>".$data['feeTp']."</td><td style='width: 30px;'>
					<a href='index?page=updFeeType&eid=".$data['id']."&eNm=".$data['feeTp']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
				}
			}else{
				foreach ($vFeeTp as $data) {
					echo "<tr><td>".$data['feeTp']."</td><td style='width: 30px;'></td></tr>";
				}
			}
			?>
		</table>
		</div>
		<?php
		}else{
			echo "<div class='success-msg'>No Fees Type is Available</div>";
		}
		?>

		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>