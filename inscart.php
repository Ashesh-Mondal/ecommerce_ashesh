<?php
session_start();
include "./admin/inc/db.php";

$pid = $_POST['pid'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$cid = $_SESSION['uid'];

$res = $conn->query("SELECT * FROM cart WHERE pid='$pid' AND cid='$cid'");
if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $old_quantity = $row['qty'];
    $updated_quantity = $qty + $old_quantity;
    $cart_id = $row['cart_id'];
    $conn->query("UPDATE cart SET qty='$updated_quantity' WHERE cart_id='$cart_id'");
} else {
    $conn->query("INSERT INTO cart SET pid='$pid', price='$price', qty='$qty', cid='$cid'");
}

header("location: cart.php");
