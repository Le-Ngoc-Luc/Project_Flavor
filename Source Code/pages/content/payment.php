<link rel="stylesheet" href="./css/contentPayment.css">


<?php
    $totalProduct = $_GET['totalproduct'];
    $total = $_GET['total'];
    $sqli = "SELECT * FROM tbl_customer WHERE id_customer = '".$_SESSION['id_customer']."' LIMIT 1";
    $queryi = mysqli_query($conn, $sqli);
    $row = mysqli_fetch_array($queryi);
?>
<div class="content">
    <form action="index.php?manager=thankyou&price=<?php echo $total;?>" method="POST">
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
            <div class="row">
                <div class="col-75">
                    <div class="container-form">
                        <form action="index.php?manager=thankyou">

                            <div class="row">
                                <div class="col-50">
                                    <h3>Billing Address</h3>
                                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                    <input type="text" id="fname" name="firstname" value="<?php echo $row['name_customer']; ?>">
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                    <input type="email" id="email" name="email" value="<?php echo $row['email_customer']; ?>">
                                    <label for="adr"><i class="fa-solid fa-location-dot"></i> Address</label>
                                    <input type="text" id="adr" name="address" value="<?php echo $row['address']; ?>">
                                    <label for="phone"><i class="fa-solid fa-phone"></i> Phone number</label>
                                    <input type="number_format" id="phone" name="phone" value="<?php echo $row['phone_customer']; ?>">
                                </div>

                                <div class="col-50">
                                    <h3>Payment</h3>
                                    <div class="row" style="margin: 10px 0 ;">
                                        <input checked type="radio" name="pay" value="Cashpayment" id="Cashpayment">
                                        <label for="Cashpayment" style = "margin: 0 0 0 5px;">Cash payment</label>
                                    </div>
                                    <div class="row payment-container" style="margin: 10px 0 ;">
                                        <input type="radio" name="pay" value="Cardpayment" id="Cardpayment" class="Cardpayment"> 
                                        <label for="Cardpayment"style = "margin: 0 0 0 5px;">Card payment</label>
                                        <div class="Cardpayment_form " id="Cardpayment_form">
                                            <div class="icon-container">
                                                <i class="fa-brands fa-cc-visa" style="color:navy;"></i>
                                                <i class="fa-brands fa-cc-discover" style="color:blue;"></i>
                                                <i class="fa-brands fa-cc-mastercard" style="color:red;"></i>
                                                <i class="fa-brands fa-cc-amazon-pay" style="color:orange;"></i>
                                            </div>
                                            <label for="cname">Name on Card</label>
                                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                            <label for="ccnum">Credit card number</label>
                                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                            <label for="expmonth">Exp Month</label>
                                            <input type="text" id="expmonth" name="expmonth" placeholder="September">
                                            <div class="row">
                                                <div class="col-50">
                                                    <label for="expyear">Exp Year</label>
                                                    <input  type="text" id="expyear" name="expyear" placeholder="2018">
                                                </div>
                                                <div class="col-50">
                                                    <label for="cvv">CVV</label>
                                                    <input  type="text" id="cvv" name="cvv" placeholder="352">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="submit" value="Payment" class="btn">
                        </form>
                    </div>
                </div>
                <div class="col-25">
                    <div class="container-form">
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

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>