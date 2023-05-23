<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Service Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="add.php"><span data-feather="plus-circle" class="align-text-bottom"></span> New Service</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <?php
        $db = dbConnection();
        $sql = "SELECT* FROM tbl_services";
        $result = $db->query($sql);
        ?>

        <table class="table table-striped table-sm">
            <thead class="bg-info">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Duration(min)</th>
                    <th scope="col">Service Image</th>
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
                            <td><?= $row['ServiceName'] ?></td>
                            <td><?= $row['Description'] ?></td>
                            <td><?= $row['Price'] ?></td>
                            <td><?= $row['Duration'] ?></td>
                            <td><img class="img-fluid" width="50" src="<?= SYSTEM_PATH ?>assets/images/service_images/<?= $row['ServiceImage'] ?>"</td>
                            <td><a href="edit.php?ServiceId=<?= $row['ServiceId'] ?>" class="btn btn-warning btn-sm">edit</a></td>    
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