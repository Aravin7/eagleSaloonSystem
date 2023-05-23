<?php ob_start(); ?>

<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<?php
//01.check the request method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //02.extract the array
    extract($_POST);
    // 03.Assign cleaned values to the variables
    $uFirstName = cleanInput($uFirstName);
    $uLastName = cleanInput($uLastName);
    $uUsername = cleanInput($uUsername);
    $uEmail = cleanInput($uEmail);
    
    //$uHouseNumber = cleanInput($uHouseNumber);
    $uStreetAddress = cleanInput($uStreetAddress);
    $uCity = cleanInput($uCity);
    
    $uPassword = cleanInput($uPassword);
    $uNic = cleanInput($uNic);
    $ePhoneNumber = cleanInput($ePhoneNumber);

    //04.Required Validation
    $message = array();
    if (empty($uTitle)) {
        $message['error_utitle'] = "The Title Should Not Be Blank...";
    }
    if (empty($uFirstName)) {
        $message['error_ufirstname'] = "The First Name Should Not Be Blank...";
    }
    if (empty($uLastName)) {
        $message['error_ulastname'] = "The Last Name Should Not Be Blank...";
    }
    if (!isset($uGender)) {
        $message['error_ugender'] = "The gender Should Not Be Blank...";
    }
    if (empty($uUsername)) {
        $message['error_uusername'] = "The User Name Should Not Be Blank...";
    }
    if (empty($uEmail)) {
        $message['error_uemail'] = "The Email Should Be Select...";
    }
//    if (empty($uHouseNumber)) {
//        $message['error_uhousenumber'] = "The House Number Should Not Be Blank...";
//    }
    if (empty($uStreetAddress)) {
        $message['error_ustreetaddress'] = "The street address Should Not Be Blank...";
    }
    if (empty($uCity)) {
        $message['error_ucity'] = "The City Should Not Be Blank...";
    }
    if (empty($uDistrict)) {
        $message['error_udistrict'] = "The District Should Not Be Blank...";
    }
    if (empty($uProvince)) {
        $message['error_uprovince'] = "The province Should Not Be Blank...";
    }
    if (empty($uPassword)) {
        $message['error_upassword'] = "The Password Should Be Select...";
    }
    if (empty($uRepeatPassword)) {
        $message['error_urepeatpassword'] = "The Password Should Be Select...";
    }
    if (empty($uNic)) {
        $message['error_unic'] = "The NIC number Should Be Select...";
    }
    if (empty($ePhoneNumber)) {
        $message['error_uphonenumber'] = "The Phone Number Should Be Select...";
    }

    //05.Advance Validation
    //Repeat password validation
    if (!empty($uRepeatPassword)) {
        if ($uPassword != $uRepeatPassword) {
            $message['error_urepeatpassword'] = "The password should be matched...";
        }
    }

    //Email validation
    if (!empty($uEmail)) {
        if (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
            $message['error_uemail'] = "The wrong email format...";
        }
    }



    // check if name only contains letters and whitespace
    if (!empty($uFirstName)) {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $uFirstName)) {
            $message['error_ufirstname'] = "Only letters and white space allowed";
        }
    }

    if (!empty($uLastName)) {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $uLastName)) {
            $message['error_ulastname'] = "Only letters and white space allowed";
        }
    }



    if (empty($message)) {
        //$userid = $_SESSION['userid'];
        $db = dbConnection();

        //echo 'Connected..!';

        $uUserRole = "customer";
        $uStatus = '1';
        $cDate = date('Y-m-d');
        $uPassword = sha1($uPassword);
        $sql = "INSERT INTO tbl_users(UserName,Password,Email,Title,FirstName,LastName,Gender,TelNo,UserRole,Status,AddDate)VALUES('$uUsername','$uPassword','$uEmail','$uTitle','$uFirstName','$uLastName','$uGender','$ePhoneNumber','$uUserRole','$uStatus','$cDate')";
        $db->query($sql);
        //Insert into cusomter table
        $customerId = $db->insert_id;			

        $sql = "INSERT into tbl_customers(userId,CusRegDate) VALUES('$customerId','$cDate')";
        $db->query($sql);
        $sql = "INSERT into tbl_address(userId,HouseNumber,StreetAddress,City,District,Province) VALUES('$customerId','$uHouseNumber','$uStreetAddress','$uCity','$uDistrict','$uProvince')";
        if ($db->query($sql) === TRUE) {
            header("Location:sucesss.php");
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }
}
?>

