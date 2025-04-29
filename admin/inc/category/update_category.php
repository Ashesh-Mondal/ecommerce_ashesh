<?php

include "../db.php";

$uid = $_POST['category_uid'];
$cname = $_POST['cname'];

if ($_FILES['cimage']['name']) {

    $result = $conn->query("SELECT * FROM category WHERE id='$uid'");
    $row = $result->fetch_assoc();

    unlink("../c_destination/" . $row['cimage']);

    $file_name = time() . $_FILES['cimage']['name'];
    $tmp_name = $_FILES['cimage']['tmp_name'];


    $arr = explode(".", $file_name);
    $last_element = count($arr) - 1;
    if ($arr[$last_element] == "jpg" || $arr[$last_element] == "jpeg" || $arr[$last_element] == "png") {
        $conn->query("UPDATE category SET cname='$cname', cimage='$file_name' WHERE id='$uid'");
        move_uploaded_file($tmp_name, "../c_destination/" . $file_name);
    }
} else {
    $conn->query("UPDATE category SET cname='$cname' WHERE id='$uid'");
}

header("location: ../../list_category.php");
