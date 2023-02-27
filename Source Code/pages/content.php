<?php
if (isset($_GET['manager'])) {
    $manager = $_GET['manager'];
} else {
    $manager = '';
}

if ($manager == 'register') {
    include('content/register.php');
}
 else if ($manager == 'login') {
    include('content/login.php');
}
else if ($manager == 'changePassword') {
   include('content/changePassword.php');
}
 else if ($manager == 'cart') {
    include('content/cart.php');
} 
else if ($manager == 'addtocart') {
    include('content/addtoCart.php');
}
else if ($manager == 'introduce') {
    include('content/introduce.php');
} 
else if ($manager == 'store') {
    include('content/store.php');
}
 else if ($manager == 'sale') {
    include('content/sale.php');
}
 else if ($manager == 'contact') {
    include('content/contact.php');
}
 else if ($manager == 'product') {
    include('content/product.php');
}
else if ($manager == 'payment') {
    include('content/payment.php');
}
else if ($manager == 'search') {
    include('content/search.php');
}
else if ($manager == 'thankyou') {
    include('content/thankyou.php');
}
else if ($manager == 'history') {
    include('content/history.php');
}
else {
    include('content/home.php');
}
