<!DOCTYPE html>
<html>
<head>
	<title>Upadate Page</title>
</head>
<body>
<?php  

session_start();

if(isset($_POST['usmit']))
{
	require "db.php";
	
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];

	$oldpassword=mysqli_real_escape_string($conn,$oldpassword);
	$newpassword=mysqli_real_escape_string($conn,$newpassword);

	$oldpassword=htmlentities($oldpassword);
	$newpassword=htmlentities($newpassword);

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
				$newpassword=password_hash($newpassword, PASSWORD_BCRYPT);
				$sql1="update db set password='$newpassword' where username='$username'";
				$exe1=mysqli_query($conn,$sql1);
				if($exe1)
				{
					header("Location: loginpage.php");
					$_SESSION['updatesuccessful']="<h1>password updated successful</h1>";
				}
				else
				{
					header("Location: loginpage.php");
					$_SESSION['updatesuccessful']="<h1>password updated unsuccessful</h1>";	
				}
			}
			else
			{
				header("Location: loginpage.php");
				$_SESSION['updatesuccessful']="<h1>password missmatched</h1>";
			}
		}
		else
		{
			header("Location: loginpage.php");
			$_SESSION['updatesuccessful']="<h1>something went wrong!</h1>";
		}
	}
	else
	{
		header("Location: loginpage.php");
		$_SESSION['updatesuccessful']="<h1>something went wrong!</h1>";
	}
}
else
{
	echo "<h1>Not Found!</h1>";
}
?>

</body>
</html>