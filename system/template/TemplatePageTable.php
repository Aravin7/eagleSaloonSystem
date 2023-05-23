<!-- 
1.Edit sql under table-responsive
2.Edit th (table header) according the changes
3.Edit td according the changes
4.Edit href according the changes
-->
    <div class="table-responsive">
        <?php
        $db = dbConnection();
        $sql = "SELECT* FROM tbl_products";
        $result = $db->query($sql);
        ?>

        <table class="table table-striped table-sm">
            <thead class="bg-info">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Description</th>
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
                            <td><?= $row['ProductName'] ?></td>
                            <td><?= $row['Price'] ?></td>
                            <td><?= $row['Qty'] ?></td>
                            <td><?= $row['Description'] ?></td>
                            <td><img class="img-fluid" width="50" src="<?= SYSTEM_PATH ?>assets/images/product_images/<?= $row['ProductImage'] ?>"</td>
                            <td><a href="edit.php?ProductId=<?= $row['ProductId'] ?>" class="btn btn-warning btn-sm">edit</a></td>    
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
