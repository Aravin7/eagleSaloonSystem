<?php
//if variabele loggedIn isSet then
if(isset($_SESSION['userid'])){
//include  log in menu
    include 'loggedInMenu.php';
}else{
// else include log out menu
    include 'loggedOutMenu.php';
}
?>