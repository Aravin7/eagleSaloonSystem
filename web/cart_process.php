<?php
session_start();
include '../system/functions.php';
extract($_POST);
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$action == 'add') {
    //echo $ServiceId;
    $db = dbConnection();
    $sql = "SELECT* FROM tbl_services WHERE ServiceId='$ServiceId'";
    $result = $db->query($sql);
    $services = $result->fetch_assoc();
    //$_SESSION['services'][$ServiceId]=array('serviceId'=>$services['ServiceId'],'serviceName'=>$services['ServiceName'],'price'=>$services['Price'],'image'=>$services['ServiceImage']);
    $services='';
    header("Location:services.php");
}


//print_r(extract($_POST));
//$db = dbConnection();
//
//
//$result = $db->query($sql);
//$row = $result->fetch_assoc();
////echo $row['name'];

?>