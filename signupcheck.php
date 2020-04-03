<!DOCTYPE html>
<html>
<head>
	<title>Signup Check</title>
</head>
<body>
<?php  
session_start();

if(isset($_POST['ssmit']))
{
	require "db.php";

	$suname=$_POST['suname'];
	$spword=$_POST['spword'];
	$semail=$_POST['semail'];
	$cspword=$_POST['cspword'];

	if(strlen($suname)>3)
	{
		if(strlen($spword)>7)
		{
			if($spword===$cspword)
			{
				if(strlen($semail)>0)
				{
					$suname=mysqli_real_escape_string($conn,$suname);
					$spword=mysqli_real_escape_string($conn,$spword);
					$semail=mysqli_real_escape_string($conn,$semail);

					$suname=htmlentities($suname);
					$spword=htmlentities($spword);
					$semail=htmlentities($semail);

					$spword=password_hash($spword, PASSWORD_BCRYPT);

					$sql="select * from db where username='$suname' or email='semail'";
					$exe=mysqli_query($conn,$sql);
					if(mysqli_num_rows($exe)>0)
					{
						header("Location: login.php");
						$_SESSION['message1']="<h1>account already exists, pls login to continue</h1>";
					}
					else
					{
						$sql1="insert into db(username,password,email) values('$suname','$spword','$semail')";
						$exe1=mysqli_query($conn,$sql1);
						if($exe1)
						{
							header("Location: login.php");
							$_SESSION['message1']="<h1>successfully signup :) pls continue to login</h1>";
						}
						else
						{
							header("Location: signup.php");
							$_SESSION['message']="<h1>something went wrong! pls try again</h1>";			
						}
					}
				}
				else
				{
					header("Location: signup.php");
					$_SESSION['message']="<h1>email address must be graterthan 0</h1>";
				}
			}
			else
			{
				header("Location: signup.php");
				$_SESSION['message']="<h1>password mismatched</h1>";
			}
		}
		else
		{
			header("Location: signup.php");
			$_SESSION['message']="<h1>password must be graterthan 7</h1>";
		}
	}
	else
	{
		header("Location: signup.php");
		$_SESSION['message']="<h1>username must be graterthan 3</h1>";
	}
}
else
{
	echo "<h1>Not Found!</h1>";
}


?>
</body>
</html>
