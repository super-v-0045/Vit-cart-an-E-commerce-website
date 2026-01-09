<?php
if (isset($_GET['email'])) {
  $id = $_GET["email"];
}
?>
<?php 
$conn = mysqli_connect("localhost", "root", "", "vit-cart");
?>
<?php 
  if (isset($_POST['update_product_quantity'])) {
    $update_id=$_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn,"update `orders` set status = 'Cancelled' where id = $update_id");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order</title>
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
            <h1 class="heading">My Order</h1>
            <table>
            <?php 
            $select_cart_products=mysqli_query($conn,"Select * from `orders` where Email='".$id."'");
            $num=1;
            $grand=0;
            if (mysqli_num_rows($select_cart_products)>0) {
                echo "
                <thead>
                <th>sno.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>";
            while($row=mysqli_fetch_assoc($select_cart_products)){
                ?>
            <?php
            if ($row['status']==='Cancelled') {
                $type='hidden';
                $bg='red';
            }elseif($row['status']==='shipped'){
                $type='submit';
                $bg='blue';
            }
            elseif($row['status']==='order confirmed') {
                $type='submit';
                $bg='green';
            }
            ?>
            <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td> <img class='images' src="<?php echo $row["image"]; ?>"></img></td>
            <td>₹<?php echo $row['price']; ?></td>
            <td><?php echo $row['DateOfOrder']; ?></td>
            <td style="color:<?php echo $bg;?>"><b><?php echo $row['status']; ?></b></td>
            
            <td><form action="" method="post">
                <input type="hidden" value="<?php echo $row['id'];?>" name="update_quantity_id">
                <!-- <input type="hidden" value="Cancelled" name="update_quantity"> -->
                <input style="background:red;" type="<?php echo $type;?>" value="Cancel" name="update_product_quantity" class="update_quantity" onclick ="return confirm('Are you sure to cancel this order')">
            </form></td></tr>
                <?php
            $num++;      
            $grand=$grand+$row['price'];      
        }
        }else {
                echo "<big><h1>your order is empty</h1></big>";
            }
            ?>    
            
        </tbody></table>
        
        </section>
    </div>
</body>
</html>