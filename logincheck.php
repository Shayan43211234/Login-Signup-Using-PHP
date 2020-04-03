<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
<?php  

if(isset($_POST['lsmit']))
{
	session_start();

	require "db.php";
	
	$luname=$_POST['luname'];
	$lpword=$_POST['lpword'];

	$luname=mysqli_real_escape_string($conn,$luname);
	$lpword=mysqli_real_escape_string($conn,$lpword);
	
	$luname=htmlentities($luname);
	$lpword=htmlentities($lpword);

	$sql="select password,email from db where username='$luname'";
	$exe=mysqli_query($conn,$sql);
	if(mysqli_num_rows($exe)>0)
	{
		$coll=mysqli_fetch_assoc($exe);
		$pass=$coll['password'];
		$em=$coll['email'];
		while($coll)
		{
			if(password_verify($lpword, $pass))
			{
				header("Location: loginpage.php");
				$_SESSION['welcome']="<h1>Welcome $luname your email id is $em</h1>";
				$_SESSION['username']=$luname;
				$_SESSION['password']=$pass;
				$_SESSION['email']=$em;
				$_SESSION['welcomeemail']="<h1>your email address is $em</h1>";
				break;
			}
			else
			{
				header("Location: login.php");
				$_SESSION['message2']="<h1>Login failed :(</h1>";
				break;
			}
		}
	}
	else
	{
		header("Location: login.php");
		$_SESSION['message2']="<h1>Login failed :(</h1>";
	}
}
else
{
	echo "<h1>Not Found!</h1>";
}


?>

</body>
</html>