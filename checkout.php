<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/sttyle.css">
    <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
  	<title>Checkout</title>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body style="background-color:white; color:black;">

<?php
// ✅ Prevent direct access
if (!isset($_POST['Email'])) {
    die("Invalid access!");
}

// ✅ Receive POST values safely
$Name        = $_POST['pr_Name'];
$image       = $_POST['image'];
$email       = $_POST['Email'];
$price       = $_POST['price'];
$seller      = $_POST['seller'];
$suggested   = $_POST['suggested'] ?? null;
$description = $_POST['description'] ?? "";

// ✅ Database connection
$con = new mysqli("localhost","root","","vit-cart");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// ✅ Update suggested column securely (if provided)
if ($suggested !== null) {
    $stmt = $con->prepare("UPDATE signin SET suggested = ? WHERE email = ?");
    $stmt->bind_param("ss", $suggested, $email);
    $stmt->execute();
    $stmt->close();
}

// ✅ Fetch user address
$stmt = $con->prepare("SELECT Name, address FROM signin WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

// ✅ Safety check
if (!$row) {
    echo "<h3>User not found.</h3>";
    exit;
}
?>

<div class="container mt-5">
    <div class="row">

        <div class="col-md-6">
            <h4><b>Delivery Address</b></h4>
            <p><?php echo htmlspecialchars($row['Name']) . ", " . htmlspecialchars($row['address']); ?></p>
            <img src="<?php echo htmlspecialchars($image); ?>" class="img-fluid">
        </div>

        <div class="col-md-6 pt-4">
            <h3><?php echo htmlspecialchars($Name); ?></h3>
            <h2>₹<?php echo htmlspecialchars($price); ?></h2>
            <p><?php echo htmlspecialchars($description); ?></p>

            <form action="BuyNow.php" method="post">
                <input type="hidden" name="Email" value="<?php echo htmlspecialchars($email); ?>">
                <input type="hidden" name="pr_Name" value="<?php echo htmlspecialchars($Name); ?>">
                <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">
                <input type="hidden" name="image" value="<?php echo htmlspecialchars($image); ?>">
                <input type="hidden" name="seller" value="<?php echo htmlspecialchars($seller); ?>">

                <button class="btn btn-success btn-lg mt-3" type="submit">
                    Place Order
                </button>
            </form>
        </div>

    </div>
</div>

</body>
</html>
