<!DOCTYPE html>
<html>
<head>
	<title>Set Password</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<center>
<div class="main">
<div class="header"> <u>Set New Password</u></div><br>

<form action="pass1.php" method="post">
<div class="label">
<label>New Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="npassword" id="new_password" placeholder="New Password" autocomplete="off" required onkeyup='check();'>
<span class='message'></span>
</label>

<br><br>
<label>Confirm Password&nbsp;&nbsp;
<input type="password" name="cpassword" id="confirm_password" placeholder="Confirm Password" autocomplete="off" required onkeyup='check();'>
<span class='message'></span>
<script src="script.js"></script>
</label>

<br><br>
</div>

<button  type="submit"><a href="index.php" style="text-decoration: none">Submit</a>
</button>
</form>
</div>
</center>

</body>
</html>