<?php

include "../db.php";

$did = $_GET['did'];

$result = $conn->query("SELECT * FROM product WHERE id='$did'");
$row = $result->fetch_assoc();

unlink("../p_destination/" . $row['pimage']);

$del = "DELETE FROM product WHERE id='$did'";
$conn->query($del);

header("location: ../../list_product.php");
