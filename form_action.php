<?php
  $Name= $_POST['Name'];
  if(isset($_POST['link'])){
  $link= $_POST['link'];
  }
  else{
    $link='#';
  }
  $price= $_POST['price'];
  $description= $_POST['description'];
  $category= $_POST['category'];
  $email= $_POST['email'];
  $folder="img2/";
  $image_file=$_FILES['image']['name'];
  $file = $_FILES['image']['tmp_name'];
  $path = $folder . $image_file; //set the path of image in data base
  $target_file=$folder.basename($image_file);
  $file_name_array = explode(".", $image_file);
  $extension = end($file_name_array);
  $new_image_name = 'photo_'.rand() . '.' . $extension;
  move_uploaded_file($file,$path);// this line is used to upload file or images in folder

	// Database connection
	$conn = new mysqli('localhost','root','','vit-cart');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into products(Name,link,price,description,category,image,sellerId) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss",$Name, $link, $price, $description, $category, $path,$email);
		$stmt->execute();
		echo "product uploading successfully";
		$stmt->close();
		$conn->close();
	}
?>