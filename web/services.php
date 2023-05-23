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
                    <h3>Services</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Services </li>
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


<div class="services-area ptb-100">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <span>Our Services</span>
            <h2>What We Offer</h2>
        </div>
        <div class="row justify-content-center">
            <?php
            $db = dbConnection();
            $sql = "SELECT* FROM tbl_services";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="services-item-two">
                            <div class="image-container">
                                <img class="img-responsive" src="../system/assets/images/service_images/<?= $row['ServiceImage'] ?>" alt="Services">
                            </div>
                            <div class="content">
                                <span class="icon">
                                    <i class="flaticon-makeup"></i>
                                </span>
                                <h3><?= $row['ServiceName'] ?></h3>
                                <p><?= $row['Description'] ?> </p>
                                <div class="content-footer">
                                    <p>Rs : <?= $row['Price'] ?></p>
                                    <p>Duration : <?= $row['Duration'] ?> minutes</p>
                                </div>
                                <div class="content-right">
                                    <img src="assets/images/services/services-vector-2.png" alt="Service">
                                </div>
                                <form method="post" action="booking_cart_process.php">
                                    <input type="text" name="ServiceId" value="<?= $row['ServiceId'] ?>">
                                    <button class="default-btn" type="submit" name="action" value="add">Book Now</button>
                                </form>
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
    <div class="services-shape">
        <img src="assets/images/services/services-vector-3.png" alt="Services">
    </div>
</div>

<?php include 'footer.php'; ?>
