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
                            <h3>Appointment</h3>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>Appointment</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="inner-img">
                            <img src="assets/images/inner-banner/inner-banner5.png" alt="Inner Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="booking-area-two pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="book-img-two">
                            <img src="assets/images/book/book-img2.jpg" alt="Book">
                            <div class="book-shape1">
                                <img src="assets/images/book/book-shape.png" alt="Book">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="booking-form pl-20">
                            <div class="section-title mb-45">
                                <span>For Your Service</span>
                                <h2>Make An Appointment</h2>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" required="" data-error="Please Enter Your Name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" required="" data-error="Please Enter Your Email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" required="" data-error="Please Enter Your Phone number" placeholder="Phone number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="form-select form-control">
                                                <option selected="">2 Person</option>
                                                <option value="1">1 Person</option>
                                                <option value="2">4 Person</option>
                                                <option value="3">7 Person</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" id="datetimepicker" class="form-control" required="" data-error="Please Enter Date" placeholder=" Enter Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" required="" data-error="Please Enter Address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="7" required="" data-error="Write your message" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Book Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include 'footer.php';?>