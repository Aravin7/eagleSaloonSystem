<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Service</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-1">
            <a class="btn btn-sm btn-outline-warning" href="services.php">View Service List</a>
        </div>
    </div>
</div>

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
            <input class="form-check-input" type="radio" name="pStatus" id="product_status_yes" value="yes" <?php if (isset($pStatus) && $pStatus == 'Yes') { ?> checked <?php } ?>>
            <label class="form-check-label" for="product_status_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pStatus" id="product_status_no" value="No" <?php if (isset($pStatus) && $pStatus == 'No') { ?> checked <?php } ?>>
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
