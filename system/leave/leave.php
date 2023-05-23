<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Remove below ones for the add form-->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Leave Management</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
             <div class="btn-group me-2">
                <a class="btn btn-sm btn-warning" href="#"><span data-feather="plus-circle" class="align-text-bottom"></span>Reset Employee Leaves</a>
            </div>
            </div>
    </div>

    <div class="table-responsive">
        <?php
        $db = dbConnection();
        $sql = "SELECT l.*, lt.*,u.Title,u.FirstName,u.LastName
                FROM
                    tbl_leave l
                LEFT JOIN tbl_users u ON
                   l.UserId = u.UserId
                LEFT JOIN tbl_leave_types lt ON
                    l.LeaveType = lt.Id";
        $result = $db->query($sql);
        ?>

        <table class="table table-striped table-sm">
            <thead class="bg-info">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Leave Type</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Leave Status</th>
                    <th scope="col">AppliedDate</th>
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
                            <td><?= $row['Title'] . $row['FirstName'] . ' ' . $row['LastName']; ?></td>
                            <td><?= $row['StartDate'] ?></td>
                            <td><?= $row['EndDate'] ?></td>
                            <td><?= $row['LeaveTypes'] ?></td>
                            <td><?= $row['Reason'] ?></td>
                            <td><?= $row['LeaveStatus'] ?></td> 
                            <td><?= $row['AppliedDate'] ?></td>
                            <td>
                                <a href="approveLeave.php?LeaveId=<?= $row['LeaveId'] ?>" class="btn btn-success btn-sm <?= ($row['LeaveStatus'] === 'Cancelled') ? 'disabled' : '' ?>">Approve</a>
                                <a href="rejectLeave.php?LeaveId=<?= $row['LeaveId'] ?>" class="btn btn-warning-soft btn-sm <?= ($row['LeaveStatus'] === 'Cancelled') ? 'disabled' : '' ?>">Reject</a>
                            </td>    
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
