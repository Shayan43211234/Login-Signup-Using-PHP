<!DOCTYPE html>
<html>
<head>
	<title>Logout Page</title>
</head>
<body>
<?php  

session_start();

if(isset($_POST['logout']))
{
	require "db.php";

	$_SESSION['logout']="";
	header("Location: login.php");

}
else
{
	echo "<h1>Not Found!</h1>";
}



?>

</body>
</html>