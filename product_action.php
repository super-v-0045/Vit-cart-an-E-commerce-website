<?php
if (isset($_GET['email'])) {
  $id = $_GET["email"];
}
?>
<?php 
$conn = mysqli_connect("localhost", "root", "", "vit-cart");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
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
            <h1 class="heading">Edit and delete product</h1>
            <table>
            <?php 
            $select_cart_products=mysqli_query($conn,"Select * from `products` where sellerId='".$id."'");
            $num=1;
            // $grand=0;
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
            <td><?php echo $row['Name']; ?></td>
            <td> <img class='images' src="<?php echo $row["image"]; ?>"></img></td>
            <td>₹<?php echo $row['price']; ?></td>
            
            <td><a href="update.php?edit=<?php echo $row['reg_id']; ?>&email=<?php echo $id;?>" class="update_product_btn" title="update"><i class="fas fa-edit">Update</i></a>
            <br>
            <br>
            <a href="delete.php?delete=<?php echo $row['reg_id']; ?>&email=<?php echo $id;?>" class="delete_product_btn" title="delete" onclick="return confirm('Are you sure to delete this product');"><i class="fas fa-trash">Delete</i></a></td></tr>
                <?php
            $num++;      
            // $grand=$grand+$row['price'];      
        }
        }else {
                echo "<big><h1>products are unavilable</h1></big>";
            }
            ?>    
            
        </tbody></table>
        </section>
    </div>
</body>
</html>