<?php
	session_start();
	include('db_connect.php');

	if(isset($_POST['delete'])){

		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$voting_id = $_POST['voting_id'];
		$voting_card = $_POST['voting_card'];
		$id=$_POST['id'];

		echo "$name";
		$sql = "DELETE FROM user WHERE id = '$id'";

		
		if($conn->query($sql)){
		}

		$sql2 = "SELECT `title` FROM `voting_list` WHERE `is_default` =1";
		$result2 = $conn->query($sql2);

		if ($result2->num_rows > 0) {
		// output data of each row
					while($row = $result2->fetch_assoc()) {
						$title=$row['title'];
					}
				
		$subject="Your application for $title is rejected";
		$html="Hey voter $username, You registration is rejected. Please Re-register the application and Following are your details which was used as time of registration. Check which data is wrong :-
		Name = $name
		Username = $username
		Email = $email
		voting_id=$voting_id
		";

		mail($email,$subject, $html,'From: votingonthego@gmail.com');	

		header("location:index.php?page=users");


	
		
	}
}
?>