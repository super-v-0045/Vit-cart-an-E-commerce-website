<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid order ID");
}
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "vit-cart");
$ord_querry = mysqli_query($conn, "Select * from `orders` where id='".$id."'");
$or_querry = mysqli_fetch_assoc($ord_querry);
if (!$or_querry) {
    die("Order not found");
}
$name = $or_querry['Name'];
$price = $or_querry['price'];
$Email = $or_querry['Email'];
$seller_id = $or_querry['sellerId'];
$selle_querry = mysqli_query($conn, "Select * from `seller1` where email ='".$seller_id."'");
$seller_querry = mysqli_fetch_assoc($selle_querry);
if (!$seller_querry) {
    die("Seller not found");
}
$sName = $seller_querry['Name'];
$sAdd = $seller_querry['address'];
$custome_querry = mysqli_query($conn, "Select * from `signin` where email ='".$Email."'");
$customer_querry = mysqli_fetch_assoc($custome_querry);
if (!$customer_querry) {
    die("Customer not found");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
    <!-- Custom Style -->
    <style>
        :root {
    --body-bg: rgb(204, 204, 204);
    --white: #ffffff;
    --darkWhite: #ccc;
    --black: #000000;
    --dark: #615c60;
    --themeColor: #22b8d1;
    --pageShadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
}

/* Font Include */
@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap');

body {
    background-color: var(--body-bg);
}

.page {
    background: var(--white);
    display: block;
    margin: 0 auto;
    position: relative;
    box-shadow: var(--pageShadow);
}

.page[size="A4"] {
    width: 21cm;
    height: 29.7cm;
    overflow: hidden;
}

.bb {
    border-bottom: 3px solid var(--darkWhite);
}

/* Top Section */
.top-content {
    padding-bottom: 15px;
}

.logo img {
    height: 60px;
}

.top-left p {
    margin: 0;
}

.top-left .graphic-path {
    height: 40px;
    position: relative;
}

.top-left .graphic-path::before {
    content: "";
    height: 20px;
    background-color: var(--dark);
    position: absolute;
    left: 15px;
    right: 0;
    top: -15px;
    z-index: 2;
}

.top-left .graphic-path::after {
    content: "";
    height: 22px;
    width: 17px;
    background: var(--black);
    position: absolute;
    top: -13px;
    left: 6px;
    transform: rotate(45deg);
}

.top-left .graphic-path p {
    color: var(--white);
    height: 40px;
    left: 0;
    right: -100px;
    text-transform: uppercase;
    background-color: var(--themeColor);
    font: 26px;
    z-index: 3;
    position: absolute;
    padding-left: 10px;
}

/* User Store Section */
.store-user {
    padding-bottom: 25px;
}

.store-user p {
    margin: 0;
    font-weight: 600;
}

.store-user .address {
    font-weight: 400;
}

.store-user h2 {
    color: var(--themeColor);
    font-family: 'Rajdhani', sans-serif;
}

.extra-info p span {
    font-weight: 400;
}

/* Product Section */
thead {
    color: var(--white);
    background: var(--themeColor);
}

.table td,
.table th {
    text-align: center;
    vertical-align: middle;
}

tr th:first-child,
tr td:first-child {
    text-align: left;
}

.media img {
    height: 60px;
    width: 60px;
}

.media p {
    font-weight: 400;
    margin: 0;
}

.media p.title {
    font-weight: 600;
}

/* Balance Info Section */
.balance-info .table td,
.balance-info .table th {
    padding: 0;
    border: 0;
}

.balance-info tr td:first-child {
    font-weight: 600;
}

tfoot {
    border-top: 2px solid var(--darkWhite);
}

tfoot td {
    font-weight: 600;
}

/* Cart BG */
.cart-bg {
    height: 250px;
    bottom: 32px;
    left: -40px;
    opacity: 0.3;
    position: absolute;
}

/* Footer Section */
footer {
    text-align: center;
    position: absolute;
    bottom: 30px;
    left: 75px;
}

footer hr {
    margin-bottom: -22px;
    border-top: 3px solid var(--darkWhite);
}

footer a {
    color: var(--themeColor);
}

footer p {
    padding: 6px;
    border: 3px solid var(--darkWhite);
    background-color: var(--white);
    display: inline-block;
}
    </style>

    <title>Invoice..!</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                <div><button onclick="window.print()">Print Invoice</button></div>
                    <img src="premiumlogo/onlinelogomaker-101123-1400-6179-2000-transparent.png" alt="" class="img-fluid"> 
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span>XXXX</span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Supplier,</p>
                            <h2><?php echo $sName;?></h2>
                            <p class="address"> <?php echo $sAdd;?></p>
                            <div class="txn mt-2">Mobile no:<?php echo $seller_querry['number'];?> </div>
                            <div class="txn mt-2">TXN: XXXXXXX</div>
                        </div>
                        <div class="col-5">
                            <p>Client,</p>
                            <h2><?php echo $customer_querry['Name'];?></h2>
                            <p class="address"><?php echo $customer_querry['address'];?> </p>
                            <div class="txn mt-2">Mobile no:<?php echo $customer_querry['number'];?> </div>
                            <div class="txn mt-2">TXN: XXXXXXX</div>
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>C.O.D.</span></p>
                            <p>Order Number: <span><?php $id;?></span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title"><?php echo $name;?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $price;?></td>
                            <td>1</td>
                            <td><?php echo $price;?></td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> Note: </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In delectus, adipisci vero est dolore praesentium.</p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Sub Total:</td>
                                <td><?php echo $price;?></td>
                            </tr>
                            <tr>
                                <td>Deliver:</td>
                                <td>0.00</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td><?php echo $price;?></td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="signature.png" class="img-fluid" alt="">
                            <p class="text-center m-0"> Director Signature </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="cart.jpg" class="img-fluid cart-bg" alt="">

            
        </div>
    </div>

</body></html>