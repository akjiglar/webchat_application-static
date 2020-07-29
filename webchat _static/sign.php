<!DOCTYPE html>
<html>
<head>
	<title>Webchat Signup Page</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<center>
<div class="main">
<div class="header"> Fill the Required Information </div></h2><br>

<form action="signup.php" method="post">

<div class="label">

<label> Name :- </label>
<input type="text" name="name" placeholder="Name" autocomplete="off" required><br><br>

<label> Username :- </label>
<input type="text" name="uname" placeholder="Username" autocomplete="off" required><br><br>
<label> Email Address :- </label>
<input type="email" name="email" placeholder="Email" autocomplete="off" required><br><br>
<label> Password :- </label>
<input type="password" name="password" placeholder="Password" autocomplete="off" required><br><br>

<label> Mobile Number :- </label>
<input type="number" name="mnumber" placeholder="Mobile Number" autocomplete="off" required><br><br>

<label> Gender :- </label>
<select  name="gender" required>
<option  >Select a Gender </option>
<option>Male</option>
<option>Female</option>
<option>Others</option>
</select>
<br><br>
<label> Country :- </label>
<select  name="country" required>
<option >Select a Country </option>
<option>India</option>
<option>UK</option>
<option>Nepal</option>
<option>Bangladesh</option>
<option>France</option>
<option>America</option>
<option>Srilanka</option>
<option>China</option>
</select>
<br><br>

<label> Date of Birth :- </label>
<input type="date" name="dob" placeholder="Date of Birth" autocomplete="off" required><br><br>


<!-- <label> language :- </label>
<input type="text" name="language" placeholder="Language" autocomplete="off" required><br><br>
-->


</div>

<input type="checkbox" name="checkbox" value="check" id="agree" />
<label> I accept the <a href="https://www.commonapp.org/terms-of-use" target="_blank" style="text-decoration: none">Terms of Use</a> & <a href="https://www.ukri.org/funding/information-for-award-holders/data-policy/common-principles-on-data-policy/" target="_blank" style="text-decoration: none">Privacy Policy</a> </label><br><br>

<button type="submit" name="sign_up">Submit
</button>

<?php include("signup.php"); ?>


</form>
</div>

</body>
</html>