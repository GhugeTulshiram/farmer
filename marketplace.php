<?php
session_start();
include "db_connect.php";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

$products = [];

// Database मधून सर्व Products आणा
$sql = "SELECT * FROM marketplace ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Marketplace</title>

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
    background:rgba(46,125,50,0.9);
    color:#fff;
    text-align:center;
    padding:20px;
}

.container{
    width:90%;
    margin:30px auto;
}

.products{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:25px;
}

.card{
    width:260px;
    background:#fff;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.2);
    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
}

.card img{
    width:100%;
    height:200px;
    object-fit:cover;
}

.details{
    padding:15px;
}

.details h3{
    color:#2e7d32;
    margin-bottom:10px;
}

.details p{
    margin:6px 0;
}

.price{
    color:red;
    font-size:22px;
    font-weight:bold;
}

.buy{
    display:block;
    text-align:center;
    margin-top:15px;
    padding:12px;
    background:#2e7d32;
    color:white;
    text-decoration:none;
    border-radius:8px;
}

.buy:hover{
    background:#1b5e20;
}

.back{
    text-align:center;
    margin:30px;
}

.back a{
    color:white;
    background:#2e7d32;
    padding:12px 20px;
    border-radius:8px;
    text-decoration:none;
}
</style>

</head>

<body>

<div class="header">
<h1>🛒 Farmer Marketplace</h1>
</div>

<div class="container">

<div class="products">

<?php
if(count($products)>0){

foreach($products as $row){
?>

<div class="card">

<img src="images/products/<?php echo $row['image']; ?>" alt="Product">

<div class="details">

<h3><?php echo $row['product_name']; ?></h3>

<p><b>Category :</b> <?php echo $row['category']; ?></p>

<p><b>Quantity :</b> <?php echo $row['quantity']; ?></p>

<p class="price">
₹ <?php echo $row['price']; ?>
</p>

<p><b>Seller :</b> <?php echo $row['seller_name']; ?></p>

<p><b>Mobile :</b> <?php echo $row['mobile']; ?></p>

<a class="buy"
href="purchase.php?id=<?php echo $row['id']; ?>">
🛍 Buy Now
</a>

</div>

</div>

<?php
}
}else{
echo "<h2 style='color:white;'>No Products Available</h2>";
}
?>

</div>

<div class="back">
<a href="dashboard.php">← Back to Dashboard</a>
</div>

</div>

</body>
</html>