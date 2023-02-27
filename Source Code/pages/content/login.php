<link rel="stylesheet" href="./css/contentLog-in.css">
<?php
include('admincp/config/conn.php');
if (isset($_POST['login'])) {
    $id=$_GET['id'];
    $username = htmlspecialchars($_POST['uname']);
    $password = md5($_POST['psw']);
    $sql = "SELECT * FROM tbl_admin WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $query = mysqli_query($conn, $sql);

    $sqlcus = "SELECT * FROM tbl_customer WHERE username_customer = '" . $username . "' AND password_customer = '" . $password . "'";
    $querycus = mysqli_query($conn, $sqlcus);

    $count = mysqli_num_rows($query);
    $countcus = mysqli_num_rows($querycus);
    if ($count > 0) {
        $_SESSION['log_in'] = $username;
        header('Location:admincp/index.php?action=usermanagement');
    } else if($countcus > 0){
        $_SESSION['log_in_cus'] = $username;
        $row = mysqli_fetch_array($querycus);
        $_SESSION['id_customer'] = $row['id_customer'];
        $_SESSION['user_name'] = $row['username_customer'];
        if($id>0){
            header("Location:index.php?manager=product&id=$id");
        } else{
            header("Location:index.php?manager=home");
        }
        
    }else {
        echo "<h3 style='color : red; text-align : center; margin-bottom : 20px'>Incorrect username or password</h3>";
    }
}
?>
<script></script>
<div class="content">
    <div class="form-log-in">
        <h1>Login Form</h1>
        <form action="" method="POST">
            <div class="imgcontainer">
                <img src="Images/images-log-in.jfif" alt="Avatar" class="avatar">
            </div>

            <div class="container-log-in">
                <label for="uname"><b>Username</b></label>
                <input class="input-log-in" type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input class="input-log-in" type="password" placeholder="Enter Password" name="psw" required>

                <button class="log-in-submit" type="submit" name="login" value="login">Login</button>
            </div>
            <span id="register"><a href="index.php?manager=register">Register</a></span>
            <span id="right-form"><a href="index.php?manager=changePassword">Change Password</a></span>
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