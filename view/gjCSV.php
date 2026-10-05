<main id="main" class="main">

<div class="pagetitle">
  <h1>General Journal CSV</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">General Journal CSV</li>
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
            $repLedAccs = $ContObj->repLedAccs();
            // Sending Representative information for saving in Database in order to recongnize transaction
            // $repDet = explode("_",$_SESSION['taxmagadmin']);
            $repDet = null;
            if(isset($_SESSION['taxmagadmin'])){
                $repDet = explode("_",$_SESSION['taxmagadmin']);
            }elseif(isset($_SESSION['taxmagrep'])){
                $repDet = explode("_",$_SESSION['taxmagrep']);
            }elseif(isset($_SESSION['taxmagdir'])){
                $repDet = explode("_",$_SESSION['taxmagdir']);
            }
            ?>
            <div style="text-align: center; font-weight: bold;"><?php echo date('l jS F Y'); ?></div>

            <form method="POST" action="index.php?page=gjCSV" enctype = "multipart/form-data" class="form-inline">
                <!-- HIDDEN Account of Representative -->
                 <div class="form-group">
                     <select name="repLedAcc" class="form-control">
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
                     <input type="file" class="form-controrl" name="csvdata" />
                 </div>

                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">Pull & Save Data</button>
                 </div>
            </form>

            <?php

                if(isset($_FILES['csvdata']) && $_FILES['csvdata'] != null){
                $file_extension = explode('.',$_FILES['csvdata']['name']);
                if( $file_extension[1] != 'csv'){
                    echo 'Please, Select a CSV file';
                }else{
                    $handle = fopen($_FILES['csvdata']['tmp_name'],'r');
                    ?>
                    <?php
                    echo '<table class="table table-striped">
                    <tr>
                    <thead>
                    <th>Date</th>
                    <th>Account Name</th>
                    <th>Fee Type</th>
                    <th>Fee Year</th>
                    <th>Description</th>
                    <th>DR Amt</th>
                    <th>CR Amt</th>
                    <th>Rep. Id</th>
                    <th>Rep. Name</th>
                    </thead>
                    </tr>';
                    $sql = '';
                    $cnt = 0;
                    while($data = fgetcsv($handle)){
                        $accNm = null;
                        echo '<tr>
                        <tbody>
                        <td>'.$data[0].'</td>
                        <td>'.$data[1].'</td>
                        <td>'.$data[2].'</td>
                        <td>'.$data[3].'</td>
                        <td>'.$data[4].'</td>
                        <td>'.$data[5].'</td>
                        <td>'.$data[6].'</td>
                        <td>'.$data[7].'</td>
                        <td>'.$data[8].'</td>
                        </tbody>
                        </tr>';
                        
                        $clientDetails = $ContObj->clientDet($data[1]);
                        
                        $accNm = $clientDetails[0]['id'].'|';
                        $accNm .= $clientDetails[0]['clientNm'].'|';
                        $accNm .= $clientDetails[0]['cityId'].'|';
                        $accNm .= $clientDetails[0]['cityNm'].'|';
                        $accNm .= $clientDetails[0]['hdId'].'|';
                        $accNm .= $clientDetails[0]['headNm'].'|';
                        $accNm .= $clientDetails[0]['sHdId'].'|';
                        $accNm .= $clientDetails[0]['sHdNm'].'|';
                        $accNm .= $clientDetails[0]['busNm'];
                
                        $jdt = $data[0];
                        $ft = $data[2];
                        $fYr = $data[3];
                        $desc = $data[4];
                        $dr = $data[5];
                        $cr = $data[6];
                        
                        $repId = $data[7];
                        $repNm = $data[8];
                        $from = 'csv';
                        
                        $ContObj->nGj($jdt,$accNm,$ft,$fYr,$desc,$dr,$cr,$repId,$repNm,$_POST['repLedAcc'],$from);
                        $cnt++;
                    }
                    echo '</table>';
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