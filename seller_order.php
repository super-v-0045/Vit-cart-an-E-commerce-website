<?php
$conn = new mysqli("localhost", "root", "", "vit-cart");
if ($conn->connect_error) {
    die("Database Connection Failed");
}

// ---------------------------------------------------
// ✅ HANDLE SHIP REQUEST FIRST (BEFORE HTML OUTPUT)
// ---------------------------------------------------
if (isset($_POST['update_product_quantity'])) {

    $update_id = $_POST['update_quantity_id'];

    $stmt = $conn->prepare("UPDATE orders SET status = 'shipped' WHERE id = ?");
    $stmt->bind_param("i", $update_id);
    $stmt->execute();
    $stmt->close();

    header("Location: invoice.php?id=" . $update_id);
    exit;
}

// ---------------------------------------------------
// ✅ FETCH EMAIL SAFELY
// ---------------------------------------------------
if (!isset($_GET["email"])) {
    echo "Invalid request";
    exit;
}

$id = $_GET["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Order</title>
    <link rel="stylesheet" href="css/news.css">
</head>
<body>

<div class="container">
<section class="shopping_cart">
<h1 class="heading">My Orders</h1>

<table border="1">
<?php
$stmt = $conn->prepare("SELECT * FROM orders WHERE sellerId = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

$num = 1;

if ($result->num_rows > 0) {
    echo "
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    ";

    while ($row = $result->fetch_assoc()) {

        if ($row['status'] === 'shipped') {
            $type = 'hidden';
            $bg = 'blue';
        }
        elseif ($row['status'] === 'order confirmed') {
            $type = 'submit';
            $bg = 'green';
        }
        else {
            $type = 'hidden';
            $bg = 'red';
        }
        ?>
        <tr>
            <td><?php echo $num ?></td>
            <td><?php echo $row['Name'] ?></td>
            <td><img src="<?php echo$row['image'] ?>" width="70"></td>
            <td>₹<?php echo $row['price'] ?></td>
            <td><?php echo $row['DateOfOrder'] ?></td>
            <td style="color:<?php echo $bg ?>"><b><?php echo $row['status'] ?></b></td>
            <td>
                <form method="post">
                    <input type="hidden" name="update_quantity_id" value="<?php echo $row['id'] ?>">
                    <input name="update_product_quantity" style="background:blue; color:white;" type="<?php echo $type ?>" value="Ship">
                </form>
            </td>
        </tr>
    <?php
        $num++;
    }
} else {
    echo "<h2>Your order list is empty</h2>";
}

$stmt->close();
$conn->close();
?>
</table>
</section>
</div>

</body>
</html>
