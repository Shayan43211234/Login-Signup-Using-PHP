<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h1>if you have an account then pls login</h1>
	<form action="logincheck.php" method="POST" enctype="">
		Username:<input type="text" name="luname" placeholder="enter your username here">
		<br>
		<br>
		Password:<input type="password" name="lpword" placeholder="enter your password here">
		<br>
		<br>
		<input type="submit" name="lsmit" value="Login">
	</form>

	<h1>if you have not any account then pls signup</h1>
	
	<form action="signup.php" method="POST" enctype="">
		<input type="submit" name="ssmit" value="Signup">
		<br>
		<br>
	</form>
	
	<?php

	session_start();
	if(isset($_SESSION['message1']))
	{
		echo $_SESSION['message1'];
		unset($_SESSION['message1']);
	}
	if(isset($_SESSION['message2']))
	{
		echo $_SESSION['message2'];
		unset($_SESSION['message2']);
	}
	if(isset($_SESSION['deletesuccessful']))
	{
		echo $_SESSION['deletesuccessful'];
		unset($_SESSION['deletesuccessful']);
	}
	if(isset($_SESSION['logout']))
	{
		unset($_SESSION['welcome']);
		unset($_SESSION['welcomeemail']);
		unset($_SESSION['logout']);
	}

	?>


</body>
</html>