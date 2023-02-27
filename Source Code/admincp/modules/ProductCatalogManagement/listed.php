<?php

    $sql_listed = "SELECT * FROM tbl_category ORDER BY oder_category  ASC  ";
    $row_listed = mysqli_query($conn , $sql_listed);

   

?>
<div class="listedcatalog">
    <table >
        <tr>
            <th>ID</th>
            <th>Name Catalogues</th>
            <th>Manage</th>
        </tr>
        <?php
            foreach($row_listed as $e){
        ?>
        <tr>
            <td><?php echo $e['id_category']; ?></td>
            <td><?php echo $e['name_category'];?></td>
            <td>
                <a href="index.php?action=handle1&id=<?php echo $e['id_category'];?>">Delete</a>   |   
                <a href="index.php?action=edit1&id=<?php echo $e['id_category'];?> ">Edit</a>
            </td>
        </tr>
        <?php }?>
        
    </table>
    
    
</div>