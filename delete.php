<?php
if (isset($_GET['email'])) {
  $id = $_GET["email"];
}

$conn = mysqli_connect("localhost", "root", "", "vit-cart");
if (isset($_GET['delete'])) {
    # code...
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn,"Delete from `products` where reg_id=$delete_id") or die("deletion failed");
    if ($delete_query) {
        header('location:product_action.php?email='.$id);
    }else {
        echo "product not deleted";
        header('loaction:product_action.php');
    }
}
?>