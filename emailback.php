<!DOCTYPE html>
<html>
<head>
	<title>Back</title>
</head>
<body>
<?php  
session_start();
if(isset($_POST['back']))
{
	require "db.php";
	$_SESSION['back']="";
	header("Location: loginpage.php");
}
else
{
	echo "<h1>Not Found!</h1>";
}



?>

</body>
</html>