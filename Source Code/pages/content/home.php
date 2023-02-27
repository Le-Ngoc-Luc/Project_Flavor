<link rel="stylesheet" href="./css/contentHome.css">
<div class="content">
    <!-- -------------------slideshow--------------------- -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <a href="./store.html"><img src="./Images/slider/slider_1.webp" style="width:100%"></a>
        </div>

        <div class="mySlides fade">
            <a href="./store.html"><img src="./Images/slider/slider_2.webp" style="width:100%"></a>
        </div>

        <div class="mySlides fade">
            <a href=""><img src="./Images/slider/slider_3.webp" style="width:100%"></a>
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>
<!----------------product--------------  -->
<div class="list-product">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            if($page == 1 || $page == 0){
                $begin = 0;
            } else{
                $begin = $page * 15 - 15;
            }

                $sql_listed = "SELECT * FROM tbl_product
                ORDER BY id_product DESC LIMIT $begin,15";
            $row_listed = mysqli_query($conn, $sql_listed);
            ?>

            <?php
            foreach ($row_listed as $e) {
            ?>
                <div class="product">
                    <a href="index.php?manager=product&id=<?php echo $e['id_product'] ?>">
                        <img src="admincp/modules/ProductManagement/upload/<?php echo $e['product_image']; ?>">
                        <h1><?php echo $e['name_product'] ?></h1>
                        <h4>Code : <?php echo $e['product_code'] ?></h4>
                        <p> <?php echo number_format($e['product_price'], 0, ',', '.'); ?> vnđ</p>
                    </a>
                </div>
            <?php } ?>
            
        </div>
        <div style="width: 100%;"></div>
        <ul class="list-page">
        <span>Page:  </span>
        <?php 
            if($page>2){
        ?>
        <span><a href="index.php?manager=home&page=<?php echo 1?>"><<</a> </span>
        <?php }?>
        <span><a href="index.php?manager=home&page=<?php echo (($page - 1) <= 0) ? 1 : ($page - 1);?>"> < </a> </span>

            <?php
                $sql_listed = "SELECT * FROM tbl_product
                ORDER BY id_product DESC ";
          
            $row_listed = mysqli_query($conn, $sql_listed);
            $count = mysqli_num_rows($row_listed);
            $count_page = ceil($count / 12);

            for ($i = 1; $i <= $count_page; $i++) {
            ?>  <?php if($i >= ($page -1) && $i <= ($page + 1)){ ?>
                <li><a <?php
                    if($i == $page){
                        echo "style = 'background-color: #ccc;'";
                    }
                ?> href="index.php?manager=home&page=<?php echo $i?>"><?php echo $i; ?></a> </li>
            <?php }
        } ?>
        
        <span><a href="index.php?manager=home&page=<?php echo (($page + 1) > $count_page) ? $count_page : ($page + 1);?>"> > </a> </span>
        <?php 
            if(($count_page - 2) >= $page){
        ?>
        <span><a href="index.php?manager=home&page=<?php echo $count_page?>"> >> </a> </span>
        <?php }?>
        </ul>


</div>