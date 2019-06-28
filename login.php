
<?php
session_start();
	if(isset($_POST['login']))
	{	
		if(isset($_POST['pass']))
		$pass = $_POST['pass'];
		
		if(isset($_POST['user']))
		$mob = $_POST['user'];
	
		require 'connect.php';
		$collection = $db->user_details;
		$res = $collection->findOne(['_id' => $mob]);
		$name = $res['name'];
		if(strcmp($res['password'],$pass)==0)
		{
			$_SESSION['user'] = $mob;
			$_SESSION['name'] = $name;
			header('Location:home.php');
		}	
		else
		{
			echo "<script> alert('Wrong Details');
			location = 'login.php';
			</script>";
			
		}
	}
?>
<!DOCTYPE html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="login-card">
<img src="icon.png" id="logo"/>
<form name = "myform" method = "post">
<table align="center">
<tr>
<td width="100%">
<input type = "text" name = "user" placeholder = "Mobile" required>
</td>
</tr>
<tr>
<td>
<input type="password" name="pass" placeholder = "Password" required>
</td>
</tr>
<tr>
<td id="abc">
<a href= "register.php">Register</a>
</td>
</tr>
<tr></tr>
<tr>
<td>
<input type="submit" name="login" class="login login-submit" value="Login">
</td>
</tr>
<tr>
<td id="abc">
<a href= "update.php">Forgot Password</a>
</td>
</tr>

</table>

</form>
</div>
</html>