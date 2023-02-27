<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action'])) {
        $tam = $_GET['action'];
    } else {
        $tam = '';
    }
    if ($tam == 'productcatalogmanagement') {
        include("modules/ProductCatalogManagement/add.php");
        include("modules/ProductCatalogManagement/listed.php");
    }
     else if ($tam == 'productmanagement') {
        include("modules/ProductManagement/add.php");
        include("modules/ProductManagement/listed.php");
    }
     else if ($tam == 'ordermanagement') {
        include("modules/orderManagement/listed.php");
    }
    else if ($tam == 'usermanagement') {
       include("modules/userManagement/listed.php");
   }
    else if ($tam == 'vieworder') {
        include("modules/orderManagement/vieworder.php");
    }
    else if ($tam == 'edit1') {
        include("modules/ProductCatalogManagement/edit.php");
    } 
    else if ($tam == 'handle1') {
        include("modules/ProductCatalogManagement/handle.php");
    }
    else if ($tam == 'edit2') {
        include("modules/ProductManagement/edit.php");
    }
    else if ($tam == 'handle2') {
        include("modules/ProductManagement/handle.php");
    }
    else if ($tam == 'listed2') {
        include("modules/ProductManagement/listed.php");
    }
    else if ($tam == 'handle3') {
        include("modules/userManagement/handle.php");
    }
    else if ($tam == 'edit3') {
        include("modules/userManagement/edit.php");
    }
    else if ($tam == 'logout') {
        unset($_SESSION['log_in']);
        Header("Location:../index.php?manager=home");
    }
    ?>
</div>