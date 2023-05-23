<?php ob_start();?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    //echo $UserName;
    //we dont clean password
    $Username = cleanInput($Username);
    $message = array();

    if (empty($Username)) {
        $message['error_username'] = "The user name should not be blank";
    }
    if (empty($Password)) {
        $message['error_password'] = "The password should not be blank";
    }
    if (empty($message)) {
        $Password = sha1($Password);
        $sql = "SELECT * FROM tbl_users WHERE UserName='$Username' AND Password='$Password' AND UserRole='customer'";
        $db = dbConnection();
        $result = $db->query($sql);
        //print_r($result);
        if ($result->num_rows <= 0) {
            $message['error_login'] = "Invalid User name or password";
        } else {
            $row = $result->fetch_assoc();
            $_SESSION['userid'] = $row['UserId'];
            $_SESSION['title'] = $row['Title'];
            $_SESSION['firstname'] = $row['FirstName'];
            $_SESSION['lastname'] = $row['LastName'];
            //those line wants to be checked
            header("Location:index.php");
        }
    }
}
?>

<!-- Modal -->
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

<!-- Breadcrumb -->
<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Login</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner6.png" alt="Inner Banner">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login Form -->
<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="user-all-form">
                    <div class="contact-form">
                        <h3 class="user-title"> Login</h3>
                        <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="text-danger"><?= @$message['error_username'] ?></div>
                            <div class="text-danger"><?= @$message['error_password'] ?></div>
                            <div class="text-danger"><?= @$message['error_login'] ?></div>
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="text" name="Username" id="Username" class="form-control" placeholder="Username*">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="password" id="Password" name="Password" placeholder="Password*">
                                    </div>
                                </div>
                                <div class="col-lg-12 form-condition">
                                    <div class="agree-label">
                                        <input type="checkbox" id="chb1">
                                        <label for="chb1">
                                            Remember Me <a class="forget" href="forgot-password.php">Forgot Password?</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        Login Now
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
<?php ob_flush();?>
