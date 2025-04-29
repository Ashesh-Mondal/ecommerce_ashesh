<?php

include "../db.php";

$uid = $_POST['uid'];

$category = $_POST['category'];
$pname = $_POST['pname'];
$price = $_POST['price'];
$description = $_POST['description'];

if ($_FILES['pimage']['name']) {

    $result = $conn->query("SELECT * FROM product WHERE id='$uid'");
    $row = $result->fetch_assoc();

    unlink("../p_destination/" . $row['pimage']);

    $pfile_name = time() . $_FILES['pimage']['name'];
    $ptmp_name = $_FILES['pimage']['tmp_name'];

    $arr = explode(".", $pfile_name);
    $last_element = count($arr) - 1;

    if ($arr[$last_element] == "jpg" || $arr[$last_element] == "jpeg" || $arr[$last_element] == "png") {
        $conn->query("UPDATE product SET category='$category', pname='$pname', price='$price', description='$description', pimage='$pfile_name' WHERE id='$uid'");
        move_uploaded_file($ptmp_name, "../p_destination/" . $pfile_name);
    } else {
        $conn->query("INSERT INTO product SET category='$category', pname='$pname', price='$price', description='$description', pimage='' WHERE id='$uid'");
    }
} else {
    $conn->query("UPDATE product SET category='$category', pname='$pname', price='$price', description='$description' WHERE id='$uid'");
}

header("location: ../../list_product.php");
