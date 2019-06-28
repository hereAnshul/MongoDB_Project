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
<head>
<title>Inbox</title>
<link type="text/css" rel="stylesheet" href="css/1.css" />
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type = "text/javascript">

	$(document).ready(function(){

	$('#formsubmit').click(function(){
		$.post("submit.php",
			{fname: $('#message').val()}

		);

	});

});


	$(document).ready(function()
	{
		$('#chatbox').load('load.php');
		refresh();
	});

	function refresh()
	{
		setTimeout(function()
		{
			$('#chatbox').load('load.php');
			refresh();
		},2000);
	}

/*	function loadLog(){
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "load.php",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div

				//Auto-scroll
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}
		  	},
		});
	}*/

	window.setInterval(function(){
	var elem = document.getElementById('chatbox');
	elem.scrollTop = elem.scrollHeight;
	}, 10);
</script>

</head>

<body >
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome <b><?php echo $_SESSION['name'];?></b></p>
        <p class="logout"><a id="exit" href="#" onclick="window.close()">Exit Chat</a></p>
        <div style="clear:both"></div>
	</div>
	<div id="chatbox"></div>
	<form name="message" action = "">
        <input name="message" type="text" id="message" size="63" />
        <input name="formsubmit" type="submit"  id="formsubmit" value="Send" />
    </form>
</div>
</form>
</body>
</html>
