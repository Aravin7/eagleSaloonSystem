<!-- start footer-area -->
<footer class="footer-area footer-bg">
    <div class="container pt-100 pb-70">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget pe-5">
                    <div class="footer-logo">
                        <a href="index.php">
                            <img src="assets/images/logos/logo.png" class="footer-logo1" alt="Images">
                        </a>
                        <a href="index.php">
                            <img src="assets/images/logos/logo-white.png" class="footer-logo2" alt="Images">
                        </a>
                    </div>
                    <p>
                        Pellentesque habitant morbi tristique senectus netus malesuada fames ac turpis egestas vesti ulum tortor quam bulum tortor feugiat
                    </p>
                    <ul class="social-link">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" target="_blank">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/" target="_blank">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://vimeo.com/" target="_blank">
                                <i class="ri-vimeo-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget pe-2">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="testimonials.php">Testimonials</a></li>
                        <li><a class="text-muted" href="faq.php">FAQ</a></li>
                        <li><a class="text-muted" href="team.php">Team</a></li>
                        <li><a class="text-muted" href="terms-condition.php">Terms & Conditions</a></li>
                        <li><a class="text-muted" href="privacy-policy.php">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="footer-widget ps-4">
                    <h3>Salon Hours</h3>
                    <ul class="salon-hours">
                        <li>
                            <div class="content">
                                <h3>Monday - Friday</h3>
                                <span>09:00 AM - 10:00 PM </span>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <h3>Saturday - Sunday</h3>
                                <span>10:00 AM - 08:00 PM </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget ps-3">
                    <h3>Get In Touch</h3>
                    <ul class="footer-contact">
                        <?php
                        $db = dbConnection();
                        $sql = "SELECT* FROM tbl_saloon_contact";
                        $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>        
                                <li>
                                    <i class="ri-phone-fill"></i>
                                    <div class="content">
                                        <h4>Contact Us</h4>
                                        <span><a href="tel:+123456778" target="_blank"><?=$row['PhoneNumber']?></a></span>
                                    </div>
                                </li>   
                                <li>
                                    <i class="ri-mail-fill"></i>
                                    <div class="content">
                                        <h4>Email:</h4>
                                        <span><a href="/cdn-cgi/l/email-protection#d6beb3babab996b8b7b9b8f8b5b9bb" target="_blank"><span class="__cf_email__" data-cfemail="b9d1dcd5d5d6f9d7d8d6d797dad6d4"><?=$row['Email']?></span></a></span>
                                    </div>
                                </li>
                                <li>
                                    <i class="ri-map-pin-fill"></i>
                                    <div class="content">
                                        <h4>Address</h4>
                                        <span><?=$row['AddressLine']?>,</span>
                                        <span> <?=$row['City']?></span>
                                    </div>
                                </li>       
                                <?php
                            }
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer-area -->


<!-- start copyright-area -->
<div class="copyright-area">
    <div class="container">
        <div class="copy-right-text text-center">
            <p>
                Copyright @<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear())</script> All Rights Reserved
            </p>
        </div>
    </div>
</div>
<!-- END copyright-area -->


<!-- Start Product MOdal-area -->
<div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close-on" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ri-close-fill"></i></span>
            </button>
            <div class="product-details-desc">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="products-quickView-image">
                            <img src="assets/images/products/product-details.png" alt="Product Details">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-desc mb-30 pl-20">
                            <h3>Nail Polish Removers </h3>
                            <div class="price">
                                <span class="old-price">$140.00 </span>
                                <span class="new-price">- $110.00</span>
                            </div>
                            <div class="product-review">
                                <div class="rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="rating-count">255 Reviews</div>
                            </div>
                            <p>
                                Voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.
                            </p>
                            <ul class="product-category-list">
                                <li>Availablity: <span>In Stock</span></li>
                                <li>Tags: <span>Nail, Lover</span> </li>
                            </ul>
                            <div class="input-counter-area">
                                <h4>Quantity</h4>
                                <div class="input-counter">
                                    <span class="minus-btn"><i class="ri-add-fill"></i></span>
                                    <input type="text" value="1">
                                    <span class="plus-btn"><i class="ri-subtract-line"></i></span>
                                </div>
                            </div>
                            <div class="product-add-btn">
                                <button type="submit" class="default-btn border-radius-5">
                                    Add To Cart <i class="ri-shopping-cart-fill"></i>
                                </button>
                                <ul class="products-action">
                                    <li><a href="compare.php"> <i class="ri-arrow-left-right-line"></i></a></li>
                                    <li><a href="wishlist.php"><i class="ri-heart-line"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-share">
                                <ul>
                                    <li>
                                        <span>Share:</span>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/" target="_blank">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/" target="_blank">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://vimeo.com/" target="_blank">
                                            <i class="ri-vimeo-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END Product MOdal-area -->

<script src="assets/js/jquery.min.js"></script>

<script src="assets/js/plugins.js"></script>
<script src="assets/js/tweenMax.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
