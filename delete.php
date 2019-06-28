<?php
   session_start();
   include "connect.php";
   $user = $_SESSION['user'];
   $user1 = "a".$user."_m";
   $user2 = "a".$user."_c";
   $db->dropCollection($user1);
   $db->dropCollection($user2);
   $collection = $db->user_details;
   $collection->deleteOne(['_id'=>$user]);
	echo "<script>alert('Bye Bye....');
		location = 'login.php';
	
	</script>";
   
	

?>