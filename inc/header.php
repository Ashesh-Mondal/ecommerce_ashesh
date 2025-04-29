<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
            <span>
                Giftos
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="why.php">
                        Why Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testimonial.php">
                        Testimonial
                    </a>
                </li>

                <?php if (empty($_SESSION['uid'])) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register User</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Login
                            </span>
                        </a>
                    </li>

                <?php } else { ?>
                    <li class="nav-item">
                        <a href="order.php" class="nav-link">
                            <span>
                                Placed Orders
                            </span>
                        </a>
                    </li>
                    <div class="user_option">
                        <a href="cart.php">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        </a>
                    </div>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Logout
                            </span>
                        </a>
                    </li>

                <?php } ?>
            </ul>
        </div>
    </nav>
</header>