<main id="main" class="main">

<div class="pagetitle">
  <h1>Update Representative</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Update Representative</li>
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
			if(isset($_GET['eid'])){
				$datas = $ContObj->repDet($_GET['eid']);
				$eid = $_GET['eid'];
				
				if(isset($_POST['updUser'])){
					$ContObj->updUser($eid,$_POST['updUN'],$_POST['updEm'],$_POST['updFn'],
						$_POST['updRole']);
				}

				if($datas){
				foreach($datas as $data){
					?>
					<form action="index?page=updUser&eid=<?php echo $_GET['eid']; ?>" method="post" class="form-group">

					<div class="form-group">
						<input type="text" class="form-control" placeholder="User Name" name="updUN" value="<?php echo $data['userName']; ?>">
					</div>

					<div class="form-group">
						<input type="email" class="form-control" name="updEm" placeholder="email@domain.com" value="<?php echo $data['userEmail']; ?>">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="updFn" placeholder="Full Name" value="<?php echo $data['name']; ?>">
					</div>

					<div class="form-group">
						<select name="updRole" class="form-control">
							<option value="<?php echo 'taxmagrep'; ?>"><?php echo 'Representative'; ?>
							<option value="<?php echo 'taxmagdir'; ?>"><?php echo 'Director'; ?>
								
							</option>
						</select>

						<div class="form-group">
						<button type="submit" name="updUser" class="btn btn-primary">Update</button>
						<input type="reset" name="reset" value="Reset" class="btn btn-danger">
						</form>
						<?php
					}
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