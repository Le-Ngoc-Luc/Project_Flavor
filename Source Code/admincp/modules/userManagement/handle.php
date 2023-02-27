<?php
    include('config/conn.php');


    if(isset($_POST['edit'])){
        $nameCustomer = htmlspecialchars($_POST['nameCustomer']);
        $address = htmlspecialchars($_POST['address']);
        $email = htmlspecialchars($_POST['email']);
        $phoneCustomer = htmlspecialchars($_POST['phoneCustomer']);
        $id = $_POST['id'];
        $sql_edit = "UPDATE tbl_customer 
            SET name_customer= '$nameCustomer' ,
            phone_customer= '$phoneCustomer' ,
            address= '$address' ,
            email_customer= '$email'
            WHERE id_customer= $id";
    mysqli_query($conn, $sql_edit);
    header('Location:index.php?action=usermanagement');
    }
?>