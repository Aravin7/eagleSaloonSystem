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
        $question = cleanInput($question);
        $answer = cleanInput($answer);

        //04.Required Validation
        $message = array();
        if (empty($question)) {
            $message['error_question'] = "The question Should Not Be Blank...";
        }
        if (empty($answer)) {
            $message['error_answer'] = "The answer Should Not Be Blank...";
        }


        //05.Advance Validation
        //File upload

        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $db = dbConnection();
            //echo 'Connected..!';
            $cDate = date('Y-m-d');
            echo $sql = "INSERT INTO tbl_faq(Question,Answer)VALUES('$question','$answer')";
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
        <h1 class="h2">Add New FAQ</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="faq.php">View FAQ List</a>
            </div>
        </div>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" value="<?= @$question ?>">
            <div class="text-danger"><?= @$message["error_question"] ?></div>
        </div>
        <div class="mb-3">
            <label for="answer" class="form-label" >Enter Product Description</label>
            <textarea class="form-control" id="answer" name="answer" rows="15"><?= @$answer ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<?php ob_flush();?>
