<?php

function cleanInput($input = null) {
    return htmlspecialchars(stripslashes(trim($input)));
}

function dbConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_eagleSaloon";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Database Connection Error" . $conn->connect_error);
    } else {
        return $conn;
    }
}

//Email validation
function validateEmail($email, $errorMsg) {
    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $message[$errorMsg] = "The wrong email format...";
        }
    }
}

function validatePhoneNumber($sPhoneNumber, $errorKey = NULL) {
    $message = array();

    if (!empty($sPhoneNumber)) {
        if (!preg_match('/^[0-9]{10}+$/', $sPhoneNumber)) {
            $message['$errorKey'] = "The Number should be 10 digits ...";
        }
    }
    return $message;
}

function getCasualLeave($employmentDate) {
    $currentDate = date('Y-m-d');
    $employmentTimestamp = strtotime($employmentDate);
    $currentTimestamp = strtotime($currentDate);
    $daysDifference = floor(($currentTimestamp - $employmentTimestamp) / (60 * 60 * 24));

    // Calculate casual leave based on employment duration
    if ($daysDifference <= 30) {
        return 0.5; // 0.5 day per month
    } elseif ($daysDifference <= 60) {
        return 1; // 1 day every two months
    } else {
        return 7; // 7 days from the second year of employment
    }
}

?>  