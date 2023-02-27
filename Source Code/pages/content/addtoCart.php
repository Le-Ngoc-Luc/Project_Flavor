<?php
include('admincp/config/conn.php');
// echo $_SESSION['user_name'];
// $cart = isset($_SESSION['username_customer']) ? $_SESSION['username_customer'] : 'a';
//delete 
if (isset($_SESSION['cart']) && isset($_GET['delete'])) {
    $idcus = $_SESSION['id_customer'];
    $id = $_GET['delete'];
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i]['id'] == $id && $_SESSION['cart'][$i]['idcus'] == $idcus) {
            array_splice($_SESSION['cart'], $i, 1);
        }
    }
    header('Location:index.php?manager=cart');
}
//  Add to cart
if (isset($_POST['addtoCart'])) {
    $idcus = $_SESSION['id_customer'];
    $id = $_GET['id'];
    $amount = $_POST['amount'];
    $sql = "SELECT * FROM tbl_product WHERE id_product = $id LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        // session_destroy();


        if ($_SESSION['cart']) {
            $fl = 0;
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['id'] == $id && $_SESSION['cart'][$i]['idcus'] == $idcus) {
                    $_SESSION['cart'][$i]['amount'] += $amount;
                    $fl = 1;
                    break;
                }
            }
            if ($fl == 0) {
                $new_product = [
                    'nameProduct' => $row['name_product'],
                    'id' => $id,
                    'idcus' => $idcus,
                    'amount' => $amount,
                    'productPrice' => $row['product_price'],
                    'image' => $row['product_image'],
                    'productCode' => $row['product_code']
                ];
                $_SESSION['cart'][] = $new_product;
            }
            header('Location:index.php?manager=cart');
        } else {
            $new_product = [
                'nameProduct' => $row['name_product'],
                'id' => $id,
                'idcus' => $idcus,
                'amount' => $amount,
                'productPrice' => $row['product_price'],
                'image' => $row['product_image'],
                'productCode' => $row['product_code']
            ];
            $_SESSION['cart'][] = $new_product;
            header('Location:index.php?manager=cart');
        }
    }
}
echo '<pre>';
print_r($_SESSION['cart']);
echo '<pre>';
    // unset($_SESSION['cart']);
