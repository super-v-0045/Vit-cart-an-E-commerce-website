<?php
$con = new mysqli("localhost", "root", "", "vit-cart");
if ($con->connect_error) {
    echo "Connection failed: " . $con->connect_error;
} else {
    echo "Connected successfully";
}
$con->close();
?>
