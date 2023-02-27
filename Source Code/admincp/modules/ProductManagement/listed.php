<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $sql = "SELECT * FROM tbl_product WHERE id_product = '$id'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        unlink('modules/ProductManagement/upload/' . $row['product_image']);
    }
    $sql_delete = "DELETE FROM tbl_product WHERE id_product = $id";
    mysqli_query($conn, $sql_delete);
?>
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if ($page == 1 || $page == 0) {
    $begin = 0;
} else {
    $begin = $page * 8 - 8;
}

    $sql_listed = "SELECT * FROM tbl_product,tbl_category 
                WHERE tbl_product.id_category = tbl_category.id_category
                 ORDER BY id_product DESC LIMIT $begin,8 ";
    $row_listed = mysqli_query($conn , $sql_listed);

    $sql = "SELECT * FROM tbl_product,tbl_category 
    WHERE tbl_product.id_category = tbl_category.id_category
     ORDER BY id_product DESC ";
    $row = mysqli_query($conn, $sql);
$count = mysqli_num_rows($row);
$count_page = ceil($count / 8);
?>

<table border = '1' style="width : 100% ; border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Name Product</th>
        <th>Product Code</th>
        <th>Product Price</th>
        <th>Image</th>
        <th>Product Portfolio</th>
        <th>Product Description</th>
    </tr>
    <?php
        foreach($row_listed as $e){
    ?>
    <tr>
        <td><?php echo $e['id_product']; ?></td>
        <td><?php echo $e['name_product'];?></td>
        <td><?php echo $e['product_code'];?></td>
        <td><?php echo $e['product_price'];?></td>
        <td> <img width="120px" height="150px" src="modules/ProductManagement/upload/<?php echo $e['product_image'];?>"></td>
        <td><?php echo $e['name_category'];?></td>
        <td><?php echo $e['product_description'];?></td>
        <td>
            <a href="index.php?action=listed2&page=<?php echo $page?>&id=<?php echo $e['id_product'];?>">Delete</a>   |   
            <a href="index.php?action=edit2&id=<?php echo $e['id_product'];?>">Edit</a>
        </td>
    </tr>
    <?php }?>
    
</table>
<ul class="list-page">
        <span>Page: </span>
        <?php
        if ($page > 2) {
        ?>
            <span><a href="index.php?action=productmanagement&page=<?php echo 1 ?>">
                    << </a> </span>
        <?php } ?>
        <span><a href="index.php?action=productmanagement&page=<?php echo (($page - 1) <= 0) ? 1 : ($page - 1); ?>">
                < </a> </span>

        <?php for ($i = 1; $i <= $count_page; $i++) {
        ?> <?php if ($i >= ($page - 1) && $i <= ($page + 1)) { ?>
                <li><a <?php
                        if ($i == $page) {
                            echo "style = 'background-color: #ccc;'";
                        }
                        ?> href="index.php?action=productmanagement&page=<?php echo $i ?>"><?php echo $i; ?></a> </li>
        <?php }
        } ?>
        
        <span><a href="index.php?action=productmanagement&page=<?php echo (($page + 1) > $count_page) ? $count_page : ($page + 1);?>">></a> </span>
        <?php 
            if(($count_page - 2) >= $page){
        ?>
        <span><a href="index.php?action=productmanagement&page=<?php echo $count_page?>">>></a> </span>
        <?php }?>
        </ul>