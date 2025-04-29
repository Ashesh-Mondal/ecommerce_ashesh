<?php
include "../db.php";
$cname = $_POST['cname'];

$cfile_name = time() . $_FILES['cimage']['name'];
$ctmp_name = $_FILES['cimage']['tmp_name'];

$arr = explode(".", $cfile_name);
$last_element = count($arr) - 1;

if ($arr[$last_element] == "jpg" || $arr[$last_element] == "jpeg" || $arr[$last_element] == "png") {
    $conn->query("INSERT INTO category SET cname='$cname', cimage='$cfile_name'");
    move_uploaded_file($ctmp_name, "../c_destination/" . $cfile_name);
} else {
    $conn->query("INSERT INTO category SET cname='$cname', cimage=''");
}

header("location: ../../list_category.php");
