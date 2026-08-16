<?php
include "db_connect.php";

echo "Connected Successfully <br>";

if(isset($_POST['fullname'])){

    echo "Form Submitted <br>";

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(fullname,email,password)
            VALUES('$fullname','$email','$password')";

    if(mysqli_query($conn,$sql)){
        echo "Registration Successful";
    }
    else{
        echo mysqli_error($conn);
    }
}
?>