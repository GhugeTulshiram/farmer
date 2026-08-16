<?php
session_start();
include "db_connect.php";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

if(isset($_POST['save'])){

    $crop_name = $_POST['crop_name'];
    $season = $_POST['season'];
    $sowing = $_POST['sowing'];
    $harvest = $_POST['harvest'];
    $fertilizer = $_POST['fertilizer'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO crop_management
            (crop_name,season,sowing_date,harvest_date,fertilizer,notes)
            VALUES
            ('$crop_name','$season','$sowing','$harvest','$fertilizer','$notes')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Crop Information Saved Successfully');</script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Crop Management</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:#f4f6f9;
}

.header{
    background:#2e7d32;
    color:white;
    padding:20px;
    text-align:center;
}

.container{
    width:700px;
    margin:40px auto;
}

.card{
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:bold;
}

input,select,textarea{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    width:100%;
    padding:12px;
    background:#2e7d32;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#1b5e20;
}

.back{
    margin-top:20px;
    text-align:center;
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
    <h1>🌱 Crop Management</h1>
</div>

<div class="container">

<div class="card">

<form method="POST">

<div class="form-group">
<label>Crop Name</label>
<input type="text" name="crop_name" required>
</div>

<div class="form-group">
<label>Season</label>
<select name="season">
    <option>Kharif</option>
    <option>Rabi</option>
    <option>Summer</option>
</select>
</div>

<div class="form-group">
<label>Sowing Date</label>
<input type="date" name="sowing">
</div>

<div class="form-group">
<label>Harvest Date</label>
<input type="date" name="harvest">
</div>

<div class="form-group">
<label>Fertilizer Used</label>
<input type="text" name="fertilizer">
</div>

<div class="form-group">
<label>Notes</label>
<textarea name="notes"></textarea>
</div>

<button type="submit" name="save">
Save Crop Information
</button>

</form>

<div class="back">
    <a href="dashboard.php">← Back to Dashboard</a>
</div>

</div>

</div>

</body>
</html>