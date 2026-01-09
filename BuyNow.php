<!DOCTYPE html>
<html lang="en">

<?php
	$Email = $_POST['Email'];
	$pr_Name = $_POST['pr_Name'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	$seller = $_POST['seller'];
    $status='order confirmed';


	// Database connection
	$conn = new mysqli('localhost','root','','vit-cart');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into `orders`(Name, price, status, image,  Email, sellerId) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss",$pr_Name, $price, $status, $image,  $Email, $seller);
		$stmt->execute();
		// echo "<h1><b><big>Product  Added  to  cart  successfully</h1></b></big>";
        // echo "<img src='img/Check.gif'>";
        // echo "<h1><b><big><a href='cart.php?email=".$Email."'>go to cart</a><br> </h1></b></big>";
		$stmt->close();
		$conn->close();
	}

	
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Method'
    </title>
    <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .pay{
            color: white;
            align-items: center;
            height: 7vh;
        }
        body{
            /* border: 2px solid black; */
            justify-content: center;
            background-color: plum;
        }
        .container{
            
            background-color: white;
            margin: 5vh;
            padding: 16vh;
            border: 2px solid black;
            justify-content: center;
        }
        span,button{
            color: white;
            box-sizing: border-box;
            margin: 5vh;
            padding: 1.1vh;
            border: 2px solid red;
            background-color: palevioletred ;
        }
        input{
            /* box-sizing: border-box; */
            padding-right: 29vh;
            padding-bottom: 4vh;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <b> <img src="premiumlogo/onlinelogomaker-101123-1400-6179-2000-transparent.png" alt=""> </b>
            </div>
            <div class="pay">
               <big><big> <big><b><pre>                           <u>Select your Payment Method</u></pre></b></big></big></big>
            </div>

        </nav>
    </header>
    <main>
        <!-- this is a main content portion --> 
       <div class="c1"> <div class="container">
        <label for="sectionida">
            <input type="radio" value="Section a" name="section" id="sectionida"><big><big> <big><b>UPI ID</b></big></big></big>
        </label><br>
        <input type="text" placeholder="Enter UPI ID"><a href="orderConfirmed.html"><button>Pay </button><br><hr></a>
        <label for="sectionidb">
            <input type="radio" value="Section b" name="section" id="sectionidb"> <big><big> <big><b>Credit/Debit/ATM card no.</b></big></big></big>
        </label><br>
        <input type="text" placeholder="Enter card no.">
        <a href="orderConfirmed.html"><button><b>Pay </b></button><br></a>
        <br>valid till <select name="mm" id="mm">
            <option value="0">mm</option>
            <option value="0">01</option>
            <option value="0">02</option>
            <option value="0">03</option>
            <option value="0">04</option>
            <option value="0">05</option>
            <option value="0">06</option>
            <option value="0">07</option>
            <option value="0">08</option>
            <option value="0">09</option>
            <option value="0">10</option>
            <option value="0">11</option>
            <option value="0">12</option>
        </select>
       <select name="mm" id="mm">
            <option value="0">yy</option>
            <option value="0">24</option>
            <option value="0">25</option>
            <option value="0">26</option>
            <option value="0">27</option>
            <option value="0">28</option>
            <option value="0">29</option>
            <option value="0">30</option>
            <option value="0">31</option>
            <option value="0">32</option>
            <option value="0">33</option>
            <option value="0">34</option>
            <option value="0">35</option>
            <option value="0">36</option>
            <option value="0">37</option>
            <option value="0">38</option>
            <option value="0">39</option>
            <option value="0">40</option>
            <option value="0">41</option>
            <option value="0">42</option>
            <option value="0">43</option>
            <option value="0">44</option>
        </select>
        <input type="text" placeholder="cvv" maxlength="4" style="padding: 0; margin-right: 12px; position: relative;width: 42px;">
        <hr>
        <label for="sectionidc">
            <input type="radio" value="Section c" name="section" id="sectionidc" class="red blue"> <big><big> <big><b>Cash On Delivery(C.O.D.)</b></big></big>(cash,UPI and card accepted)</big><a href="orderConfirmed.html"><button><big><b>continue</b></big></button><br><hr></a>
        </label>
    </div></div>
    </main>


</body>
