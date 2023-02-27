<?php
include('config/conn.php');

$tenloaisp = htmlspecialchars($_POST['namecatalogues']);
$thutu = htmlspecialchars($_POST['numercalorder']);

if (isset($_POST['adddata'])) {
    $sql_add = "INSERT INTO tbl_category(name_category,oder_category) VALUE('" . $tenloaisp . "','" . $thutu . "')";
    mysqli_query($conn, $sql_add);
    header('Location:index.php?action=productcatalogmanagement');
} else if (isset($_POST['edit'])) {
    $id = htmlspecialchars($_POST['id']);
    $sql_edit = "UPDATE tbl_category SET name_category= '$tenloaisp' , oder_category = '$thutu'  WHERE id_category= $id";
    mysqli_query($conn, $sql_edit);
    header('Location:index.php?action=productcatalogmanagement');
} else {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM tbl_category WHERE id_category = $id";
    mysqli_query($conn, $sql_delete);
    
    $sql = "SELECT * FROM tbl_product WHERE id_category = '$id'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        unlink('modules/ProductManagement/upload/' . $row['product_image']);
    }
    $sql_delete = "DELETE FROM tbl_product WHERE id_category = $id";
    mysqli_query($conn, $sql_delete);
    header('Location:index.php?action=productcatalogmanagement');
}
