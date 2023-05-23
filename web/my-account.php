<?php include 'header.php'; ?>
<?php
if (!isset($_SESSION['userid'])) {
    header("Location:login.php");
}
?>
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
                    <h3>My Account</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>My Account</li>
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


<div class="my-account-area ptb-100">
    <div class="container">
        <div class="tab account-tab">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <ul class="tabs">
                        <li>
                            Dashboard
                        </li>
                        <li>
                            My Order
                        </li>
                        <li>
                            Address
                        </li>
                        <li>
                            Account Details
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="tab_content current active pl-20">
                        <div class="tabs_item current">
                            <div class="account-details">
                                <h2>Hello Leonard</h2>
                                <p>
                                    From your account dashboard. you can easily check & view your recent orders,
                                    manage your <a href="myaccount.php">shipping and billing addresses</a> and <a href="myaccount.php">edit your password and account details</a>.
                                </p>
                            </div>
                        </div>
                        <div class="tabs_item">
                            <div class="invoice-area">
                                <div class="invoice-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Description</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Midnight Musk</td>
                                                <td class="text-end">$100.00</td>
                                                <td class="text-end">$100.00</td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td>Moisture Balm</td>
                                                <td class="text-end">$25.00</td>
                                                <td class="text-end">$50.00</td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>Oil Foundation</td>
                                                <td class="text-end">$15.00</td>
                                                <td class="text-end">$45.00</td>
                                            </tr>
                                            <tr>
                                                <td>04</td>
                                                <td>Sensual Skin Trio</td>
                                                <td class="text-end">$15.00</td>
                                                <td class="text-end">$45.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end" colspan="3"><strong>Subtotal</strong></td>
                                                <td class="text-end">$195.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end" colspan="3"><strong>Sales Tax 5.0%</strong></td>
                                                <td class="text-end">$9.75</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end total" colspan="3"><strong>Total</strong></td>
                                                <td class="text-end total-price"><strong>$204.75</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="invoice-btn-box text-end">
                                    <button class="default-btn" type="submit">
                                        Send Invoice
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tabs_item">
                            <div class="invoice-area">
                                <div class="invoice-middle">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="text mb-30">
                                                <h4 class="mb-2">Bill To</h4>
                                                <span class="d-block mb-1">Jessie M Home</span>
                                                <span class="d-block mb-1">Street Name, New York,</span>
                                                <span class="d-block">NY 10014176, USA</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text">
                                                <h4 class="mb-2">Ship To</h4>
                                                <span class="d-block mb-1">Jessie M Home</span>
                                                <span class="d-block mb-1">2019 Redbud Drive</span>
                                                <span class="d-block">New York, NY 10011</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs_item">
                            <div class="contact-form">
                                <h3>Account Details</h3>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesenn voluptatum deleniti atque corrupti quos dolores et quaset accusamus et dignissimo</p>
                                <form id="contactForm">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control" required="" data-error="Please Enter Your Name" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control" required="" data-error="Please Enter Your Email" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="phone_number" id="phone_number" required="" data-error="Please Enter Your number" class="form-control" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn border-radius-5">
                                                Save Change
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

<?php include 'footer.php'; ?>
