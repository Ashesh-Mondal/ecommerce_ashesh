<?php

include "../db.php";

$category = $_POST['category'];
$pname = $_POST['pname'];
$price = $_POST['price'];
$description = $_POST['description'];

$pfile_name = time() . $_FILES['pimage']['name'];
$ptmp_name = $_FILES['pimage']['tmp_name'];

$arr = explode(".", $pfile_name);
$last_element = count($arr) - 1;

if ($arr[$last_element] == "jpg" || $arr[$last_element] == "jpeg" || $arr[$last_element] == "png") {
    $conn->query("INSERT INTO product SET category_id='$category', pname='$pname', price='$price', description='$description', pimage='$pfile_name'");
    move_uploaded_file($ptmp_name, "../p_destination/" . $pfile_name);
} else {
    $conn->query("INSERT INTO product SET category_id='$category', pname='$pname', price='$price', description='$description', pimage=''");
}

header("location: ../../list_product.php");
