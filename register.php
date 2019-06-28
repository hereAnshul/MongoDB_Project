<?php
session_start();
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<title>Register</title>
</head>


<?php
	if(isset($_POST['gotp']))
	{
		if(isset($_POST['mob']))
		{
				require 'connect.php';
				$mob = $_POST['mob'];
				$pass = $_POST['pass'];
				$name = $_POST['name'];
				
				$_SESSION['user'] = $mob;
				$_SESSION['pass'] = $pass;
				$_SESSION['name'] = $name;

				$collection = $db->user_details;
				$count = $collection->count(['mob' => $mob]);
				if($count)
				{
					echo "<script>alert('Already registered');</script>";
				}
				else
				{
				$otp = 123456;
				$_SESSION['otp'] = $otp;
				}
				/*require('textlocal.class.php');
				$textlocal = new Textlocal(false, false, 'uY1G/Zm1vWw-tUXkrhuKcFCIxVQUJNfzCsnutxA5W0');
				$numbers = array($_POST['mob']);
				$sender = 'TXTLCL';
				$otp = mt_rand(100000, 999999);
				$_SESSION['otp']=$otp;
				$message = "This is your OTP ".$otp;

				try {
					$result = $textlocal->sendSms($numbers, $message, $sender);
					//print_r($result);
				} catch (Exception $e) {
					die('Error: ' . $e->getMessage());
				}*/
		}	
	}
		else
		{
			echo "<script>alert('Mobile Number?');</script>";
		}
	
	//}
	if(isset($_POST['verify']))
	{
		if(isset($_POST['otp']))
		{
			$otp2 = $_POST['otp'];
			
			$otp1 = $_SESSION['otp'];
			if($otp2==$otp1)
			{
					require 'connect.php';
					$mob = $_SESSION['user'];
					$name = $_SESSION['name'];
					$pass = $_SESSION['pass'];
					$collection1 = $db->user_details;
					$collection1->insertOne(['_id'=>$mob,'name'=>$name,'password'=>$pass]);
					$contact = "a".$mob."_c";
					$db->createCollection($contact);
					$message = "a".$mob."_m";
					$db->createCollection($message);
					echo "<script>alert('Successfully Registered....');
					location = 'login.php'
					</script>";	
			}
			else
			{
				echo "<script>alert('Wrong Otp');</script>";
			}
		}
		else
		{
			echo "<script>alert('Missing Details');</script>";
		}
	}
?>

<body>
<div class="login-card">
<img src="icon.png" id="logo"/>
	<div id= "auto">
	</div>
	<form method = "post">
	<table align="center">
	<tr>
	<td size="100%">
	<input type = "text" name = "name" placeholder = "Name"/>
	</td>
	</tr>
	<tr>
	<td>
	<input type = "password" name = "pass" placeholder = "Password"/>
	</td>
	</tr>
	<tr>
	<td>
	<input type = "text" name = "mob" placeholder = "Mobile"/>
	</td>
	</tr>
	<tr>
	<td>
	<input type = "submit" name = "gotp" id = "got" class="login login-submit" value = "Get OTP"/>
	</td>
	</tr>
	
	<tr>
	<td>
	<input type = "text" name = "otp" id = "otp" placeholder = "OTP"/>
	</td>
	</tr>
	<tr>
	<td>
	<input type = "submit" name = "verify" class="login login-submit" value = "Verify"/>
	</td>
	</tr>
	<tr>
	<td id="abc">
	<a href= "login.php">Already a Member</a>
	</td>
	</tr>
	
	
	</table>
	</form>
</div>
</body>
</html>