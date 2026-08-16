<?php
session_start();
include "db_connect.php";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

$result = "";

if(isset($_POST['search'])){

    $crop = mysqli_real_escape_string($conn,$_POST['crop']);
    $disease = mysqli_real_escape_string($conn,$_POST['disease']);

    $sql = "SELECT * FROM disease_detection
            WHERE crop_name='$crop'
            AND disease_name='$disease'";

    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)>0){

        $row = mysqli_fetch_assoc($query);

        $result = "
        <div class='result'>
            <h3>Disease Information</h3>

            <p><b>Crop :</b> ".$row['crop_name']."</p>

            <p><b>Disease :</b> ".$row['disease_name']."</p>

            <p><b>Symptoms :</b><br>".$row['symptoms']."</p>

            <p><b>Solution :</b><br>".$row['solution']."</p>
        </div>";

    }else{

        $result = "
        <div class='result'>
            <h3>Disease Information</h3>

            <p><b>Crop :</b> ".$crop."</p>

            <p><b>Disease :</b> ".$disease."</p>

            <p><b>Symptoms :</b><br>
            Yellow leaves, leaf spots, wilting, poor growth or drying of plants.
            </p>

            <p><b>Solution :</b><br>
            Maintain proper irrigation, remove infected leaves or plants, keep the field clean, use recommended fungicides or pesticides, and consult the nearest Agriculture Officer.
            </p>
        </div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Disease Detection</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#d4fc79,#96e6a1);
}

.container{
    width:700px;
    margin:50px auto;
}

.card{
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    color:#0b7a20;
}

label{
    font-weight:bold;
}

input{
    width:100%;
    padding:12px;
    margin-top:8px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
}

button{
    width:100%;
    padding:12px;
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

.result{
    margin-top:20px;
    padding:20px;
    background:#eef9ef;
    border-left:5px solid green;
    border-radius:10px;
}

.result h3{
    margin-top:0;
}

a{
    text-decoration:none;
    color:green;
    font-weight:bold;
}
body{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;
    background-image:url("farm.jpg");
    background-repeat:no-repeat;
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
}
.card{
    width:700px;
    margin:50px auto;
    background:rgba(255,255,255,0.92);
    padding:30px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
}
</style>

</head>

<body>

<div class="container">

<div class="card">

<h2>🌿 Disease Detection</h2>

<form method="POST">

<label>Crop Name</label>
<input type="text" name="crop" placeholder="Enter Crop Name" required>

<label>Disease Name</label>
<input type="text" name="disease" placeholder="Enter Disease Name" required>

<button type="submit" name="search">
Search Disease
</button>

</form>

<?php echo $result; ?>

<br>

<a href="dashboard.php">← Back to Dashboard</a>

</div>

</div>

</body>
</html>