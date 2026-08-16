<?php
session_start();
include "db_connect.php";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

$result = "";

if(isset($_POST['save'])){

    $crop = mysqli_real_escape_string($conn,$_POST['crop']);
    $source = mysqli_real_escape_string($conn,$_POST['source']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);
    $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
    $date = mysqli_real_escape_string($conn,$_POST['date']);
    $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);

    $sql = "INSERT INTO irrigation
    (crop_name,water_source,irrigation_type,water_quantity,irrigation_date,remarks)
    VALUES
    ('$crop','$source','$type','$quantity','$date','$remarks')";

    if(mysqli_query($conn,$sql)){

        $result = "
        <div class='result'>
            <h3>💧 Irrigation Recommendation</h3>

            <p><b>Crop :</b> $crop</p>

            <p><b>Water Source :</b> $source</p>

            <p><b>Irrigation Type :</b> $type</p>

            <p><b>Water Quantity :</b> $quantity</p>

            <p><b>Date :</b> $date</p>

            <p><b>Recommendation :</b><br>
            Irrigation data saved successfully. Continue watering the crop regularly according to soil moisture and weather conditions. Avoid over-irrigation and ensure proper drainage for healthy crop growth.
            </p>
        </div>";

    }else{

        $result = "
        <div class='result'>

        <h3>💧 Irrigation Recommendation</h3>

        <p>
        Maintain proper irrigation schedule, avoid excess watering,
        check soil moisture regularly and use drip irrigation whenever possible.
        </p>

        </div>";
    }
    if(mysqli_query($conn,$sql)){

      $result = "
<div class='result'>

<h3>💧 सिंचन शिफारस</h3>

<p><b>पीक :</b> $crop</p>

<p><b>पाण्याचा स्रोत :</b> $source</p>

<p><b>सिंचन प्रकार :</b> $type</p>

<p><b>पाण्याचे प्रमाण :</b> $quantity</p>

<p><b>दिनांक :</b> $date</p>

<p><b>शिफारस :</b><br>
आपली सिंचनाची माहिती यशस्वीरित्या जतन करण्यात आली आहे.
पिकाला जमिनीतील ओलावा आणि हवामानानुसार नियमित पाणी द्या.
जास्त पाणी देणे टाळा, योग्य निचऱ्याची व्यवस्था ठेवा आणि शक्य असल्यास ठिबक सिंचनाचा वापर करा.
यामुळे पिकाची वाढ चांगली होईल आणि पाण्याची बचत होईल.
</p>

</div>";

    }else{

      $result = "
<div class='result'>

<h3>💧 सिंचन शिफारस</h3>

<p>
पिकाच्या गरजेनुसार नियमित सिंचन करा.
जमिनीतील ओलावा तपासूनच पाणी द्या.
जास्त किंवा कमी पाणी देणे टाळा.
शक्य असल्यास ठिबक किंवा स्प्रिंकलर सिंचनाचा वापर करा.
यामुळे पाण्याची बचत होईल आणि पिकाची वाढ चांगली होईल.
</p>

</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Irrigation Management</title>

<style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:url("images/farm.jpg") no-repeat center center fixed;
    background-size:cover;
}

.header{
    background:rgba(46,125,50,0.90);
    color:white;
    padding:20px;
    text-align:center;
}

.container{
    width:700px;
    margin:40px auto;
}

.card{
    background:rgba(255,255,255,0.92);
    padding:30px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.3);
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:bold;
}

input,
select,
textarea{
    width:100%;
    padding:10px;
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
    background:#eef9ef;
    border-left:5px solid green;
    padding:20px;
    border-radius:10px;
    line-height:1.8;
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
body{
    margin:0;
    padding:0;
    font-family:Arial, sans-serif;

    background-image:url("farm.jpg");
    background-repeat:no-repeat;
    background-position:center;
    background-size:cover;
    background-attachment:fixed;

    min-height:100vh;
}
.header{
    background:rgba(46,125,50,0.85);
    color:#fff;
    padding:20px;
    text-align:center;
}
.card{
    background:rgba(255,255,255,0.92);
    padding:30px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,.4);
}

</style>

</head>

<body>

<div class="header">
    <h1>💧 Irrigation Management</h1>
</div>

<div class="container">

<div class="card">

<form method="POST">

<div class="form-group">
<label>Crop Name</label>
<input type="text" name="crop" required>
</div>

<div class="form-group">
<label>Water Source</label>
<input type="text" name="source" placeholder="Well / River / Borewell">
</div>

<div class="form-group">
<label>Irrigation Type</label>
<select name="type">
<option>Drip Irrigation</option>
<option>Sprinkler</option>
<option>Flood Irrigation</option>
</select>
</div>

<div class="form-group">
<label>Water Quantity</label>
<input type="text" name="quantity" placeholder="500 Liters">
</div>

<div class="form-group">
<label>Irrigation Date</label>
<input type="date" name="date">
</div>

<div class="form-group">
<label>Remarks</label>
<textarea name="remarks"></textarea>
</div>

<button type="submit" name="save">
Save Irrigation Data
</button>

</form>

<?php echo $result; ?>

<div class="back">
<a href="dashboard.php">← Back to Dashboard</a>
</div>

</div>

</div>

</body>
</html>