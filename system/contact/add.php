<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <?php
//01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $sPhoneNumber = cleanInput($sPhoneNumber);
        $sEmail = cleanInput($sEmail);
        $sAddressLine = cleanInput($sAddressLine);
        $sCity = cleanInput($sCity);

        //04.Required Validation
        $message = array();

        if (empty($sPhoneNumber)) {
            $message['error_sphonenumber'] = "The Phone Number Should Not Be Blank...";
        }
        if (empty($sEmail)) {
            $message['error_semail'] = "The Email Should Not Be Blank...";
        }
        if (empty($sAddressLine)) {
            $message['error_saddressline'] = "The address Should Not Be Blank...";
        }
        if (empty($sCity)) {
            $message['error_scity'] = "The City Should Not Be Blank...";
        }

        //Phone number validation
        if (!empty($sPhoneNumber)) {
            if (!preg_match('/^[0-9]{10}+$/', $sPhoneNumber)) {
                $message['error_sphonenumber'] = "The Number should be 10 digits ...";
            }
       }

         
        //Email validation
        if (!empty($sEmail)) {
            if (!filter_var($sEmail, FILTER_VALIDATE_EMAIL)) {
                $message['error_semail'] = "The wrong email format...";
            }
        }

        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $db = dbConnection();
            //echo 'Connected..!';
            $sql = "INSERT INTO tbl_saloon_contact(PhoneNumber,Email,AddressLine,City)VALUES('$sPhoneNumber','$sEmail','$sAddressLine','$sCity')";
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
        <h1 class="h2">Add New Contact</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="contact.php">View Contact List</a>
            </div>
        </div>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="saloon_phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="saloon_phone_number" name="sPhoneNumber" value="<?= @$sPhoneNumber ?>">
            <div class="text-danger"><?= @$message["error_sphonenumber"] ?></div>
        </div>
        <div class="mb-3">
            <label for="saloon_email" class="form-label">Email</label>
            <input type="text" class="form-control" id="saloon_email" name="sEmail" value="<?= @$sEmail ?>">
            <div class="text-danger"><?= @$message["error_semail"] ?></div>
        </div>
        <div class="mb-3">
            <label for="saloon_addressline" class="form-label">Address Line</label>
            <input type="text" class="form-control" id="saloon_addressline" name="sAddressLine" value="<?= @$sAddressLine?>">
            <div class="text-danger"><?= @$message["error_saddressline"] ?></div>
        </div>
        <div class="mb-3">
            <label for="saloon_city" class="form-label">City</label>
            <input type="text" class="form-control" id="saloon_city" name="sCity" value="<?= @$sCity ?>">
            <div class="text-danger"><?= @$message["error_scity"] ?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_flush(); ?>
