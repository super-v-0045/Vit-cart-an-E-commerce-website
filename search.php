<!DOCTYPE html>
<html>

<head>
    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/product.css">
    
    <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
    <title>searching...</title>
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebody" style="height: 69vh;">
            <form method="post">
                <div class="searchBar">
                    <input placeholder="Search..." id="searchBar" name="search" type="text">
                    <button name = "submit" style ="background: transparent; border : white; color: black"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg></button>
                    <!-- <i class="fa-solid fa-magnifying-glass glass" id="btn"></i> -->
                </div>
            </form>
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
                <p>+91 00000-00000</p>
                <p>ViT-Cart.com</p>
            </div>
            <div class="header" id="header">
                <p>BUY EVERYTHING ONLINE</p>
            </div>
            <div class="body">
                <div id="root">
                <?php
                $email= $_GET["email"];
$conn = mysqli_connect("localhost", "root", "", "vit-cart");
if (isset($_POST['submit'])) {
    $search=$_POST['search'];
}else {
    # code...
    $search=NULL;
}
$rows = mysqli_query($conn, "SELECT * FROM products where Name like '%$search%'or description like '%$search%'or category like '%$search%'or price like '%$search%'");

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
                    }
                    else {
                        $visbile='visible';
                    }?>" style=" visibility:<?php echo $visbile;?>;"><button type="<?php echo $visbile;?>" style="background-color: transparent; border: transparent;"><img src="img/video_button.jpeg" alt="" height="50vh">
                    </button></a>
                </div>
            </div>
            
            <?php endforeach; ?>
            <?php
            if (mysqli_num_rows($rows)==0) {
                echo "<pre>    <h1 style='color: red;''>Item not found</h1></pre>";
            }
            ?>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
