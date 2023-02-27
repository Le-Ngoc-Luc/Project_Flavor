<link rel="stylesheet" href="./css/contentStore.css">
<?php
$nameSearch = isset($_POST['name_search']) ? htmlspecialchars($_POST['name_search']) : '';

$sql_listed = "SELECT * FROM tbl_category ORDER BY id_category  ASC ";
$row_listed = mysqli_query($conn, $sql_listed);
?>

<div class="content">
    <div class="arrange">
        <div class="text">
            <a href="./home.html">HOME</a> / <b><?php echo $nameSearch?></b>
        </div>

    </div>

    <div class="category">
        <div class="list-category">
            <span>PRODUCT PORTFOLIO</span>
            <ul>

                <?php
                foreach ($row_listed as $e) {
                ?>
                    <li><a style="text-transform: uppercase ;" href="index.php?manager=store&id=<?php echo $e['id_category'] ?>"><?php echo $e['name_category'] ?></a></li>
                <?php   } ?>
            </ul>
        </div>
        <div class="list-product">
            <?php
            $sql_listed = "SELECT * FROM tbl_product WHERE name_product LIKE '%" . $nameSearch . "%' ";
            $row_listed = mysqli_query($conn, $sql_listed);
            ?>
            <?php
            foreach ($row_listed as $e) {
            ?>
                <div class="product">
                    <a href="index.php?manager=product&id=<?php echo $e['id_product'] ?>">
                        <img src="admincp/modules/ProductManagement/upload/<?php echo $e['product_image']; ?>">
                        <h1><?php echo $e['name_product'] ?></h1>
                        <h3>Code : <?php echo $e['product_code'] ?></h6>
                            <p>Price: <?php echo number_format($e['product_price'], 0, ',', '.'); ?> vnđ</p>
                    </a>
                </div>
            <?php } ?>


        </div>
    </div>

</div>