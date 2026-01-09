<?php
$Email = $_POST['Email'];
$pr_Name = $_POST['pr_Name'];
$price = $_POST['price'];
$image = $_POST['image'];
$product_id = $_POST['product_id'];

// Database connection
$conn = new mysqli('localhost','root','','vit-cart');
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
}

$stmt = $conn->prepare("
    INSERT INTO cart (Email, pr_Name, price, image, product_id)
    VALUES (?, ?, ?, ?, ?)
");

$stmt->bind_param("ssdsi", $Email, $pr_Name, $price, $image, $product_id);
$stmt->execute();

header('Location: cart.php?email='.$Email);
exit;
?>
