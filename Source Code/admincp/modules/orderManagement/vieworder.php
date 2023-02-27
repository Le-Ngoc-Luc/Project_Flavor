<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_cart_details , tbl_product 
    WHERE tbl_cart_details.id_product = tbl_product.id_product 
    AND tbl_cart_details.id_cart = '".$id."'
    ORDER BY tbl_cart_details.id_cart_details DESC";
    $query = mysqli_query($conn, $sql);
?>
<div class="listedcatalog">
    <table>
        <tr>
            <th>ID</th>
            <th>Orders Code </th>
            <th>Name Product</th>
            <th>Quantity</th>
            <th>Product Price</th>
            <th>Total</th>
        </tr>
        <?php
        $totalall = 0;
        foreach ($query as $e) {
            $total = $e['quantity'] * $e['product_price'];
            $totalall += $total;
        ?>
            <tr>
                <td><?php echo $e['id_cart_details']; ?></td>
                <td><?php echo $e['code_cart']; ?></td>
                <td><?php echo $e['name_product']; ?></td>
                <td><?php echo $e['quantity']; ?></td>
                <td><?php echo number_format($e['product_price'],0,',','.' );?> vnd</td>
                <td><?php echo number_format($total,0,',','.' );?> vnd</td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="6">Total : <?php echo number_format($totalall,0,',','.' );?> vnd</td>
        </tr>
    </table>
</div>