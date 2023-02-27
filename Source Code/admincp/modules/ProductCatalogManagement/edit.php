<?php
    include ('config/conn.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql_edit = "SELECT * FROM tbl_category WHERE id_category= '$id' ";
$row_edit = mysqli_query($conn, $sql_edit);
?>
<div>
    <table border='1' width='80%' style=" border-collapse: collapse;">
        <form action="index.php?action=handle1" method="POST">
            <?php while ($row = mysqli_fetch_assoc($row_edit)) { ?>
                <tr>
                    <td>Id</td>
                    <td><input type="text" name="id" readonly value="<?php echo $row['id_category']; ?>"></td>
                </tr>
                <tr>
                    <td>Name Catalogues</td>
                    <td><input type="text" name="namecatalogues" value="<?php echo $row['name_category']; ?>"></td>
                </tr>
                <tr>
                    <td>numerical Order</td>
                    <td><input type="number" name="numercalorder" value="<?php echo $row['oder_category']; ?>"> </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2"><input type="submit" name="edit" value="Edit"></td>
            </tr>
        </form>
    
    </table>

</div>