<?php
if (isset($_GET['email'])) {
  $id = $_GET["email"];
}
?>
<?php 
$conn = mysqli_connect("localhost", "root", "", "vit-cart");
?>
<?php 
    if (isset($_GET['remove'])) {
      $remove_id=$_GET['remove'];
    mysqli_query($conn,"Delete from `cart` where id= $remove_id");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart page</title>
    <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="css/news.css">
</head>
<body>
    <?php 
    // include('header.php');
     ?>
    <div class="container">
        <section class="shopping_cart">
            <h1 class="heading">My cart</h1>
            <table>
            <?php 
            $select_cart_products=mysqli_query($conn,"Select * from `cart` where Email='".$id."'");
            $num=1;
            $grand=0;
            if (mysqli_num_rows($select_cart_products)>0) {
                echo "
                <thead>
                <th>sno.</th>
                <th>product name</th>
                <th>product image</th>
                <th>product price</th>
                <th>Action</th>
                </thead>
                <tbody>";
            while($row=mysqli_fetch_assoc($select_cart_products)){
                ?>

            <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $row['pr_Name']; ?></td>
            <td> <img class='images' src="<?php echo $row["image"]; ?>"></img></td>
            <td>₹<?php echo $row['price']; ?></td>
            
            <td><a href="cart.php?remove= <?php echo $row['id'];?>&email=<?php echo $id;?>"onclick ="return confirm('Are you sure to remove this product from your cart')" > <i class="fas fa-trash">Remove</i></a></td></tr>
                <?php
            $num++;      
            $grand=$grand+$row['price'];      
        }
        }else {
                echo "<big><h1>cart is Empty</h1></big>";
            }
            ?>    
            
        </tbody></table>
        <!-- bottom section -->
        <?php 
            if ($grand>0) {
                echo "
                <div class='table_bottom'>
                <h3 class='bottom_btn'>Grand total : <span>₹".$grand."/-</span></h3>
                </div>";
            }
            ?>
        </section>
    </div>
</body>
</html>