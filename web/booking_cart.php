<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<?php
extract($_POST);
//print_r($_SESSION['services']);
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$action == 'remove') {
    $cart = $_SESSION['services'];
    unset($cart[$serviceId]);
    $_SESSION['services'] = $cart;
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && @$action == 'empty') {
    $_SESSION['services'] = array();
}
?>

<!-- Start Modal -->
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
<!-- End Modal -->


<div class="inner-banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7">
                <div class="inner-title">
                    <h3>Booking Services</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>booking</li>
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
                <?php
                if (empty($_SESSION['services'])) {
                    //shows the message no booking services selected
                    ?>     
                    <div class="empty-cart-message">
                        <p>No booking services selected.</p>
                    </div>
                    <?php
                } else {
                    //shows the booking services list
                    ?>
                    <div class="cart-wraps">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Service</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($_SESSION['services'] as $key => $value) {
                                        ?>
                                        <tr>

                                            <td class="product-name">
                                                <a href="#"><?= $value['serviceName'] ?></a>
                                            </td>
                                            <td class="product-Duration">
                                                <span class="#">Rs.<?= $value['price'] ?></span>
                                            </td>
                                            <td class="product-price">
                                                <span class="unit-amount"><?= $value['duration'] ?>min</span>
                                            </td>
                                            <!--<td class="product-subtotal">
                                                <span class="subtotal-amount">$20.00</span>
                                            </td>-->
                                            <td class="product-trash">
                                                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                                    <input type="hidden" name="serviceId" value="<?= $key ?>">
                                                    <button type="submit" name="action" value="remove"><i class="ri-close-fill"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cart-buttons">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 text-end">
                                <div>
                                    <a href="shop.php" class="default-btn two">
                                        Continue booking
                                    </a>
                                    <a href="cart.php" class="default-btn">
                                        Select the date
                                    </a>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
                                        <a class="default-btn two" type="submit" name="action" value="empty">Empty Cart</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>