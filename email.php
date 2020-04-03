<!DOCTYPE html>
<html>
<head>
	<title>Email Page</title>
</head>
<body>
<?php  
session_start();
if(isset($_SESSION['welcomeemail']))
{
	echo $_SESSION['welcomeemail'];
	//unset($_SESSION['welcomeemail']);
}
?>

<form action="emailcheck.php" method="POST" enctype="">
	TO: <input type="email" name="receiver" size="35" placeholder="enter receiver email address">
	Subject/Title: <input type="text" name="subject" placeholder="enter title/subject here">
	<br>
	<br>
	Message: <input type="text"  name="message" placeholder="enter message here" style="height: 200px;" size="50">
	<br>
	<br>
	<input type="submit" name="submit" value="Send">
</form>
<h1>do you want to get back to the previous page</h1>
<form action="emailback.php" method="POST" enctype="">
	<input type="submit" name="back" value="Back">
</form>

</body>
</html>