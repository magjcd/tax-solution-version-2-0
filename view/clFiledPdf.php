<?php
try{
include('../autoLoad.php');
$ContObj = new Controller();
//$noClFiled = $ContObj->noClFiled();
$noClFiled = $ContObj->noClFiled($_GET['taxYr']);
// echo '<pre>';
// print_r($noClFiled);


$html = '<table style="width: 100%;font-family: Josefin Sans, sans-Serif;">
<tr><td colspan="6" style="text-align: center; font-size: 20px; background: orange; color: #000;line-height: 50px;"><p>Return Filing Status</p></td></tr>
<tr><td colspan="6" style="text-align: center; font-size: 12px;"><p>for Year '.$_GET['taxYr'].'</p>
<hr /></td></tr>
<tr style="line-height: 50px; background: orange; color: #000;">
<th style="width: 25%;line-height: 20px;  font-size: 12px;">Town Name</th>
<th style="text-align: right;width: 15%;  font-size: 12px;">Cases</th>
<th style="text-align: right;width: 15%;  font-size: 12px;">Cases Filed</th>
<th style="text-align: right;width: 15%;  font-size: 12px;">Achieved %</th>
<th style="text-align: right;width: 15%;  font-size: 12px;">Cases Rem</th>
<th style="text-align: right;width: 15%;  font-size: 12px;">Remaning %</th>
</tr>';

foreach($noClFiled as $noClFiledDet){
	$ratio = (($noClFiledDet['NoLedCases'] / $noClFiledDet['NoCases']) * 100);
	$pending = ($noClFiledDet['NoCases'] - $noClFiledDet['NoLedCases']);
	$rem = (($pending / $noClFiledDet['NoCases']) * 100);
	$html .= '<tr>
	<td style="font-size: 10px;">'.$noClFiledDet['cityNm'].'</td>
	<td style="text-align: right; font-size: 10px;">'.$noClFiledDet['NoCases'].'</td>
	<td style="text-align: right; font-size: 10px;">'.$noClFiledDet['NoLedCases'].'</td>
	<td style="text-align: right; font-size: 10px;">'.number_format($ratio,2).'%</td>
	<td style="text-align: right; font-size: 10px;">'.$pending.'</td>
	<td style="text-align: right; font-size: 10px;">'.number_format($rem,2).'%</td></tr>';
}
$html .= '</table>';
	$html .= "<hr /><p style='line-height: 50px; text-align: center; font-size: 9px;font-family: Josefin Sans, sans-Serif; background: orange; color: #000;'>Copy Right &copy;".date('Y')."-2021 - Design & Developed by magTech | +92 315 317 0285</p>";
//echo $html;
include('vendor/autoload.php');
$custom_tmp_dir = __DIR__ . '/tmp';
// Create the folder automatically if it doesn't exist
if (!is_dir($custom_tmp_dir)) {
    mkdir($custom_tmp_dir, 0777, true);
}
$mpdf = new \Mpdf\Mpdf([
    'tempDir' => $custom_tmp_dir
]);
$mpdf->debug = true;
$mpdf->WriteHTML($html);
//$file = './pdf/'.$userNm.' '.date('d_m_Y_h_i_s_A').'.pdf';
$file = 'RFS_'.date('d_m_Y_h_i_s_A').'.pdf';
// ob_clean();
$mpdf->Output($file,'D');	
} catch (\Mpdf\MpdfException $e) {
    echo "mPDF Exception caught: " . $e->getMessage();
} catch (\Error $e) {
    echo "PHP Fatal Error caught: " . $e->getMessage();
} catch (\Exception $e) {
    echo "General Exception caught: " . $e->getMessage();
}
// header('location: index?page=DWvRetTrk');
?>