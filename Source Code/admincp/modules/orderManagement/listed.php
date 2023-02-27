<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if ($page == 1 || $page == 0) {
    $begin = 0;
} else {
    $begin = $page * 12 - 12;
}


$sql = "SELECT * FROM tbl_cart , tbl_customer WHERE tbl_cart.id_customer = tbl_customer.id_customer
            ORDER BY tbl_cart.id_cart DESC LIMIT $begin,12";

$query = mysqli_query($conn, $sql);

$sqlf = "SELECT * FROM tbl_cart WHERE id_cart
            ORDER BY id_cart";
$row_listed = mysqli_query($conn, $sqlf);
$count = mysqli_num_rows($row_listed);
$count_page = ceil($count / 12);
?>
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
            <th>Manager</th>
        </tr>
        <?php
        $a = 0;
        foreach ($query as $e) {
            $a++;
        ?>
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $e['code_cart']; ?></td>
                <td><?php echo $e['time_cart']; ?></td>
                <td><?php echo $e['name_customer']; ?></td>
                <td><?php echo $e['address']; ?></td>
                <td><?php echo $e['email_customer']; ?></td>
                <td><?php echo $e['phone_customer']; ?></td>
                <td>
                    <a href="index.php?action=vieworder&id=<?php echo $e['id_cart']; ?>">View Order</a> |
                </td>
            </tr>
        <?php } ?>

    </table>
     <!-- dùng để phân trang -->
    <ul class="list-page">
        <span>Page: </span>
        <?php
        if ($page > 2) {
        ?>
            <span><a href="index.php?action=ordermanagement     &page=<?php echo 1 ?>">
                    << </a> </span>
        <?php } ?>
        <span><a href="index.php?action=ordermanagement&page=<?php echo (($page - 1) <= 0) ? 1 : ($page - 1); ?>">
                < </a> </span>

        <?php for ($i = 1; $i <= $count_page; $i++) {
        ?> <?php if ($i >= ($page - 1) && $i <= ($page + 1)) { ?>
                <li><a <?php
                        if ($i == $page) {
                            echo "style = 'background-color: #ccc;'";
                        }
                        ?> href="index.php?action=ordermanagement&page=<?php echo $i ?>"><?php echo $i; ?></a> </li>
        <?php }
        } ?>
        
        <span><a href="index.php?action=ordermanagement&page=<?php echo (($page + 1) > $count_page) ? $count_page : ($page + 1);?>">></a> </span>
        <?php 
            if(($count_page - 2) >= $page){
        ?>
        <span><a href="index.php?action=ordermanagement&page=<?php echo $count_page?>">>></a> </span>
        <?php }?>
        </ul>
</div>