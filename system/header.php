<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location:login.php");
}
include 'config.php';
include 'functions.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BIT Project - Dashboard</title>
        <link href="<?= SYSTEM_PATH ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= SYSTEM_PATH ?>assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="<?= SYSTEM_PATH ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?= SYSTEM_PATH ?>assets/fontAwesome/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= SYSTEM_PATH ?>assets/css/dashboard.css" rel="stylesheet">
        <script src="<?= SYSTEM_PATH ?>assets/js/sweetalert2.all.js" type="text/javascript"></script>
        <script src="<?= SYSTEM_PATH ?>assets/js/custom.js" type="text/javascript"></script>
    </head>
    <body> 
        <header class="navbar navbar-dark sticky-top bg-info flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Eagle Saloon</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>   
           <!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">-->
            <nav class="header-nav me-4">
                <a class="nav-link nav-profile d-flex align-items-center pe-0 show" href="#" data-bs-toggle="dropdown" aria-expanded="true">
                    <img src="<?= SYSTEM_PATH ?>assets/images/saloon_logo.png" alt="Profile" width="30" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">
                        <?= $_SESSION['title'] . " " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>
                    </span>
                </a><!-- End Profile Iamge Icon -->
                <div class="dropdown">
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item " href="<?= SYSTEM_PATH ?>profile/profile.php"> <span data-feather="user"class="align-text-center me-2"></span>Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= SYSTEM_PATH ?>logout.php"> <span data-feather="log-out"class="align-text-center me-2"></span>Log out</a></li>
                    </ul>
                </div>
            </nav>
            <!-- 
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link mx-1 px-3 text-bg-primary" href="<?= SYSTEM_PATH ?>logout.php"> <span data-feather="log-out" class="align-text-center me-1"></span>Log out</a>
                </div>
            </div>
            -->
        </header>
        <div class="container-fluid">
            <div class="row">