<section class="info_section  layout_padding2-top">
    <div class="social_container">
        <div class="social_box">
            <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="info_container ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <h6>
                        ABOUT US
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info_form ">
                        <h5>
                            Newsletter
                        </h5>
                        <form action="#">
                            <input type="email" placeholder="Enter your email">
                            <button>
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6>
                        NEED HELP
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6>
                        CONTACT US
                    </h6>
                    <div class="info_link-box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span> Gb road 123 london Uk </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>+01 12345678901</span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span> demo@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https:/.php.design/">Free.php Templates</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->

</section>

<!-- end info section -->


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function abc() {
        alert("Please login to add the product to cart !!!");
    }

    function updateQuantity(id) {
        $.ajax({
            url: "quantity_update.php",
            type: "POST",
            data: $("#frm" + id).serialize(),
            success: function(res) {
                $("#cart_table").html(res);
            }
        })
    }

    $("#check").click(function() {
        var b1 = $("#bname").val();
        var b2 = $("#bemail").val();
        var b3 = $("#bphone").val();
        var b4 = $("#baddress").val();

        if ($("#check").prop("checked") == true) {
            $("#sname").val(b1);
            $("#semail").val(b2);
            $("#sphone").val(b3);
            $("#saddress").val(b4);
        } else {
            $("#sname").val("");
            $("#semail").val("");
            $("#sphone").val("");
            $("#saddress").val("");
        }
    })
</script>
<script>
    function pay() {

        var options = {
            key: "rzp_test_XMprSLT14AvVVR", // Enter the Key ID generated from the Dashboard
            amount: ' . $order->5000 . ', // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            currency: "INR",
            name: "Acme Corp",
            description: "Test transaction",
            image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
            order_id: "' . $order_IluGWxBm9U8zJ8 . '", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        };
        var rzp = new Razorpay(options);
        rzp.open();
    }
</script>
</body>

</html>