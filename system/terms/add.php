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
        $tTitle = cleanInput($tTitle);
        $tContent = cleanInput($tContent);

        //04.Required Validation
        $message = array();
        if (empty($tTitle)) {
            $message['error_ttitle'] = "The Terms and condition Title Should Not Be Blank...";
        }
        if (empty($tContent)) {
            $message['error_tContent'] = "The Terms and condition content details Should Not Be Blank...";
        }
        //05.Advance Validation
        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $db = dbConnection();
            //echo 'Connected..!';
            $sql = "INSERT into tbl_terms(TermTitle,TermContent) VALUES('$tTitle','$tContent')";
            if ($db->query($sql) === TRUE) {
                header("Location:../sucesss.php");
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $d->error;
            }
        }
    }
    ?>
    <!-- Add new section below -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Term & Condition</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="terms.php">View Term & Condition List</a>
            </div>
        </div>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="term_title" class="form-label">Terms & condition Title</label>
            <input type="text" class="form-control" id="term_title" name="tTitle" value="<?= @$tTitle ?>">
            <div class="text-danger"><?= @$message["error_ttitle"] ?></div>
        </div>
        <div class="mb-3">
            <label for="term_content" class="form-label">Terms & Condition Content</label>
            <textarea class="form-control" rows="10" id="term_content" name="tContent" value="<?= @$tContent ?>"> </textarea>
            <div class="text-danger"><?= @$message["error_tContent"] ?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_flush();?>