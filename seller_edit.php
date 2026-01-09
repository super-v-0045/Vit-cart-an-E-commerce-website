<?php 
$conn = mysqli_connect("localhost", "root", "", "vit-cart");
// update logic
if (isset($_POST['update_product'])) {
    $update_product_id=$_POST['update_product_id'];
    $update_product_name=$_POST['update_product_name'];
    $update_product_price=$_POST['update_product_price'];
    $update_product_link=$_POST['update_product_link'];
    $update_product_description=$_POST['update_product_description'];
    // update query
    $update_products=mysqli_query($conn,"update `seller1` set Name= '$update_product_name',address='$update_product_price',number='$update_product_link',password='$update_product_description' where email='$update_product_id'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="css/news.css">
   <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
</head>
<style>
    .update_product {
    width: 600px;
    background-color: #76358b;
    border-radius: 0.5rem;
    padding: 2rem;
    margin: 0 auto;
    margin-top: 2rem;
    height: 650px;
  }
  body{
    background:plum;
  }
  label{
    visibility: hidden;
  }
</style>
<body>
    <section class="eit_container">
        <?php
        if (isset($_GET['edit'])) {
            $edit_id=$_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `seller1` WHERE email = '$edit_id'"); 
            if (mysqli_num_rows($edit_query)>0) {
                while ($fetch_data=mysqli_fetch_assoc($edit_query)) {
              if ($fetch_data['gender']==='f') {
                $image="gen/female.png";
              }elseif ($fetch_data['gender']==='m') {
                $image="gen/male.png";
              }else {
                $image="gen/transgender.png";
              }  
             ?>
             <form action="" method="post" enctype="multipart/form-data" class="update_product product_container_box">
             <img src="<?php echo $image; ?>" alt="">
            <label for="product name">Name</label>
            <input type="hidden" value="<?php echo $fetch_data['email']?>" name="update_product_id">
            <input type="text" class="input_fields fields"value="<?php echo $fetch_data['Name']; ?>" reqired name="update_product_name">
            <label for="price">Address</label>
            <input type="text" class="input_fields fields"value="<?php echo $fetch_data['address']; ?>" reqired name="update_product_price">
            <label for="description">password</label>
            <input type="password" class="input_fields fields"value="<?php echo $fetch_data['password']; ?>" reqired name="update_product_description">
            <label for="product video">contact number</label>
            <input type="text" class="input_fields fields"value="<?php echo $fetch_data['number']; ?>" name="update_product_link" >
            <div class="btns">
                <input type="submit" class="edit_btn" id="close-edit" value="Update Product" name="update_product" onclick= "return alert('product updated successfully')" style="position: relative;
    bottom:0;">
            </div>
        </form>
            <?php
            }
        }
    }
        ?>
        
    </section>
</body>
</html>