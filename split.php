<?php
session_start();
include 'session.php';
include 'connect.php';	
	if(isset($_GET['id']))
	{
		$collection = $db->user_details;
		$id = $_GET['id'];
		$cname = $collection->findOne(['_id' => $id]);
		$_SESSION['cname'] = $cname['name'];
		$_SESSION['id']=$id;
		
	}	
?>
<!DOCTYPE html>
<html>

<frameset cols="50%,50%">
  <frame name="main1" src="home.php">
  <frame name="main2">
</frameset>

</html>
