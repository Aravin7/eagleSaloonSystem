<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Employee Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
             <div class="btn-group me-2">
                <a class="btn btn-sm btn-outline-warning" href="role.php"><span data-feather="plus-circle" class="align-text-bottom"></span>Add New Employee Role</a>
            </div>
            <div class="btn-group me-2">
                <a class="btn btn-sm btn-outline-warning" href="add.php"><span data-feather="plus-circle" class="align-text-bottom"></span>Add New Employee</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <?php
        $db = dbConnection();
        $sql = "SELECT * FROM tbl_users u LEFT JOIN tbl_employees e  ON u.UserId=e.UserId WHERE UserRole != 'customer' AND UserRole != 'Manager'";
        $result = $db->query($sql);
        ?>

        <table class="table table-striped table-sm">
            <thead class="bg-info">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">NIC</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Joining Date</th>
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
                            <td><?= $row['FirstName'] ?></td>
                            <td><?= $row['LastName'] ?></td>
                            <td><?= $row['Designation'] ?></td>
                            <td><?= $row['Nic'] ?></td>
                            <td><?= $row['Gender'] ?></td>
                            <td><?= $row['TelNo'] ?></td>
                            <td><?= $row['Email'] ?></td>
                            <td><?= $row['Status'] ?></td>
                            <td><?= $row['JoiningDate'] ?></td>
                            <td><a href="edit.php?UserId=<?= $row['UserId'] ?>" class="btn btn-warning btn-sm">edit</a></td>    
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
<?php ob_end_flush(); ?>

