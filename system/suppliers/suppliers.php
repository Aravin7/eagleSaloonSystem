<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Suppliers Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-md btn-outline-warning" href="add.php"><span data-feather="plus-circle" class="align-text-bottom"></span>New Suppliers</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <?php
        $db = dbConnection();
        $sql = "SELECT* FROM tbl_suppliers";
        $result = $db->query($sql);
        ?>

        <table class="table table-striped table-sm">
            <thead class="bg-info">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
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
                            <td><?= $row['SupplierName'] ?></td>
                            <td><?= $row['SupplierEmail'] ?></td>
                            <td><?= $row['SupplierPhone'] ?></td>
                            <td><a href="edit.php?SupplierId=<?= $row['SupplierId'] ?>" class="btn btn-warning btn-sm">edit</a></td>    
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

