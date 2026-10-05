<?php
//$ContObj->adminLogChk();
date_default_timezone_set("Asia/Karachi");
require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';


$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'localhost';
$mail->Port = 25;
$mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;
$mail->SMTPAuth = false;  
$mail->Username = 'magjcdtest@gmail.com';
$mail->Password = 'Thooshi#06Dhonta#12';

$mail->setFrom('magjcdtest@gmail.com', 'DB Backup');
$mail->addAddress('magjcd@gmail.com', 'Receiver: Ali');     // Add a recipient
$mail->addCC('magjcdtest@gmail.com');

$filePath = realpath(__DIR__.'/..'.'/backupDB/talrejakdk.sql');
$mail->addAttachment($filePath, 'talrejakdk '.date('d/m/Y h:i:s A').'.sql');    // 
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Talreja DB Backup '.date('d/m/Y h:i:s A');
$mail->Body    = "Dear Receiver<br /><br />
This is <b><u>Talreja Consultant</b></u> Database Backup for 
<b>".date('d/m/Y h:i:s A').'</b><br /><br /><br /> By '.'magTech<br />'.'+92 333 244 5283';

if(!$mail->send()) {
    echo 'Backup could not be sent.';
    echo "<div class='message'>Mailer Error: " . $mail->ErrorInfo."</div>";
} else {
    echo "<div class='success-msg'>Backup has been sent at given email address.</div>";
}
?>