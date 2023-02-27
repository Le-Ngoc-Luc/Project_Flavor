<?php
include('config/conn.php');

$nameProduct = htmlspecialchars($_POST['nameProduct']);
$productCode = isset($_POST['productCode']) ? htmlspecialchars($_POST['productCode']) : '';
$productPrice = isset($_POST['productPrice']) ? htmlspecialchars($_POST['productPrice'])  : 0;
$productDescription = isset($_POST['productDescription']) ? htmlspecialchars($_POST['productDescription']) : '';
$category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : 0;

$imageProduct = $_FILES['imageProduct']['name'];
$imageProduct_tmp = $_FILES['imageProduct']['tmp_name'];
$imageProduct_time = time() . '_' . $imageProduct;


if (isset($_POST['adddata'])) {
    $sql_add = "INSERT INTO tbl_product(name_product, product_code,
                             product_price, product_image, id_category, product_description) 
        VALUE('" . $nameProduct . "','" . $productCode . "','" . $productPrice . "',
        '" . $imageProduct_time . "','" . $category . "','" . $productDescription . "')";
    mysqli_query($conn, $sql_add);
    move_uploaded_file($imageProduct_tmp, 'modules/ProductManagement/upload/' . $imageProduct_time);
    header('Location:index.php?action=productmanagement');
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    if ($imageProduct != '') {
        move_uploaded_file($imageProduct_tmp, 'modules/ProductManagement/upload/' . $imageProduct_time);
        $sql = "SELECT * FROM tbl_product WHERE id_product = '$id'";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            unlink('modules/ProductManagement/upload/'.$row['product_image']);
        }
        $sql_edit = "UPDATE tbl_product 
            SET name_product= '$nameProduct' ,
            product_code= '$productCode' ,
            product_price= '$productPrice' ,
            product_image= '$imageProduct_time' ,
            id_category= '$category' ,
            product_description= '$productDescription' 
            WHERE id_product= $id";
    } else {
        $sql_edit = "UPDATE tbl_product 
            SET name_product= '$nameProduct' ,
            product_code= '$productCode' ,
            product_price= '$productPrice' ,
            id_category= '$category' ,
            product_description= '$productDescription' 
            WHERE id_product= '$id'";
    };
    mysqli_query($conn, $sql_edit);
    header('Location:index.php?action=productmanagement');
} else {
$page = isset($_GET['page']) ? $_GET['page'] : 1;
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_product WHERE id_product = '$id'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        unlink('modules/ProductManagement/upload/' . $row['product_image']);
    }
    $sql_delete = "DELETE FROM tbl_product WHERE id_product = $id";
    mysqli_query($conn, $sql_delete);
    header('Location:index.php?action=productmanagement');
}
