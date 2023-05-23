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
                            <h3>Checkout</h3>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="inner-img">
                            <img src="assets/images/inner-banner/inner-banner3.png" alt="Inner Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="checkout-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="checkout-user mb-45">
                                    <span> Already Have an Account? <a href="login.php">Click here to Log In</a></span>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="checkout-coupon-form-area">
                                    <form class="checkout-coupon-form">
                                        <input type="text" class="form-control" placeholder="Coupon Code">
                                        <button class="subscribe-btn" type="submit">
                                            Apply
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="billing-details">
                                <h3 class="title">Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Address Link2">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Town / City">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Postcode / Zip">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Company Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email Address ">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="notes" id="notes" cols="30" rows="7" placeholder="Order Notes" class="form-message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn">
                                            Place an Order
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="checkout-table ml-20 mb-30">
                            <h3>Your Order</h3>
                            <form>
                                <div class="cart-wraps">
                                    <div class="cart-table table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="cart.php">
                                                            <img src="assets/images/products/product-img1.png" alt="Image">
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a href="cart.php">Nail Polish</a>
                                                        <div class="rating">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-line"></i>
                                                            <i class="ri-star-line"></i>
                                                            <span>(05)</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-quentaty">
                                                        x 1
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="unit-amount">$20.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="cart.php">
                                                            <img src="assets/images/products/product-img2.png" alt="Image">
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a href="cart.php">Nail Care Tools </a>
                                                        <div class="rating">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-line"></i>
                                                            <i class="ri-star-line"></i>
                                                            <span>(05)</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-quentaty">
                                                        x 1
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="unit-amount">$30.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="cart.php">
                                                            <img src="assets/images/products/product-img3.png" alt="Image">
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a href="cart.php">Nail Oil </a>
                                                        <div class="rating">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-line"></i>
                                                            <i class="ri-star-line"></i>
                                                            <span>(05)</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-quentaty">
                                                        x 1
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="unit-amount">$33.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="payment-box ml-20">
                            <div class="payment-method">
                                <h3>Payment Method</h3>
                                <p>
                                    There are many variations of passages of Lorem Ipsum available,
                                    but the majority have suffered alteration in some form, by injehumour,
                                    or randomised words which don't look even slightly believable.
                                </p>
                                <p>
                                    <input type="radio" id="direct-bank-transfer" name="radio-group" checked="">
                                    <label for="direct-bank-transfer">Direct Bank Transfer</label>
                                </p>
                                <p>
                                    <input type="radio" id="paypal" name="radio-group">
                                    <label for="paypal">PayPal</label>
                                </p>
                                <p>
                                    <input type="radio" id="cash-on-delivery" name="radio-group">
                                    <label for="cash-on-delivery">Cash On Delivery</label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include 'footer.php'; ?>