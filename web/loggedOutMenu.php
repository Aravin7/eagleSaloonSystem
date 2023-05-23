<!-- start Top header bar -->
<header class="top-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-9">
                <div class="header-left">
                    <ul>
                        <?php
                        $db = dbConnection();
                        $sql = "SELECT* FROM tbl_saloon_contact";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>  
                                <li>
                                    <i class="ri-mail-fill"></i>
                                    <a href="/cdn-cgi/l/email-protection#89e0e7efe6c9e7e8e6e7a7eae6e4"><span class="__cf_email__" data-cfemail="563f38303916383739387835393b"><?= $row['Email'] ?></span></a>
                                </li>
                                <li>
                                    <i class="ri-phone-fill"></i>
                                    <a href="tel:+123-456-778"><?= $row['PhoneNumber'] ?></a>
                                </li>
                                <li>
                                    <i class="ri-time-fill"></i>
                                    Everyday 7 AM to 7 PM Sunday Off
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-3">
                <div class="header-right header-right-color authentication">
                    <ul class="#">
                        <li>
                            <a href="register.php">
                                <i class="ri-user-line"></i>Register 
                            </a>
                        </li>
                        <li>
                            <a href="login.php">
                                Sign in
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end Top header bar -->

<!-- start Top nav bar -->

<!-- Logo -->
<div class="navbar-area">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="index.php">
                        <img src="assets/images/logos/logo-small.png" class="logo-one" alt="logo">
                        <img src="assets/images/logos/logo-white-small.png" class="logo-two" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav nav-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/images/logos/logo.png" class="logo-one" alt="Logo">
                    <img src="assets/images/logos/logo-white.png" class="logo-two" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                Pages
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="testimonials.php" class="nav-link">
                                        Testimonials
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="faq.php" class="nav-link">
                                        FAQ
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        Team
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="team.php" class="nav-link">
                                                Team
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="team-details.php" class="nav-link">
                                                Team Details
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        Pricing Plan
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="pricing.php" class="nav-link">
                                                Pricing Plan Style One
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="terms-condition.php" class="nav-link">
                                        Terms & Conditions
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="privacy-policy.php" class="nav-link">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="404.php" class="nav-link">
                                        404 Page
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="coming-soon.php" class="nav-link">
                                        Coming Soon
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="services.php" class="nav-link">
                                Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                Shop
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="shop.php" class="nav-link">Shop</a>
                                </li>
                                <li class="nav-item">
                                    <a href="cart.php" class="nav-link">Cart</a>
                                </li>
                                <li class="nav-item">
                                    <a href="checkout.php" class="nav-link">Checkout</a>
                                </li>
                                <li class="nav-item">
                                    <a href="wishlist.php" class="nav-link">Wishlist</a>
                                </li>
                                <li class="nav-item">
                                    <a href="shop-details.php" class="nav-link">Shop Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="tracking-order.php" class="nav-link">Tracking Order</a>
                                </li>
                                <li class="nav-item">
                                    <a href="compare.php" class="nav-link">Compare</a>
                                </li>
                                <li class="nav-item">
                                    <a href="customer-services.php" class="nav-link">Customer Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="my-account.php" class="nav-link">My Account</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                    <div class="others-options d-flex align-items-center">
                        <div class="optional-item">
                            <a class="optional-appointment-cart" href="booking_cart.php">
                                <i class="ri-file-list-line"></i>
                                <span>2</span>
                            </a>
                        </div>
                        <div class="optional-item">
                            <a class="optional-item-cart" href="cart.php">
                                <i class="ri-shopping-cart-line"></i>
                                <span>2</span>
                            </a>
                        </div>
                    </div>
                    <div class="mobile-nav">
                        <div class="mobile-other d-flex align-items-center">
                            <div class="optional-item">
                                <a class="optional-appointment-cart" href="booking_cart.php">
                                    <i class="ri-file-list-line"></i>
                                    <span>2</span>
                                </a>
                            </div>
                            <div class="optional-item">
                                <a class="optional-item-cart" href="cart.php">
                                    <i class="ri-shopping-cart-line"></i>
                                    <span>2</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Top nav bar -->