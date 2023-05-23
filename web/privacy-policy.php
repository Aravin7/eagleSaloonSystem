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
                            <h3>Privacy Policy</h3>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>Privacy Policy</li>
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
        <div class="privacy-policy-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span>Privacy Policy</span>
                    <h2>Naon Privacy Policy</h2>
                </div>
                <div class="row pt-45">
                    <div class="col-lg-12">
                        <div class="single-content">
                        <?php
                            $db=dbConnection();
                            $sql="SELECT* FROM tbl_privacy";
                            $result = $db->query($sql);
                            if($result->num_rows>0){
                                while ($row = $result->fetch_assoc()) {
                                ?>    
                            <h3><?=$row['Title']?></h3>
                            <p><?=$row['Content']?></p>
                        <?php         
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'footer.php'; ?>
