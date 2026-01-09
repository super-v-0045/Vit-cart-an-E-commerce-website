<link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
<style>
    video{
        width: 100%;
        height: 100%;
    }
    body{
        background-color:#02030b;
        color:white;
    }
   
</style>
<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    // database connection here
    $con= new mysqli("localhost","root","","vit-cart");
    if ($con->connect_error) {
        die("failed to connect : ".$con->connect_error);
    }else {
        $stmt=$con->prepare("select * from signin where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data= $stmt_result->fetch_assoc();
            if ($data['password']===$password) {
                header('location:index.php?id='.$data['id']);
            }else{
                echo "<pre><h1><big><big><big>                     Password incorrect</h1></big></big></big></pre>";
                echo "<pre><video muted loop autoplay source src='img/access_denied.mp4' type='video/mp4' height='100%' width='100%'</pre>";
        }
        }
    }

?>
<pre><b><h1>
    <?php if ($data['password']===$password) {
    echo "                                     <b><b>Hello, </b></b>". $data['Name'];
    }
   ?>
    <pre>                                                 </pre>
</pre></b></h1>
 