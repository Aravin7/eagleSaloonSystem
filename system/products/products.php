<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container px-4 py-5" id="custom-cards">
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col mx-10">
                <a href="add.php">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-7 lh-1 fw-bold">Products Inventory</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col mx-8">
                <a href="add.php">
                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('../assets/images/products/store_managent.jpg');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h3 class="pt-5 mt-5 mb-4 display-7 lh-1 fw-bold">Products Store</h3>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

</main>
<?php include '../footer.php'; ?>