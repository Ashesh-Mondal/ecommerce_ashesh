<?php
session_start();
include "./admin/inc/db.php";

if (isset($_POST['login'])) {
    $email_contact = $_POST['email_contact'];
    $pass = $_POST['pass'];

    $result = $conn->query("SELECT * FROM user WHERE (email='$email_contact' OR contact='$email_contact') AND password='$pass'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['uid'] = $row['id'];
        $_SESSION['uname'] = $row['name'];
        $_SESSION['uemail'] = $row['email'];
        $_SESSION['ucontact'] = $row['contact'];

        header("location: shop.php");
    }
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

    </div>
    <!-- end hero area -->

    <!-- contact section -->

    <section class="contact_section layout_padding">
        <div class="container px-0">
            <div class="heading_container ">
                <h2 class="">
                    Login User
                </h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-md-6 col-lg-12 px-0">
                    <!-- User Registration form -->
                    <form action="" method="post">
                        <div>
                            <input type="email" name="email_contact" placeholder="Email" />
                        </div>
                        <div>
                            <input type="password" name="pass" placeholder="Password" />
                        </div>
                        <div class="d-flex" style="background-color: #db4f66; height:50px;">
                            <input type="submit" value="Login" name="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact section -->

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="js/custom.js"></script>

</body>

</html>