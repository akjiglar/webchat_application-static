<!DOCTYPE html>
<html>
<head>
	<title>WebChat Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>

<div class="header">
<h1> Welcome to the Chatting World</h1>
<h2>Login Here</h2>
</div>
 
<div class="main">

<form action="login.php" method="post">


<div class="label">
<label><br>USERNAME  &nbsp;&nbsp;&nbsp;</label>
<input type="text" name="uname" placeholder="Username" autocomplete="off" required><br><br>
<label>PASSWORD &nbsp;&nbsp;&nbsp;&nbsp;</label>
<input type="password" name="password" placeholder="Password" autocomplete="off" required><br>
</div>
<h3>Forget Password? <a href="password_verification.php" style="text-decoration: none"><font color="rgba(6, 234, 150, 1)">CLICK HERE</font></a></h3>

<button  type="submit" name="log_in" value="add">Login</button>

<?php include("login.php"); ?> 

</form>
<h3>If don't have an Account, Please Signup Here </h3>
<button  type="submit"><a href="sign.php" style="text-decoration: none">Signup</a>
</div>
</center>

</body>
</html>