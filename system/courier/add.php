<?php ob_start();?>
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
        $cName = cleanInput($cName);
        $cPhoneNumber = cleanInput($cPhoneNumber);
        $cEmail = cleanInput($cEmail);

        //04.Required Validation
        $message = array();
        if (empty($cName)) {
            $message['error_pname'] = "The Name Should Not Be Blank...";
        }
        if (empty($cPhoneNumber)) {
            $message['error_cphonenumber'] = "The Phone Number Should Not Be Blank...";
        }
        if (empty($cEmail)) {
            $message['error_cemail'] = "The Email Should Not Be Blank...";
        }

        //05.Advance Validation
        //Phone number validation
        if (!empty($cPhoneNumber)) {
            if (!preg_match('/^[0-9]{10}+$/', $cPhoneNumber)) {
                $message['error_cphonenumber'] = "The Number should be 10 digits ...";
            }
        }

        //Email validation
        if (!empty($cEmail)) {
            if (!filter_var($cEmail, FILTER_VALIDATE_EMAIL)) {
                $message['error_cemail'] = "The wrong email format...";
            }
        }

        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $db = dbConnection();

            //echo 'Connected..!';
            $sql = "INSERT INTO tbl_courier(Name,PhoneNumber,Email)VALUES('$cName','$cPhoneNumber','$cEmail')";
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
        <h1 class="h2">Add New Courier</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="courier.php">View Courier List</a>
            </div>
        </div>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="courier_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="courier_name" name="cName" value="<?= @$cName ?>">
            <div class="text-danger"><?= @$message["error_cname"] ?></div>
        </div>
        <div class="mb-3">
            <label for="courier_phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="courier_phone_number" name="cPhoneNumber" value="<?= @$cPhoneNumber ?>">
            <div class="text-danger"><?= @$message["error_cphonenumber"] ?></div>
        </div>
        <div class="mb-3">
            <label for="courier_email" class="form-label">Email</label>
            <input type="text" class="form-control" id="courier_email" name="cEmail" value="<?= @$cEmail ?>">
            <div class="text-danger"><?= @$message["error_cemail"] ?></div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</main>
<?php include '../footer.php'; ?>
<?php ob_end_flush(); ?>

