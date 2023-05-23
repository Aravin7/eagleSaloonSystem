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
                    <h3>Shop</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner8.png" alt="Inner Banner">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="shop-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="product-topper mb-45">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-6">
                            <div class="product-title">
                                <h3>Showing 1-9 of 12 results</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="product-list">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected="">Default Price</option>
                                    <option value="1">Price High To Low</option>
                                    <option value="2">Price Low To High</option>
                                </select>
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php
                    $db = dbConnection();
                    $sql = "SELECT* FROM tbl_online_products_inventory";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="products-card products-card-short-css">
                                    <div class="product-img">
                                        <a href="shop-details.php?OnlineProductId=<?php echo $row['OnlineProductId'] ?>">
                                            <img src="../system/assets/images/online_products_image/<?= $row['OnlineProductImage'] ?>" alt="Products">
                                        </a>
                                        <ul class="products-action-two">
                                            <li><a href="cart.php"><i class="ri-shopping-cart-line"></i></a></li>
                                            <li><a href="compare.php"> <i class="ri-arrow-left-right-line"></i></a></li>
                                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class="ri-eye-line"></i></a></li>
                                            <li><a href="wishlist.php"><i class="ri-heart-line"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <h3><a href="shop-details.php"><?= $row['OnlineProductName'] ?></a></h3>
                                        <span>Rs.<?= $row['OnlineProductCurrentPrice'] ?></span>
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
                            <?php
                        }
                    }
                    ?>
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
            <div class="col-lg-3">
                <div class="side-bar-area pl-20">
                    <div class="search-widget">
                        <form class="search-form">
                            <input type="search" class="form-control" placeholder="Search">
                            <button type="submit">
                                <i class="flaticon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="side-bar-widget">
                        <h3 class="title-two">Prices</h3>
                        <form class="price-range-content">
                            <div class="price-range-bar" id="range-slider"></div>
                            <div class="price-range-filter">
                                <div class="price-range-filter-item d-flex align-items-center order-1 order-xl-2">
                                    <h4>Range:</h4>
                                    <input type="text" id="price-amount" readonly="">
                                </div>
                                <div class="price-range-filter-item price-range-filter-button order-2 order-xl-1">
                                    <button class="btn btn-red btn-icon">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Product Model -->
<div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close-on" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='flaticon-close'></i></span>
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
                                    Add To Cart <i class="flaticon-shopping-cart-empty-side-view"></i>
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



<?php include 'footer.php'; ?>