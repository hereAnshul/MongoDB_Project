<?php
		session_start();
		include 'session.php';
		require 'connect.php';
		$user = $_SESSION['user'];
		$name = $_SESSION['name'];
		$user1 = "a".$user."_c";
		$collection = $db->$user1;
		$res = $collection->find();
		
?>
<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>

<script type = "text/javascript">
function toggle() {
    var x = document.getElementById("add");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
 
</script>
<body>
<div class="login-card">
<img src="icon.png" id="logo"/>
<h1 align="center">Welcome <?php echo $name ?></h1>
<h4><p align="right"><a style = "text-decoration:none" href="logout.php">Logout</a></p></h4>
<table align="center">	
		<tr>
		<td>
		<h2>Recents</h2>
		</td>
		</tr>
		<?php
		   foreach($res as $contacts)
		   {
		?>
		<tr>
		<td>
		<a style = "text-decoration:none" href="#" onclick="window.open('main.php?id=<?php echo $contacts['_id']?>', '_blank', 'location=yes,height=570,width=600,scrollbars=yes,status=yes')">
		<?php  echo $contacts['name'];
		?></a>
		</td>
		</tr>	
		<?php }?>
		<tr>
		<td><button id = "butt" onclick = "toggle()">&#43;</button></td>
		</tr>
		<tr id="add">
		<form action="addfriend.php" method = "post">
		<td>
		<input type="text" name = "user" placeholder= "name">
		</td>
	<td>
	<input type="text" name = "pass" placeholder= "mob">
	</td>
	<td>
	<input type="submit" name = "login" class="login login-submit" value = "Add Friend">
	</td>
	</form>
	</tr>
</table>
<a style = "text-decoration:none;color:red;text-align:center"  href = "delete.php">Delete account</a>
</div>
</html>

