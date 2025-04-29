<?php
session_start();
include "./admin/inc/db.php";

$cart_id = $_POST['cart_id'];
$qty = $_POST['qty'];

$conn->query("UPDATE cart SET qty='$qty' WHERE cart_id='$cart_id'");
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Remove Item</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sub_total = 0;
        $cid = $_SESSION['uid'];
        $res = $conn->query("SELECT * FROM cart JOIN product ON cart.pid = product.id WHERE cid='$cid'");
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $sub_total = $sub_total + ($row['price'] * $row['qty']);
        ?>
                <tr>
                    <td><?php echo $row['pname'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><img src="./admin/inc/p_destination/<?php echo $row['pimage'] ?>" style="width: 100px;"></td>
                    <td>
                        <form id="frm<?php echo $row['cart_id']; ?>">
                            <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                            <input type="number" name="qty" min="1" value="<?php echo $row['qty'] ?>" onchange="updateQuantity(<?php echo $row['cart_id']; ?>)" onkeydown="updateQuantity(<?php echo $row['cart_id']; ?>)" onkeyup="updateQuantity(<?php echo $row['cart_id']; ?>)">
                        </form>
                    </td>
                    <td>&#8377;<?php echo ($row['price'] * $row['qty']); ?></td>
                    <td>
                        <a href="delete_item.php?did=<?php echo $row['pid']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <th colspan="5" style="text-align: center;">None of the items were added yet</th>
            </tr>
        <?php } ?>
        <tr>
            <th colspan="4">Sub Total:</th>
            <th><?php echo $sub_total; ?></th>
        </tr>
    </tbody>
</table>

<a href="checkout.php" class="btn btn-success form-control" style="color: #fff; cursor: pointer;">Proceed to Checkout</a>