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
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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
            <form action="insert_checkout.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            Billing Details:
                        </p>
                        <p>
                            <input type="text" name="bname" id="bname" class="form-control" placeholder="Billing Name...">
                        </p>
                        <p>
                            <input type="email" name="bemail" id="bemail" class="form-control" placeholder="Billing Email...">
                        </p>
                        <p>
                            <input type="number" name="bphone" id="bphone" class="form-control" placeholder="Billing Contact no...">
                        </p>
                        <p>
                            <textarea name="baddress" id="baddress" class="form-control" placeholder="Billing Address..."></textarea>
                        </p>

                    </div>
                    <div class="col-md-6">
                        <p>
                            Shipping Details:
                        </p>
                        <p>
                            <input type="checkbox" id="check"> Same as Billing
                        </p>
                        <p>
                            <input type="text" name="sname" id="sname" class="form-control" placeholder="Shipping Name...">
                        </p>
                        <p>
                            <input type="email" name="semail" id="semail" class="form-control" placeholder="Shipping Email...">
                        </p>
                        <p>
                            <input type="number" name="sphone" id="sphone" class="form-control" placeholder="Shipping Contact no...">
                        </p>
                        <p>
                            <textarea name="saddress" id="saddress" class="form-control" placeholder="Shipping Address..."></textarea>
                        </p>
                    </div>

                </div>
                <input type="submit" value="Save & Purchase" onclick="pay();" class="btn btn-success form-control">
            </form>
        </div>
    </section>
    <!-- end cart section -->

    <!-- info section -->

    <?php include "./inc/footer.php"; ?>