<?php

$con=mysqli_connect("localhost","root","452754","webchat_database");

$user = "select * from signup";

$run_user = mysqli_query($con,$user);

while($row_user=mysqli_fetch_array($run_user)){
	
	$user_id = $row_user['uid'];
	$name=$row_user['name'];
	$user_profile=$row_user['profile'];
	$login = $row_user['log_in'];

	echo"
	<li>
	<div class='chat-left-detail'>
	<img src='$user_profile'>
	<a href='home_page.php?name=$name'>$name</a><br>";
	if($login=='online'){
		echo"<span><i class='fa fa-circle' aria-hidden='true'></i>Online</span>";
	}
	else{
		echo"<span><i class='fa fa-circle-o' aria-hidden='true'></i>Offline</span>";
	}
	"
	</div>
	</li>
	";

}

?>