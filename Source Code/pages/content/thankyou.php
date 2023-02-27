<link rel="stylesheet" href="css/contentThankyou.css">
<?php
$price = $_GET['price'];
$id_customer = $_SESSION['id_customer'];
$time = date("Y-m-d H:i:s");
$code_cart = rand(0, 9999);

$sql = "INSERT INTO tbl_cart (code_cart, id_customer, time_cart) VALUE ('" . $code_cart . "','" . $id_customer . "','" . $time . "')";
mysqli_query($conn, $sql);

$sql = "SELECT * FROM tbl_cart WHERE code_cart = $code_cart LIMIT 1";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

foreach ($_SESSION['cart'] as $e) {
    $sql = "INSERT INTO tbl_cart_details(id_cart, code_cart, id_product, quantity)
            VALUE('" . $row['id_cart'] . "','" . $code_cart . "','" . $e['id'] . "','" . $e['amount'] . "')";
    mysqli_query($conn, $sql);
}

if (isset($_SESSION['cart'])) {
    $idcus = $_SESSION['id_customer'];
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i]['idcus'] == $idcus) {
            array_splice($_SESSION['cart'], $i);
        }
    }
}
?>        
<?php
$sql = "SELECT * FROM tbl_cart , tbl_customer WHERE tbl_cart.id_customer = tbl_customer.id_customer
    AND tbl_customer.id_customer = $id_customer AND code_cart = $code_cart
    ORDER BY tbl_cart.id_cart DESC";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<div class="thanks-you">
    <h2>Your Order Confirmed!</h2>
    <p>Hello <span ><?php echo $row['name_customer']?></span></p>
    <p>You order has been confirmed and will be shipped in next few days!</p>
    <div class="orders">
        <div class="link">
            <a href="index.php?manager=store">Continue Shopping</a>
            <a href="index.php?manager=history">Purchase History</a>
        </div>
        <div class="listedcatalog">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Orders Code </th>
                    <th>Time Orders</th>
                    <th>Name Customer</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Price</th>
                </tr>
                <?php
                foreach ($query as $e) {
                ?>
                    <tr>
                        <td><?php echo $e['id_cart']; ?></td>
                        <td><?php echo $e['code_cart']; ?></td>
                        <td><?php echo $e['time_cart']; ?></td>
                        <td><?php echo $e['name_customer']; ?></td>
                        <td><?php echo $e['address']; ?></td>
                        <td><?php echo $e['email_customer']; ?></td>
                        <td><?php echo $e['phone_customer']; ?></td>
                        <td><?php echo number_format($price, 0, ',', '.'); ?> <sup>vnđ</sup></td>

                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>

</div>