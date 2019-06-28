<?php
session_start();	
	include 'session.php';
	include 'connect.php';
	$id = $_SESSION['id'];
	$id2 = $_SESSION['user'];
	$collection3 = $db->user_details;
	$count = $collection3->count(['_id'=> $id]);
	
	if($count)
	{
		$message = $_POST['fname']; 
		$user = "a".$id."_m";
		$user2 = "a".$id2."_m";
		$me = $_SESSION['user'];
		$collection = $db->$user;
		$collection2 = $db->$user2;
		$n = $collection->count(); 
		$n = $n + 1;
		$m = $collection2->count(); 
		$m = $m + 1;
		date_default_timezone_set('Asia/Kolkata'); 
		$d = date("y-m-d");
		$t = date("H:i:s");
		$collection->insertOne(['_id'=>$n,'from'=>$me ,'message' => $message,'date'=>$d,'time'=>$t]);
		$collection2->insertOne(['_id'=>$m,'to'=>$id ,'message' => $message,'date'=>$d,'time'=>$t]);
	}
?>