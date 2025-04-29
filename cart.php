<?php
session_start();
include "./admin/inc/db.php";
if (empty($_SESSION['uid'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>
        Giftos
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <?php include "./inc/header.php"; ?>
        <!-- end header section -->
        <!-- slider section -->

        <section class="slider_section">
            <div class="slider_container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h2>
                                                Welcome To Our <br>
                                                Gift Shop <?php echo $_SESSION['uname'] ?>
                                            </h2>
                                            <p>
                                                Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.
                                            </p>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <img src="images/slider-img.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h2>
                                                Welcome To Our <br>
                                                Gift Shop <?php echo $_SESSION['uname'] ?>
                                            </h2>
                                            <p>
                                                Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.
                                            </p>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <img src="images/slider-img.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_btn-box">
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <img src="images/line.png" alt="" />
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>
    <!-- end hero area -->

    <!-- cart section -->
    <section class="cart-section" style="margin: 50px 0px;">
        <div class="container" id="cart_table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Remove Item</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sub_total = 0;
                    $cid = $_SESSION['uid'];
                    $res = $conn->query("SELECT * FROM cart JOIN product ON cart.pid = product.id WHERE cid='$cid'");
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            $sub_total = $sub_total + ($row['price'] * $row['qty']);
                    ?>
                            <tr>
                                <td><?php echo $row['pname'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><img src="./admin/inc/p_destination/<?php echo $row['pimage'] ?>" style="width: 100px;"></td>
                                <td>
                                    <form id="frm<?php echo $row['cart_id']; ?>">
                                        <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                                        <input type="number" name="qty" min="1" value="<?php echo $row['qty'] ?>" onchange="updateQuantity(<?php echo $row['cart_id']; ?>)" onkeydown="updateQuantity(<?php echo $row['cart_id']; ?>)" onkeyup="updateQuantity(<?php echo $row['cart_id']; ?>)">
                                    </form>
                                </td>
                                <td>&#8377;<?php echo ($row['price'] * $row['qty']); ?></td>
                                <td>
                                    <a href="delete_item.php?did=<?php echo $row['pid']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <th colspan="5" style="text-align: center;">None of the items were added yet</th>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="4">Sub Total:</th>
                        <th><?php echo $sub_total; ?></th>
                    </tr>
                </tbody>
            </table>

            <a href="checkout.php" class="btn btn-success form-control" style="color: #fff; cursor: pointer;">Proceed to Checkout</a>
        </div>
    </section>
    <!-- end cart section -->

    <!-- info section -->

    <?php include "./inc/footer.php"; ?>