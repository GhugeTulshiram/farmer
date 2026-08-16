<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Smart AgriConnect Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f5f7fa;
}

/* Header */
.header{
    background:linear-gradient(90deg,#004d00,#0b7d0b);
    color:white;
    padding:20px;
    text-align:center;
}

.header h1{
    font-size:48px;
    font-weight:700;
}

.header p{
    font-size:24px;
    margin-top:10px;
}

/* Layout */
.container{
    display:flex;
}

/* Sidebar */
.sidebar{
    width:260px;
    background:#045a04;
    min-height:100vh;
    padding-top:20px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:18px 25px;
    font-size:22px;
    transition:0.3s;
}

.sidebar a:hover{
    background:#1b8b1b;
    border-radius:10px;
}

/* Content */
.content{
    flex:1;
    padding:30px;

    background-image:
        linear-gradient(rgba(255,255,255,0.10),
        rgba(255,255,255,0.10)),
        url('farmer.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    min-height:100vh;
}

/* Welcome Card */
.card{
    background:rgba(255,255,255,0.92);
    padding:30px;
    border-radius:20px;
    width:700px;
    box-shadow:0 5px 20px rgba(0,0,0,0.3);
    margin-bottom:30px;
}

.card h2{
    color:#0b6b0b;
    font-size:48px;
    margin-bottom:15px;
}

.card p{
    font-size:28px;
    line-height:45px;
}

/* Feature Cards */
.features{
    display:flex;
    flex-wrap:wrap;
    gap:25px;
}

.feature-box{
    width:300px;
    background:rgba(255,255,255,0.90);
    backdrop-filter:blur(5px);
    border-radius:20px;
    padding:25px;
    text-align:center;
    box-shadow:0 5px 20px rgba(0,0,0,0.3);
    transition:0.3s;
}

.feature-box:hover{
    transform:translateY(-10px);
}

.icon{
    font-size:60px;
}

.feature-box h3{
    color:#0b6b0b;
    margin:15px 0;
    font-size:32px;
}

.feature-box p{
    font-size:20px;
    margin-bottom:20px;
}

.btn{
    display:inline-block;
    background:#198c19;
    color:white;
    text-decoration:none;
    padding:12px 30px;
    border-radius:10px;
    font-size:20px;
}

.btn:hover{
    background:#0a690a;
}
</style>
</head>

<body>

<div class="header">
    <h1>🌾 Smart AgriConnect Dashboard</h1>
    <p>Welcome, <b><?php echo htmlspecialchars($user); ?></b></p>
</div>

<div class="container">

    <div class="sidebar">
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="profile.php">👤 Farmer Profile</a>
        <a href="crop_management.php">🌱 Crop Management</a>
        <a href="weather.php">☁ Weather Updates</a>
        <a href="disease.php">🦠 Disease Detection</a>
        <a href="irrigation.php">💧 Irrigation</a>
        <a href="marketplace.php">🛒 Marketplace</a>
        <a href="expert.php">👨‍🌾 Expert Support</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

    <div class="content">

        <div class="card">
            <h2>Welcome to Smart AgriConnect</h2>
            <p>
                Manage crops, monitor weather,
                irrigation, disease detection and
                agricultural marketplace activities
                from one platform.
            </p>
        </div>

        <div class="features">

            <div class="feature-box">
                <div class="icon">🌱</div>
                <h3>Crop Management</h3>
                <p>Manage crop records and cultivation details.</p>
                <a href="crop_management.php" class="btn">Enter →</a>
            </div>

            <div class="feature-box">
                <div class="icon">☁</div>
                <h3>Weather</h3>
                <p>Get weather forecasts and alerts.</p>
                <a href="weather.php" class="btn">Enter →</a>
            </div>

            <div class="feature-box">
                <div class="icon">🦠</div>
                <h3>Disease Detection</h3>
                <p>Identify crop diseases quickly.</p>
                <a href="disease.php" class="btn">Enter →</a>
            </div>

            <div class="feature-box">
                <div class="icon">💧</div>
                <h3>Irrigation</h3>
                <p>Monitor and manage irrigation systems.</p>
                <a href="irrigation.php" class="btn">Enter →</a>
            </div>

            <div class="feature-box">
                <div class="icon">🛒</div>
                <h3>Marketplace</h3>
                <p>Buy and sell agricultural products.</p>
                <a href="marketplace.php" class="btn">Enter →</a>
            </div>

            <div class="feature-box">
                <div class="icon">👨‍🌾</div>
                <h3>Expert Support</h3>
                <p>Consult agricultural experts.</p>
                <a href="expert.php" class="btn">Enter →</a>
            </div>

        </div>

    </div>

</div>

</body>
</html>