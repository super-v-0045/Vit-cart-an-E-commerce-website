<?php
if ($email==NULL) {
    ?>
     <a href="login.html"><button style="padding:0px;">BUY</button></a>
    <?php
}else{
?>
<form action="checkout.php" method="post">
    <input type="hidden" value="<?php echo $email?>" name="Email" required> 
    <input type="hidden" value="<?php echo $row["Name"]?>" name="pr_Name" required>
    <input type="hidden" value="<?php echo $row["price"]?>" name="price" required>
    <input type="hidden" value="<?php echo $row["image"]?>" name="image" required>
    <input type="hidden" value="<?php echo $row["description"]?>" name="description" required>
    <input type="hidden" value="<?php echo $row["sellerId"]?>" name="seller" required>
    <input type="hidden" value="<?php echo $row["category"]?>" name="suggested" required>
    <button style="padding:0px;"><input style="background-color: transparent; border: 0px;" type="submit" value ="BUY" 
class="btn btn-primary" /></button>
</form>
<?php }?>