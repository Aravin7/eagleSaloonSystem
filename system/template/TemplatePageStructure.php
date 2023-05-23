<!-- Remove below one table structure  -->
<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Remove below ones for the add form-->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard-Products Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-md btn-outline-warning" href="add.php"><span data-feather="plus-circle" class="align-text-bottom"></span>New Product</a>
            </div>
        </div>
    </div>
    
    <!-- Add validation below only for add and edit -->

    
    <!-- Add new section below -->
    
</main>
<?php include '../footer.php'; ?>
<?php ob_end_flush(); ?>
<!-- Remove above one table structure  -->

