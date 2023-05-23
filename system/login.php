<?php
session_start();
include 'functions.php';
include 'config.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login-BIT Project</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/login.css" rel="stylesheet">
    </head>
    <body class="text-center">

        <main class="form-signin bg-success w-100 m-auto border border-2 border-dark">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                extract($_POST);
                //echo $UserName;
                //we dont clean password
                $Username = cleanInput($UserName);

                $message = array();

                if (empty($Username)) {
                    $message['error_username'] = "The user name should not be blank";
                }
                if (empty($Password)) {
                    $message['error_password'] = "The password should not be blank";
                }
                if(empty($message)){
                    $Password= sha1($Password);
                    $sql = "SELECT * FROM tbl_users WHERE UserName='$UserName' AND Password='$Password'";
                    $db = dbConnection();
                    $result = $db->query($sql);
                    //print_r($result);
                    if($result->num_rows<=0){
                        $message['error_login'] = "Invalid User name or password";
                    }else{
                        echo $row = $result->fetch_assoc();
                        $_SESSION['userid'] = $row['UserId'];
                        $_SESSION['title'] = $row['Title'];
                        $_SESSION['firstname'] = $row['FirstName'];
                        $_SESSION['lastname'] = $row['LastName'];
                        $_SESSION['userrole'] = $row['UserRole'];
                        header("Location:index.php");
                    }
                }
            }
            ?>
            <form form method="post" style="margin: 40px 0px;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <img class="mb-5" src="<?= SYSTEM_PATH ?>assets/images/saloon_logo.png" alt="">
                <h1 class="h3 mb-3 fw-normal text-white">Please sign in</h1>
                <div class="text-danger"><?= @$message['error_username'] ?></div>
                <div class="text-danger"><?= @$message['error_password'] ?></div>
                <div class="text-danger"><?= @$message['error_login'] ?></div>
                
                <div class="form-floating">
                    <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Enter your user name">
                    <label for="floatingInput">User name</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter your password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
            </form>
        </main>
    </body>
</html>
