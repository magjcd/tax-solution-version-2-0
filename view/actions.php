<?php
session_start();
include("../autoLoad.php");
$ContObj = new Controller;

if ($_POST['flag'] == 'assign_representative') {
    // echo ($_POST['flag']);
    // die();
    $ContObj->assignRepCatClient($_POST);
}elseif ($_POST['flag'] == 'add_notification') {
    $ContObj->addNotification($_POST);
}elseif ($_POST['flag'] == 'publish_notification') {
    $ContObj->publishNotification($_POST);
}
