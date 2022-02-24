<?php
session_start();
$conn=mysqli_connect('localhost','root','','voting_db');
$email=$_POST['email'];
$res=mysqli_query($conn,"select * from user where email='$email' and username='$_SESSION[username]'");
$count=mysqli_num_rows($res);
if($count>0){
	
	$otp=rand(111111,999999);
	mysqli_query($conn,"update user set otp='$otp' where email='$email'");
	$html="Your otp verification code is ".$otp;
	$subject="OTP Verification";
	$_SESSION['EMAIL']=$email;
	mail($email,$subject, $html,'From: otpverification@gmail.com');

	echo "yes";
	
}else{
	echo "not_available";
}


	






?>