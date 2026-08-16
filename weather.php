<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

$weather = "";

if(isset($_POST['search']))
{
    $city = trim($_POST['city']);

    $url = "https://wttr.in/".$city."?format=j1";

    $response = @file_get_contents($url);

    if($response)
    {
        $data = json_decode($response, true);

        if(isset($data['current_condition'][0]))
        {
            $current = $data['current_condition'][0];

            $weather = "
            <div class='weather-card'>
                <h2>📍 ".$city."</h2>

                <div class='temp'>
                    ".$current['temp_C']."°C
                </div>

                <p><b>Weather:</b> ".$current['weatherDesc'][0]['value']."</p>

                <p><b>Humidity:</b> ".$current['humidity']."%</p>

                <p><b>Wind Speed:</b> ".$current['windspeedKmph']." km/h</p>

                <p><b>Feels Like:</b> ".$current['FeelsLikeC']."°C</p>
            </div>
            ";
        }
        else
        {
            $weather = "<h3 style='color:red;text-align:center;'>City Not Found</h3>";
        }
    }
    else
    {
        $weather = "<h3 style='color:red;text-align:center;'>Internet Connection Error</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Weather Updates</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    min-height:100vh;

    background:
    linear-gradient(
        rgba(0,50,0,0.55),
        rgba(0,80,0,0.55)
    ),
    url('weather-bg.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}

/* Header */
.header{
    background:rgba(0,40,0,0.90);
    color:white;
    padding:25px;
    text-align:center;
    font-size:22px;
    box-shadow:0 5px 20px rgba(0,0,0,0.4);
}

/* Container */
.container{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    min-height:80vh;
}

/* Card */
.card{
    width:500px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

/* Title */
.card-title{
    text-align:center;
    color:white;
    font-size:35px;
    margin-bottom:25px;
}

/* Input */
input{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    margin-bottom:20px;
    font-size:16px;
}

/* Button */
button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    background:linear-gradient(90deg,#1b5e20,#43a047);
    color:white;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-3px);
}

/* Weather Result */
.weather-card{
    margin-top:25px;
    text-align:center;
    color:white;
}

.weather-card h2{
    font-size:32px;
    margin-bottom:10px;
}

.temp{
    font-size:60px;
    color:#ffc107;
    font-weight:bold;
    margin:20px 0;
}

.weather-card p{
    font-size:18px;
    margin:10px 0;
}

/* Back */
.back{
    margin-top:20px;
    text-align:center;
}

.back a{
    color:white;
    text-decoration:none;
    font-size:18px;
    font-weight:bold;
}

.back a:hover{
    color:#ffd54f;
}
</style>

</head>

<body>

<div class="header">
    <h1>☁ Weather Updates</h1>
</div>

<div class="container">

    <div class="card">

        <h2 class="card-title">Check City Weather</h2>

        <form method="POST">

            <input
                type="text"
                name="city"
                placeholder="Enter City Name"
                required>

            <button type="submit" name="search">
                Search Weather
            </button>

        </form>

        <?php echo $weather; ?>

    </div>

    <div class="back">
        <a href="dashboard.php">← Back To Dashboard</a>
    </div>

</div>

</body>
</html>