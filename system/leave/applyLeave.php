<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php
    $remainingAnnualLeaves = $_SESSION['RemainingAnnualLeave'];
    $remainingCasualLeaves = $_SESSION['RemainingCasualLeave'];
    //echo '$remainingAnnualLeaves' . $remainingAnnualLeaves;
    //echo "</br>";
    //echo '$remainingCasualLeaves' . $remainingCasualLeaves;
    //echo "</br>";
//Add edit section for th edit files
//01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $lLeaveTypes = cleanInput($lLeaveTypes);
        $lnumberOfDays = cleanInput($lnumberOfDays);
        $lStartDate = cleanInput($lStartDate);
        $lEndDate = cleanInput($lEndDate);

        //04.Required Validation
        $message = array();

        if (empty($lLeaveTypes)) {
            $message['error_lleavetypes'] = "The Leave Types Should not Be blank...";
        }
        if (empty($lnumberOfDays)) {
            $message['error_lnumberofdays'] = "The number of days Should Not Be Blank...";
        }
        if (empty($lStartDate)) {
            $message['error_lstartdate'] = "The Start Date Should Not Be Blank...";
        }
        if (empty($lEndDate)) {
            $message['error_lenddate'] = "The End Date Should Not Be Blank...";
        }
        if (empty($lReason)) {
            $message['error_lreason'] = "The Leave reason Should Not Be Blank...";
        }
        //05.Advance Validation

        $remainingAnnualLeaves = $_POST['remainingAnnualLeaves'];
        $remainingCasualLeaves = $_POST['remainingCasualLeaves'];

        //$sufficientLeaves = 'false';
        //Check whether user have sufficent leave to applied both casual and annual leave
        if ($lLeaveTypes === "1") {
            if ($remainingCasualLeaves >= $lnumberOfDays) {
                $remainingCasualLeaves = $remainingCasualLeaves - $lnumberOfDays;
            } else {
                $message['error_lnumberofdays'] = "you dont have sufficent Casual leave:You only have $remainingCasualLeaves Casual leave";
            }
        }
        if ($lLeaveTypes === "2") {
            if ($remainingAnnualLeaves >= $lnumberOfDays) {
                $remainingAnnualLeaves = $remainingAnnualLeaves - $lnumberOfDays;
            } else {
                $message['error_lnumberofdays'] = "you dont have sufficent Annual leave :You only have $remainingAnnualLeaves Casual leave";
            }
        }

        //Check if leave is single day
        if (numberOfDays <= 1) {
            $lEndDate=$lStartDate;
        } 

        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $db = dbConnection();
            //echo 'Connected..!';
            //$numberOfDays = $_POST['lnumberOfDays'];

            $LeaveStatus = 'Pending';
            $Date = date('Y-m-d');
            echo $sql = "INSERT INTO tbl_leave(StartDate,EndDate,LeaveType,Reason,RemainingAnnualLeave,RemainingCasualLeave,AppliedLeaves,HalfDaySession,HalfDaySessionDate,UserId,LeaveStatus,AppliedDate)VALUES('$lStartDate','$lEndDate','$lLeaveTypes','$lReason','$remainingAnnualLeaves','$remainingCasualLeaves','$lnumberOfDays','$halfDayLeave','$halfDayLeaveDay','$userid','$LeaveStatus','$Date')";

            if ($db->query($sql) === TRUE) {
                header("Location:../success.php");
                //echo "Record Inserting successfully";
            } else {
                echo "lStartDate :$lStartDate </br>";
                echo "lEndDate :$lEndDate </br>";
                echo "lLeaveTypes :$lLeaveTypes </br>";
                echo "Error Inserting record: " . $db->error;
            }
        }
    }
    ?>


    <!-- Add new section below -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Apply Leave</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="leaveHistory.php">View Leave List</a>
            </div>
        </div>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="row">
            <div class="col-2">
                <div class="mb-3">
                    <label for="leave_types" class="form-label">Apply Leave</label>                            
                    <select class="form-control" id="leave_type" name="lLeaveTypes">
                        <option value="">-Select Leave Type-</option>
                        <?php
                        $db = dbConnection();
                        $sql = "SELECT * FROM tbl_leave_types";
                        $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?= $row['Id'] ?>"><?= $row['LeaveTypes'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>                               
                    <div class="text-danger"><?= @$message["error_lleavetypes"] ?></div>
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label class="form-label" for="number_of_days">No of Days</label>
                    <input class="form-control" type="number" id="number_of_days" name="lnumberOfDays" step="0.5" min="0.5" max="14" onchange="validateLeaveRemaining();calculateEndDate();"  >
                    <input class="form-control" hidden type="number" id="remainingAnnualLeaves" name="remainingAnnualLeaves" value="<?= $remainingAnnualLeaves; ?>">
                    <input class="form-control" hidden type="number" id="remainingCasualLeaves" name="remainingCasualLeaves" value="<?= $remainingCasualLeaves; ?>">
                    <div class="text-danger"><?= @$message["error_lnumberofdays"] ?></div>
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <label for="leave_start_date" class="form-label">Start Date:</label>
                    <input type="date" onchange="calculateEndDate()" min="<?php echo date("Y-m-d") ?>" id="leave_start_date" name="lStartDate" class="form-control" value="<?= @$lStartDate ?>">
                    <div class="text-danger"><?= @$message["error_lstartdate"] ?></div>
                </div></div>
            <div class="col-2" id="leave_end_div"> 
                <div class="mb-3">
                    <label for="leave_end_date" class="form-label">End Date:</label>
                    <input type="date" min="<?php echo date("Y-m-d") ?>" id="leave_end_date" name="lEndDate" class="form-control" value="<?= @$lEndDate ?>">
                    <div class="text-danger"><?= @$message["error_lenddate"] ?></div>
                </div>
            </div>
        </div>
        <div class="col-8"> 
            <div class="mb-3">
                <label for="leave_reason" class="form-label">Enter Reason</label>
                <textarea class="form-control" id="leave_reason" name="lReason"><?= @$lReason ?></textarea>
                <div class="text-danger"><?= @$message["error_lreason"] ?></div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_end_flush(); ?>
