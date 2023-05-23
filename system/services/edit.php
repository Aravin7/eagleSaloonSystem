<?php ob_start();?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <!-- Add validation below only for add and edit -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        extract($_GET);
        $db = dbConnection();
        $sql = "SELECT* FROM tbl_services WHERE ServiceId='$ServiceId'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sName = $row['ServiceName'];
                $sPrice = $row['Price'];
                $sDescription = $row['Description'];
                $sDuration = $row['Duration'];
                $sImage = $row['ServiceImage'];
                $ServiceId = $row['ServiceId'];
            }
        }
    }

//01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $sName = cleanInput($sName);
        $sDescription = cleanInput($sDescription);
        $sPrice = cleanInput($sPrice);
        $sDuration = cleanInput($sDuration);


        //04.Required Validation
        $message = array();
        if (empty($sName)) {
            $message['error_sname'] = "The Service Name Should Not Be Blank...";
        }
        if (empty($sDescription)) {
            $message['error_sdescription'] = "The service description Should Not Be Blank...";
        }
        if (empty($sPrice)) {
            $message['error_sprice'] = "The Service Price Should Not Be Blank...";
        }
        if (empty($sDuration)) {
            $message['error_sduration'] = "The Service Duration Should Not Be  Select...";
        }

        //05.Advance Validation
        if (!empty($sPrice)) {
            if (!is_numeric($sPrice)) {
                $message['error_sprice'] = "The Service Price Invalid...";
            } elseif ($sPrice < 0) {
                $message['error_sprice'] = "The Service Price Cannot Be Negative...";
            }
        }

        //File upload
        if (empty($message)) {
            $ServiceImage = $_FILES['sImage'];
            $filename = $ServiceImage['name'];
            $filetmpname = $ServiceImage['tmp_name'];
            $filesize = $ServiceImage['size'];
            $fileerror = $ServiceImage['error'];

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
                        $file_destionation = "../assets/images/service_images/" . $file_name_new;
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
            $sql = "Update tbl_services SET ServiceName='$sName',Description='$sDescription',Price='$sPrice',Duration='$sDuration',ServiceImage='$file_name_new' WHERE ServiceId='$ServiceId'";
            if ($db->query($sql) === TRUE) {
                header('Location:../sucesss.php');
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }
        }
    }
    ?>


    <!-- Add new section below -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Service</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="services.php">View Service List</a>
            </div>
        </div>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="service_name" class="form-label">Service Name</label>
            <input type="text" class="form-control" id="service_name" name="sName" value="<?= @$sName ?>">
            <div class="text-danger"><?= @$message["error_sname"] ?></div>
        </div>
        <div class="mb-3">
            <label for="service_description" class="form-label">Enter Service Description</label>
            <textarea class="form-control" id="service_description" name="sDescription"><?= @$sDescription ?></textarea>
        </div>
        <div class="mb-3">
            <label for="service_price" class="form-label">Price</label>
            <input type="text" class="form-control" id="service_price" name="sPrice" value="<?= @$sPrice ?>">
            <div class="text-danger"><?= @$message["error_sprice"] ?></div>
        </div>
        <div class="mb-3">
            <label for="service_duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="service_duration" name="sDuration" value="<?= @$sDuration ?>">
            <div class="text-danger"><?= @$message["error_sduration"] ?></div>
        </div>
        <div class="row my-5">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="service_image" class="form-label">Select Service Image</label>
                    <input class="form-control" type="file" id="service_image" name="sImage" value="../assets/images/service_images/<?= @$sImage ?>">
                    <div class="text-danger"><?= @$message["error_file"] ?></div>
                </div>
            </div>
            <div class="col-md-4">
                <img  class="img-fluid mx-8" width="200" src="../assets/images/service_images/<?= empty($sImage)?"noImage.jpg":$sImage;?>">
            </div>
        </div>
        <input type="hidden" name="ServiceId" value="<?= $ServiceId?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_flush();?>
