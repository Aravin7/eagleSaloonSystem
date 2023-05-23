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
                    <h3>404 Error Page</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>404 Error Page</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="inner-img">
                    <img src="assets/images/inner-banner/inner-banner10.png" alt="Inner Banner">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="error-area ptb-100">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="error-content">
                <h1>4 <span>0</span> 4</h1>
                <h3>Oops! Page Not Found</h3>
                <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                <a href="index.php" class="default-btn">
                    Return To Home Page
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>