<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    a{
            font-weight:bold;
        }
    a:hover{
    color: white;
    font-weight:bolder;
    font-size:20px;
}
header{
    background-color: rgb(76 41 76);
}
.sidebar{
    visibility:hidden;
}
</style>
<?php
$email= $_GET["email"];
$N= $_GET["Name"];
if ($N==NULL) {
    $name='customer';
    $vis='hidden';

 }else{
 $name=$N;
 $vis='visible';

 }
 $conn = mysqli_connect("localhost", "root", "", "vit-cart");
 $edit_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM `cart` WHERE Email = '".$email."'");
$result = mysqli_fetch_assoc($edit_query);
?>
<header>
        <nav>
            <div class="logo">
                <b> <img src="premiumlogo/onlinelogomaker-101123-1400-6179-2000-transparent.png" alt=""> </b>
            </div>
            <ul>
                
                <!-- dropdown list start from here --> 
                <li class="nav-item dropdown fw-bold">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="color: white;">
                        Product<!--  name of dropdown list -->
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" title="Laptop" href="Laptop.php?email=<?php echo $email;?>&Name=<?php echo $N;?>"><img src="img/laptop/Acer_2.webp" style="height: 6vh;" alt="laptop"></a></li>
                        <li><a class="dropdown-item" href="Mobile.php?email=<?php echo $email;?>&Name=<?php echo $N;?>" title="Smart Phones"><img src="img/mobile/vivo_2.webp" alt="Smart Phones" style="height: 6vh;"></a></li>
                        <li>
                        <li><a class="dropdown-item" title="Male Fashion" href="MaleClothes.php?email=<?php echo $email;?>&Name=<?php echo $N;?>"><img src="img/New folder/1694599246427Color Plus.jpg" alt="Male Fashion" style="height: 6vh;"></a></li>
                </li>
                <li><a class="dropdown-item" href="FemaleClothes.php?email=<?php echo $email;?>&Name=<?php echo $N;?>" title="Female Fashion"><img src="img/New folder/Header_Banner_Lingerie_1944x.webp" style="height: 6vh;" alt="Female Fashion"></a></li>
            </ul>
            </li>
            <!-- dropdown list end here -->
            </ul>
            <div class="search">
                <a href="search.php?email=<?php echo $email;?>"><button style="background-color: transparent; border: transparent;"
                        class="btn"><img src="img/R.png" title="search" height="30vh"></button></a>
            </div>
            <ul>
            <li class="nav-item dropdown fw-bold">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="color: white;">
                        <?php echo $name;?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="signIn.html">signIn</a></li>
                        <li><a class="dropdown-item" href="login.html">login</a></li>
                        <li><a class="dropdown-item" style="visibility:<?php echo $vis;?>;" href="customer_edit.php?edit=<?php echo $email;?>">edit your profile</a></li>
                        <li><a class="dropdown-item" style="visibility:<?php echo $vis;?>;" href="index.php">logout</a></li>
                    </ul>
                </li>
            <li class="nav-item dropdown fw-bold">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="color: white;">
                        Seller
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" target="_blank" href="Seller_signIn.html">signIn</a></li>
                        <li><a class="dropdown-item" target="_blank" href="Seller_logIn.html">login</a></li>
                    </ul>
                </li>
                <li><a href="order.php?email=<?php echo $email;?>" title="add product">View your order</a></li>
            <li><a href="cart.php?email=<?php echo $email;?>"><big><b><div class="cart-icon" style=" font-size: 35px;position: relative;color: white;">
        <span class="badge" style="position: absolute;top: -4px;right: -2px;background-color: #ff0000;color: #f5f6f5;font-size: 17px;border-radius: 50%;padding: 3px 6px;"><?php echo $result['count'];?></span>
        <i class="fa fa-shopping-cart"></i>
    </div></b></big></big></a></li>
            
            </ul>
            </li>
            </ul>
        </nav>
    </header>