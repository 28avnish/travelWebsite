<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,username,password) values ('$user_id','$username','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Signup</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

	

	<section class="booking">

   <h1 class="heading-title">Sign Up!</h1>

   <form  method="post" class="book-form">

		

		 <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" placeholder="enter your username" name="username">
             </div>
		<div class="inputBox">
            <span>Password :</span>
            <input type="password" placeholder="enter your password" name="password">
         </div>
	    </div>

			<input class="btn" type="submit" value="Signup"><br><br>

			<a class="btn" href="login.php">Click to Login</a><br><br>
		</form>
	
</body>
</html>