<!DOCTYPE html>
<html>
<head>
	<title>Password Verifiction</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<center>
<div class="main">
<div class="header"><u>Password Verification</u></div><br>

<form action="pass.php" method="post">
<div class="label">

<label>Username&nbsp;&nbsp;</label>
<input type="text" name="uname" placeholder="Username" autocomplete="off" required><br><br>
<label>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<input type="email" name="email" placeholder="Email" autocomplete="off" required><br><br>
<label>Petname&nbsp;&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="pname" placeholder="Petname" autocomplete="off" required><br><br>
</div>
<button type="submit"><a href="set_password.php" style="text-decoration: none">Verify</a>
</button>
</form>
</div>
</center>
</body>
</html>