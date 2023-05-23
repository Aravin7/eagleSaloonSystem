<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<?php
$db = dbConnection();
$UserId = $_SESSION['userid'];

//check if the 'leave' parameter is exist in the URL
if (isset($_GET['leave'])) {
    echo $_GET['leave'];
}

//Retrive the annual and casual leave from tbl_employees
$sql = "SELECT * FROM tbl_employees WHERE UserId = '$UserId' AND LeaveStatus='Approved'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$TotalAnnualLeave = $row['TotalAnnualLeave'];
$TotalCasualLeave = $row['TotalCasualLeave'];

//Find there any records available for the particular for the current year in the leave table
$sql = "select COUNT(*) AS leave_entries from tbl_leave where UserId='$UserId' AND YEAR(AppliedDate) = YEAR(CURRENT_DATE);";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$leaveEntries = $row['leave_entries'];

//Select the last applied leave from the particluar user
$sql = "SELECT
    *
FROM
    tbl_leave
WHERE
    UserId = '$UserId' AND YEAR(AppliedDate) = YEAR(CURRENT_DATE)
ORDER BY LeaveId DESC
LIMIT 1";
$result = $db->query($sql);
$row = $result->fetch_assoc();

if ($leaveEntries > 0) {
    $_SESSION['RemainingAnnualLeave'] = $row['RemainingAnnualLeave'];
    $_SESSION['RemainingCasualLeave'] = $row['RemainingCasualLeave'];
} else {
    //if its first time leave
    $_SESSION['RemainingAnnualLeave'] = $TotalAnnualLeave;
    $_SESSION['RemainingCasualLeave'] = $TotalCasualLeave;
}
?>


<?php
//show message
if (isset($_GET['leave'])) {
    echo $_GET['leave'];
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Remove below ones for the add form-->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Applied Leave History</h1>
        <span class="remaining_leaves border border-2 shadow-lg p-3">Remaining Annual Leaves:<?= $_SESSION['RemainingAnnualLeave'] ?></span>
        <span class="remaining_leaves border border-2 shadow-lg p-3">Remaining Casual Leaves:<?= $_SESSION['RemainingCasualLeave'] ?></span>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-md btn-outline-warning" href="applyLeave.php"><span data-feather="plus-circle" class="align-text-bottom"></span>Apply Leave</a>
            </div>
        </div>

    </div>

    <!-- Add validation below only for add and edit -->


    <!-- Add new section below -->
    <div class="table-responsive">
        <?php
        $db = dbConnection();
        $sql = "SELECT *
                FROM
                    tbl_leave l
                LEFT JOIN tbl_leave_types lt ON
                    l.LeaveType = lt.Id";
        $result = $db->query($sql);
        ?>

        <table class="table table-striped table-sm">
            <thead class="bg-info">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Leave Type</th>
                    <th scope="col">Reason</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">AppliedDate</th>
                    <th scope="col">Leave Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-info bg-opacity-25">
                <?php
                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $row['LeaveTypes'] ?></td>
                            <td><?= $row['Reason'] ?></td>
                            <td><?= $row['StartDate'] ?></td>
                            <td><?= $row['EndDate'] ?></td>
                            <td><?= $row['AppliedDate'] ?></td>
                            <td><?= $row['LeaveStatus'] ?></td>
                            <td><a href="cancelLeave.php?LeaveId=<?= $row['LeaveId'] ?>" class="btn btn-warning btn-sm <?= ($row['LeaveStatus'] === 'Cancelled') ? 'disabled' : '' ?>">Cancel</a></td>    
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php include '../footer.php'; ?>
<?php ob_end_flush(); ?>
