<link rel="stylesheet" href="./css/contentContact.css">
<div class="contact">
    <div class="contact-header">
        <div class="contact-title">
            <h1>CONTACT</h1>
        </div>
        <div class="title-content">
            <a href="">HOME </a> <span>/</span>
            <h2> CONTACT</h2>
        </div>
    </div>

    <div class="contact-content row" >
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1355.4801637756393!2d105.84828435953122!3d21.003309181756396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac428c3336e5%3A0xb7d4993d5b02357e!2sAptech%20Computer%20Education!5e0!3m2!1sen!2s!4v1664727066497!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-content-right">
            <div class="addres-contact row">
                <div class="logo-contact">
                    <img src="Images/logo/clipart998158.png" alt="">
                </div>
                <div class="addresscontact">
                    <p><i class="ti-location-pin"></i> Địa Chỉ: 54 Lê Thanh Nghị, Hà Nội</p>
                    <p><i class="ti-mobile"></i> SĐT Đặt Hàng: 0988888888</p>
                    <p><i class="ti-email"></i> GiaViThucPham@gmail.com</p>
                </div>
            </div>
            <div class="title-address">
                <h1>CONTACT US</h1>
            </div>
            <div class="form-contact">
                <form action="index.php?manager=contact" method="POST">
                <table>
                    <tr>
                        <td><input type="text" placeholder="Full Name"></input> </td>
                        <td><input type="email" placeholder="Email"></td>
                    </tr>
                    <tr>
                        <td><input type="number_format" placeholder="Phone number" ></input> </td>
                        <td><input type="text" placeholder="Address"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea placeholder="Message" name="" id="" cols="30" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" id="submitContact" value="SEND"></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    if(isset($_POST['submit'])){
        echo "<script>alert ('Weve received your message and will get back to you within a few time. In the meantime, make sure to follow us on Twitter!');</script>";
    }
?>
