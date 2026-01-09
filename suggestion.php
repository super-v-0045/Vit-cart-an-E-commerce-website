<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to your CSS file -->
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
    display: grid;
    grid-template-columns: 4fr 8fr; /* This creates two equal-width columns */
    gap: 20px; /* Optional: Adds space between columns */
}
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .product-item {
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            transition: transform 0.2s;
        }
        .product-item:hover {
            transform: scale(1.05);
        }
        .product-item img {
            max-width: 100%;
            height: 42vh;
            width: 42vh;
            border-radius: 8px;
        }
        .discount {
            color: red;
            font-weight: bold;
        }
        a {
  text-decoration: none;
}
      
    </style>
</head>
<body>
<div class="container">
    <!-- <div class="title">Beauty, Food, Toys & more</div> -->
    <?php
        $suggested=$row["suggested"];
    if ($suggested==NULL) {
        $suggested='laptop';
    }
    if ($suggested=='Laptop') {
        # code...
        $link='Laptop.php';
    }elseif ($suggested=='Mobile') {
        # code...
        $link='Mobile.php';
    }elseif ($suggested=='gents') {
        # code...
        $link='MaleClothes.php';
    }elseif ($suggested=='ladies') {
        # code...
        $link='FemaleClothes.php';
    } 
    $rows = mysqli_query($con, "SELECT * FROM products where category='".$suggested."'"); 
    // echo "<h3>you may like this</h3>";   
    // $count = mysqli_query($con, "SELECT COUNT(*) FROM products where category='mobile'");    
    foreach($rows as $row) : 
    
        ?>
        <a style="text-decoration: none;" href="<?php echo $link;?>?email=<?php echo $row["email"];?>&Name=<?php echo $N;?>">
    <div class="product-grid">
        <div class="product-item">
            <img src="<?php echo $row["image"]; ?>" >
            <div style="color:black;"><?php echo $row["Name"]; ?></div>
            <div class="discount">₹<?php echo $row["price"]; ?>.00</div>
        </div>
    </div>
</a>
    <?php endforeach; ?>
</div>

</body>
</html>