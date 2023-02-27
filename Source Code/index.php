<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flavors</title>

    <link rel="stylesheet" href="./fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="./themify-icons-font/themify-icons/themify-icons.css">

    <link rel="stylesheet" href="./css/styleHeader.css">
    <link rel="stylesheet" href="./css/stylefooter.css">
    <link rel="stylesheet" href="./css/styleSlider.css">
</head>
<body>
<?php 
    session_start();
    if(isset($_SESSION['log_in_cus']) && $_GET['manager'] == 'logout'){
        unset($_SESSION['log_in_cus']);
        unset($_SESSION['id_customer']);
        unset($_SESSION['user_name']);
        header("Location:index.php?manager=login");
    }
?>
    <div class="container">
        <?php
            include ("./admincp/config/conn.php");
            include ("./pages/header.php");
            include ("./pages/content.php");
            include ("./pages/footer.php");
            
        ?>
    </div>
</body>

<script src="./js/slider.js"></script>
<script src="./js/form.js"></script>


</html>