<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <!-- Add validation below only for add and edit -->


    <?php
//01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $eFirstName = cleanInput($eFirstName);
        $eLastName = cleanInput($eLastName);
        $eUsername = cleanInput($eUsername);
        $eEmail = cleanInput($eEmail);
        $ePassword = cleanInput($ePassword);
        $eNic = cleanInput($eNic);
        $ePhoneNumber = cleanInput($ePhoneNumber);
        $eJoiningDate = cleanInput($eJoiningDate);

        //04.Required Validation
        $message = array();
        if (empty($eTitle)) {
            $message['error_etitle'] = "The Title Should Not Be Blank...";
        }
        if (empty($eFirstName)) {
            $message['error_efirstname'] = "The First Name Should Not Be Blank...";
        }
        if (empty($eLastName)) {
            $message['error_elastname'] = "The Last Name Should Not Be Blank...";
        }
        if (!isset($eGender)) {
            $message['error_egender'] = "The gender Should Not Be Blank...";
        }
        if (empty($eUsername)) {
            $message['error_eusername'] = "The User Name Should Not Be Blank...";
        }
        if (empty($eEmail)) {
            $message['error_eemail'] = "The Email Should Not Be Blank...";
        }
        if (empty($eDesignation)) {
            $message['error_edesignation'] = "The Designation Should Not Be Select...";
        }
        if (empty($ePassword)) {
            $message['error_epassword'] = "The Password Should Not Be Blank...";
        }
        if (empty($eNic)) {
            $message['error_enic'] = "The NIC number Should Not Be Blank...";
        }
        if (empty($ePhoneNumber)) {
            $message['error_ephonenumber'] = "The Phone Number Should Not Be Blank...";
        }
        if (empty($eJoiningDate)) {
            $message['error_ejoiningdate'] = "The Joining Date Should Not Be Blank...";
        }

        //05.Advance Validation
        //Email validation
        if (!empty($eEmail)) {
            if (!filter_var($eEmail, FILTER_VALIDATE_EMAIL)) {
                $message['error_eemail'] = "The wrong email format...";
            }
        }

        // check if name only contains letters and whitespace
        if (!empty($eFirstName)) {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $eFirstName)) {
                $message['error_efirstname'] = "Only letters and white space allowed";
            }
        }

        if (!empty($eLastName)) {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $eLastName)) {
                $message['error_elastname'] = "Only letters and white space allowed";
            }
        }

        //File upload
        if (empty($message)) {
            $ProductImage = $_FILES['eImage'];
            $filename = $ProductImage['name'];
            $filetmpname = $ProductImage['tmp_name'];
            $filesize = $ProductImage['size'];
            $fileerror = $ProductImage['error'];

            $fileext = explode('.', $filename);
            $fileext = strtolower(end($fileext));

            //allowed file extensions
            $allowedext = array("jpg", "jpeg", "png", "gif");

            if (in_array($fileext, $allowedext)) {
                if ($fileerror === 0) {
                    if ($filesize <= 2097152) {
                        //file name as date of today
                        //echo $file_name_new = date('Y').date('m').date('d').".".$fileext;
                        echo $file_name_new = uniqid("", true) . "." . $fileext;
                        $file_destionation = "../assets/images/employee_images/" . $file_name_new;
                        if (move_uploaded_file($filetmpname, $file_destionation)) {
                            echo 'The file was uploaded successfully ';
                        } else {
                            $message['error_file'] = "There was error uploading the file";
                        }
                    } else {
                        $message['error_file'] = "This file size is invalid ..!";
                    }
                } else {
                    $message['error_file'] = "This file has error ..!";
                }
            } else {
                $message['error_file'] = "This file type not allowed ..!";
            }
        }

        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $db = dbConnection();
            //echo 'Connected..!';
            $new_phrase = str_replace(' ', '', $eDesignation); // remove the space
            $eUserRole = lcfirst($new_phrase); // capitalize the first letter
            $eStatus = '1';
            $eStatus = '1';
            $cDate = date('Y-m-d');
            $ePassword = sha1($ePassword);
            $sql = "INSERT INTO tbl_users(UserName,Password,Email,Title,FirstName,LastName,Gender,TelNo,UserImage,UserRole,Status,AddDate,AddUser)VALUES('$eUsername','$ePassword','$eEmail','$eTitle','$eFirstName','$eLastName','$eGender','$ePhoneNumber','$file_name_new','$eUserRole','$eStatus','$cDate',$userid)";
            $db->query($sql);
            //Insert into employee table
            $UserId = $db->insert_id;

            $eJoiningDate = $_POST['eJoiningDate']; // Get the JoiningDate value from the form
            // Calculate the TotalAnnualLeave based on the JoiningDate
            $joiningYear = date('Y', strtotime($eJoiningDate));
            $joiningMonth = date('n', strtotime($eJoiningDate));
            $currentYear = date('Y');
            //$yearsOfService = $currentYear - $joiningYear + 1; // Add 1 for the current year
            if ($joiningYear == $currentYear) {
                if ($joiningMonth >= 10) {
                    $totalAnnualLeave = 4;
                } elseif ($joiningMonth >= 7) {
                    $totalAnnualLeave = 7;
                } elseif ($joiningMonth >= 4) {
                    $totalAnnualLeave = 10;
                } else {
                    $totalAnnualLeave = 14;
                }
            } else {
                $totalAnnualLeave = 14; // 14 days from the second year onwards
            }

            // Calculate the TotalCasualLeave based on the JoiningDate
            if ($joiningYear == $currentYear) {
                $totalCasualLeave = (12 - $joiningMonth) * 0.5; // One day every two months in the first year of employment
            } else {
                $totalCasualLeave = 7; // 7 days from the second year of employment
            }

            // Insert the data into the table
            $sql = "INSERT INTO tbl_employees (Designation, UserId, Nic, JoiningDate, TotalAnnualLeave, TotalCasualLeave) VALUES ('$eDesignation', '$UserId', '$enic', '$eJoiningDate', '$totalAnnualLeave', '$totalCasualLeave')";

            if ($db->query($sql) === TRUE) {
                header("Location:../sucesss.php");
                echo "Record Inserted successfully";
            } else {
                echo "Error Inserted record: " . $db->error;
            }
        }
    }
    ?>

    <!-- Add new section below -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Employee detail</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="employee.php">View Employee List</a>
            </div>
        </div>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-2">  
                        <div class="mb-3">
                            <label for="employee_title" class="form-label">Title</label>                            
                            <select class="form-control" id="employee_title" name="eTitle">
                                <option class="my-3" value="">-Select Title-</option>
                                <?php
                                $db = dbConnection();
                                $sql = "SELECT * FROM tbl_title";
                                $result = $db->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $row['TitleCode'] ?>"><?= $row['TitleName'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <div class="text-danger"><?= @$message["error_etitle"] ?></div>
                        </div>
                    </div>
                    <div class="col-5">  
                        <div class="mb-3">
                            <label for="employee_first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="employee_first_name" name="eFirstName" value="<?= @$eFirstName ?>">
                            <div class="text-danger"><?= @$message["error_efirstname"] ?></div>
                        </div>
                    </div>
                    <div class="col-5"> 
                        <div class="mb-3">
                            <label for="employee_Last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="employee_Last_name" name="eLastName" value="<?= @$eLastName ?>">
                            <div class="text-danger"><?= @$message["error_elastname"] ?></div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="employee_enic" class="form-label">NIC</label>
                    <input type="text" class="form-control" id="employee_enic" name="eNic" value="<?= @$eNic ?>">
                    <div class="text-danger"><?= @$message["error_enic"] ?></div>
                </div>
                <div class="mb-3  my-5">
                    <label>Select Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="eGender" id="employee_gender_male"
                               value="Male" <?php if (isset($eGender) && $eGender == 'Male') { ?> checked <?php } ?> />
                        <label class="form-check-label" for="femaleGender">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="eGender" id="employee_gender_female" value="Female" <?php if (isset($eGender) && $eGender == 'Female') { ?> checked <?php } ?> />
                        <label class="form-check-label" for="maleGender">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="eGender" id="employee_gender_other" value="Other" <?php if (isset($eGender) && $eGender == 'Other') { ?> checked <?php } ?> />
                        <label class="form-check-label" for="otherGender">Other</label>
                    </div>
                    <div class="text-danger"><?= @$message["error_egender"] ?></div>
                </div>  
                <div class="mb-3 my-5">
                    <label for="employee_email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="employee_email" name="eEmail" value="<?= @$eEmail ?>">
                    <div class="text-danger"><?= @$message["error_eemail"] ?></div>
                </div>
                <div class="mb-3">
                    <label for="employee_phonenumber" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="employee_phonenumber" name="ePhoneNumber" value="<?= @$ePhoneNumber ?>">
                    <div class="text-danger"><?= @$message["error_ephonenumber"] ?></div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="employee_user_name" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="employee_user_name" name="eUsername" value="<?= @$eUsername ?>">
                    <div class="text-danger"><?= @$message["error_eusername"] ?></div>
                </div>
                <div class="mb-3">
                    <label for="employee_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="employee_password" name="ePassword" value="<?= @$ePassword ?>">
                    <div class="text-danger"><?= @$message["error_epassword"] ?></div>
                </div>
                <div class="mb-3">
                    <label for="employee_joining_date" class="form-label">Joining Date</label>
                    <input type="date" class="form-control" id="employee_joining_date" name="eJoiningDate" max="<?php echo date("Y-m-d"); ?>" value="<?= @$eJoiningDate ?>">
                    <div class="text-danger"><?= @$message["error_ejoiningdate"] ?></div>
                </div>  

                <div class="mb-3">
                    <label for="employee_designation" class="form-label">Designation</label>                            
                    <select class="form-control" id="employee_designation" name="eDesignation">
                        <option value="">-Select Designation-</option>
                        <?php
                        $db = dbConnection();
                        $sql = "SELECT * FROM tbl_emp_role";
                        $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?= $row['DesignationCode'] ?>"><?= $row['Designation'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <div class="text-danger"><?= @$message["error_edesignation"] ?></div>
                </div>
                <div class="mb-3">
                    <label for="employee_image" class="form-label">Select Employee Image</label>
                    <input class="form-control" type="file" id="employee_image" name="eImage">
                    <div class="text-danger"><?= @$message["error_file"] ?></div>

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_end_flush(); ?>