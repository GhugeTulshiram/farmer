<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Smart AgriConnect</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
    animation:fadeIn 0.8s;
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

.logo{
    text-align:center;
    margin-bottom:20px;
}

.logo h1{
    color:#2e7d32;
    font-size:36px;
}

.logo p{
    color:#666;
    margin-top:5px;
}

h2{
    text-align:center;
    margin-bottom:20px;
}

.form-group{
    margin-bottom:15px;
}

input{
    width:100%;
    padding:14px;
    border:2px solid #ddd;
    border-radius:10px;
    outline:none;
    font-size:16px;
    transition:0.3s;
}

input:focus{
    border-color:#2e7d32;
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#2e7d32;
    color:white;
    font-size:18px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#1b5e20;
    transform:scale(1.02);
}

.link{
    text-align:center;
    margin-top:15px;
}

.link a{
    color:#2e7d32;
    font-weight:bold;
    text-decoration:none;
}

.signup{
    display:none;
}
</style>
</head>
<body>

<div class="container">

    <div class="logo">
        <h1>🌾</h1>
        <h1>Smart AgriConnect</h1>
        <p>Integrated Agriculture Management System</p>
    </div>

    <!-- LOGIN -->
    <div id="login">

        <h2>Login</h2>

        <form action="login.php" method="POST">

            <div class="form-group">
                <input type="email"
                       name="email"
                       placeholder="Enter Email"
                       required>
            </div>

            <div class="form-group">
                <input type="password"
                       name="password"
                       placeholder="Enter Password"
                       required>
            </div>

            <button type="submit">
                Login
            </button>

        </form>

        <div class="link">
            Don't have an account?
            <a href="#" onclick="showSignup()">
                Sign Up
            </a>
        </div>

    </div>

    <!-- SIGNUP -->
    <div id="signup" class="signup">

        <h2>Create Account</h2>

        <form action="signup.php" method="POST">

            <div class="form-group">
                <input type="text"
                       name="fullname"
                       placeholder="Full Name"
                       required>
            </div>

            <div class="form-group">
                <input type="email"
                       name="email"
                       placeholder="Email Address"
                       required>
            </div>

            <div class="form-group">
                <input type="password"
                       name="password"
                       placeholder="Password"
                       required>
            </div>

            <button type="submit">
                Create Account
            </button>

        </form>

        <div class="link">
            Already have an account?
            <a href="#" onclick="showLogin()">
                Login
            </a>
        </div>

    </div>

</div>

<script>
function showSignup(){
    document.getElementById("login").style.display="none";
    document.getElementById("signup").style.display="block";
}

function showLogin(){
    document.getElementById("signup").style.display="none";
    document.getElementById("login").style.display="block";
}
</script>

</body>
</html>