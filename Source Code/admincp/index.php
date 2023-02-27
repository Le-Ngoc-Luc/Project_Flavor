<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    if(!isset($_SESSION['log_in'])){
        header("Location:../index.php?manager=login");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admincp</title>
    <link rel="stylesheet" href="../fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
    <link rel="stylesheet" type="text/css" href="css/styleHeader.css">
    <link rel="stylesheet" type="text/css" href="css/stylefooter.css">
</head>

<body>
    <h3 class="title_admin">Welcome to AdminCP </h3>
    <div class="wrapper">
        <?php
        include("config/conn.php");
        // include("modules/header.php");
        include("modules/menu.php");
        include("modules/main.php");
        include("modules/footer.php");

        ?>
    </div>
</body>

</html>