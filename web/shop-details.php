<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<div class="modal fade fade-scale searchmodal" id="searchmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal-search-form">
                    <input type="search" class="search-field" placeholder="Search...">
                    <button type="submit"><i class="ri-search-line"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Shop Details</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Shop Details</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner7.png" alt="Inner Banner">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="product-details-area pt-100 pb-70">
    <div class="container">
        <div class="product-details-desc">
            <div class="row align-items-center">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "GET") {
                    extract($_GET);
                    $db = dbConnection();
                    $sql = "SELECT* FROM tbl_online_products_inventory where OnlineProductId='$OnlineProductId'";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $ProductQty = $row['ProductQty'];
                            //$ProductQty=4;
                            $ProductAvailabilty = NULL;
                            //show the appropriate message depends stocks availablity
                            switch (true) {
                                case ($ProductQty < 5):
                                    $ProductAvailabilty = "Low Stock: Only $ProductQty Available !";
                                    break;
                                case ($ProductQty >= 5):
                                    $ProductAvailabilty = "In Stock";
                                    break;
                                default:
                                    $ProductAvailabilty = "Not Available now";
                                    break;
                            };
                            ?>            
                            <div class="col-lg-6 col-md-12">
                                <div class="products-quickView-image">
                                    <img src="../system/assets/images/online_products_image/<?php echo $row['OnlineProductImage'] ?>" alt="Product Details">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="product-desc mb-30 pl-20">
                                    <h3><?php echo $row['OnlineProductName'] ?></h3>
                                    <div class="price">
                                        <span class="old-price">Rs.<?php echo $row['OnlineProductOldPrice'] ?></span>
                                        <span class="new-price">- Rs.<?php echo $row['OnlineProductCurrentPrice'] ?></span>
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
                                        <?php echo $row['OnlineProductDescription'] ?>
                                    </p>

                                    <ul class="product-category-list">
                                        <li>Availablity: <span><?= $ProductAvailabilty; ?></span></li>
                                    </ul>
                                    <div class="input-counter-area">
                                        <h4>Quantity</h4>
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class="ri-subtract-line"></i></span>
                                            <input type="text" value="1">
                                            <span class="plus-btn"><i class="ri-add-fill"></i></span>
                                        </div>
                                    </div>
                                    <div class="product-add-btn">
                                        <form method="post" action="cart_process.php">
                                            <input type="hidden" name="sku" value="<?= $Sku; ?>">
                                            <button type="submit" name="sku" value="add" class="default-btn border-radius-5">
                                                Add To Cart <i class="ri-shopping-cart-line"></i>
                                            </button>
                                        </form>
                                        <a class="default-btn two border-radius-5" href="shop.php">Continue Shopping <i class="ri-shopping-bag-line"></i></a>
                                        <ul class="products-action">
                                            <li><a href="compare.php"> <i class="ri-arrow-left-right-line"></i></a></li>
                                            <li><a href="wishlist.php"><i class="ri-heart-line"></i></a></li>
                                        </ul>
                                    </div>  
                                </div>
                            </div> 
                            <?php
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>

<!-- Additional Information Sections -->
<div class="shop-details-tab-area section-bg pt-100 pb-70">
    <div class="container">
        <div class="tab shop-detls-tab">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="tabs text-center">
                        <li>
                            Reviews <span> (01) </span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="tab_content current active">
                        <div class="tabs_item current">
                            <div class="shop-detls-tab-content">
                                <div class="shop-detls-into">
                                    <div class="shop-review-form">
                                        <h3>Customer Reviews</h3>
                                        <div class="review-title">
                                            <div class="rating">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-half-fill"></i>
                                            </div>
                                            <p>Based on 3 reviews</p>
                                            <a href="shop-details.php" class="default-btn btn-right">Write a Review <span></span></a>
                                        </div>
                                        <div class="review-comments">
                                            <div class="review-item">
                                                <div class="content">
                                                    <img src="assets/images/products/product-user.jpg" alt="Images">
                                                    <div class="content-dtls">
                                                        <h4>Heather Joanne </h4>
                                                        <span>15 Dec, 2021 AT 06:30 PM</span>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star-half'></i>
                                                </div>
                                                <h3>Good</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation.
                                                </p>
                                                <a href="shop-details.php" class="review-report-link">Report as Inappropriate</a>
                                            </div>
                                            <div class="review-item">
                                                <div class="content">
                                                    <img src="assets/images/products/product-user2.jpg" alt="Images">
                                                    <div class="content-dtls">
                                                        <h4>Penelope Rachel</h4>
                                                        <span>15 Dec, 2021 AT 06:30 PM</span>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star-half'></i>
                                                </div>
                                                <h3>Good</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                                <a href="shop-details.php" class="review-report-link">Report as Inappropriate</a>
                                            </div>
                                            <div class="review-item">
                                                <div class="content">
                                                    <img src="assets/images/products/product-user3.jpg" alt="Images">
                                                    <div class="content-dtls">
                                                        <h4>Leonard Richard</h4>
                                                        <span> 15 Dec, 2021 AT 06:30 PM</span>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star'></i>
                                                    <i class='bx bxs-star-half'></i>
                                                </div>
                                                <h3>Good</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                                <a href="shop-details.php" class="review-report-link">Report as Inappropriate</a>
                                            </div>
                                        </div>
                                        <div class="review-form">
                                            <div class="contact-wrap-form">
                                                <div class="contact-form">
                                                    <h4>Write a Review</h4>
                                                    <form id="contactForm">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="Your Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Your Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <input type="text" name="website" class="form-control" required="" data-error="Your website" placeholder="Your Website">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required="" data-error="Write your message" placeholder="Your Message.."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12">
                                                                <button type="submit" class="default-btn">
                                                                    Post A Comment
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Related Products Sections -->
<div class="shop-related-area pt-100 pb-70">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>Related Products</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="products-card products-card-short-css">
                    <div class="product-img">
                        <a href="shop-details.php">
                            <img src="assets/images/products/product-img1.png" alt="Products">
                        </a>
                        <ul class="products-action-two">
                            <li><a href="cart.php"><i class="ri-shopping-cart-line"></i></a></li>
                            <li><a href="compare.php"> <i class="ri-arrow-left-right-line"></i></a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="ri-eye-line"></i></a></li>
                            <li><a href="wishlist.php"><i class="ri-heart-line"></i></a></li>
                        </ul>
                    </div>
                    <div class="content">
                        <h3><a href="shop-details.php">Nail Polish Removers</a></h3>
                        <span>21.00$</span>
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="products-card products-card-short-css">
                    <div class="product-img">
                        <a href="shop-details.php">
                            <img src="assets/images/products/product-img2.png" alt="Products">
                        </a>
                        <ul class="products-action-two">
                            <li><a href="cart.php"><i class="ri-shopping-cart-line"></i></a></li>
                            <li><a href="compare.php"> <i class="ri-arrow-left-right-line"></i></a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="ri-eye-line"></i></a></li>
                            <li><a href="wishlist.php"><i class="ri-heart-line"></i></a></li>
                        </ul>
                    </div>
                    <div class="content">
                        <h3><a href="shop-details.php">Nail Care Tools Premium</a></h3>
                        <span>31.00$</span>
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="products-card products-card-short-css">
                    <div class="product-img">
                        <a href="shop-details.php">
                            <img src="assets/images/products/product-img3.png" alt="Products">
                        </a>
                        <ul class="products-action-two">
                            <li><a href="cart.php"><i class="ri-shopping-cart-line"></i></a></li>
                            <li><a href="compare.php"> <i class="ri-arrow-left-right-line"></i></a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="ri-eye-line"></i></a></li>
                            <li><a href="wishlist.php"><i class="ri-heart-line"></i></a></li>
                        </ul>
                    </div>
                    <div class="content">
                        <h3><a href="shop-details.php">Nail Nourishing Oil</a></h3>
                        <span>28.00$</span>
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="products-card products-card-short-css">
                    <div class="product-img">
                        <a href="shop-details.php">
                            <img src="assets/images/products/product-img10.png" alt="Products">
                        </a>
                        <ul class="products-action-two">
                            <li><a href="cart.php"><i class="ri-shopping-cart-line"></i></a></li>
                            <li><a href="compare.php"> <i class="ri-arrow-left-right-line"></i></a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="ri-eye-line"></i></a></li>
                            <li><a href="wishlist.php"><i class="ri-heart-line"></i></a></li>
                        </ul>
                    </div>
                    <div class="content">
                        <h3><a href="shop-details.php">Glitter Nail Polish</a></h3>
                        <span>20.00$</span>
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-line"></i>
                            <i class="ri-star-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 text-center">
                <div class="pagination-area">
                    <a href="blog-1.php" class="prev page-numbers">
                        <i class="flaticon-arrow-pointing-to-left"></i>
                    </a>
                    <span class="page-numbers current" aria-current="page">1</span>
                    <a href="blog-1.php" class="page-numbers">2</a>
                    <a href="blog-1.php" class="page-numbers">3</a>
                    <a href="blog-1.php" class="next page-numbers">
                        <i class="flaticon-arrow-pointing-to-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close-on" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='flaticon-close'></i></span>
            </button>
            <div class="product-details-desc">
                <div class="row align-items-center">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "GET") {
                        extract($_GET);
                        $db = dbConnection();
                        $sql = "SELECT* FROM tbl_online_products_inventory where OnlineProductId='$OnlineProductId'";
                        $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $ProductQty = $row['ProductQty'];
                                //$ProductQty=4;
                                $ProductAvailabilty = NULL;
                                //show the appropriate message depends stocks availablity
                                switch (true) {
                                    case ($ProductQty < 5):
                                        $ProductAvailabilty = "Low Stock: Only $ProductQty Available !";
                                        break;
                                    case ($ProductQty >= 5):
                                        $ProductAvailabilty = "In Stock";
                                        break;
                                    default:
                                        $ProductAvailabilty = "Not Available now";
                                        break;
                                };
                                ?>            
                                <div class="col-lg-6 col-md-12">
                                    <div class="products-quickView-image">
                                        <img src="../system/assets/images/online_products_image/<?php echo $row['OnlineProductImage'] ?>" alt="Product Details">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="product-desc mb-30 pl-20">
                                        <h3><?php echo $row['OnlineProductName'] ?></h3>
                                        <div class="price">
                                            <span class="old-price">Rs.<?php echo $row['OnlineProductOldPrice'] ?></span>
                                            <span class="new-price">- Rs.<?php echo $row['OnlineProductCurrentPrice'] ?></span>
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
                                            <?php echo $row['OnlineProductDescription'] ?>
                                        </p>

                                        <ul class="product-category-list">
                                            <li>Availablity: <span><?= $ProductAvailabilty; ?></span></li>
                                        </ul>
                                        <div class="input-counter-area">
                                            <h4>Quantity</h4>
                                            <div class="input-counter">
                                                <span class="minus-btn"><i class="ri-subtract-line"></i></span>
                                                <input type="text" value="1">
                                                <span class="plus-btn"><i class="ri-add-fill"></i></span>
                                            </div>
                                        </div>
                                        <div class="product-add-btn">
                                            <button type="submit" class="default-btn border-radius-5">
                                                Add To Cart <i class="ri-shopping-cart-line"></i>
                                            </button>
                                            <a class="default-btn border-radius-5" href="shop.php">Continue Shopping <i class="ri-shopping-bag-line"></i></a>
                                            <ul class="products-action">
                                                <li><a href="compare.php"> <i class="ri-arrow-left-right-line"></i></a></li>
                                                <li><a href="wishlist.php"><i class="ri-heart-line"></i></a></li>
                                            </ul>
                                        </div>  
                                    </div>
                                </div> 
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
