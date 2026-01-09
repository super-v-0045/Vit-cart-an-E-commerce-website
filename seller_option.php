<?php
$email = $_GET['email'];
$name = $_GET['name'];
$conn = mysqli_connect("localhost", "root", "", "vit-cart");
$edit_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM `orders` WHERE sellerId = '$email' and status='order confirmed'");
$result = mysqli_fetch_assoc($edit_query);
echo $result['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
    <title>VitCart Seller Central</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: plum;
        }
        .navbar {
            background-color: #232f3e;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        a{
            text-decoration:none;
            color:white;
            font-style: italic;
        }
        .banner {
            background-color: #ce7d0d;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
        }
        .content-block {
            background-color: white;
            margin: 20px;
            padding: 20px;
        }
        .content-block h2 {
            color: #333;
        }
        .content-block p {
            color: #666;
        }
        .content-block button {
            background-color: #2d8659;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .footer {
            background-color: #131a22;
            color: white;
            position: absolute;
            width: 100%;
            bottom:0;
            text-align: center;
            padding: 10px;
        }
        button{
            width: 100%;
            font-size:large;
        }
    </style>
</head>
<body>
    <div class="banner">
<i>
 welocome to <?php echo $name;?><br><a href="seller_edit.php?edit=<?php echo $email;?>">edit your profile</a><br>
</i>    (VIT-CART SELLER CENTRAL)</div>
    <div class="content-block" style="background-color:yellow;">
        <h2>Adding New</h2>
        <p>Here we can new add a new product........</p>
        <a href="add_product.php?email=<?php echo $email;?>"><button style=" background-color:goldenrod;">Go to form</button></a>
    </div>
    <div class="content-block" style="background-color:#eea8a8;">
        <h2>View your products</h2>
        <p>here you can view upadate (price,name,specification etc.) and delete the product......</p>
        <a  href="product_action.php?email=<?php echo $email;?>"><button style=" background-color:red;">View</button></a>
    </div>
    <div class="content-block" style="background-color:#80e580;">
        <h2>View your order <b><sup style="color:red;"><?php echo $result['count'];?></sup></b></h2>
        <p>here you can view see your order request......</p>
        <a  href="seller_order.php?email=<?php echo $email;?>"><button style=" background-color:green;">View</button></a>
    </div>
    <!-- Add more content blocks as needed -->
    <footer style="text-align: center; background-color: black; color:white;">
        © 2024 Vitcart Seller Central | Contact: support@vit-cart.com
    </footer>
</body>
</html>
