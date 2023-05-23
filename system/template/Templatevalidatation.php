<?php
//Add edit section for th edit files

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
                if ($filesize <= 2097152) {
                    //file name as date of today
                    //echo $file_name_new = date('Y').date('m').date('d').".".$fileext;
                    echo $file_name_new = uniqid("", true) . "." . $fileext;
                    $file_destionation = "../assets/images/product_images/" . $file_name_new;
                    if (move_uploaded_file($filetmpname, $file_destionation)) {
                        echo 'The file was uploaded successfully ';
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
        $cDate = date('Y-m-d');
        $sql = "INSERT INTO tbl_products(ProductName,Qty,Price,Description,ProductImage,Status,AddUser,AddDate)VALUES('$pName','$pQty','$pPrice','$pDescription','$file_name_new','$pStatus','$userid','$cDate')";
        $db->query($sql);
        $productId = $db->insert_id;
        foreach ($size as $value) {
            $sql = "INSERT into tbl_products_size(productId,Size) VALUES('$productId','$value')";
            $db->query($sql);

            if ($db->query($sql) === TRUE) {
                header("Location:../sucesss.php");
                echo "Record Inserting successfully";
            } else {
                echo "Error Inserting record: " . $db->error;
            }
//            if ($db->query($sql) === TRUE) {
//                echo '<div class="alert alert-success" role="alert">';
//                echo 'Thank you for submitting the form!';
//                echo '</div>';
//            } else {
//                echo "Error Inserting record: " . $db->error;
//            }
        }
        echo '<div class="alert alert-success" role="alert">';
        echo 'Thank you for submitting the form!';
        echo '</div>';
    }
}
?>
    