<?php
include '../functions.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
    $LeaveId = $LeaveId;
    $db = dbConnection();
    echo $sql = "UPDATE tbl_leave SET LeaveStatus = 'Cancelled' WHERE LeaveId = '$LeaveId'";
    if ($db->query($sql) === TRUE) {
        header("Location:../success.php");
        //echo "Record Inserting successfully";
    } else {
        echo "Error Inserting record: " . $db->error;
    }
}
?>
