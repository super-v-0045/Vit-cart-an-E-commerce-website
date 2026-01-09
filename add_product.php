<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add product</title>
    <link rel="stylesheet" href="css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
<style>
  body{
    background-color: purple;
    background-image: url("premiumlogo/onlinelogomaker-101123-1400-6179-2000-transparent.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
  }
  .in{
    background-color: plum;
  }
  .lable{
    font-weight: bolder;
    color: white;
  }
</style>
<body>
<div class="container">
<div class="row">
  <div class="col-sm-2">
  </div>
  <div class="col-sm-8" style="border: 2px solid black;padding:5px; text-align: center;background-color: plum;">
    <div class="logo">
      <b> <img src="premiumlogo/onlinelogomaker-101123-1400-6179-2000-transparent.png" alt=""> </b>
  </div>
   <h1>Adding a new Product</h1>
  </div>
  <div class="col-sm-2">
  </div>
  </div>
  <div class="row">
  <div class="col-sm-1">
  </div>
    <div class="col-sm-10" style="border: 0px solid black; padding:80px;">
      <form action="form_action.php" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-sm-6">
      <div class="mb-3 row">
   <div class="col-sm-4">
      <label class="lable">Product Name :- </label>
    </div>
     <div class="col-sm-8">
      <input class="in"type="text" name="Name" class="form-control" required>
      <input type="hidden" name="email" value="<?php echo $_GET['email']?>">
    </div>
    </div>
    <div class="mb-3 row">
   <div class="col-sm-4">
      <label class="lable">Product link :- </label>
    </div>
     <div class="col-sm-8">
      <input class="in"type="text" name="link" class="form-control">
    </div>
    </div>
    <div class="mb-3 row">
   <div class="col-sm-4">
      <label class="lable">Price:- </label>
    </div>
     <div class="col-sm-8">
      <input class="in"type="text" name="price" class="form-control" required>
    </div>
    </div>
    <div class="mb-3 row">
   <div class="col-sm-4">
      <label class="lable">Product description:- </label>
    </div>
     <div class="col-sm-8">
     <textarea class="in"name="description" class="form-control" required></textarea>
    </div>
    </div>
    <div class="mb-3 row">
   <div class="col-sm-4">
      <label class="lable">Category:- </label>
    </div>
     <div class="col-sm-8">
     <select class="in"name="category"  class="form-control" required>
      <option value="">Select your category</option>
        <option value="Laptop">Laptop</option>
        <option value="Mobile">Mobile</option>
        <option value="gents">gents dress</option>
        <option value="ladies">ladies dress</option>
     </select>
    </div>
    </div>
    <div class="col-sm-6">
  <div class="row">
    <div class="col-sm-12">
    <div class="form-group" style="float: right;">
         <label class="lable"> Photo </label>
   <div class="in" style="border: 1px solid black; height: 150px; width: 150px; ">
      <img id="output"  width="150" height="150" / style="display:none">
  </div>

    <input class="in"type="file" name="image" id="image" onchange="loadFile(event)" class="form-control" required / style="width:150px;" required>

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    }; 

  $('#output').show();
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
  </div>
  </div>
  </div>  
      <div class="form-group row">
        <div class="col-sm-4">
        </div>
           <div class="col-sm-4">
            <br> 
               <button class="btn btn-success" name="form_submit">Submit </button>
           </div>
           <div class="col-sm-4">
           </div>
      </div> 
    </div>
  </div> <!-- Row 5 end --> 
</form>
</div>
<div class="col-sm-2">
  </div>
</div>
</div>
</body>
</html>