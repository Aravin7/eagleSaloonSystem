<?php
session_start();
extract($_POST);
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$action == 'remove') {
    $cart = $_SESSION['cart'];
    unset($cart[$sku]);
    $_SESSION['cart'] = $cart;
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$action == 'empty') {
    $_SESSION['cart']=array();
}
?>

<table width='100%' border='1'>
    <tr>
        <td>Image</td>
        <td>Name</td>
        <td>Qty</td>
        <td>Price</td>
        <td>Amount</td>
        <td>Action</td>
    </tr>
<?php
foreach ($_SESSION['services'] as $key => $value) {
    ?>
        <tr>
            <td><img src="assets/images/services/<?= $value['image'] ?>"></td>
            <td><?= $value['serviceName'] ?></td>
            <td><?= $value['price'] ?></td>
            <td><?= $value['serviceId']?></td>
            <td>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
                    <input type="text" name="sku" value="<?= $key ?>">
                    <button type="submit" name="action" value="remove">Remove</button>
                </form>
            </td>
        </tr>
    <?php
}
?>
</table>
<a href="product.php">Continue Shopping</a>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
    <button type="submit" name="action" value="empty">Empty Cart</button>
</form>