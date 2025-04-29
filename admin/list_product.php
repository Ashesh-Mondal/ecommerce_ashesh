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
                    <h1 class="h3 mb-4 text-gray-800">List Product</h1>

                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $conn->query("SELECT product.*, category.cname FROM product JOIN category ON category.id=product.category_id");
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['cname'] ?></td>
                                    <td><?php echo $row['pname'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><img src="./inc/p_destination/<?php echo $row['pimage']; ?>" style="width: 100px;"></td>
                                    <td>
                                        <a href="./inc/product/delete_product.php?did=<?php echo $row['id'] ?>" class="btn btn-danger" style="margin-bottom: 10px;">Delete</a>
                                        <a href="updateForm_product.php?uid=<?php echo $row['id'] ?>" class="btn btn-warning">Update</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "./inc/footer.php"; ?>