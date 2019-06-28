<?php
if(isset($_SESSION['user']))
  {
	if(isset($_SESSION['time']))
	{
		if(time()- $_SESSION['time']>900)
		{
			echo "<script>alert('Time out');location = 'logout.php';</script>";
		}
		else
			$_SESSION['time'] = time();
	}
	else
		$_SESSION['time'] = time();
}
else
{
	echo "<script>alert('Time out');location = 'logout.php';</script>";
}
?>