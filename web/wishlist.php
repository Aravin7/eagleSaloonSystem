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
                            <h3>Wishlist</h3>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>Wishlist</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="inner-img">
                            <img src="assets/images/inner-banner/inner-banner1.png" alt="Inner Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="cart-wraps-area pt-100 pb-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form>
                            <div class="cart-wraps">
                                <div class="cart-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">In Stock</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="product-trash">
                                                    <i class="ri-close-line"></i>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="cart.php">
                                                        <img src="assets/images/products/product-img2.png" alt="Image">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="cart.php">Nail Care Tools</a>
                                                    <div class="rating">
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                        <span>(05)</span>
                                                    </div>
                                                </td>
                                                <td class="product-name">
                                                    In Stock
                                                </td>
                                                <td class="product-price">
                                                    <span class="unit-amount">$20.00</span>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">$20.00</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <a href="cart.php" class="default-btn border-radius-5">
                                                        Add To Cart <i class="flaticon-shopping-cart-empty-side-view"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-trash">
                                                    <i class="ri-close-line"></i>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="cart.php">
                                                        <img src="assets/images/products/product-img3.png" alt="Image">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="cart.php">Nail Nourshing Oil</a>
                                                    <div class="rating">
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                        <span>(05)</span>
                                                    </div>
                                                </td>
                                                <td class="product-name">
                                                    In Stock
                                                </td>
                                                <td class="product-price">
                                                    <span class="unit-amount">$21.00</span>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">$21.00</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <a href="cart.php" class="default-btn border-radius-5">
                                                        Add To Cart <i class="flaticon-shopping-cart-empty-side-view"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-trash">
                                                    <i class="ri-close-line"></i>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="cart.php">
                                                        <img src="assets/images/products/product-img10.png" alt="Image">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="cart.php">Glitter Nail Polish</a>
                                                    <div class="rating">
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                        <span>(05)</span>
                                                    </div>
                                                </td>
                                                <td class="product-name">
                                                    In Stock
                                                </td>
                                                <td class="product-price">
                                                    <span class="unit-amount">$27.00</span>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">$27.00</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <a href="cart.php" class="default-btn border-radius-5">
                                                        Add To Cart <i class="flaticon-shopping-cart-empty-side-view"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-trash">
                                                    <i class="ri-close-line"></i>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="cart.php">
                                                        <img src="assets/images/products/product-img11.png" alt="Image">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="cart.php">Nail Care Clipper</a>
                                                    <div class="rating">
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-line"></i>
                                                        <i class="ri-star-line"></i>
                                                        <span>(05)</span>
                                                    </div>
                                                </td>
                                                <td class="product-name">
                                                    In Stock
                                                </td>
                                                <td class="product-price">
                                                    <span class="unit-amount">$30.00</span>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">$30.00</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <a href="cart.php" class="default-btn border-radius-5">
                                                        Add To Cart <i class="flaticon-shopping-cart-empty-side-view"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <div class="cart-buttons">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="product-share text-center">
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
        </section>

<?php include 'footer.php'; ?>