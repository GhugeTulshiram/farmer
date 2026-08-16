<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout - Smart AgriConnect</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#1b5e20,#4caf50,#81c784);
}

.container{
    width:420px;
    background:#fff;
    padding:40px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    animation:fadeIn 1s;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(-20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.icon{
    font-size:70px;
    margin-bottom:15px;
}

h1{
    color:#2e7d32;
    margin-bottom:10px;
}

p{
    color:#666;
    margin-bottom:25px;
}

.btn{
    display:inline-block;
    background:#2e7d32;
    color:white;
    text-decoration:none;
    padding:12px 30px;
    border-radius:10px;
    transition:0.3s;
}

.btn:hover{
    background:#1b5e20;
}
</style>

<meta http-equiv="refresh" content="3;url=index.php">

</head>
<body>

<div class="container">

    <div class="icon">👋</div>

    <h1>Logged Out Successfully</h1>

    <p>
        Thank you for using
        <b>Smart AgriConnect</b>.<br>
        Redirecting to login page...
    </p>

    <a href="index.php" class="btn">
        Login Again
    </a>

</div>

</body>
</html>