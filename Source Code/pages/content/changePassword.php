<link rel="stylesheet" href="./css/contentLog-in.css">
<?php
include('admincp/config/conn.php');
if (isset($_POST['change'])) {
    $username = htmlspecialchars($_POST['uname']);
    $password = md5($_POST['psw']);
    $new_password = md5($_POST['new-psw']);
    $re_password = md5($_POST['re-psw']);

    $sqlcus = "SELECT * FROM tbl_customer WHERE username_customer = '" . $username . "' AND password_customer = '" . $password . "'";
    $querycus = mysqli_query($conn, $sqlcus);
    $countcus = mysqli_num_rows($querycus);

    if($countcus > 0){
        if($new_password == $re_password){
            $sql = "UPDATE tbl_customer SET password_customer = '".$re_password."' WHERE username_customer = '".$username."'";
            mysqli_query($conn, $sql);
            echo "<script>
                    alert('Change password successfully')
                </script>";
        } else{
            echo "<h3 style='color : red; text-align : center;margin-bottom : 20px;'>Please re-enter your password</h3>";
        }
        
    }else {
        echo "<h3 style='color : red; text-align : center; margin-bottom : 20px'>Incorrect username or password</h3>";
    }
}
?>

<div class="content">
    <div class="form-log-in">
        <h1>Change Password</h1>
        <form action="" method="POST">
            <div class="imgcontainer">
                <img src="Images/images-log-in.jfif" alt="Avatar" class="avatar">
            </div>

            <div class="container-log-in">
                <label for="uname"><b>Username</b></label>
                <input class="input-log-in" type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input class="input-log-in" type="password" placeholder="Enter Password" name="psw" required>

                <label for="re-psw"><b>New Password</b></label>
                <input class="input-log-in" type="password" placeholder="New Password" name="new-psw" required>

                <label for="re-psw"><b>Repeat Password</b></label>
                <input class="input-log-in" type="password" placeholder="Repeat Password" name="re-psw" required>

                <button class="log-in-submit" type="submit" name="change" value="change">Change Password</button>
            </div>
            <span id="register"><a href="index.php?manager=login">Login</a></span>
            <span id="right-form"><a href="index.php?manager=register">Register</a></span>
            
        </form>
    </div>
</div>

<?php
    if (isset($_GET['alert'])) {

        $a = $_GET['alert'];
        if ($a == 2) {
            echo "<script> alert('Please login to order')</script>";
        }
    }
    ?>