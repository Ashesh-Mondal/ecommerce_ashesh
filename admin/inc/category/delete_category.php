<?php

include "../db.php";

$did = $_GET['did'];

$result = $conn->query("SELECT * FROM category WHERE id='$did'");
$row = $result->fetch_assoc();

unlink("../c_destination/" . $row['cimage']);

$conn->query("DELETE FROM category WHERE id='$did'");

header("location: ../../list_category.php");
