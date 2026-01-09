<style>
    body{
        background : black;
        color: white;
    }
</style>
<?php
	$Name = $_POST['Name'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];


	// Database connection
	$conn = new mysqli('localhost','root','','vit-cart');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user(Name,address , gender, email, password, number) values(?, ?, ?, ?, ?, ? )");
		$stmt->bind_param("sssssi", $Name, $address, $gender, $email, $password, $number);
		$stmt->execute();
		echo "Registration successfully... ";
        echo "<a href='login.html'>go to login</a><br> ";
        echo "<img src='img/Check.gif'>";

		$stmt->close();
		$conn->close();
	}
?>