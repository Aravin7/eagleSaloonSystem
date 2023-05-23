    <?php
include '../functions.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
    $LeaveId = $LeaveId;
    $AddedLeave = NULL;

    $db = dbConnection();

    //find the leaveType of the leave and according to that ,add the Taken leaves to the remaingLeaves 
    echo $sql = "SELECT LeaveType,AppliedLeaves,RemainingAnnualLeave,RemainingCasualLeave from tbl_leave WHERE LeaveId='$LeaveId'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $lLeaveTypes = $row['LeaveType'];
            $LeavesApplied = $row['AppliedLeaves'];
            $RemainingAnnualLeave = $row['RemainingAnnualLeave'];
            $RemainingCasualLeave = $row['RemainingCasualLeave'];
        }
    } else {
        echo "Error retrive record: " . $db->error;
    }

    if ($lLeaveTypes === "1") {
        $RemainingCasualLeave = $RemainingCasualLeave + $LeavesApplied;
    }
    if ($lLeaveTypes === "2") {
        $RemainingAnnualLeave = $RemainingAnnualLeave + $LeavesApplied;
    }

    echo $sql = "UPDATE tbl_leave SET LeaveStatus = 'Cancelled',RemainingCasualLeave='$RemainingCasualLeave',RemainingAnnualLeave='$RemainingAnnualLeave' WHERE LeaveId = '$LeaveId'";
//    if ($db->query($sql) === TRUE) {
//        header("Location:../success.php");
//        //echo "Record Inserting successfully";
//    } else {
//        echo "Error Inserting record: " . $db->error;
//    }
}
?>
