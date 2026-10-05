<main id="main" class="main">

<div class="pagetitle">
  <h1>General Journal CSV</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index">Home</a></li>
      <li class="breadcrumb-item active">Client CSV</li>
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

            <form method="POST" action="index.php?page=clientCSV" enctype = "multipart/form-data" class="form-inline">

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
                    <th>Bus. Stat. ID</th>
                    <th>Bus. Status</th>
                    <th>Name</th>
                    <th>CNIC</th>
                    <th>City Id</th>
                    <th>City Name</th>
                    <th>Business Name</th>
                    </thead>
                    </tr>';
                    echo '<tbody>';
                    $sql = '';
                    $cnt = 0;
                    while($data = fgetcsv($handle, 1000, ',')){
                      echo '<tr>';
                      echo '<td>'.$data[0].'</td>';  
                      echo '<td>'.$data[1].'</td>';
                      echo '<td>'.$data[2].'</td>';
                      echo '<td>'.$data[3].'</td>';
                      echo '<td>'.$data[4].'</td>';
                      echo '<td>'.$data[5].'</td>';
                      echo '<td>'.$data[6].'</td>';
                      echo '<td>'.$data[7].'</td>';
                      echo '<tr>';

                      // echo '<br />';  
                      // $accNm = null;
                        // echo '<tr>
                        // <tbody>
                        // <td>'.$data[0].'</td>
                        
                        
                        // </tbody>
                        // </tr>';
                        
                
                        $busStatusId = $data[0];
                        $busStatus = $data[1];
                        $cnicNo = $data[2];
                        $bussName = $data[3];
                        $cName = $data[4];
                        $cellNo1 = $data[5];
                        $cellNo2 = $data[6];
                        $ptclNo = $data[7];
                        $cCity = $data[8];
                        $ctId = $data[9];
                        
                        $ContObj->nCSVClient($busStatusId,$busStatus, $cnicNo, $bussName, $cName, $cellNo1, $cellNo2, $ptclNo, $cCity, $ctId);
                        $cnt++;
                    }
                    echo '</tbody>';
                    echo '</table>';
                    fclose($handle);
                }
                // echo '<pre>';
                // print_r($new_array[0]);
            }
            ?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
</main>