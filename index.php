<?php
$con = new mysqli("localhost","root","","vit-cart");
error_reporting(0);

$id = isset($_GET['id']) ? $_GET['id'] : null;

$name = "customer";
$vis = "hidden";
$N = "";
$email = "";
$cartCount = 0;

if ($id && is_numeric($id)) {

    $stmt = $con->prepare("SELECT * FROM `signin` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $name = $row['Name'];
        $N = $row['Name'];
        $email = $row['email'];
        $vis = 'visible';

        $edit_query = $con->prepare("SELECT COUNT(*) as count FROM `cart` WHERE Email = ?");
        $edit_query->bind_param("s", $email);
        $edit_query->execute();
        $cartResult = $edit_query->get_result();
        $countRow = $cartResult->fetch_assoc();
        $cartCount = $countRow['count'];

        // Prevent alert on every refresh
        echo '<script>
        if (!sessionStorage.getItem("loginAlert")) {
            alert("Login successfully");
            sessionStorage.setItem("loginAlert", true);
        }
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ViT-Cart-'Home'</title>
<link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/utils.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/bootstrap.bundle.js"></script>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/product.css">

<!-- Font Awesome fixed -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
a{ font-weight:bold;}
a:hover{
    color:white;
    font-weight:bolder;
    font-size:20px;
}
header{ background-color: rgb(76 41 76); }
button{ height: 100%; }
button:hover {
    height: 28%;
    background-color: red;
    position: absolute;
    top:220px;
}
</style>
</head>

<body>

<header>
<nav>

<div class="logo">
<b><img src="premiumlogo/onlinelogomaker-101123-1400-6179-2000-transparent.png" alt=""></b>
</div>

<ul>

<li class="nav-item dropdown fw-bold">
<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" style="color:white;">
Product
</a>
<ul class="dropdown-menu">

<li><a class="dropdown-item" title="Laptop" href="Laptop.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/laptop/Acer_2.webp" style="height:6vh;"></a></li>

<li><a class="dropdown-item" title="Smart Phones" href="Mobile.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/mobile/vivo_2.webp" style="height:6vh;"></a></li>

<li><a class="dropdown-item" title="Male Fashion" href="MaleClothes.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/New folder/1694599246427Color Plus.jpg" style="height:6vh;"></a></li>

<li><a class="dropdown-item" title="Female Fashion" href="FemaleClothes.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/New folder/Header_Banner_Lingerie_1944x.webp" style="height:6vh;"></a></li>

</ul>
</li>

</ul>

<div class="search">
<a href="search.php?email=<?php echo $email;?>">
<img src="img/R.png" title="search" height="30vh">
</a>
</div>

<ul>

<li class="nav-item dropdown fw-bold">
<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color:white;">
<?php echo $name;?>
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="signIn.html">signIn</a></li>
<li><a class="dropdown-item" href="login.html">login</a></li>
<li><a class="dropdown-item" style="visibility:<?php echo $vis;?>" href="customer_edit.php?edit=<?php echo $email;?>">edit your profile</a></li>
<li><a class="dropdown-item" style="visibility:<?php echo $vis;?>" href="index.php">logout</a></li>
</ul>
</li>

<li class="nav-item dropdown fw-bold">
<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color:white;">Seller</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" target="_blank" href="Seller_signIn.html">signIn</a></li>
<li><a class="dropdown-item" target="_blank" href="Seller_logIn.html">login</a></li>
</ul>
</li>

<li><a href="order.php?email=<?php echo $email;?>">View your order</a></li>

<li>
<a href="cart.php?email=<?php echo $email;?>">
<div class="cart-icon" style="font-size:35px;position:relative;color:white;">
<span class="badge" style="position:absolute;top:-4px;right:-2px;background-color:red;color:white;
font-size:17px;border-radius:50%;padding:3px 6px;"><?php echo $cartCount;?></span>
<i class="fa fa-shopping-cart"></i>
</div>
</a>
</li>

</ul>

</nav>
</header>

<main>

<div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">

<div class="carousel-indicators">
<button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
<button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
<button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
<button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
<button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></button>
</div>

<div class="carousel-inner">

<div class="carousel-item active">
<a href="Laptop.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/New folder/Estore-Banner-Exclusive_1640x613_1.webp" class="d-block w-100" height="600px">
</a></div>

<div class="carousel-item">
<a href="Mobile.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/New folder/c5bb587febffd490700ae9b37f1378a5.jpg" class="d-block w-100" height="600px">
</a></div>

<div class="carousel-item">
<a href="MaleClothes.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/New folder/1694599246427Color Plus.jpg" class="d-block w-100" height="600px">
</a></div>

<div class="carousel-item">
<a href="FemaleClothes.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/New folder/Homepage_Banner_2_d94b2985-d5d8-4958-8b51-65b785572f1d_1944x.webp" class="d-block w-100" height="600px">
</a></div>

<div class="carousel-item">
<a href="Mobile.php?email=<?php echo $email;?>&Name=<?php echo $N;?>">
<img src="img/New folder/571bf80fc443e184e6d8edb8428b64d2.jpg" class="d-block w-100" height="600px">
</a></div>

</div>

<button class="carousel-control-prev" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
<span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
<span class="carousel-control-next-icon"></span>
</button>

</div>

<!-- FIXED VIDEO TAG -->
<video muted loop autoplay height="400px" width="700vw" style="border-radius:55px">
<source src="video/video.mp4" type="video/mp4">
</video>

<u><h1>you may like this</h1></u>

<?php include('suggestion.php'); ?>
<?php include('about.html'); ?>
<?php include('contact.html'); ?>

</main>

<footer class="flex-all-center">
<p>Copyright &copy; ViT-Cart.com</p>
</footer>

</body>
</html>
