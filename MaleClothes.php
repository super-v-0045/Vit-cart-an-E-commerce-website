<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViT-Cart-'Male Clothes'
    </title>
    <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/product.css">
</head>

<body style="background-color: white;">
<?php include('header.php'); ?>
<main>
    <!-- this is a main content portion -->
    <div class="container">
        <div class="sidebar">
            <div class="sidebody" style="height: 69vh;">
                <div class="searchBar">
                    <input placeholder="" id="searchBar" name="searchBar" type="text">
                    <i class="fa-solid fa-magnifying-glass glass" id="btn"></i>
                </div>
            </div>
            <div class="sidefoot">
                <hr style="margin: 15px 0; border: 1px solid #eee">
                <div class="social-icons">
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-youtube"></i>
                    <i class="fa-brands fa-square-github"></i>
                </div>
            </div>

        </div>
        <div class="data">
            <div class="top">
                <a href="feedback.html"><button style="background-color: rgb(174, 82, 6);">Give a feedback</button></a>
                <p>+91 00000-00000</p>
                <p>ViT-Cart.com</p>
            </div>
            <div class="header">
                <p>BUY Clothes for men</p>
            </div>
            <div class="body">
                <div id="root">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "vit-cart");
                    $rows = mysqli_query($conn, "SELECT * FROM products where category='gents'");
                    ?>
                    <?php $i = 1; ?>
                      <?php foreach($rows as $row) : ?>
                    <div class='box'><?php $i++ ?>
                                    <div class='img-box'>
                                        <img class='images' src="<?php echo $row["image"]; ?>"></img>
                                    </div> 
                                    <div class='bottom'>
                                        <p><?php echo $row["Name"]; ?></p>
                                        <h2> &#x20B9 <?php echo $row["price"]; ?>.00</h2>
                                        <?php include('cart_button.php')?>
                                        <?php include('buyButton.php')?>
                                        <a href="<?php echo $row["link"];  if($row['link'] == NULL) {
                        $visbile='hidden';
                    }else {
                        $visbile='visible';
                    }?>" style=" visibility:<?php echo $visbile;?>;"><button type="<?php echo $visbile;?>" style="background-color: transparent; border: transparent;"><img src="img/video_button.jpeg" alt="" height="50vh">
                    </button></a>
                                    </div>
                                </div>
                                
                                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
    <footer class="flex-all-center">
        <p>Copyright &copy; ViT-Cart.com </p>
    </footer>
</body>

</html>