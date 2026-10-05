<?php
session_start();
include("../autoLoad.php");
//include(realpath(__DIR__.'/..')."../autoLoad.php");
$ContObj = new Controller();
	//$viewClients = $ContObj->viewClientsST($_POST['searchBy'],$_POST['clSearch']);
$viewClients = $ContObj->viewClientsST($_POST['clSearch'],$_POST['sortClBy'],$_POST['asc_desc']);
?>
<div class="row">
	<div class="col-12" style="overflow-x: auto;">
	<?php

	if($viewClients){
	//Counting Total cities of Clients
	$arrCol = (array_column($viewClients, 'cityId'));
	$arrUni = (array_unique($arrCol));

	//Counting Total Representatives who added records in DB
	$arrColRep = (array_column($viewClients, 'registerarId'));
	$arrUniRep = (array_unique($arrColRep));

	// $arrColRep = (array_column($viewClients, 'cnicNo'));
	// $arrUniRep = (array_unique($arrColRep));	
	// print_r($arrUniRep);
	//Counting Total Clients Added by a Representative
	// $repIdArr = explode("")
	// $sql = "SELECT * FROM client WHERE repId=".$;
	// while($row=$viewClients->fetch_assoc()){

	// }
	//print_r($_SESSION);
	echo '
	<tr>
	<th colspan="7" style="background:#fff; color: #000;">
	Total 
	<span style="font-weight:bold; font-size: 16px; background:#006699; color:#fff; text-align:center; border-radius: 30px;">&nbsp;'.count($viewClients).'&nbsp;</span> 
	Client(s) from 
	<span style="font-weight:bold; font-size: 16px; background:#006699; color:#fff; text-align:center; border-radius: 30px;">&nbsp;'.count($arrUni).'&nbsp;</span> Cities added by 
	<span style="font-weight:bold; font-size: 16px; background:#006699; color:#fff; text-align:center; border-radius: 30px;">&nbsp;'.count($arrUniRep).'&nbsp;</span> Representative(s)
	</th>
	</tr>
	';

	?>
	<tr><th>Clint Name</th><th>Bus. Name</th><th>CNIC</th><th>Contact No.</th><th>City</th><th>Status</th><th colspan="3">Action</th></tr>

<?php		foreach ($viewClients as $data) {
			if(isset($_SESSION['taxmagadmin'])){
				if($data['status'] != 'inactive'){			
					echo "<tr><td>".$data['clientNm']."</td><td>".$data['busNm']."</td><td>".$data['cnicNo']."</td><td>".$data['cellNo1']."&nbsp;<a href='https://wa.me/92".$data['cellNo1']."?text=📣 توجہ فرمائیں!

یکم جولائی سے انکم ٹیکس ریٹرن / گوشوارہ  2026 کی فائلنگ کا آغاز ہو رہا ہے۔
ایسے میں ضروری ہے کہ آپ اپنی فائلنگ وقت پر اور درست انداز میں مکمل کروائیں۔

\n
💼 یاد رکھیں:
اچھے، معیاری اور ذمہ داری سے کیے گئے کام کی قیمت ضرور ہوتی ہے!

\n
سستے کے چکر میں پڑ کر پریشانیاں مول لینا دانشمندی نہیں۔
اپنے قیمتی وقت اور کاروبار کے تحفظ کے لیے ہمیشہ مستند اور تجربہ کار  افراد سے ہی رجوع کریں۔
شکریہ


برائے رابطہ

موہن لال تلریجا

وکیل انکم ٹیکس 

03337362983,

03003102866' target='_blank'><i class='fa fa-whatsapp' aria-hidden='true' style='color: green; font-size: 20px;'></i></a></td><td>".$data['cityNm']."</td><td>".ucfirst($data['status'])."</td><td style='width: 30px;'>
					<a href='index?page=ClientUpd&eid=".$data['id']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td><td style='width: 30px;'>
					<a href='index?page=viewSClient&vid=".$data['id']."' id='recView'>
					<i class='fa fa-eye fa-lg fa-fw'></i></a></td><td style='width:30px;'> 
					<a href='index?page=chgClStat&sid=".$data['id']."&stat=".$data['status']."' id='cs'>
					<i class='fa fa-refresh fa-lg fa-fw'></i></a></td></tr>";
				}else{
					// echo "<tr style='color: red;'><td>".$data['clientNm']."</td><td>".$data['cnicNo']."</td><td>".$data['cityNm']."</td><td>".ucfirst($data['status'])."</td><td style='width: 30px;'>
					// <a href='index?page=ClientUpd&eid=".$data['id']."' id='edit' alt='Edit'>
					// <i class='fa fa-edit fa-lg fa-fw'></i></a></td><td style='width: 30px;'>
					// <a href='index?page=viewSClient&vid=".$data['id']."' id='recView' alt='Edit'>
					// <i class='fa fa-eye fa-lg fa-fw'></i></a></td><td style='width:30px;'> 
					// <a href='index?page=chgClStat&sid=".$data['id']."&stat=".$data['status']."' id='cs'>
					// <i class='fa fa-refresh fa-lg fa-fw'></i></a></td></tr>";
					echo "<tr style='color: red;'><td>".$data['clientNm']."</td><td>".$data['busNm']."</td><td>".$data['cnicNo']."</td><td>".$data['cellNo1']."</td><td>".$data['cityNm']."</td><td>".ucfirst($data['status'])."</td><td style='width: 30px;'>
					<a id='btn-disable' alt='Edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td><td style='width: 30px;'>
					<a href='index?page=viewSClient&vid=".$data['id']."' id='recView' alt='Edit'>
					<i class='fa fa-eye fa-lg fa-fw'></i></a></td><td style='width:30px;'> 
					<a href='index?page=chgClStat&sid=".$data['id']."&stat=".$data['status']."' id='cs'>
					<i class='fa fa-refresh fa-lg fa-fw'></i></a></td></tr>";
				}
			}else{
				if($data['status'] != 'inactive'){			
					echo "<tr><td>".$data['clientNm']."</td><td>".$data['busNm']."</td><td>".$data['cnicNo']."</td><td>".$data['cellNo1']."&nbsp;<a href='https://wa.me/92".$data['cellNo1']."?text=📣 توجہ فرمائیں!

یکم جولائی سے انکم ٹیکس ریٹرن / گوشوارہ  2026 کی فائلنگ کا آغاز ہو رہا ہے۔
ایسے میں ضروری ہے کہ آپ اپنی فائلنگ وقت پر اور درست انداز میں مکمل کروائیں۔

\n
💼 یاد رکھیں:
اچھے، معیاری اور ذمہ داری سے کیے گئے کام کی قیمت ضرور ہوتی ہے!

\n
سستے کے چکر میں پڑ کر پریشانیاں مول لینا دانشمندی نہیں۔
اپنے قیمتی وقت اور کاروبار کے تحفظ کے لیے ہمیشہ مستند اور تجربہ کار  افراد سے ہی رجوع کریں۔
شکریہ


برائے رابطہ

موہن لال تلریجا

وکیل انکم ٹیکس 

03337362983,

03003102866' target='_blank'><i class='fa fa-whatsapp' aria-hidden='true' style='color: green; font-size: 20px;'></i></a></td><td>".$data['cityNm']."</td><td>".ucfirst($data['status'])."</td><td style='width: 30px;'>
					<a href='index?page=ClientUpd&eid=".$data['id']."' id='edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td><td style='width: 30px;'>
					<a href='index?page=viewSClient&vid=".$data['id']."' id='recView'>
					<i class='fa fa-eye fa-lg fa-fw'></i></a></td></tr>";
				}else{
					// echo "<tr style='color: red;'><td>".$data['clientNm']."</td><td>".$data['cnicNo']."</td><td>".$data['cityNm']."</td><td>".ucfirst($data['status'])."</td><td style='width: 30px;'>
					// <a href='index?page=ClientUpd&eid=".$data['id']."' id='edit' alt='Edit'>
					// <i class='fa fa-edit fa-lg fa-fw'></i></a></td><td style='width: 30px;'>
					// <a href='index?page=viewSClient&vid=".$data['id']."' id='recView' alt='Edit'>
					// <i class='fa fa-eye fa-lg fa-fw'></i></a></td></tr>";
					echo "<tr style='color: red;'><td>".$data['clientNm']."</td><td>".$data['busNm']."</td><td>".$data['cnicNo']."</td><td>".$data['cellNo1']."</td><td>".$data['cityNm']."</td><td>".ucfirst($data['status'])."</td><td style='width: 30px;'>
					<a id='btn-disable' alt='Edit'>
					<i class='fa fa-edit fa-lg fa-fw'></i></a></td><td style='width: 30px;'>
					<a href='index?page=viewSClient&vid=".$data['id']."' id='recView' alt='Edit'>
					<i class='fa fa-eye fa-lg fa-fw'></i></a></td></tr>";
				}
			}
		}
	}else{
		echo "<div class='message'>Your search term <span style='color: #000;'>".$_POST['clSearch']."</span> didn't find any record in Database.</div>";
	}

	?>
</div>
</div>