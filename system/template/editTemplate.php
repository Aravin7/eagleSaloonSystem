//add only when edit file
//Change the 'insert' into 'update'
if ($_SERVER['REQUEST_METHOD'] == "GET") {
        extract($_GET);
        $db = dbConnection();
        $sql = "SELECT* FROM tbl_products WHERE ProductId='$ProductId'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pName = $row['ProductName'];
                $pQty = $row['Qty'];
                $pPrice = $row['Price'];
                $pDescription = $row['Description'];
                $pStatus = $row['Status'];
                $pImage = $row['ProductImage'];
                $ProductId = $row['ProductId'];
            }
        }

        $sql = "SELECT* FROM tbl_products_size WHERE ProductId='$ProductId'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            $size = array();
            while ($row = $result->fetch_assoc()) {
                $size[] = $row['Size'];
            }
        }
    }
    
   //add below line before submit button and change according to the page
   
   <input type="hidden" name="ServiceId" value="<?= $ServiceId?>">
