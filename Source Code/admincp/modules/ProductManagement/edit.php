<?php
include('config/conn.php');

$id = isset($_GET['id']) ? htmlspecialchars($_GET['id'])  : '';

$sql_edit = "SELECT * FROM tbl_product WHERE id_product='$id' LIMIT 1";
$row_edit = mysqli_query($conn, $sql_edit);
?>

<table border='1' width='80%' style=" border-collapse: collapse;">
    <form action="index.php?action=handle2" method="POST" enctype="multipart/form-data">
        <?php foreach($row_edit as $row ) { ?>
            <tr>
                <td>Id Product</td>
                <td><input type="number" name="id" readonly value="<?php echo $row['id_product']?>"></td>
            </tr>
            <tr>
                <td>Name Product</td>
                <td><input type="text" name="nameProduct" value="<?php echo $row['name_product'] ?>"></td>
            </tr>
            <tr>
                <td>Product Code</td>
                <td><input type="text" name="productCode" value="<?php echo $row['product_code'] ?>"></td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td><input type="number" name="productPrice" value="<?php echo $row['product_price']?>"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td> 
                    <input type="file" name="imageProduct">
                    <img width="150px" src="modules/ProductManagement/upload/<?php echo $row['product_image']?>">
                </td>
            </tr>
            <tr>
            <td>Product Portfolio</td>
            <td>
                <select name="category">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY id_category ASC";
                    $query = mysqli_query($conn, $sql_danhmuc);
                    foreach ($query as $rowq) {
                        if($rowq['id_category'] == $row['id_category'] ){
                    ?>  
                    <option selected value="<?php echo $rowq['id_category'] ?>">
                    <?php echo $rowq['name_category']; ?>
                    </option>
                    <?php }else{ ?>
                        <option value="<?php echo $rowq['id_category'] ?>">
                    <?php echo $rowq['name_category']; ?>
                    <?php }
                    } ?>
                </select>
            </td>
            </tr>
            <tr>
                <td>Product Description</td>
                <td><textarea name="productDescription" cols="40" rows="10">
                    <?php echo $row['product_description']; ?>
                </textarea>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2"><input type="submit" name="edit" value="Edit"></td>
        </tr>
    </form>

</table>