<div class="modal fade fade-scale searchmodal" id="searchmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal-search-form">
                    <input type="search" class="search-field" placeholder="Search...">
                    <button type="submit"><i class="ri-search-line"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Register</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner7.png" alt="Inner Banner">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4">
                <div class="user-all-form">
                    <div class="contact-form">
                        <h3 class="user-title"> Register </h3>
                        <form id="contactForm" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <?php
                                        $db = dbConnection();
                                        $sql = "SELECT * FROM tbl_title";
                                        $result = $db->query($sql);
                                        ?>
                                        <select class="col-lg-12 form-control" id="user_title" name="uTitle">
                                            <option value="">-Select Title-</option>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['TitleCode'] ?>"><?= $row['TitleName'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="text-danger small"><?= @$message["error_utitle"] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name" id="user_first_name" name="uFirstName" value="<?= @$uFirstName ?>">
                                        <div class="small text-danger"><?= @$message["error_ufirstname"] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  id="user_last_name" name="uLastName" value="<?= @$uLastName ?>" placeholder="Last Name">
                                        <div class="text-danger small"><?= @$message["error_ulastname"] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="uGender" id="user_gender_male"
                                               value="Male" <?php if (isset($uGender) && $uGender == 'Male') { ?> checked <?php } ?> />
                                        <label class="form-check-label" for="femaleGender">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="uGender" id="user_gender_female" value="Female" <?php if (isset($uGender) && $uGender == 'Female') { ?> checked <?php } ?> />
                                        <label class="form-check-label" for="maleGender">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="uGender" id="user_gender_other" value="Other" <?php if (isset($uGender) && $uGender == 'Other') { ?> checked <?php } ?> />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>
                                    <div class="text-danger small"><?= @$message["error_ugender"] ?></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" id="user_username" name="uUsername"  >
                                        <div class="text-danger small"><?= @$message["error_uusername"] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email" id="user_email" name="uEmail">
                                        <div class="text-danger small"><?= @$message["error_uemail"] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="house number" id="user_housenumber" name="uHouseNumber">
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Street Address" id="user_Street_address" name="uStreetAddress">
                                        <div class="text-danger small"><?= @$message["error_ustreetaddress"] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group">		
                                        <input type="text" class="form-control" placeholder="City" id="user_city" name="uCity">
                                        <div class="text-danger small"><?= @$message["error_ucity"] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group">		
                                        <?php
                                        $sql = "SELECT * FROM tbl_district";
                                        $result = $db->query($sql);
                                        ?>
                                        <select class="col-lg-12 form-control" id="user_district" name="uDistrict">
                                            <option value="">-Select District-</option>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['DistrictCode'] ?>"><?= $row['DistrictName'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="text-danger small"><?= @$message["error_udistrict"] ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group">	
                                        <?php
                                        $sql = "SELECT * FROM tbl_province";
                                        $result = $db->query($sql);
                                        ?>
                                        <select class="col-lg-12 form-control" id="user_province" name="uProvince">
                                            <option value="">-Select Province-</option>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $row['ProvinceCode'] ?>"><?= $row['ProvinceName'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="text-danger small"><?= @$message["error_uprovince"] ?></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="Password"  id="user_password" name="uPassword">
                                        <div class="text-danger small"><?= @$message["error_upassword"] ?></div>

                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Repeat your Password" id="user_r_password" name="uRepeatPassword">
                                        <div class="text-danger small"><?= @$message["error_urepeatpassword"] ?></div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text"  name="uNic" placeholder="NIC number" id="user_nic">
                                        <div class="text-danger small"><?= @$message["error_unic"] ?></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="ePhoneNumber" type="tel" placeholder="Phone Number" id="user_phone_number" >
                                        <div class="text-danger small"><?= @$message["error_uphonenumber"] ?></div>

                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        Register Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php ob_flush(); ?>