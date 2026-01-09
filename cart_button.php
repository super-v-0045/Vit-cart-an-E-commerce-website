<?php
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM `cart` WHERE Email = ? AND product_id = ?");
$stmt->bind_param("si", $email, $row["reg_id"]);
$stmt->execute();
$result = $stmt->get_result();
$re=$result->fetch_assoc();
if ($email==NULL) {
    ?>
     <a href="login.html"><button style="padding:0px;">Add to cart</button></a>
    <?php
}else{
    if($re['count']==0)
    {
?>
<form action="cart_action.php" method="post">
    <input type="hidden" value="<?php echo $email?>" name="Email" required> 
    <input type="hidden" value="<?php echo $row["Name"]?>" name="pr_Name" required>
    <input type="hidden" value="<?php echo $row["price"]?>" name="price" required>
    <input type="hidden" value="<?php echo $row["image"]?>" name="image" required>
    <input type="hidden" value="<?php echo $row["reg_id"]?>" name="product_id" required>
    <button style="padding:0px;"><input style="background-color: transparent; border: 0px;" type="submit" name="submit" onclick ="return confirm('product added to cart')" value ="Add  to  cart" 
class="btn btn-primary" /></button>
</form>
 <?php }
else {?>
     <a href="cart.php?email=<?php echo $email;?>"><button style="padding:0px;">Go to cart</button></a>
<?php }}?>