<?php

include "connect.php";
    if(isset($_POST['login2']))
	{
			$user = $_POST['mob'];
			$pass = $_POST['pass'];
			$otpn = $_POST['otp'];
			if($otpn == "123456"){
				$collection = $db->user_details;
				$res = $collection->updateOne(['_id' => $user],['$set' => ['password' => $pass]]);
				echo "<script>alert('Successful update....');
			location = 'login.php';
	
			</script>";
			}else{
				echo "<script>alert('Incorrect OTP!');
			location = 'update.php';
			</script>";
			}
	}
?>


<html>
<head>
<title>Update</title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="login-card">
<img src="icon.png" id="logo"/>
<form name = "myform" method = "post" enctype = "multipart/form-data">
<input name="mob" type="text" placeholder="Mobile Number" required>
<input type = "submit" name = "gotp" id = "got" class="login login-submit" value = "Get OTP" disabled />
<input type = "text" name = "otp" id = "otp" placeholder = "OTP"/>
<input type="password" name="pass" placeholder="New Password" required>
<input type="submit"  name="login2" class="login login-submit" value="Update">

<div class="login-help">
 <a href="login.php">Back to Login</a>
</div>

</form>
</body>
</html>