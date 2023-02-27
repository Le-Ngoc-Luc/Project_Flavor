<!-- link kết nối với css -->
<link rel="stylesheet" href="./css/contentStore.css">
<?php
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            $sql_liste = "SELECT * FROM tbl_category WHERE id_category = $id ";
            $row_liste = mysqli_query($conn, $sql_liste);   
            $st = mysqli_fetch_array($row_liste);
            ?>

<div class="content">
    <div class="arrange">
        <div class="text">
            <a href="index.php?manager=home">HOME</a> / 
            <b><?php if($id == 0){
                echo "STORE";
            } else{
                echo $st['name_category'];
            }
            ?></b>
        </div>

    </div>

    <div class="category">
        <!-- list danh sách menu bên trái -->
        <div class="list-category">
            <span>PRODUCT PORTFOLIO</span>
            <ul>
                
                <?php
                $a = 0;
                // Hiển thị các dữ liệu của bảng tbl_category và sắp xếp theo oder_category ASC là tăng dần
                $sql_listed = "SELECT * FROM tbl_category ORDER BY oder_category  ASC ";
                // chạy dòng lệnh trên
                $row_listed = mysqli_query($conn, $sql_listed);

                //dùng vòng lặp foreach để lăp mảng $row_listed và gán nó cho biến $e 
                foreach ($row_listed as $e) {
                ?>  
                    <li><a style="<?php if($id == $e['id_category'] ){
                        echo 'background-color: #6abd45; color: white';
                    } ?>" 
                    href="index.php?manager=store&id=<?php echo $e['id_category'] ?>"><?php echo $e['name_category'] ?></a></li>
                <?php   } ?>
            </ul>
        </div>
        <div class="list-product">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            if($page == 1 || $page == 0){
                $begin = 0;
            } else{
                $begin = $page * 12 - 12;
            }

            if ($id == 0) {
                $sql_listed = "SELECT * FROM tbl_product
                ORDER BY id_product DESC LIMIT $begin,12";
            } else {
                $sql_listed = "SELECT * FROM tbl_product,tbl_category 
                WHERE tbl_product.id_category = tbl_category.id_category AND tbl_product.id_category = $id
                 ORDER BY id_product DESC LIMIT $begin,12";
            }
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
        <span><a href="index.php?manager=store&page=<?php echo 1?>&id=<?php echo $id?>"><<</a> </span>
        <?php }?>
        <span><a href="index.php?manager=store&page=<?php echo (($page - 1) <= 0) ? 1 : ($page - 1);?>&id=<?php echo $id?>"><</a> </span>

            <?php
            if ($id == 0) {
                $sql_listed = "SELECT * FROM tbl_product
                ORDER BY id_product DESC ";
            } else {
                $sql_listed = "SELECT * FROM tbl_product,tbl_category 
                WHERE tbl_product.id_category = tbl_category.id_category AND tbl_product.id_category = $id
                 ORDER BY id_product DESC ";
            }
            $row_listed = mysqli_query($conn, $sql_listed);
            $count = mysqli_num_rows($row_listed);
            $count_page = ceil($count / 12);

            for ($i = 1; $i <= $count_page; $i++) {
            ?>  <?php if($i >= ($page -1) && $i <= ($page + 1)){ ?>
                <li><a <?php
                    if($i == $page){
                        echo "style = 'background-color: #ccc;'";
                    }
                ?> href="index.php?manager=store&page=<?php echo $i?>&id=<?php echo $id?>"><?php echo $i; ?></a> </li>
            <?php }
        } ?>
        
        <span><a href="index.php?manager=store&page=<?php echo (($page + 1) > $count_page) ? $count_page : ($page + 1);?>&id=<?php echo $id?>">></a> </span>
        <?php 
            if(($count_page - 2) >= $page){
        ?>
        <span><a href="index.php?manager=store&page=<?php echo $count_page?>&id=<?php echo $id?>">>></a> </span>
        <?php }?>
        </ul>
    </div>

</div>