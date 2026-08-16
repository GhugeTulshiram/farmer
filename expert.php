<?php
session_start();
include "db_connect.php";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

if(isset($_POST['save'])){

    $farmer = $_POST['farmer'];
    $subject = $_POST['subject'];
    $question = $_POST['question'];

    $sql = "INSERT INTO expert_support
            (farmer_name,subject,question)
            VALUES
            ('$farmer','$subject','$question')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Your Question Sent Successfully. Expert will contact you soon!');</script>";
    }
    else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Expert Farmer Support</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{

background-image:url("farm.jpg");
background-size:cover;
background-position:center;
background-attachment:fixed;

}


.header{

background:rgba(46,125,50,0.9);
color:white;
padding:25px;
text-align:center;

}

.header h1{

font-size:32px;

}



.container{

width:750px;
margin:40px auto;

}



.card{

background:rgba(255,255,255,0.95);
padding:35px;
border-radius:15px;
box-shadow:0 0 20px rgba(0,0,0,0.3);

}



.title{

text-align:center;
color:#2e7d32;
margin-bottom:20px;

}



.form-group{

margin-bottom:18px;

}


label{

font-weight:bold;
color:#333;
display:block;
margin-bottom:6px;

}


input,select,textarea{

width:100%;
padding:12px;
border:1px solid #ccc;
border-radius:8px;
font-size:15px;

}



textarea{

height:120px;
resize:none;

}



button{

width:100%;
padding:14px;
background:#2e7d32;
color:white;
border:none;
border-radius:8px;
font-size:18px;
cursor:pointer;

}


button:hover{

background:#1b5e20;

}




.info{

margin-top:30px;
background:#e8f5e9;
padding:20px;
border-radius:10px;
border-left:6px solid #2e7d32;

}


.info h3{

color:#2e7d32;
margin-bottom:10px;

}


.info p{

line-height:1.7;

}



.contact{

margin-top:20px;
background:#fff3cd;
padding:20px;
border-radius:10px;

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

<h1>🌱 Farmer Expert Support Center</h1>

<p>Get solutions for your farming problems from experts</p>

</div>



<div class="container">


<div class="card">


<h2 class="title">👨‍🌾 Ask Agriculture Expert</h2>


<form method="POST">


<div class="form-group">

<label>Farmer Name</label>

<input type="text" name="farmer" placeholder="Enter Farmer Name" required>

</div>



<div class="form-group">

<label>Select Problem Category</label>

<select name="subject">

<option>Crop Disease</option>
<option>Fertilizer Guidance</option>
<option>Crop Selection</option>
<option>Weather Related Problem</option>
<option>Pest Control</option>
<option>Other</option>

</select>

</div>




<div class="form-group">

<label>Your Question / Problem</label>

<textarea name="question" placeholder="Describe your farming problem..." required></textarea>

</div>




<button type="submit" name="save">

📩 Send Question To Expert

</button>


</form>




<div class="info">

<h3>🌾 Farming Support Information</h3>

<p>
✔ Crop disease identification support<br>
✔ Soil and fertilizer advice<br>
✔ Modern farming techniques guidance<br>
✔ Weather based farming suggestions<br>
✔ Government agriculture schemes information
</p>

</div>



<div class="contact">

<h3>📞 Expert Help Contact</h3>

<p>
Agriculture Expert Helpline : 7499038001<br>
Email : saisangave@gmail.com<br>
Available Time : 9 AM - 6 PM
</p>

</div>



<div class="back">

<a href="dashboard.php">
← Back To Dashboard
</a>

</div>



</div>

</div>



</body>
</html>