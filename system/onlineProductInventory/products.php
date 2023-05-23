<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard On-line Product Inventory Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-sm btn-outline-warning" href="add.php"><span data-feather="plus-circle" class="align-text-bottom"></span>New Product</a>
                <button type="button" class="btn btn-sm btn-outline-warning"><span data-feather="edit" class="align-text-bottom"></span>Update Product</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-warning dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                Search Product
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <?php
        $db = dbConnection();
        $sql = "SELECT *
FROM   tbl_online_products_inventory op
       LEFT JOIN tbl_suppliers_products sp
              ON op.Sku = sp.Sku
       LEFT JOIN tbl_suppliers s
              ON sp.supplierid = s.supplierid";
        $result = $db->query($sql);
        ?>

        <table class="table table-striped table-sm">
            <thead class="bg-info">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Supplier Price</th>
                    <th scope="col">OLD Price</th>
                    <th scope="col">Current Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Description</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-info bg-opacity-25">
                <?php
                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $row['OnlineProductName'] ?></td>
                            <td>Rs.<?= $row['SupplierProductPrice'] ?></td>
                            <td>Rs.<?= $row['OnlineProductOldPrice'] ?></td>
                            <td>Rs.<?= $row['OnlineProductCurrentPrice'] ?></td>
                            <td><?= $row['ProductQty'] ?></td>
                            <td><?= $row['OnlineProductDescription'] ?></td>
                            <td><?= $row['OnlineProductsShortDescription'] ?></td>
                             <td><?= $row['SupplierName'] ?></td>
                            <td><?= $row['OnlineProductsIsActive'] ?></td>
                            <td><img class="img-fluid" width="50" src="<?= SYSTEM_PATH ?>assets/images/online_products_image/<?= $row['OnlineProductImage'] ?>"</td>
                            <td><a href="edit.php?OnlineProductId=<?= $row['OnlineProductId'] ?>" class="btn btn-warning btn-sm">edit</a></td>    
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php include '../footer.php'; ?>