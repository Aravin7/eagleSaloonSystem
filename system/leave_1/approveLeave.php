<?php
include '../functions.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
    $LeaveId = $LeaveId;
    $db = dbConnection();
    $sql = "UPDATE tbl_leave SET LeaveStatus = 'Approved' WHERE LeaveId = '$LeaveId'";
    $db->query($sql);
    if ($db->query($sql) === TRUE) {
        header("Location:../sucesss.php");
        echo "Record Inserting successfully";
    } else {
        echo "Error Inserting record: " . $db->error;
    }
}
?>
