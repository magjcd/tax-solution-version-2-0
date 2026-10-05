<main id="main" class="main">

<div class="pagetitle">
  <h1>Linked Account</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Linked Account</li>
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
			if(isset($_POST['lnkAcc'])){
				$ContObj->lnkAcc($_POST['lnkAcc']);
			}
			// Creating Object for Listing Link Account
			$vLnkAcc = $ContObj->viewLnkAcc();
			?>

		  	<form action="index.php?page=lnkAcc" method="post" class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="lnkAcc" placeholder="Linked Account Name">
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Add">
				</div>
			</form>
			
			<?php
			// if Data is available inside $RepCntObj-> Object for listing of Linked Accounts
			if($vLnkAcc){
				?>

			<table id="users" class="table table-striped">
			<tr><th>Linked Accounts</th><th>Action</th></tr>	
			<?php
			if(isset($_SESSION['admin'])){
				foreach ($vLnkAcc as $data) {

					echo "<tr><td>".$data['linkNm']."</td><td style='width: 30px;'>
					<a href='index.php?page=updLnkAcc&eid=".$data['id']."&eNm=".$data['linkNm']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";
				}
			}else{
				foreach ($vLnkAcc as $data) {
					echo "<tr><td>".$data['linkNm']."</td><td style='width: 30px;'></td></tr>";
				}
			}
			?>
			</table>
			<?php
			}else{
				echo "<div class='success-msg'>No Linked Account is Available</div>";
			}
			?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>