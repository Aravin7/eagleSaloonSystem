<?php include '../header.php'; ?>
<?php include '../menu.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-warning"><span data-feather="plus-circle" class="align-text-bottom"></span>New Product</button>
                <button type="button" class="btn btn-sm btn-outline-warning"><span data-feather="edit" class="align-text-bottom"></span>Update Product</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-warning dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                Search Product
            </button>
        </div>
    </div>
    <?php
    if($_SERVER['REQUEST_METHOD']=="GET"){
        extract($_GET);
        $db = dbConnection();
        $sql="SELECT * FROM tbl_products WHERE ProductId='$ProductId '";
        $result = $db->query( $sql);
        
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()){
               $pName = $row['ProductName'];
               $pQty = $row['Qty'];
               $pPrice = $row['Price'];
               $pDescription = $row['Description'];
               $pImage = $row['ProductImage'];
               $pStatus = $row['Status'];
            }
        }
        
        
        
//        $row['ProductionId'];
//        $row['Qty'];
//       
        
    }
  
    
    //01.check the request method
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //02.extract the array
        extract($_POST);
        // 03.Assign cleaned values to the variables
        $pName = cleanInput($pName);
        $pQty = cleanInput($pQty);
        $pPrice = cleanInput($pPrice);

        //04.Required Validation
        $message = array();
        if (empty($pName)) {
            $message['error_pname'] = "The Product Name Should Not Be Blank...";
        }
        if (empty($pQty)) {
            $message['error_pqty'] = "The Product Quantity Should Not Be Blank...";
        }
        if (empty($pPrice)) {
            $message['error_pprice'] = "The Product Price Should Not Be Blank...";
        }
        if (!isset($pStatus)) {
            $message['error_pstatus'] = "The Product Status Should Be Select...";
        }
        if (!isset($size)) {
            $message['error_psize'] = "The Product Size Should Be Select...";
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
                    if($filesize<= 2097152){
                        //file name as date of today
                        //echo $file_name_new = date('Y').date('m').date('d').".".$fileext;
                        echo $file_name_new = uniqid("",true) . "." . $fileext;
                        $file_destionation = "../assets/images/product_images/" . $file_name_new;
                        if(move_uploaded_file($filetmpname, $file_destionation)){
                            echo 'The file was uploaded successfully ';
                        }else{
                            $message['error_file']="There was error uploading the file";
                        }
                        
                    }else{
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
            $cDate = date('Y-m-d');
            echo $sql = "INSERT INTO tbl_products(ProductName,Qty,Price,Description,ProductImage,Status,AddUser,AddDate)VALUES('$pName','$pQty','$pPrice','$pDescription','$file_name_new','$pStatus','$userid','$cDate')";
            $db->query($sql);
            $productId = $db->insert_id;
            foreach ($size as $value) {
                $sql = "INSERT into tbl_products_size(productId,Size) VALUES('$productId','$value')";
                $db->query($sql);
            }
            //new lines
//            if ($db->query($sql) === TRUE) {
//                $_SESSION['status'] = "New record created successfully";
//                //echo $_SESSION['status'];
//                //header("Location:index.php");
//            } else {
//                $_SESSION['status'] = "Error: " . $sql . "<br>" . $conn->error;
//            }
            //new lines
        }
    }
    ?>
    <!-- new lines for successful insert
    <div class="col-md-12">
        <?php
        if (isset($_SESSION['status'])) {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <? echo $_SESSION['status'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['status']);
        }
        ?>

    </div> -->
    <!-- new lines for successful insert -->

    <h2>Update Product</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="pName" value="<?= @$pName ?>">
            <div class="text-danger"><?= @$message["error_pname"] ?></div>
        </div>
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
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Price</label>
            <input type="text" class="form-control" id="product_price" name="pPrice" value="<?= @$pPrice ?>">
            <div class="text-danger"><?= @$message["error_pprice"] ?></div>
        </div>
        <div class="mb-3">
            <label for="pDescription" class="form-label">Enter Product Description</label>
            <textarea class="form-control" id="product_description" name="pDescription"><?= @$pDescription ?></textarea>
        </div>
        <div class="mb-3">
            <label>Select Product Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pStatus" id="product_status_yes" value="1" <?php if (isset($pStatus) && $pStatus == 'Yes') { ?> checked <?php } ?>>
                <label class="form-check-label" for="product_status_yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pStatus" id="product_status_no" value="0" <?php if (isset($pStatus) && $pStatus == 'No') { ?> checked <?php } ?>>
                <label class="form-check-label" for="product_status_no">No</label>
            </div>
            <div class="text-danger"><?= @$message["error_pstatus"] ?></div>
        </div>
        <div class="mb-3">
            <label>Select Size</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="small" name="size[]" value="S" <?php if (isset($size) && in_array('S', $size)) { ?>checked <?php } ?>>
                <label class="form-check-label" for="small">Small(S)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="medium" name="size[]" value="M" <?php if (isset($size) && in_array('M', $size)) { ?>checked <?php } ?>>
                <label class="form-check-label" for="large">Medium(M)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="large" name="size[]" value="L" <?php if (isset($size) && in_array('L', $size)) { ?>checked <?php } ?>>
                <label class="form-check-label" for="large">Large(L)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="extralarge" name="size[]" value="XL" <?php if (isset($size) && in_array('XL', $size)) { ?>checked <?php } ?>>
                <label class="form-check-label" for="extralarge">Extra Large(XL)</label>
            </div>
            <div class="text-danger"><?= @$message["error_psize"] ?></div>
        </div>
        <div class="mb-3">
            <label for="ProductImage" class="form-label">Select product Image</label>
            <input class="form-control" type="file" id="ProductImage" name="pImage">
            <div class="text-danger"><?= @$message["error_file"] ?></div>

        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="cart.php?product=Laptop&qty=2&price=245560">Add to Cart</a>
</main>

<?php include '../footer.php'; ?>