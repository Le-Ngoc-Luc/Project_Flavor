<link rel="stylesheet" type="text/css" href="./css/contentCart.css">

<div class="content">
    <form action="">
        <div class="container-content">
            <div class="cart-top-wrap">
                <div class="cart-top">
                    <div class="cart-top-cart cart-top-item">
                        <i class="ti-shopping-cart "></i>
                    </div>
                    <div class="cart-top-pay cart-top-item">
                        <i class="ti-credit-card"></i>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="container-content">
            <div class="cart-content">
                <div class="cart-content-left">
                    <table>
                        <tr>
                            <th style="width: 40px; text-align:center ;">ID</th>
                            <th>Product's name</th>
                            <th>Product Code</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Into money</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        $totalProduct = 0;
                        $totalP = 1;
                        $total = 0;
                        $idcus = isset($_SESSION['id_customer']) ? $_SESSION['id_customer'] : 0;
                        $i = 0;
                        if (isset($_SESSION['cart'])) {
                            
                            foreach ($_SESSION['cart'] as $cart_item) {
                                if ($cart_item['idcus'] == $idcus) {
                                    $totalProduct += $cart_item['amount'];
                                    $totalP = $cart_item['amount'] * $cart_item['productPrice'];
                                    $total += $totalP;
                                    $i++;
                        ?>
                                    <tr>
                                        <td><?php echo $cart_item['id'] ?></td>
                                        <td>
                                            <p> <?php echo $cart_item['nameProduct'] ?> </p>
                                        </td>
                                        <td>
                                            <?php echo $cart_item['productCode'] ?>
                                        </td>
                                        <td><a href="index.php?manager=product&id=<?php echo $cart_item['id'] ?>">
                                                <img src="admincp/modules/ProductManagement/upload/<?php echo $cart_item['image']; ?>">
                                            </a>
                                        </td>
                                        <td>
                                            <input readonly type="number_format" min="1" value="<?php echo $cart_item['amount'] ?>">
                                        </td>
                                        <td>
                                            <?php echo number_format($cart_item['productPrice'], 0, ',', '.') ?> <sup>vnđ</sup>
                                        </td>
                                        <td>
                                            <a href="index.php?manager=addtocart&delete=<?php echo $cart_item['id'] ?>">X</a>
                                        </td>
                                    </tr>
                        <?php }
                            }
                        } ?>
                    </table>
                </div>

                <div class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan="2">Total money</th>
                        </tr>
                        <tr>
                            <td>Total product</td>
                            <td><?php echo $totalProduct; ?></td>
                        </tr>
                        <tr>
                            <td>Total money</td>
                            <td><?php echo number_format($total, 0, ',', '.'); ?> <sup> vnđ</sup></td>
                        </tr>
                        <tr style="font-weight: bold;">
                            <td>Total</td>
                            <td><?php echo number_format($total, 0, ',', '.'); ?> <sup>vnđ</sup></td>
                        </tr>
                    </table>



                    <div class="cart-content-right-button">
                        <button><a href="index.php?manager=store">Keep shopping</a> </button>

                        <?php
                        if (isset($_SESSION['log_in_cus']) && isset($_SESSION['cart']) && $i > 0) {
                        ?>
                            <button id="buttonPayment"><a href="index.php?manager=payment&total=<?php echo $total; ?>&totalproduct=<?php echo $totalProduct; ?>">Payment</a></button>
                        <?php
                        } else if (!isset($_SESSION['log_in_cus'])) {
                        ?>
                            <button id="buttonPayment"><a href="index.php?manager=login&alert=2">Payment</a></button>
                        <?php
                        } else if($i == 0){
                        ?>
                            <button id="buttonPayment"><a href="index.php?manager=cart&alert=1">Payment</a></button>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_GET['alert'])) {

        $a = $_GET['alert'];
        if ($a == 1) {
            echo "<script> alert('No goods to pay')</script>";
        }
    }
    ?>
</div>