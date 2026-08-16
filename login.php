<?php
session_start();
include "db_connect.php";

if(isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn,
            "SELECT * FROM users
             WHERE email='$email'
             AND password='$password'");

    if(mysqli_num_rows($sql)>0){

        $row = mysqli_fetch_assoc($sql);

        $_SESSION['user'] = $row['fullname'];

        header("Location: dashboard.php");
    }
    else{
        echo "<script>
                alert('Invalid Email or Password');
                window.location='index.php';
              </script>";
    }
}
?>