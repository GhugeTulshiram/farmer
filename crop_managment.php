<?php
session_start();
include "db_connect.php";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

$message = "";

if(isset($_POST['save']))
{
    $crop_name  = $_POST['crop_name'];
    $season     = $_POST['season'];
    $sowing     = $_POST['sowing'];
    $harvest    = $_POST['harvest'];
    $fertilizer = $_POST['fertilizer'];
    $notes      = $_POST['notes'];

    $sql = "INSERT INTO crop_management
            (crop_name,season,sowing_date,harvest_date,fertilizer,notes)
            VALUES
            ('$crop_name','$season','$sowing','$harvest','$fertilizer','$notes')";

    if(mysqli_query($conn,$sql))
    {
        $crop = strtolower(trim($crop_name));
        $solution = "";

        if($crop=="cotton")
        {
            $solution = "
            <h3>🌱 Cotton Solution</h3>

            <p><b>English:</b>
            Use NPK fertilizer regularly. Irrigate every 7 days and protect the crop from pink bollworm.</p>

            <p><b>मराठी:</b>
            नियमित NPK खत वापरा. दर ७ दिवसांनी सिंचन करा आणि गुलाबी बोंडअळीपासून संरक्षण करा.</p>";
        }
        elseif($crop=="soybean")
        {
            $solution = "
            <h3>🌱 Soybean Solution</h3>

            <p><b>English:</b>
            Maintain proper drainage and use phosphorus fertilizer.</p>

            <p><b>मराठी:</b>
            पाण्याचा निचरा व्यवस्थित ठेवा आणि फॉस्फरस खत वापरा.</p>";
        }
        elseif($crop=="wheat")
        {
            $solution = "
            <h3>🌱 Wheat Solution</h3>

            <p><b>English:</b>
            Apply urea fertilizer and irrigate every 10-15 days.</p>

            <p><b>मराठी:</b>
            युरिया खत वापरा आणि १०-१५ दिवसांनी सिंचन करा.</p>";
        }
        else
        {
            $solution = "
            <h3>🌱 General Crop Solution</h3>

            <p><b>English:</b>
            Use balanced fertilizers, proper irrigation and regular pest management.</p>

            <p><b>मराठी:</b>
            संतुलित खत वापरा, योग्य सिंचन करा आणि नियमित कीड नियंत्रण करा.</p>";
        }

        $message = "
        <div class='result'>

            <h2>✅ Crop Information Saved Successfully</h2>

            <div class='box'>

                <h3>📌 English Information</h3>

                <p><b>Crop Name:</b> $crop_name</p>
                <p><b>Season:</b> $season</p>
                <p><b>Sowing Date:</b> $sowing</p>
                <p><b>Harvest Date:</b> $harvest</p>
                <p><b>Fertilizer:</b> $fertilizer</p>
                <p><b>Notes:</b> $notes</p>

                <hr>

                <h3>📌 मराठी माहिती</h3>

                <p><b>पीक:</b> $crop_name</p>
                <p><b>हंगाम:</b> $season</p>
                <p><b>पेरणी तारीख:</b> $sowing</p>
                <p><b>कापणी तारीख:</b> $harvest</p>
                <p><b>खत:</b> $fertilizer</p>
                <p><b>टीप:</b> $notes</p>

                <hr>

                <div class='solution'>
                    $solution
                </div>

            </div>

        </div>";
    }
    else
    {
        $message = "
        <div class='error'>
            Error: ".mysqli_error($conn)."
        </div>";
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
    font-family:Arial,sans-serif;
}

.header{
    background:rgba(0,60,0,.85);
    color:white;
    text-align:center;
    padding:25px;
}

.header h1{
    font-size:40px;
}

.container{
    width:850px;
    margin:40px auto;
}

.card{
    background:rgba(255,255,255,.15);
    backdrop-filter:blur(15px);
    padding:35px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.4);
}

.form-group{
    margin-bottom:20px;
}

label{
    color:white;
    font-size:18px;
    font-weight:bold;
    display:block;
    margin-bottom:8px;
}

input,
select,
textarea{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    font-size:16px;
}

textarea{
    height:100px;
}

button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    background:linear-gradient(90deg,#1b5e20,#43a047);
    color:white;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    opacity:.9;
}

.result{
    margin-top:30px;
}

.result h2{
    text-align:center;
    color:white;
    margin-bottom:20px;
}

.box{
    background:white;
    padding:25px;
    border-radius:15px;
}

.box h3{
    color:#1b5e20;
    margin-bottom:10px;
}

.box p{
    padding:5px;
    font-size:17px;
}

.solution{
    background:#fff8e1;
    padding:20px;
    border-radius:10px;
    border-left:6px solid orange;
    margin-top:20px;
}

.error{
    background:#ffebee;
    color:red;
    padding:20px;
    border-radius:10px;
    margin-top:20px;
}

.back{
    text-align:center;
    margin-top:20px;
}

.back a{
    color:white;
    text-decoration:none;
    font-size:18px;
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

<?php echo $message; ?>

<div class="back">
    <a href="dashboard.php">← Back To Dashboard</a>
</div>

</div>

</div>

</body>
</html>