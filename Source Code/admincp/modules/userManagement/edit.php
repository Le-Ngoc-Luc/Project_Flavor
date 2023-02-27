<?php
include('config/conn.php');

$id = isset($_GET['id']) ? htmlspecialchars($_GET['id'])  : '';

$sql_edit = "SELECT * FROM tbl_customer WHERE id_customer='$id' LIMIT 1";
$row_edit = mysqli_query($conn, $sql_edit);
?>

<table border='1' width='80%' style=" border-collapse: collapse;">
    <form action="index.php?action=handle3" method="POST" enctype="multipart/form-data">
        <?php foreach($row_edit as $row ) { ?>
            <tr>
                <td>Id Customer</td>
                <td><input type="number" name="id" readonly value="<?php echo $row['id_customer']?>"></td>
            </tr>
            <tr>
                <td>Name Customer</td>
                <td><input type="text" name="nameCustomer" value="<?php echo $row['name_customer'] ?>"></td>
            </tr>
            <tr>
                <td>Phone customer</td>
                <td><input type="number" name="phoneCustomer" value="<?php echo $row['phone_customer'] ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $row['address']?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td> <input type="email" name="email" value="<?php echo $row['email_customer']?>">  </td>
            </tr>
            
        <?php } ?>
        <tr>
            <td colspan="2"><input type="submit" name="edit" value="Edit"></td>
        </tr>
    </form>

</table>