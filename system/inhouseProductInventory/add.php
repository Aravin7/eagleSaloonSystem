<?php ob_start(); ?>
<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- page title and navigation for the forms  -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-1">
                <a class="btn btn-sm btn-outline-warning" href="services.php">View In-house Product List</a>
            </div>
        </div>
    </div>    <!-- End section  -->

    <?php
    //01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $pName = cleanInput($pName);
        $pSupplierId = cleanInput($pSupplier);
        $pQty = cleanInput($pQty);
        $pPrice = cleanInput($pPrice);
        $pDescription = cleanInput($pDescription);

        $box1Value = cleanInput($box1);
        $box2Value = cleanInput($box2);
        $box3Value = cleanInput($box3);

        // Combine the values to form SKU VALUE
        $sku = $box1Value.'-'.$box2Value.'-'.$box3Value;

        //04.Required Validation
        $message = array();
        if (empty($pName)) {
            $message['error_pname'] = "The Product Name Should Not Be Blank...";
        }
        if (empty($pSupplierId)) {
            $message['error_psupplier'] = "The Supplier Should Be select ...";
        }
        if (empty($pQty)) {
            $message['error_pqty'] = "The Product Quantity Should Not Be Blank...";
        }
        if (empty($pPrice)) {
            $message['error_pprice'] = "The Product Price Should Not Be Blank...";
        }
        if (empty($pDescription)) {
            $message['error_pdescription'] = "The Product Description Should Not Be Blank...";
        }
        if (empty($box2Value) && empty($box3Value)) {
            $message['error_psku'] = "The SKU Should Not Be Blank...";
        }

        //05.Advance Validation
        if (!empty($pPrice)) {
            if (!is_numeric($pPrice)) {
                $message['error_pprice'] = "The Product Price Invalid...";
            } elseif ($pPrice < 0) {
                $message['error_pprice'] = "The Product Price Cannot Be Negative...";
            }
        }

        //File upload
        if (empty($message)) {
            $ProductImage = $_FILES['pImage'];
            $filename = $ProductImage['name'];
            $filetmpname = $ProductImage['tmp_name'];
            $filesize = $ProductImage['size'];
            $fileerror = $ProductImage['error'];

            $fileext = explode('.', $filename);
            $fileext = strtolower(end($fileext));

            //allowed file extensions
            $allowedext = array("jpg", "jpeg", "png", "gif");

            if (in_array($fileext, $allowedext)) {
                if ($fileerror === 0) {
                    if ($filesize <= 2097152) {
                        //file name as date of today
                        //echo $file_name_new = date('Y').date('m').date('d').".".$fileext;
                        echo $file_name_new = uniqid("", true) . "." . $fileext;
                        $file_destionation = "../assets/images/inhouse_products_image/" . $file_name_new;
                        if (move_uploaded_file($filetmpname, $file_destionation)) {
                            //echo 'The file was uploaded successfully ';
                        } else {
                            $message['error_file'] = "There was error uploading the file";
                        }
                    } else {
                        $message['error_file'] = "This file size is invalid ..!";
                    }
                } else {
                    $message['error_file'] = "This file has error ..!";
                }
            } else {
                $message['error_file'] = "This file type not allowed ..!";
            }
        }

        if (empty($message)) {
            $userid = $_SESSION['userid'];
            $sku = strtoupper($sku);
            $db = dbConnection();
            //echo 'Connected..!';
            $sql = "INSERT INTO tbl_inhouse_products_inventory(InhouseProductName,Sku,InhouseProductQty,InhouseProductImage,InhouseProductDescription)VALUES('$pName','$sku','$pQty','$file_name_new','$pDescription')";
            $db->query($sql);
            $sql = "INSERT INTO tbl_suppliers_products(SupplierId,Sku,SupplierProductPrice) VALUES('$pSupplierId','$sku','$pPrice')";
            if ($db->query($sql) === TRUE) {
                ?>
                <script >
                    // Show a success SweetAlert message
                    Swal.fire({
                        title: 'Success!!',
                        text: 'Product added successfully..',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function () {
                        // Redirect to the products page after the Swal alert is closed
                        window.location.href = 'products.php';
                    });
                </script>
                <?php
            } else {
                ?>
                <script >
                    // Show a error SweetAlert message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        timer: 2000
                    }).then(function () {
                        // Redirect to the products page after the Swal alert is closed and console log the message
                        console.log('<?php echo $db_error; ?>');
                        window.location.href = 'products.php';
                    });
                </script> 
                <?php
            }
        }
    }
    ?>
    <!-- new lines for successful insert -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="pName" value="<?= @$pName ?>">
                    <div class="text-danger"><?= @$message["error_pname"] ?></div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="product_sku" class="form-label">Product SKU</label>
                    <div class="input-container" id="product_sku">
                        <input type="text" class="form-control" maxlength="3" id="box1" name="box1" value="INH" readonly>
                        <input type="text" class="form-control" maxlength="3" id="box2" name="box2" value="<?= @$box2 ?>">
                        <input type="text" class="form-control" maxlength="3" id="box3" name="box3" value="<?= @$box3 ?>">
                    </div>
                    <div class="text-danger"><?= @$message["error_psku"] ?></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="product_supplier" class="form-label">Supplier Name</label>                            
                    <select class="form-control" id="product_supplier" name="pSupplier">
                        <option value="">-Select Supplier-</option>
                        <?php
                        $db = dbConnection();
                        $sql = "SELECT * FROM tbl_suppliers";
                        $result1 = $db->query($sql);
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                ?>     
                                <option value="<?= $row['SupplierId'] ?>" <?php if ($row['SupplierName'] === @$pSupplier) { ?> selected <?php } ?>><?= $row['SupplierName'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <div class="text-danger"><?= @$message["error_psupplier"] ?></div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="product_qty" class="form-label">Qty</label>                            
                    <select class="form-control" id="product_qty" name="pQty">
                        <option value="">-Select Qty-</option>
                        <?php for ($i = 1; $i <= 100; $i++) { ?>
                            <option value="<?= $i; ?>" <?php if ($i == @$pQty) { ?> selected <?php } ?> ><?= $i; ?></option>
                        <?php } ?>
                    </select>
                    <div class="text-danger"><?= @$message["error_pqty"] ?></div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Price</label>
            <input type="text" class="form-control" id="product_price" name="pPrice" value="<?= @$pPrice ?>">
            <div class="text-danger"><?= @$message["error_pprice"] ?></div>
        </div>
        <div class="mb-3">
            <label for="pDescription" class="form-label">Enter Product Description</label>
            <textarea class="form-control" id="product_description" name="pDescription"><?= @$pDescription ?></textarea>
            <div class="text-danger"><?= @$message["error_pdescription"] ?></div>
        </div>
        <div class="mb-3">
            <label for="ProductImage" class="form-label">Select product Image</label>
            <input class="form-control" type="file" id="ProductImage" name="pImage">
            <div class="text-muted fs-7">Only *.png, *.jpg and *.jpeg image files are accepted</div>
            <div class="text-danger"><?= @$message["error_file"] ?></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include '../footer.php'; ?>
<script>
    const box1 = document.getElementById('box1');
    const box2 = document.getElementById('box2');
    const box3 = document.getElementById('box3');

    box1.addEventListener('input', function () {
        if (box1.value.length === 3) {
            box2.focus();
        }
    });

    box2.addEventListener('input', function () {
        if (box2.value.length === 3) {
            box3.focus();
        }
    });

    box2.addEventListener('keydown', function (event) {
        if (event.key === 'Backspace' && box2.value.length === 0) {
            box1.focus();
        }
    });

    box3.addEventListener('keydown', function (event) {
        if (event.key === 'Backspace' && box3.value.length === 0) {
            box2.focus();
        }
    });
</script>
<?php ob_end_flush(); ?>