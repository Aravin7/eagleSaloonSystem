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
        return $conn ;
    }
}
?>  