<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

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
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 90%;
		display: inline-block;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: crimson;
		border: none;
	}

	#box{

		background-color: transparent;
		margin: auto;
		width: 700px;
		height: 300px;
		padding-top: 10px;
		text-align: center;
	}
	body{
		background-image: url("images/BACKGROUND-SIGNUP.jpg");
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 30px;margin: 10px;color:darkblue;"><b>SIGNUP</b></div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br>

			<a href="login.php" style="color: red;">Click to Login</a><br>
		</form>
	</div>
</body>
</html>