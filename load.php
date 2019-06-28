<html>
<?php 
	session_start();
	error_reporting(0);
	include 'session.php';
	require 'connect.php';
	$cname = $_SESSION['cname'];
	$from = $_SESSION['id'];
	$to = $_SESSION['user'];
	$user = "a".$to."_m";
	$collection = $db->$user;
	
//	$count = $collection->count(['from'=>$from,'to'=>$from]);
	
	$res1 = $collection->find(['from' => $from]);
	$res2 = $collection->find(['to' => $from]);
	
	$recieved = array_fill(0,100,0);
	$idr1 = array();
	foreach($res1 as $inbox)
	{
		$idr = $inbox['_id'];
		$idr1[] = $idr;
		$recieved[$idr] = $inbox['message'];
	}
	$sent = array_fill(0,100,0);
	$ids1 = array();
	foreach($res2 as $inbox1)
	{
		$ids = $inbox1['_id'];
		$ids1[] = $ids;
		$sent[$ids] = $inbox1['message'];
	}
	$m = count($idr1);
	
	$n = count($ids1);
	if($idr1[$m-1]<$ids1[$n-1])
	{
		$count = $ids1[$n-1];
	}
	else
	{
		$count = $idr1[$m-1];
	}
	if($idr1[0] < $ids1[0])
	{
		$start = $idr1[0];
	}
	
	else
	{
		$start = $ids1[0];
	}


?>
<body>
<table>
<?php for($i=$start;$i<$count+1;$i++) { ?>
<?php 
	$x = strcmp($recieved[$i],0);
	if($x)
	{ ?>
	<tr>	
	<td width="200">	
		<?php echo $recieved[$i];?>
	</td>
	<td width="200">
	</td>
	<?php } ?>
 	

<?php 
	$y = strcmp($sent[$i],0);
	if($y)
	{ ?>
	<tr>
	<td></td>
	<td align="right" style="color:red;">
		<?php echo $sent[$i]; ?>
	</td>
	</tr>
	<?php }	
	
}?>
</table>
	</body>
</html>	