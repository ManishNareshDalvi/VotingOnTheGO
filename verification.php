



<?php
	session_start();
	include 'db_connect.php'; 
	$email_error='';
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$voting_id = $_POST['voting_id'];
		$voting_card = $_POST['voting_card'];
		$id=$_POST['id'];

		

		$query1 = "SELECT * from user where email='$email'";
		$run1 = mysqli_query($conn,$query1);
		$row1 = mysqli_num_rows($run1);
		if(mysqli_num_rows($run1)>0){
			$email_error="Email ID is already taken. Please try another email.<br>";
		}
		if(empty($email_error)){
		$sql1 = "INSERT INTO `user`(`name`, `username`, `email`, `password`, `voting_id`, `voting_card`)
		VALUES ('$name','$username','$email','$password','$voting_id','$voting_card')";

		$result1 = mysqli_query($conn, $sql1);		

		$sql2 = "UPDATE `queue_form` SET `status`='Verified' WHERE `id`='$id'";
		
		$result2 = mysqli_query($conn, $sql2);	
		}

		#$run=mysqli_query($conn, $query);



		$subject="Voting account successfully created";
		$html="Hey voter $username, your voting account is successfully created and your credentials are following:-
		Name = $name
		Username = $username
		Email = $email
		voting_id=$voting_id
		";

		mail($email,$subject, $html,'From: votingonthego@gmail.com');	
		
		header("location:index.php?page=pending_forms");
		
		
	}
	
		
		
	

?>


