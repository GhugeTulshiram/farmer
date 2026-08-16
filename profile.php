<?php
session_start();
include "db_connect.php";

echo "Connected Database: ";
$result = mysqli_query($conn,"SELECT DATABASE()");
$row = mysqli_fetch_row($result);
echo $row[0];
echo "<br>";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

if(isset($_POST['save'])){

    $name     = $_POST['name'];
    $mobile   = $_POST['mobile'];
    $email    = $_POST['email'];
    $village  = $_POST['village'];
    $district = $_POST['district'];
    $land     = $_POST['land'];
    $crop     = $_POST['crop'];
    $address  = $_POST['address'];

    $sql = "INSERT INTO farmer_profile
            (farmer_name,mobile,email,village,district,land_area,crop,address)
            VALUES
            ('$name','$mobile','$email','$village','$district','$land','$crop','$address')";
            
echo $sql."<br>";
 if(mysqli_query($conn,$sql)){
    echo "<h2 style='color:green'>Profile Saved Successfully</h2>";
}
else{
    die("MySQL Error: ".mysqli_error($conn));
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Farmer Profile</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f7f6;
}

.header{
    background:linear-gradient(90deg,#1b5e20,#43a047);
    color:white;
    text-align:center;
    padding:20px;
}

.container{
    width:700px;
    margin:40px auto;
}

.card{
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);
}

.card h2{
    text-align:center;
    color:#2e7d32;
    margin-bottom:25px;
}

.form-group{
    margin-bottom:20px;
}

label{
    font-weight:600;
    display:block;
    margin-bottom:8px;
}

input, select, textarea{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
}

textarea{
    resize:none;
}

button{
    width:100%;
    padding:14px;
    background:#2e7d32;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#1b5e20;
}

.back{
    text-align:center;
    margin-top:20px;
}

.back a{
    text-decoration:none;
    color:#2e7d32;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="header">
    <h1>👨‍🌾 Farmer Profile</h1>
</div>

<div class="container">

    <div class="card">

        <h2>Profile Information</h2>

        <form action="" method="POST">

            <div class="form-group">
                <label>Farmer Name</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" required>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Village</label>
                <input type="text" name="village" required>
            </div>

            <div class="form-group">
                <label>District</label>
                <input type="text" name="district" required>
            </div>

            <div class="form-group">
                <label>Land Area (Acres)</label>
                <input type="number" name="land" required>
            </div>

            <div class="form-group">
                <label>Main Crop</label>
                <select name="crop">
                    <option>Rice</option>
                    <option>Wheat</option>
                    <option>Sugarcane</option>
                    <option>Cotton</option>
                    <option>Vegetables</option>
                </select>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea rows="4" name="address"></textarea>
            </div>

   <button type="submit" name="save">
    Save Profile
</button>

        </form>

        <div class="back">
            <a href="dashboard.php">← Back to Dashboard</a>
        </div>

    </div>

</div>

</body>
</html>