<?php
session_start();
include "./inc/db.php";
if (empty($_SESSION['user_id'])) {
    header("location: ./user/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "./inc/sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "./inc/topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update Category</h1>
                    <?php
                    $uid = $_GET['uid'];
                    $sel = "SELECT * FROM category WHERE id='$uid'";
                    $result = $conn->query($sel);
                    $row = $result->fetch_assoc();
                    ?>
                    <form action="./inc/category/update_category.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="category_uid" value="<?php echo $uid; ?>">
                        <p>
                            Category Name:
                            <input type="text" name="cname" class="form-control" value="<?php echo $row['cname']; ?>">
                        </p>
                        <p>
                            Category Image:
                            <input type="file" name="cimage" class="form-control">
                        </p>
                        <p>
                            <img src="./inc/c_destination/<?php echo $row['cimage']; ?>" style="width:100px;"><?php echo $row['cimage']; ?>
                        </p>
                        <p>
                            <input type="submit" value="Update" name="update" class="btn btn-warning">
                        </p>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "./inc/footer.php"; ?>