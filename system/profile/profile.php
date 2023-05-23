<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile </h1>
    </div>
    <?php
    //Get the data from the database
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        extract($_GET);
        $db = dbConnection();
        $userId = $_SESSION['userid'];
        $sql = "SELECT u.UserName,u.Email,u.FirstName,u.LastName,u.TelNo,e.Nic FROM tbl_users u LEFT JOIN tbl_employees e ON u.UserId=e.UserId WHERE u.UserId='" . $userId . "';";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $uUserName = $row['UserName'];
                $uEmail = $row['Email'];
                $uFirstName = $row['FirstName'];
                $uLastName = $row['LastName'];
                $uTelNo = $row['TelNo'];
                $uNic = $row['Nic'];
            }
        }
    }

    //01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        echo $_POST;
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $uUserName = cleanInput($uUserName);
        $uEmail = cleanInput($uEmail);
        $uFirstName = cleanInput($uFirstName);
        $uLastName = cleanInput($uLastName);
        $uTelNo = cleanInput($uTelNo);
        $uNic = cleanInput($uNic);

        //04.Required Validation
        $message = array();
        if (empty($uUserName)) {
            $message['error_uusername'] = "The user Name Should Not Be Blank...";
        }
        if (empty($uEmail)) {
            $message['error_uemail'] = "The Email Should Not Be Blank...";
        }
        if (empty($uFirstName)) {
            $message['error_ufirstname'] = "The  First Name Should Not Be Blank...";
        }
        if (empty($uLastName)) {
            $message['error_ulastname'] = "The Last Name Should Not Be Blank...";
        }
        if (empty($uTelNo)) {
            $message['error_utelno'] = "The Telephone number Should Not Be Blank...";
        }
        if (empty($uNic)) {
            $message['error_unic'] = "The NIC Should Not Be Blank...";
        }

        //05.Advance Validation
        //validate NIC
        if (!empty($uNic)) {
            //check string length 10 or 12.
            $endsWith = 'V';
            if (strlen($uNic) === 10) {
                if (!(is_numeric(substr($uNic, 0, 9)) && !is_numeric(substr($uNic, -1)) && str_ends_with($uNic, $endsWith))) {
                    $message['error_unic'] = "The NIC Should in right format";
                }
            }
            if (strlen($uNic) === 12) {
                if (!is_numeric($uNic)) {
                    $message['error_unic'] = "The NIC Should in right format";
                }
            }
        }

        //Validate the telephone number 
        if (!empty($uTelNo)) {
            if (is_numeric($uTelNo)) {
                $numberLength = strlen($uTelNo);
                if ($numberLength === 10) {
                    echo 'validated';
                }else{
                    $message['error_uTelNo'] = "The telephone number must be 10 digits long.";
                }
            } else {
                $message['error_utelno'] = "The Telephone Number should be Number...";
            }
        }

        //validate email
        if (!empty($uEmail)) {
            if (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
                $message['error_email'] = "Invalid email format";
            }
        }

        //File upload
        if (empty($message)) {
            $ProductImage = $_FILES['pImage'];
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
                        $file_destionation = "../assets/images/product_images/" . $file_name_new;
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
            $cDate = date('Y-m-d');
            echo $sql = "Update tbl_users SET (ProductName,Qty,Price,Description,ProductImage,Status,AddUser,AddDate)VALUES('$pName','$pQty','$pPrice','$pDescription','$file_name_new','$pStatus','$userid','$cDate')";
            $db->query($sql);

            //new lines
//            if ($db->query($sql) === TRUE) {
//                $_SESSION['status'] = "New record created successfully";
//                //echo $_SESSION['status'];
//                //header("Location:index.php");
//            } else {
//                $_SESSION['status'] = "Error: " . $sql . "<br>" . $conn->error;
//            }
            //new lines
        }
    }
    ?>
    <!-- new lines for successful insert
    <div class="col-md-12">
<?php
if (isset($_SESSION['status'])) {
    ?>
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Hey!</strong> <? echo $_SESSION['status'];?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
    <?php
    unset($_SESSION['status']);
}
?>

    </div> -->
    <!-- new lines for successful insert -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="<?= SYSTEM_PATH ?>assets/images/profile/profile-1.png" alt="" />
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary" type="button">Upload new image</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                <input class="form-control" id="Username" name="uUserName" type="text" placeholder="Enter your username" value="<?= @$uUserName ?>"/>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userFirstName">First name</label>
                                    <input class="form-control" id="userFirstName"  name="uFirstName"type="text" placeholder="Enter your first name" value="<?= @$uFirstName ?>" />
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userLastName">Last name</label>
                                    <input class="form-control" id="userLastName"  name="uLastName" type="text" placeholder="Enter your last name" value="<?= @$uLastName ?>" />
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="userEmailAddress">Email address</label>
                                <input class="form-control" id="userEmailAddress" name="uEmailAddress" type="email" placeholder="Enter your email address" value="<?= @$uEmail ?>" />
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userPhone">Phone number</label>
                                    <input class="form-control" id="userPhone" name="uPhone" type="tel" placeholder="Enter your phone number" value="<?= @$uTelNo ?>" />
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userNIC">NIC</label>
                                    <input class="form-control" id="userNIC" name="uNic" type="text" placeholder="Enter your NIC" value="<?= @$uNic ?>" />
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userPassword">Password</label>
                                    <input class="form-control" id="userPassword" name="uPassword" type="password" placeholder="Enter your Password" value="" />
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="userRepeatPassword">Password</label>
                                    <input class="form-control" id="userRepeatPassword" name="uRepeatPassword" type="password" placeholder="Enter your Password Again" value="" />
                                </div>
                            </div>

                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


</main>

<?php include '../footer.php'; ?>