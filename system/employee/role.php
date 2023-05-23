<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <!-- Add validation below only for add and edit -->

    <?php
//Add edit section for th edit files
//01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $rName = cleanInput($rName);

        //04.Required Validation
        $message = array();
        if (empty($rName)) {
            $message['error_rname'] = "The Role Name Should Not Be Blank...";
        }


        //05.Advance Validation
        if (!empty($rName)) {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $rName)) {
                $message['error_rname'] = "Only letters and white space allowed";
            }
        }

        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $db = dbConnection();
            //echo 'Connected..!';
            $sql = "INSERT INTO tbl_emp_role(Designation)VALUES('$rName')";
            if ($db->query($sql) === TRUE) {
                header("Location:../sucesss.php");
                echo "Record Inserting successfully";
            } else {
                echo "Error Inserting record: " . $db->error;
            }
        }
    }
    ?>

    <!-- Add new section below -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Employee Designaton</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="employee.php">View Employee List</a>
            </div>
        </div>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="role_name" class="form-label">Designation Name</label>
            <input type="text" class="form-control" id="role_name" name="rName" value="<?= @$rName ?>">
            <div class="text-danger"><?= @$message["error_rname"] ?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_end_flush(); ?>