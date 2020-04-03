<!DOCTYPE html>
<html>
<head>
	<title>Delete Page</title>
</head>
<body>
<?php  

session_start();

require "db.php";

if(isset($_POST['dsmit']))
{
	$oldpassword=$_POST['oldpassword'];
	
	$oldpassword=mysqli_real_escape_string($conn,$oldpassword);

	$oldpassword=htmlentities($oldpassword);

	if(isset($_SESSION['welcome']))
	{
		$username=$_SESSION['username'];
		$password=$_SESSION['password'];
		$email=$_SESSION['email'];

		$sql="select password from db where username='$username'";
		$exe=mysqli_query($conn,$sql);
		if(mysqli_num_rows($exe)>0)
		{
			$coll=mysqli_fetch_assoc($exe);
			$databasepassword=$coll['password'];
			if(password_verify($oldpassword, $databasepassword))
			{
				$sql1="delete from db where username='$username'";
				$exe1=mysqli_query($conn,$sql1);
				if($exe1)
				{
					header("Location: login.php");
					$_SESSION['deletesuccessful']="<h1>Your account deleted successfully</h1>";
				}
				else
				{
					header("Location: loginpage.php");
					$_SESSION['deletesuccessful']="<h1>something went wrong!</h1>";
				}
			}
			else
			{
				header("Location: loginpage.php");
				$_SESSION['deletesuccessful']="<h1>password mismatched</h1>";
			}
		}
		else
		{
			header("Location: loginpage.php");
			$_SESSION['deletesuccessful']="<h1>something went wrong!</h1>";
		}
	}
	else
	{
		header("Location: loginpage.php");
		$_SESSION['deletesuccessful']="<h1>something went wrong!<h1>";
	}
}
else
{
	echo "<h1>Not Found!</h1>";
}

?>
</body>
</html>