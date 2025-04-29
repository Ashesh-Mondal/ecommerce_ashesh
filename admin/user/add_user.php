<?php

include "../inc/db.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repeat_pass = $_POST['repeat_pass'];

$ins = "INSERT INTO admin_user SET fname='$fname', lname='$lname', email='$email', password='$pass'";
$conn->query($ins);

header("location: login.php");
