<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php
//Add edit section for th edit files
//01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $eLeaveType = cleanInput($eLeaveType);

        //04.Required Validation
        $message = array();
        if (empty($eLeaveType)) {
            $message['error_eleavetype'] = "The LeaveType Should Not Be Blank...";
        }

        if (empty($message)) {
            //$userid = $_SESSION['userid'];
            $db = dbConnection();
            //echo 'Connected..!';
            //$cDate = date('Y-m-d');
            $sql = "INSERT INTO tbl_leave_types(LeaveTypes)VALUES('$eLeaveType')";
            if ($db->query($sql) === TRUE) {
                //header("Location:../sucesss.php");
                echo "Record Inserting successfully";
            } else {
                echo "Error Inserting record: " . $db->error;
            }
        }
    }
    ?>
    <!-- Add new section below -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Leave types</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="leaveTypeList.php">View Service List</a>
            </div>
        </div>
    </div>

    <form id="myForm" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="employee_leave_type" class="form-label">Leave Type</label>
            <input type="text" class="form-control" id="employee_leave_type" name="eLeaveType" value="<?= @$eLeaveType ?>">
            <div class="text-danger"><?= @$message["error_eleavetype"] ?></div>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_end_flush(); ?>

