<div class="addcatalog">

    <table >
        <form action="index.php?action=handle2" method="POST" enctype="multipart/form-data">
            <tr>
                <td>Name Product</td>
                <td><input required class="catalo" type="text" name="nameProduct"></td>
            </tr>
            <tr>
                <td>Product Code</td>
                <td><input required class="catalo" type="text" name="productCode"></td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td><input required class="catalo" type="number" name="productPrice"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input required type="file" name="imageProduct"></td>
            </tr>
            <tr>
                <td>Product Description</td>
                <td><textarea name="productDescription" cols="40" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Product Portfolio</td>
                <td>
                    <select name="category">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY id_category ASC";
                        $query = mysqli_query($conn, $sql_danhmuc);
                        foreach ($query as $row) {
                        ?>
                            <option value="<?php echo $row['id_category'] ?>">
                                <?php echo $row['name_category'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="adddata" value="Add"></td>
            </tr>
        </form>
    
    </table>
</div>