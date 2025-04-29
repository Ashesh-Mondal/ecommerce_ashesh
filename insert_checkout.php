<?php
session_start();
include "./admin/inc/db.php";

$bname = $_POST['bname'];
$bemail = $_POST['bemail'];
$bcontact = $_POST['bphone'];
$baddress = $_POST['baddress'];
$sname = $_POST['sname'];
$semail = $_POST['semail'];
$scontact = $_POST['sphone'];
$saddress = $_POST['saddress'];
$order_date = date("d-m-Y");
$customer_id = $_SESSION['uid'];

$conn->query("INSERT INTO master_order SET bname='$bname', bemail='$bemail', bcontact='$bcontact', baddress='$baddress', sname='$sname', semail='$semail', scontact='$scontact', saddress='$saddress', order_date='$order_date', customer_id='$customer_id'");

$mid = $conn->insert_id; // Last inserted ID

$result = $conn->query("SELECT * FROM cart WHERE cid='$customer_id'");
while ($row = $result->fetch_assoc()) {
    $pid = $row['pid'];
    $price = $row['price'];
    $qty = $row['qty'];

    $conn->query("INSERT INTO sub_order SET master_id='$mid', product_id='$pid', quantity='$qty', price='$price'");
}

$conn->query("DELETE FROM cart WHERE cid='$customer_id'");
header("location: order.php");
