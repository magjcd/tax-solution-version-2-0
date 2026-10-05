<?php
session_start();
include('../autoLoad.php');
$ContObj = new Controller();
$viewRetTrk = $ContObj->viewRetTrkDR();
if($viewRetTrk){
?>
		
		<thead>
<tr>
	<th>Trans Date & Time</th>
	<th>Prop Name</th>
	<th>Bussiness Name</th>
	<th>City</th>
	<th>Type</th>
	<th>Tax Year</th>
	<th>Sub. Date</th>
	<th>Fees</th>
	<th>Description</th><th>Action</th>
</tr>
</thead>
<tbody>
	<?php
	foreach($viewRetTrk as $retTrkData){
		if($retTrkData['clientNm'] != 'Revenue Earned - Services'){
			?>
			
		 	<tr id="retClDet">
				<td><?php echo $retTrkData['gjDt'].' '.$retTrkData['gjTm']; ?></td>
				<td><?php echo $retTrkData['clientNm']; ?></td>
				<td><?php echo $retTrkData['busNm']; ?></td>
				<td><?php echo $retTrkData['cityNm']; ?></td>
				<td><?php echo $retTrkData['feeTp']; ?></td>
				<td><?php echo $retTrkData['feeYr']; ?></td>
				<td><?php echo $retTrkData['subDt']; ?></td>
				<td><?php echo $retTrkData['drAmt']; ?></td>				
				<td><?php echo $retTrkData['description']; ?></td>
				<td>
				<?php
					echo "<a href='index?page=retTrkUpd&rTrkEid=".$retTrkData['id']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a>";
				?>
				</td>
			</tr>
			<?php
		}
	}
	?>

</tbody>
	<?php
}

?>	
