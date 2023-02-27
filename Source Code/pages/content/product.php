<link rel="stylesheet" href="./css/contentProduct.css">

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_product WHERE id_product = $id";
$row = mysqli_query($conn, $sql);
?>

<div class="content">
    <div class="containerProduct">
        <?php
        foreach ($row as $e) {
        ?>
            <div class="img-product">
                <img src="admincp/modules/ProductManagement/upload/<?php echo $e['product_image']; ?>">
            </div>
            <div class="info-product">
                <h1><?php echo $e['name_product'] ?></h1>
                <div></div>
                <span><?php echo number_format($e['product_price'], 0, ',', '.'); ?> <sup>vnđ</sup> </span>
                <p><i class="ti-check-box"></i> Gọi mua hàng 1900 0000 </p>
                <p><i class="ti-check-box"></i> Đảm bảo hàng chất lượng </p>
                <p><i class="ti-check-box"></i> Giá tốt nhất thị trường </p>
                <p><i class="ti-check-box"></i> Đổi trả nếu hạn dử dụng gần </p>
                <form <?php
                        if (isset($_SESSION['log_in_cus'])) {
                            ?>action="index.php?manager=addtocart&id=<?php echo $e['id_product'] ?>" 
                        <?php } else {
                            ?> action="index.php?manager=login&alert=2&id=<?php echo $e['id_product'] ?>" 
                        <?php
                        } ?> method="POST">
                    <p>Quantity: </p>
                    <input type="number" name="amount" min='1' max="1000" value="1">
                    <button class="submit" name="addtoCart" value="addtocart">Add to cart</button>
                </form>
            </div>
        <?php } ?>
    </div>
    <div class="describe">
        <?php
        foreach ($row as $e) {
        ?>
            <h2>Mô tả sản phẩm</h2>
            <div class="product-getcontent">
                <?php echo $e['product_description'] ?>
            </div>
        <?php } ?>
    </div>

</div>