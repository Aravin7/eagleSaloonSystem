<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        extract($_GET);
        $db = dbConnection();
        $sql = "SELECT* FROM tbl_privacy WHERE PrivacyId='$PrivacyId'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pTitle = $row['Title'];
                $pContent = $row['Content'];
            }
        }
    }
//01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $pTitle = cleanInput($pTitle);
        $pContent = cleanInput($pContent);

        //04.Required Validation
        $message = array();
        if (empty($pTitle)) {
            $message['error_title'] = "The Title Should Not Be Blank...";
        }
        if (empty($pContent)) {
            $message['error_content'] = "The Content Should Not Be Blank...";
        }

        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $db = dbConnection();
            //echo 'Connected..!';
            $uDate = date('Y-m-d');
            $sql = "UPDATE tbl_privacy SET Title='$pTitle',Content='$pContent',UpdateUser='$userid',UpdateDate='$uDate' WHERE PrivacyId='$PrivacyId'";
            if ($db->query($sql) === TRUE) {
                header("Location:../sucesss.php");
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }
        }
    }
    ?>
    <!-- Add new section below -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Policy</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="privacyPolicy.php">View Policy List</a>
            </div>
        </div>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="privacy_title" class="form-label">Enter Title</label>
            <input type="text" class="form-control" id="privacy_title" name="pTitle" value="<?= @$pTitle ?>">
            <div class="text-danger"><?= @$message["error_title"] ?></div>
        </div>
        <div class="mb-3">
            <label for="privacy_content" class="form-label">Enter Content</label>
            <textarea class="form-control" rows="10" id="privacy_content" name="pContent"><?= @$pContent ?></textarea>
            <div class="text-danger"><?= @$message["error_content"] ?></div>
        </div>
        <input type="hidden" name="PrivacyId" value="<?= @$PrivacyId ?>">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_flush(); ?>