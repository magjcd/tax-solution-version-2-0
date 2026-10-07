<?php
try{
	include('../autoLoad.php');
	$ContObj = new Controller();
	$html = null;
	if (isset($_GET['taxYr']) && !empty($_GET['taxYr'])) {

		$noClFiled = $ContObj->noClFiled($_GET['taxYr'], $branch = 'yes');
		
		$html = "<div style='width: 100%;font-family: Josefin Sans, sans-Serif;'>
			<span style='font-size: 18px; font-weight: bold;'>SAWREVA</span><br />
			<span style='font-size: 10px;'>Tax Solution</span>";

		$html .= '<table style="width: 100%;font-family: Josefin Sans, sans-Serif;">
		<tr><td colspan="6" style="text-align: center; font-size: 20px; background: #000; color: goldenrod; line-height: 50px;"><p>Branch Wise Return Filing Status</p></td></tr>
		<tr><td colspan="6" style="text-align: center; background: #000; color: goldenrod;"><h3>Current Year '.$_GET['taxYr'].'</h3></td></tr>
		<tr>
		<th style="color: goldenrod; background: #000;">Branch Name</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Cases</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Cases Filed</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Ach %</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Cases Rem</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Rem %</th>
		</tr>';
		$tot_cases_no = 0;
		$tot_filed_no = 0;
		$tot_remaining_no = 0;
		foreach ($noClFiled as $noClFiledDet) {


			$ratio = (($noClFiledDet['NoLedCases'] / $noClFiledDet['NoCases']) * 100);
			$pending = ($noClFiledDet['NoCases'] - $noClFiledDet['NoLedCases']);
			$rem = (($pending / $noClFiledDet['NoCases']) * 100);
			$html .= '<tr>
			<td>' . (($noClFiledDet['boNm'] != "") ? $noClFiledDet['boNm'] : '<span style="color: red; font-weight: bolder; ">Not Assigned</span>') . '</td>
			<td style="text-align: right;">' . $noClFiledDet['NoCases'] . '</td>
			<td style="text-align: right;">' . $noClFiledDet['NoLedCases'] . '</td>
			<td style="text-align: right;">' . number_format($ratio, 2) . '%</td>
			<td style="text-align: right;">' . $pending . '</td>
			<td style="text-align: right;">' . number_format($rem, 2) . '%</td></tr>';
			$tot_cases_no += $noClFiledDet['NoCases'];
			$tot_filed_no += $noClFiledDet['NoLedCases'];
			$tot_remaining_no += $pending;
		}
		
		$html .= '<tr style="color: goldenrod; background: #000;">
		<th style="color: goldenrod; background: #000;">Total no. of Clients Filed</th>
		<th style="color: goldenrod; background: #000;">'.$tot_cases_no.'</th>
		<th style="color: goldenrod; background: #000;">'.$tot_filed_no.'</th>
		<th style="color: goldenrod; background: #000;">&nbsp;</th>
		<th style="color: goldenrod; background: #000;">'.$tot_remaining_no.'</th>
		<th style="color: goldenrod; background: #000;">&nbsp;</th>

		</tr>';
		$html .= '</table>';

		// echo $html;

		// Previous Year
		$noClFiledPrevYear = $ContObj->noClFiledPrevYear($_GET['taxYr']);
		
		$html .= '<table style="width: 100%;font-family: Josefin Sans, sans-Serif;">
		<tr><td colspan="5" style="text-align: center;"></td><td><a href="view/clFiledPdf.php?taxYr=' . $_GET['taxYr'] . '"><i class="fa fa-file-pdf fa-lg fa-fw"></i></a></td></tr>
		<tr><td colspan="6" style="text-align: center; background-color: #000; color: goldenrod;"><h3>Previous Year ' . ($_GET['taxYr'] - 1) . '</h3></td></tr>
		<tr>
		<th style="color: goldenrod; background: #000;">Branch Name</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Cases</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Cases Filed</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Ach %</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Cases Rem</th>
		<th style="text-align: right; color: goldenrod; background: #000;">Rem %</th>
		</tr>';
		$tot_cases_no = 0;
		$tot_filed_no = 0;
		$tot_remaining_no = 0;
		foreach ($noClFiledPrevYear as $noClFiledPrevYearDet) {


			$ratio = (($noClFiledPrevYearDet['NoLedCases'] / $noClFiledPrevYearDet['NoCases']) * 100);
			$pending = ($noClFiledPrevYearDet['NoCases'] - $noClFiledPrevYearDet['NoLedCases']);
			$rem = (($pending / $noClFiledPrevYearDet['NoCases']) * 100);
			$html .= '<tr>
			<td>' . (($noClFiledPrevYearDet['boNm'] != "") ? $noClFiledPrevYearDet['boNm'] : '<span style="color: red; font-weight: bolder; ">Not Assigned</span>') . '</td>
			<td style="text-align: right;">' . $noClFiledPrevYearDet['NoCases'] . '</td>
			<td style="text-align: right;">' . $noClFiledPrevYearDet['NoLedCases'] . '</td>
			<td style="text-align: right;">' . number_format($ratio, 2) . '%</td>
			<td style="text-align: right;">' . $pending . '</td>
			<td style="text-align: right;">' . number_format($rem, 2) . '%</td></tr>';
			$tot_cases_no += $noClFiledPrevYearDet['NoCases'];
			$tot_filed_no += $noClFiledPrevYearDet['NoLedCases'];
			$tot_remaining_no += $pending;
		}
		
		$html .= '<tr style="color: goldenrod; background: #000;">
		<th style="color: goldenrod; background: #000;">Total no. of Clients Filed</th>
		<th style="color: goldenrod; background: #000;">'.$tot_cases_no.'</th>
		<th style="color: goldenrod; background: #000;">'.$tot_filed_no.'</th>
		<th style="color: goldenrod; background: #000;">&nbsp;</th>
		<th style="color: goldenrod; background: #000;">'.$tot_remaining_no.'</th>
		<th style="color: goldenrod; background: #000;">&nbsp;</th>

		</tr>';
		$html .= '</table>';
		$html .= "<hr /><p style='line-height: 50px; text-align: center; font-size: 9px;font-family: Josefin Sans, sans-Serif; background: #000; color: goldenrod;'>Copy Right &copy;".date('Y')."-2021 - Design & Developed by magTech | +92 315 317 0285</p>";

		// echo $html;
	}
	include('vendor/autoload.php');
	$custom_tmp_dir = __DIR__ . '/tmp';
	// Create the folder automatically if it doesn't exist
	if (!is_dir($custom_tmp_dir)) {
		mkdir($custom_tmp_dir, 0777, true);
	}
	$mpdf = new \Mpdf\Mpdf([
		'tempDir' => $custom_tmp_dir
	]);
	// $mpdf->debug = true;
	$mpdf->WriteHTML($html);
	//$file = './pdf/'.$userNm.' '.date('d_m_Y_h_i_s_A').'.pdf';
	$file = 'RFS_'.date('d_m_Y_h_i_s_A').'.pdf';
	ob_clean();
	$mpdf->Output($file,'D');	
} catch (\Mpdf\MpdfException $e) {
    echo "mPDF Exception caught: " . $e->getMessage();
} catch (\Error $e) {
    echo "PHP Fatal Error caught: " . $e->getMessage();
} catch (\Exception $e) {
    echo "General Exception caught: " . $e->getMessage();
}