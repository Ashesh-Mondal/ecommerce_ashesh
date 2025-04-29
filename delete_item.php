<?php
session_start();
include "./admin/inc/db.php";

$did = $_GET['did'];
$customer_id = $_SESSION['uid'];
$result = $conn->query("DELETE FROM cart WHERE cid='$customer_id' AND pid='$did'");

header("location: cart.php");
