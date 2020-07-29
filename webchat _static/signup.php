<?php

include("dbh.php");
if (isset($_POST['sign_up'])) {

$name=htmlentities(mysqli_real_escape_string($con,$_POST['name']));
  
$uname=htmlentities(mysqli_real_escape_string($con,$_POST['uname']));
$email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
$password=htmlentities(mysqli_real_escape_string($con,$_POST['password']));

$mnumber=htmlentities(mysqli_real_escape_string($con,$_POST['mnumber']));

$gender=htmlentities(mysqli_real_escape_string($con,$_POST['gender']));
$country=htmlentities(mysqli_real_escape_string($con,$_POST['country']));
$dob=htmlentities(mysqli_real_escape_string($con,$_POST['dob']));

//$language=htmlentities(mysqli_real_escape_string($con,$_POST['language']));

$rand = rand(1,2);

if(strlen($password)<8){
    echo"<script>alert('password should me minimum 8 characters !')</script>";
    exit();
}

$check_email = "select * from signup where email='$email'";
$run_email = mysqli_query($con, $check_email);

$check = mysqli_num_rows($run_email);

if($check==1){
    echo"<script>alert('Email already exist, please try again!')</script>";
    echo"<script>window.open('sign.php','_self')</script>";
    exit();
}

$check_uname = "select * from signup where uname='$uname'";
$run_uname = mysqli_query($con, $check_uname);

$check = mysqli_num_rows($run_uname);
if($check==1){
    echo"<script>alert('Username already exist, please try again!')</script>";
    echo"<script>window.open('sign.php','_self')</script>";
    exit();
}


if ($rand==1)
$profile_pic ="image1.jpg";
else if($rand==2)
$profile_pic="image4.jpg";

$insert = " insert into signup (name , uname , email , password , mnumber , profile , gender , country , dob) values ('$name', '$uname', '$email', '$password', '$mnumber','$profile_pic', '$gender', '$country', '$dob')";

$query= mysqli_query($con,$insert);

if($query){
    echo"<script>alert('Congratulations $uname, your account has been created successfully')</script>";
    echo"<script>windows.open('index.php','_self')</script>";
}
else{
    echo"<script>alert('Registration Failed, try again!')</script>";
    echo"<script>windows.open('sign.php','_self')</script>";
}
}
?>