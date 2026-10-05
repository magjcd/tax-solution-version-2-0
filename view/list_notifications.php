<?php
session_start();
include("../autoLoad.php");
$ContObj = new Controller;
$listNotifications = $ContObj->listNotifications('admin');
?>
<table id="users" class="table table-striped">
<tr>

	<th>Notification</th>
	<th>Notification Date</th>
	<th>Last Date</th>
	<th>Status</th>
	<th>Published</th>
	<th>Action</th>
	</tr>	
	<?php
	// if Data is available inside $RepCntObj-> Object for listing of BOs
	if($listNotifications){
		foreach ($listNotifications as $data) {

			// echo "<tr>
			// <td>".$data['feeTp']."</td><td style='width: 30px;'>
			// <a href='index.php?page=updBo&eid=".$data['id']."&eNm=".$data['brOffNm']."' id='edit'>
			// <i class='fa fa-edit fa-lg fa-fw'></i></a></td></tr>";

			echo "<tr>
			<td>".$data->feeTp."</td>
			<td>".$data->notification_date."</td>
			<td>".$data->last_date."</td>
			<td>".($data->last_date < date('Y-m-d') ? '<span class="btn btn-danger">Expired</span>' : '<span class="btn btn-success">Active</span>')."</td>
			<td class='published' data-id=".$data->id.'|'.$data->published." id='published'>".($data->published == '1' ? '<span class="btn btn-success">Yes</span>' : '<span class="btn btn-danger">No</span>')."</td>
			<td><i class='fa fa-edit fa-lg fa-fw'></i>
			&nbsp;<i class='fa fa-trash fa-lg fa-fw'></i>
			&nbsp;<i class='fa fa-eye fa-lg fa-fw'></i></td>
			</tr>";
		}
	}else{
		echo "<div class='success-msg'>No Add Notification is Available</div>";
	}
	?>
</tr>
</table>