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
        echo $pSupplierId = cleanInput($pSupplier);
        $pQty = cleanInput($pQty);
        $pPrice = cleanInput($pPrice);
        $pDescription = cleanInput($pDescription);
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
            $db = dbConnection();
            //echo 'Connected..!';
            echo $sql = "INSERT INTO tbl_inhouse_products_inventory(InhouseProductName,InhouseProductQty,InhouseProductImage,InhouseProductDescription)VALUES('$pName','$pQty','$file_name_new','$pDescription')";
            $db->query($sql);
            $productId = $db->insert_id;
            echo $sql = "INSERT INTO tbl_suppliers_products(SupplierId,productId,SupplierProductPrice) VALUES('$pSupplierId','$productId','$pPrice')";
            if ($db->query($sql) === TRUE) {
                header("Location:products.php");
                echo "Record Inserting successfully";
            } else {
                echo "Error Inserting record: " . $db->error;
            }
        }
    }
    ?>
    <!-- new lines for successful insert -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="pName" value="<?= @$pName ?>">
                    <div class="text-danger"><?= @$message["error_pname"] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="product_active" class="form-label">Product Is Active?</label>
                    <select name="p_is_active" class="form-control" id="product_active">
                        <option value="">-Select Active-</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select> 
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
                                <option value="<?= $row['SupplierId'] ?>" <?php if ($row['SupplierId'] === @$pSupplier) { ?> selected <?php } ?>><?= $row['SupplierName'] ?></option>
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
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Supplier Product Price</label>
                    <input type="text" class="form-control" id="product_price" name="pPrice" value="<?= @$pPrice ?>">
                    <div class="text-danger"><?= @$message["error_pprice"] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="product_name" class="form-label">OLD Product Price</label>
                    <input type="text" class="form-control" id="product_price" name="pPrice" value="<?= @$pPrice ?>">
                    <div class="text-danger"><?= @$message["error_pprice"] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Current Product Price</label>
                    <input type="text" class="form-control" id="product_price" name="pPrice" value="<?= @$pPrice ?>">
                    <div class="text-danger"><?= @$message["error_pprice"] ?></div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="pDescription" class="form-label">Enter Detailed Product Description</label>
            <textarea class="form-control" id="product_description" name="pDescription"><?= @$pDescription ?></textarea>
            <div class="text-danger"><?= @$message["error_pdescription"] ?></div>
        </div>
        <div class="mb-3">
            <label for="pShortDescription" class="form-label">Enter Short Product Description</label>
            <textarea class="form-control" id="product_short_description" name="pShortDescription"><?= @$psDescription ?></textarea>
            <div class="text-danger"><?= @$message["error_psdescription"] ?></div>
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
<?php ob_end_flush(); ?>