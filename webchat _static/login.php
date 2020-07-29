<?php
session_start();

include("dbh.php");
if (isset($_POST['log_in'])) {
  
$uname=htmlentities(mysqli_real_escape_string($con,$_POST['uname']));
$password=htmlentities(mysqli_real_escape_string($con,$_POST['password']));

$select_user= "select * from  signup where uname='$uname' AND password='$password'";

$query = mysqli_query($con,$select_user);
$check_user = mysqli_num_rows($query);

if($check_user ==1) {
	$_SESSION['uname']=$uname;
	$update_msg = mysqli_query($con,"UPDATE signup SET log_in='online' WHERE uname='$uname'");
	$user = $_SESSION['uname'];
	$get_user = "select * from signup where uname='$user'";
	$run_user =mysqli_query($con,$get_user);
	$row = mysqli_fetch_array($run_user);

	$name =$row['name'];

	echo "<script>window.open('home_page.php?name=$name','_self')</script>";

}
else{
	echo"

	<div class='alert alert-danger'>
	<strong>Check your Username and Password</strong>
	</div>
	";
}
}

?>
