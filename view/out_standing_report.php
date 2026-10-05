<?php
$ContObj->adminLogChk();
?>
<main id="main" class="main">

	<div class="pagetitle">
		<h1 class="main-text-color">City Wise OutStanding Amount Report</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index">Home</a></li>
				<li class="breadcrumb-item active">City Wise OutStanding Amount Report</li>
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
                            <div class="form-group">
                                <form action="index.php?page=out_standing_report" method="post">
                                    <div class="mt3">
                                    <select class="form-control" name="city" id="city">
                                            <option value="">Select a City</option>
                                            <option disabled>------------------------</option>
                                                <?php
                                                $cities = $ContObj->viewCity();
                                                foreach($cities as $city){
                                                    ?>
                                                    <option value="<?php echo $city['id']; ?>|<?php echo $city['cityNm']; ?>"><?php echo $city['cityNm']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="" style="">

                                        <!-- <input type="date" class="form-control" name="from" value="<?php //echo date('Y-m-01') ?>">
                                        <span id="from" class="text-danger"></span> -->
                                        <input type="date" class="form-control" name="to" value="<?php echo date('Y-m-d') ?>">
                                        <span id="to" class="text-danger"></span>

                                    </div>
                                    <div>
                                        <button class="btn btn-primary" name="city_report">Generate Report</button>
                                    </div>

                                    </form>
                            </div>
                            <?php
                            if(isset($_POST['city']) && !empty($_POST['city'])){
                                $city_arr = explode('|',$_POST['city']);
                                $city_id = $city_arr[0];
                                $city_name = $city_arr[1];
                                    echo "<div id='repFinActNm'><b>".strtoupper($city_name)."</b></div>";
                                    
                                    $city_clients = $ContObj->GetCityClient($city_id);
                                    // $fd = $_POST['from'];
                                    $td = $_POST['to'];
                                    $city_balance = $ContObj->CityTotalOutStandingAmount($city_id,$td);
                                    // echo $city_balance['city_bl'];
                                    ?>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th>CNIC No.</th>
                                                <th>Business Name</th>
                                                <th>Cell Phone No.</th>
                                                <th style="text-align: right;">Outtanding Amount <a href="index?page=out_standing_report_pdf&data=<?php echo $city_id; ?>|<?php echo $city_name; ?>|<?php echo $td; ?>" style='color: red;' accesskey='p' id='pdfPrn'><i class='fa fa-file-pdf fa-lg fa-fw'></i></a></th>
                                            </tr>
                                        </thead>
                                        
                                        <?php
                                    if(!empty($city_clients)){
                                        foreach($city_clients as $clientid){
                                            
                                            $client_data = $ContObj->GetCityClientData($clientid->id,$td);
                                            if(array_key_exists('errors', $client_data)){
                                                
                                                ?>
                                                <script>
                                                    $('#to').text(<?php echo $client_data['errors']['to']; ?>)
                                                    $('.table-striped').text('');
                                                    $('#repFinActNm').text('');
                                                    </script>
                                                <?php
                                                die();
                                                
                                            }
                                            foreach($client_data as $client){
                                                // echo '<pre>';
                                                // print_r($client_data);
                                                if($client->cl_bal > 0){
                                                    echo '
                                                    <tbody>
                                                    <tr>
                                                    <td>'.$client->clientNm.'</td>
                                                    <td>'.$client->cnicNo.'</td>
                                                    <td>'.$client->busNm.'</td>
                                                    <td>'.$client->cellNo1.'</td>
                                                    <td style="text-align: right;">'.number_format($client->cl_bal,2).'</td>
                                                    </tr>
                                                    </tbody>';
                                                }
                                            }

                                        }
                                    }else{
                                        echo '
                                            <tbody>
                                            <tr>
                                            <td rowspan="2" style="text-align: center;">No Cient found in this City</td>
                                            </tr>
                                            </tbody>';
                                    }
                                    echo '</table>';
                                }
                            ?>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </section>
</main>