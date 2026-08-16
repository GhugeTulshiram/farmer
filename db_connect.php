<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "users"
);

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

?>