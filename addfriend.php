<?php
session_start();
require 'connect.php';

if(isset($_POST['login']))
		{
			$user = $_SESSION['user'];
			$namec = $_POST['user'];
			$phonec = $_POST['pass'];
			if((strcmp($user, $phonec))==0){
				echo "<script>alert('You cannot add yourself! Try socializing');
					location = 'home.php';
					</script>";
			}
			else
			{
			$user2 = "a".$user."_c";
			$collection2 = $db->$user2;
			$coll = $db->user_details;
			$res = $coll->count(['_id'=> $phonec]);
			if($res)
			{	$count = $collection2->count(['_id'=>$phonec]);
				if(!$count)
				{
					$collection2->insertOne(['_id'=>$phonec,'name'=>$namec]);
				header('Location:home.php');
				}
				else
				{
					echo "<script>alert('Already registered...');
					location = 'home.php';
					</script>";
				}
					
			}
			else
			{
				echo "<script>alert('Your friend is not register with us...');
				location = 'home.php';
				</script>";
			}	
			
		}
		}
?>