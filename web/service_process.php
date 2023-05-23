<?php
session_start();
include '../system/function.php';
include '../system/config.php';

print_r(extract($_POST));
$db = dbConnection();

$sql = "SELECT*  FROM products WHERE sku='$sku'";

$result = $db->query($sql);
$row = $result->fetch_assoc();

$current_qty= $_SESSION['cart'][$sku]['qty']+1;
$_SESSION['cart'][$sku]=array('name'=>$row['name'],'price'=>$row['price'],'qty'=>$current_qty,'image'=>$row['image'],'id'=>$row['product_id']);
//print_r($_SESSION['cart']);
header("LOcation:services.php");
?>