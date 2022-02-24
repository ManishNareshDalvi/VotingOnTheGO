<?php
session_start();
$conn=mysqli_connect('localhost','root','','voting_db');
$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$res=mysqli_query($conn,"select * from user where email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($conn,"update user set otp='' where email='$email'");
	$_SESSION['otp_login']=$email;
	echo "yes";
}else{
	echo "not_exist";
}


?>