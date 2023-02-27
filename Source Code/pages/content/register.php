       <!-- --------------------------content-------------------- -->
       <link rel="stylesheet" href="./css/contentRegister.css">
       <?php
        include('admincp/config/conn.php');

        if (isset($_POST['submit'])) {
            $name_customer = htmlspecialchars($_POST['fullname']);
            $username_customer = htmlspecialchars($_POST['username']);
            $password_customer = md5($_POST['password']);
            $phone_customer = htmlspecialchars($_POST['phone']);
            $address = htmlspecialchars($_POST['address']);
            $email_customer = htmlspecialchars($_POST['email']);
            $sql = "SELECT * FROM tbl_customer WHERE username_customer = '" . $username_customer . "' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);

            if ($count > 0) {
                echo "<h3 style='color : red; text-align : center;margin-bottom : 20px;'>The account already exists</h3>";
            } else if ($_POST['password'] != $_POST['password-repeat']) {
                echo "<h3 style='color : red; text-align : center;margin-bottom : 20px;'>Please re-enter your password</h3>";
            } else {
                $sql = "INSERT INTO tbl_customer(name_customer,username_customer,password_customer,
                                            phone_customer,address,email_customer)
                        VALUE ('$name_customer','$username_customer','$password_customer'
                        ,'$phone_customer','$address','$email_customer')";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    echo "<h3 style='color : green; text-align : center;margin-bottom : 20px'>You have successfully registered</h3>";
                    $_SESSION['register'] = $username_customer;
                    // header("Location:index.php?manager=login");
                }
            }
        }
        ?>

       <div class="content">
           <div class="form-register">
            
               <form action="index.php?manager=register" method="POST" onsubmit="return formvalidate();">
                   <div class="container-register">

                       <h1>Sign Up</h1>
                       <p>Please fill in this form to create an account.</p>
                       <hr>

                       <label for="fullname"><b>Fullname*</b></label>
                       <input type="text" placeholder="Enter fullname" name="fullname" id="fullname" required>

                       <label for="username"><b>Username*</b></label>
                       <input type="text" placeholder="Enter Username" name="username" id="username" required>

                       <label for="email"><b>Email*</b></label>
                       <input type="email" placeholder="Enter Email" name="email" id="email" required>

                       <label for="address"><b>Address*</b></label>
                       <input type="text" placeholder="Enter Address" name="address" id="address" required>

                       <label for="phone"><b>Phone number*</b></label>
                       <input type="number_format" placeholder="Enter phone" name="phone" id="phone" required>

                       <label for="password"><b>Password*</b></label>
                       <input type="password" placeholder="Enter Password" name="password" id="password" required>

                       <label for="password-repeat"><b>Repeat Password*</b></label>
                       <input type="password" placeholder="Repeat Password" name="password-repeat" id="password-repeat" required>

                       <div class="clearfix">
                           <button type="submit" name="submit" value="submit" class="signupbtn">Sign Up</button>
                       </div>
                   </div>
                   <span id="register"><a href="index.php?manager=login">Login</a></span>
                   <span id="right-form"><a href="index.php?manager=changePassword">Change Password</a></span>
               </form>
           </div>
       </div>