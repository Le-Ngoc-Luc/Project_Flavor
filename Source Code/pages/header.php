
<div class="USER">
    <div class="user-contact">
        <i class="ti-email"></i> <span>GiaViThucPham@gmail.com |</span>
        <i class="ti-mobile"></i> <span>0988888888</span>
    </div>
    <div class="log-user">
        <div class="log">
            <?php 
                if(isset($_SESSION['log_in_cus'])){
            ?>
            <a href="./index.php?manager=logout" id="log-in">Log out </a>/
            <?php 
                }else{
            ?>
            <a href="./index.php?manager=login" id="log-in">Log in </a>/
            <?php }?>
            <a href="./index.php?manager=register" id="register">Register</a>
        </div>
        |
        <div class="cart">
            <a href="./index.php?manager=cart">Cart <i class="ti-shopping-cart"></i></a>
        </div>
    </div>

</div>
<!-- -----------------------header------------------------ -->
<header>
    <div class="logo">
        <a href="index.php?manager=home"><img src="Images/logo/clipart998158.png" class="img-logo"></a>
    </div>
    <div class="menu">
        <div>
            <li><a href="index.php?manager=home">HOME</a></li>
        </div>
        <div>
            <li><a href="index.php?manager=introduce">ABOUT US</a></li>
        </div>
        <div class="menu-store">
            <li><a href="index.php?manager=store&id=0">STORE <i class="icons ti-angle-down"></i></a>
                <ul class="sub-menu">
                    <?php
                    $sql_listed = "SELECT * FROM tbl_category ORDER BY oder_category  ASC ";
                    $row_listed = mysqli_query($conn, $sql_listed);
                    ?>
                    <?php
                    foreach ($row_listed as $e) {
                    ?>
                        <li><a href="index.php?manager=store&id=<?php echo $e['id_category']?>"> <?php echo $e['name_category'] ?> </a></li>
                    <?php   } ?>
                </ul>
            </li>
        </div>
        
        <div>
            <li><a href="index.php?manager=contact">CONTACT</a></li>
        </div>
    </div>
    <div class="others">
        <li>
            <form action="index.php?manager=search" method="POST">
                <input name="name_search" type="text" placeholder="Search">
                <button name="search" value="search" class="icons ti-search"></button>
            </form>
        </li>
    </div>
</header>