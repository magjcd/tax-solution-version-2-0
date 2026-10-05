<?php
$ContObj->adminLogChk();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap' rel='stylesheet'>
</head>
<body>

</body>
</html>
<?php 
if(isset($_GET['data'])){
    $data = $_GET['data'];

    $dataArr = explode('|',$data);
    echo $city_id = $dataArr[0];
    $city_nm = $dataArr[1];
    $td = $dataArr[2];
    
    $city_clients = $ContObj->GetCityClient($city_id);
    $repDet = explode("_",$_SESSION['taxmagrep']);
    $repId = $repDet[0];
    $repNm = $repDet[1];

    $firm_details = $ContObj->FirmDetails();

    echo '<pre>';
    print_r($firm_details);

    if($city_clients){		
        $html = "<div style='width: 100%;font-family: Josefin Sans, sans-Serif;'>
        <span style='font-size: 18px; font-weight: bold;'>$firm_details</span><br />
        <span style='font-size: 10px;'></span><br /><br />
        <div style='width: 200px; margin: auto; padding: 10px; font-size: 15px; font-weight: bold; font-variant: small-caps; text-align: center; border: 1px dotted #000;'>Out Standing Amount</div>
        </div>";
        $html .= '<div style="width: 100%; overflow-x: auto;">
            <table style="width: 100%;font-family: Josefin Sans, sans-Serif;">
            <tr><td colspan="4" style="font-size: 10px;width: 200px; margin: auto; padding: 10px; text-align: center;">till '.$td.'
            </td></tr>
            <tr>
            <td colspan="5" style="text-align: center;">
            <div style="width: 200px; margin: auto; padding: 10px; font-size: 15px; font-weight: bold; font-variant: small-caps; text-align: center;">'.$city_nm.'</div><hr />
            </td>
            </tr>
            <tr style="border-bottom: 3px dotted #000;">
                    
            <th style="font-size: 10px; text-align: left;">Client Name</th>
            <th style="font-size: 10px; text-align: left;">CNIC No.</th>
            <th style="font-size: 10px; text-align: left;">Business Name</th>
            <th style="font-size: 10px; text-align: left;">Cell Phone No.</th>
            <th style="font-size: 10px; text-align: left;">Amount</th>

            </tr>';

            foreach($city_clients as $clientid){
                $client_data = $ContObj->GetCityClientData($clientid->id,$td);
                foreach($client_data as $client){
                    if($client->cl_bal > 0){
                        $html .= "<tr style='font-size: 9px; border-bottom: 1px dotted #000;'>
                        <td style='font-size: 9px;'>".$client->clientNm."</td>
                        <td style='font-size: 9px;'>".$client->cnicNo."</td>
                        <td style='font-size: 9px;'>".$client->busNm."</td>
                        <td style='font-size: 9px;'>".$client->cellNo1."</td>
                        <td style='font-size: 9px;'>".$client->cl_bal."</td>
                        </tr>";
                    }
                }
                
            }

                
                // $totDrCr = $ContObj->totDrCrRTDt($rTrkPrnDt,$tp);
                // foreach ($totDrCr as $DrCr) {
                // $gjCurBl = ($DrCr['drAmt']-$DrCr['crAmt']);	
                
                // $html .= "<tr><th colspan='6' style='text-align: center;font-size: 10px;'>Total Amount</th>
                // 	<th style='text-align: right;font-size: 10px; border-top: 1px solid #000; border-bottom: 3px double #000;'>".number_format($DrCr['drAmt'],0)."</th>
                // 	<th style='text-align: right;font-size: 10px;'></th><th></th></tr>";
    } 
                $html .= "</table>";
                $html .= "<hr /><p style='text-align: center; font-size: 9px;font-family: Josefin Sans, sans-Serif;'>Copy Right &copy;".date('Y')."-2021 - Design & Developed by magTech | +92 333 244 5283</p>";
                echo $html;
                ?>
            </div>
        <br /><br /><br />
            <?php


    include('vendor/autoload.php');
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->debug = true;
    $mpdf->WriteHTML($html);
    $file = $repNm.' '.date('d_m_Y_h_i_s_A').'.pdf';
    ob_clean();
    $mpdf->Output($file,'I');
}
?>
