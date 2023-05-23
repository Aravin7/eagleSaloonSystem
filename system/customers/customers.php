<!-- Remove below for table line -->
<?php ob_start();?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Remove below ones for the add form-->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Registered Customers Details</h1>
    </div>
    
    
    <div class="table-responsive">
        <?php
        $db = dbConnection();
        $sql = "SELECT* FROM tbl_users u LEFT JOIN tbl_customers c ON u.UserId=c.userId WHERE UserRole='Customer'";
        $result = $db->query($sql);
        ?>

        <table class="table table-striped table-sm">
            <thead class="bg-info">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registered Date</th>
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
                            <td><?= $row['Title'] ?></td>
                            <td><?= $row['FirstName']?></td>
                            <td><?= $row['LastName'] ?></td>
                            <td><?= $row['Gender'] ?></td>
                            <td><?= $row['TelNo'] ?></td>
                            <td><?= $row['Email'] ?></td>
                            <td><?= $row['CusRegDate'] ?></td>
                            <td>cell</td>
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
<?php ob_flush();?>
<!-- Remove above for table line -->