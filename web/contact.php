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
<?php
$db = dbConnection();
$sql = "SELECT* FROM tbl_saloon_contact";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>  

        <div class="inner-banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="inner-title">
                            <h3>Contact Us</h3>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="inner-img">
                            <img src="assets/images/inner-banner/inner-banner2.png" alt="Inner Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="contact-information-area pt-100 pb-70">
            <div class="container">
                <div class="contact-information-max">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-6">
                            <div class="contact-info-card">
                                <i class="ri-mail-fill"></i>
                                <h3>Send Email</h3>
                                <p><a href="/cdn-cgi/l/email-protection#cba2a5ada48ba5aaa4a5e5a8a4a6"><span class="__cf_email__" data-cfemail="7b12151d143b151a141555181416"><?=$row['Email']?></span></a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="contact-info-card">
                                <i class="ri-phone-fill"></i>
                                <h3>Call Center</h3>
                                <p><a href="tel:(+01)1233215789"><?=$row['PhoneNumber']?></a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="contact-info-card">
                                <i class="ri-map-pin-fill"></i>
                                <h3>Visit Anytime</h3>
                                <p> <?=$row['AddressLine']?>, </p>
                                <p> <?=$row['City']?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>

<div class="contact-widget-area pb-70">
    <div class="container">
        <div class="contact-widget-max">
            <div class="contact-form">
                <div class="section-title text-center">
                    <h2>Do You’ve Any Question?</h2> 
                </div>
                <form id="contactForm">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" required="" data-error="Please Enter Your Name" placeholder="Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required="" data-error="Please Enter Your Email" placeholder="Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="phone_number" id="phone_number" required="" data-error="Please Enter Your number" class="form-control" placeholder="Phone Number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please Enter Your Subject" placeholder="Your Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="7" required="" data-error="Write your message" placeholder="Your Message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="agree-label">
                                <input type="checkbox" id="chb1">
                                <label for="chb1">
                                    Accept <a href="terms-condition.php">Terms & Conditions</a> And <a href="privacy-policy.php">Privacy Policy.</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">
                                Send Message
                            </button>
                            <div id="msgSubmit" class="h3 hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
