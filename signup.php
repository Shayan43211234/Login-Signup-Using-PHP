
<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
</head>
<body>
	<h1>pls enter your details here</h1>
<form action="signupcheck.php" method="POST" enctype="">
		Username:<input type="text" name="suname" placeholder="enter your username here">
		<br>
		<br>
		Password:<input type="password" name="spword" placeholder="enter your password here">
		Confirm Password:<input type="password" name="cspword" placeholder="re-enter your password here">
		<br>
		<br>
		email:<input type="email" name="semail" size="35" placeholder="enter your email address here">
		<br>
		<br>
		<input type="submit" name="ssmit" value="Signup">
		<br>
		<br>
</form>

<?php  
session_start();
if(isset($_SESSION['message']))
{
	echo $_SESSION['message'];
	unset($_SESSION['message']);
}
?>

<h1>Want to get back</h1>

<form action="login.php" method="POST" enctype="">
	<input type="submit" name="getback" value="Back">
</form>
</body>
</html>




