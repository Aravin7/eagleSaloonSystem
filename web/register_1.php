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
                    <h3>Register</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Register</li>
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

<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="user-all-form">
                    <div class="contact-form">
                        <h3 class="user-title"> Register </h3>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Mr"
                                               value="option1" />
                                        <label class="form-check-label" for="femaleGender">Mr.</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Mrs"
                                               value="option2" />
                                        <label class="form-check-label" for="maleGender">Mrs.</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Miss"
                                               value="option2" />
                                        <label class="form-check-label" for="maleGender">Miss.</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Other"
                                               value="option3" />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="" data-error="First Name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="" data-error="Last Name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Male"
                                               value="option1" />
                                        <label class="form-check-label" for="femaleGender">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Female"
                                               value="option2" />
                                        <label class="form-check-label" for="maleGender">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Other"
                                               value="option3" />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="" data-error="Username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <input type="email" class="form-control" required="" data-error="Email" placeholder=" Email">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="" data-error="Please enter Email" placeholder="Repeat your Password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nic" placeholder="NIC number">
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="tel" name="tel" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        Register Now
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

<?php include 'footer.php'; ?>
