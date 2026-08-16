<?php
session_start();
include "db_connect.php";

if(!isset($_GET['id'])){
    die("Product Not Found");
}

$id = $_GET['id'];

$sql = "SELECT * FROM marketplace WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 0){
    die("Invalid Product");
}

$product = mysqli_fetch_assoc($result);

/* Payment Completed */

if(isset($_POST['payment_done'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $product_id   = $product['id'];
    $product_name = $product['product_name'];
    $seller_name  = $product['seller_name'];
    $amount       = $product['price'];

    $insert = "INSERT INTO orders
    (
        product_id,
        product_name,
        customer_name,
        mobile,
        address,
        seller_name,
        amount,
        payment_status
    )
    VALUES
    (
        '$product_id',
        '$product_name',
        '$name',
        '$mobile',
        '$address',
        '$seller_name',
        '$amount',
        'Paid'
    )";

    if(mysqli_query($conn, $insert)){

        echo "<script>
        alert('✅ Payment Successful! Order Placed Successfully.');
        window.location='marketplace.php';
        </script>";
        exit();

    }else{

        echo "<script>
        alert('Database Error!');
        </script>";

    }

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Purchase Product</title>
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

.container{
    width:450px;
    margin:40px auto;
}

.card{
    background:rgba(255,255,255,0.95);
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.3);
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:10px;
}

h2{
    color:#2e7d32;
    margin:10px 0;
}

.price{
    color:red;
    font-size:25px;
    font-weight:bold;
    margin:10px 0;
}

input,
textarea{
    width:100%;
    padding:12px;
    margin-top:10px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
}

.payment-box{
    margin-top:20px;
    text-align:center;
    background:#f5fff5;
    padding:20px;
    border-radius:12px;
    border:2px solid #2e7d32;
}

.payment-box img{
    width:220px;
    height:220px;
    object-fit:contain;
    border-radius:10px;
    border:2px solid #2e7d32;
}

button{
    width:100%;
    padding:12px;
    background:#2e7d32;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:17px;
}

button:hover{
    background:#1b5e20;
}

</style>

</head>
<body>

<div class="container">

<div class="card">

<img src="images/products/<?php echo $product['image']; ?>" alt="Product">

<h2><?php echo $product['product_name']; ?></h2>

<p><b>Category :</b> <?php echo $product['category']; ?></p>

<p><b>Quantity :</b> <?php echo $product['quantity']; ?></p>

<p><b>Seller :</b> <?php echo $product['seller_name']; ?></p>

<p class="price">
₹ <?php echo $product['price']; ?>
</p>

<hr><br>

<form method="POST">

<input
type="text"
name="name"
placeholder="Enter Your Name"
required>

<input
type="text"
name="mobile"
placeholder="Enter Mobile Number"
required>

<textarea
name="address"
placeholder="Enter Delivery Address"
required></textarea>

<div class="payment-box">

<h2>📲 Scan & Pay</h2>

<img src="images/qr.png" alt="QR Code">

<br><br>

<p style="font-size:18px;">
<b>Amount :</b>
₹ <?php echo $product['price']; ?>
</p>

<br>

<button
type="submit"
name="payment_done">
✅ Payment Completed
</button>

</div>

</form>

</div>

</div>

</body>

</html>
