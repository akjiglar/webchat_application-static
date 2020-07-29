<!DOCTYPE html>
<?php
session_start();
include("dbh.php");

if(!isset($_SESSION['uname'])){
	header("location:index.php");
}
else{ ?>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.js"> 
	<link rel="stylesheet" type="text/css" href="style_home.css">
</head>
<body>
<div class="container main-section">
<div class="row">
<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
<div class="input-group searchbox">
<div class="input-group-btn">
<center><a href="find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add New User</button></a></center>
</div>
</div>
<div class="left-chat">
<ul>
<?php include("get_users_data.php"); ?>

</ul>
</div>

</div>
<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
<div class="row">
<!-- getting the user information who logged in -->
<?php
$user = $_SESSION['uname'];
$get_user = "select * from signup where uname='$user'";
$run_user = mysqli_query($con,$get_user);
$row = mysqli_fetch_array($run_user);
$user_id = $row['uid'];
$name = $row['name'];
?>

<!-- getting the user data on which user click -->
<?php
if(isset($_GET['name'])){
	
	global $con;
	$get_name = $_GET['name'];
	$get_user ="select * from signup where name='$get_name'";

	$run_user =mysqli_query($con,$get_user);
	$row_user = mysqli_fetch_array($run_user);

	$name = $row_user['name'];
	$user_profile_image = $row_user['profile'];
}
$total_messages = "select * from users_chat where (sender_name='$name' AND receiver_name='$name') OR (receiver_name='$name' AND sender_name='$name')";
$run_messages = mysqli_query($con,$total_messages);
$total = mysqli_num_rows($run_messages);

?>

<div class="col-md-12 right-header">
<div class="right-header-img">
<img src=<?php echo"$user_profile_image"; ?>>
</div>
<div class="right-header-detail">
<form method="post">
<p><?php echo "$name"; ?> </p>
<span><?php echo $total; ?> messages</span>&nbsp &nbsp
<button name="logout" class="btn btn-danger">Logout</button>
</form>
<?php
if(isset($_POST['logout'])){
	$update_msg = mysqli_query($con,"UPDATE signup SET log_in='offline' WHERE name='$name'");
	header("Location:logout.php");
	exit();
}
?>
</div>
</div>
</div>
<div class="row">
<div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
<?php
$update_msg = mysqli_query($con,"UPDATE users_chat SET msg_status='read' WHERE sender_name='$name' AND receiver_name='$name'");

$sel_msg = "select * from users_chat where (sender_name='$name' AND receiver_name='$name') OR (receiver_name='$name' AND sender_name='$name') ORDER by 1 ASC";
$run_msg = mysqli_query($con,$sel_msg);

while($row = mysqli_fetch_array($run_msg)){
	$sender_name=$row['sender_name'];
	$receiver_name=$row['receiver_name'];
	$msg_content=$row['msg_content'];
	$msg_date=$row['msg_date'];
?>
<ul>
<?php
if($name == $sender_name AND $name==$receiver_name){
	
	echo"
	<li>
	<div class='rightside-right-chat'>
	<span>$name <small>$msg_date</small> </span><br><br>
	<p><b>$msg_content</b></p>
	</div>
	</li>
	";
}

else if($name == $receiver_name AND $name==$sender_name){
	
	echo"
	<li>
	<div class='rightside-left-chat'>
	<span>$name <small>$msg_date</small> </span><br><br>
	<p>$msg_content</p>
	</div>
	</li>
	";
}

?>
</ul>
<?php
}
?>

</div>
</div>
<div class="row">
<div class="col-md-12 right-chat-textbox">
<form method="post">
<input type="text" autocomplete="off" name="msg_content" placeholder="Write your Message.">
<button class="btn" name="submit"> Enter </button>
</form>

</div>
</div>
</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
	$msg = htmlentities($_POST['msg_content']);

	if($msg==""){
		echo"
		<div class='alert alert-danger'>
		<strong><center>Message is unable to send</center></strong>
		</div>
		";
	}
	else if(strlen($msg)>100){
		echo"
		<div class='alert alert-danger'>
		<strong><center>Message is too long. Use only 100 characters</center></strong>
		</div>
		";
	}
	else{
		$insert="insert into users_chat(sender_name,receiver_name,msg_content,msg_status,msg_date) values('$name','$name','$msg','$unread',NOW())";
		$run_insert = mysqli_query($con,$insert);

	}
	
}

?>
<script>
$('#scrolling_to_bottom').animate({
	scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight},1000);
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		var height =$(window).height();
		$('.left-chat').css('height',(height - 92) + 'px');
		$('.right-header-contentChat').css('height',(height - 163) +'px');
	});
	</script>


</body>
</html>
<?php } ?>
