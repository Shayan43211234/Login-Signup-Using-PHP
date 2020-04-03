<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
</head>
<body>
<?php  
session_start();
if(isset($_SESSION['welcome']))
{
	echo $_SESSION['welcome'];
	//unset($_SESSION['welcome']);
}

?>

<h1>do you want to update your password</h1>

<form action="update.php" method="POST" enctype="">
	Current Password:<input type="password" name="oldpassword" placeholder="Current password">
	New Password:<input type="password" name="newpassword" placeholder="New Password"><br><br>
	<input type="submit" name="usmit" value="Update">
</form>

<?php  
if(isset($_SESSION['updatesuccessful']))
{
	echo $_SESSION['updatesuccessful'];
	unset($_SESSION['updatesuccessful']);
}
if(isset($_SESSION['back']))
{
	//unset($_SESSION['welcomeemail']);
	unset($_SESSION['back']);
}


?>

<h1>do you want to delete your account</h1>

<form action="delete.php" method="POST" enctype="">
Current Password: <input type="password" name="oldpassword" placeholder="Current password">
	<input type="submit" name="dsmit" value="Delete">
</form>


<?php  
if(isset($_SESSION['deletesuccessful']))
{
	echo $_SESSION['deletesuccessful'];
	unset($_SESSION['deletesuccessful']);
}


?>


<h1>do you want to email'ing anyone</h1>

<form action="email.php" method="POST" enctype="">
	<input type="submit" name="esmit" value="Email">
</form>

<h1>do you want to logout</h1>

<form action="logout.php" method="POST" enctype="">
	<input type="submit" name="logout" value="Logout">
</form>

</body>
</html>