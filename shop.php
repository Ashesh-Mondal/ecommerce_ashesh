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

  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <!-- Search Form -->
      <div>
        <form action="" method="post" class="form-inline">
          <div class="form-row">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" name="search_item" placeholder="Search by name...">
            </div>
            <input type="submit" name="search" value="Search" class="btn btn-primary mb-2" />
          </div>
        </form>
      </div>
      <!-- Search Form Ends -->
      <div class="row">
        <?php
        if (isset($_POST['search'])) {
          $search = $_POST['search_item'];
          $result = $conn->query("SELECT * FROM product WHERE pname LIKE '%$search%'");
        } else {
          $result = $conn->query("SELECT * FROM product");
        }
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="box">
                <div class="img-box">
                  <img src="./admin/inc/p_destination/<?php echo $row['pimage'] ?>">
                </div>
                <div class="detail-box">
                  <h6><?php echo $row['pname'] ?></h6>
                </div>
                <h6>Price<span> &#8377; <?php echo $row['price'] ?></span></h6>
                <?php if (!empty($_SESSION['uid'])) { ?>
                  <form action="inscart.php" method="post">
                    <input type="hidden" name="pid" value="<?php echo $row['id'] ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                    <p><input type="number" name="qty" value="1" min="1" class="form-control"></p>
                    <p><input type="submit" value="Add To Cart" class="btn btn-dark form-control"></p>
                  </form>
                <?php } else { ?>
                  <p><a onclick="abc();" class="addToCartBtn">Buy Now</a></p>
                <?php } ?>
                <div class="new"><span>New</span></div>
              </div>
            </div>
          <?php }
        } else { ?>
          <h6>No data found</h6>
        <?php } ?>
      </div>
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>

  <!-- end shop section -->

  <!-- info section -->

  <?php include "./inc/footer.php" ?>