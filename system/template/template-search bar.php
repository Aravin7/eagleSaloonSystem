 <form class="my-4" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Enter Product Name" >
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Enter QTY">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Enter Product Name" >
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Enter QTY">
            </div>
            <div class="col">
                <?php
                $db= dbConnection();
                
                ?>
            </div>
            <div class="col"1>
                <button class="btn btn-warning">Search</button>
            </div>
        </div>
        <?php
        $where = NULL;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            $Productname = cleanInput($Productname);

            if (!empty($Productname)) {
                $where .= " ProductName= '$Productname' AND";
            }
            if (!empty($pQty)) {
                $where .= " Qty= '$qty' AND";
            }

            if (!empty($minprice) && !empty($maxprice)) {
                $where .= " Price BETWEEN '$minprice' AND '$maxprice' AND";
            }

            if (!empty($where)) {
                $where = substr($where, 0, -3);
                $where = " WHERE $where";
            }
        }
        ?>
    </form>