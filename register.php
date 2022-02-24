<?php
	session_start();
	include 'db_connect.php'; 

	$success=$error=$username_error=$password_error=$email_error=$voting_card_error='';

	if(isset($_POST['register'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$status = $_POST['status'];
		$voting_id = $_POST['voting_id'];
		$voting_card = $_POST['voting_card'];
	
        
		$query = "SELECT * from queue_form where username='$username'";
		$run = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($run)>0){
			$username_error="Username is already taken. Please try another username.<br>";
		}
		else if($password !== $cpassword){
			$password_error="Password do not matched.<br>";
		}

		$query1 = "SELECT * from queue_form where email='$email'";
		$run1 = mysqli_query($conn,$query1);
		$row1 = mysqli_num_rows($run1);
		if(mysqli_num_rows($run1)>0){
			$email_error="Email ID is already taken. Please try another email.<br>";
		}

		$query2 = "SELECT * from queue_form where voting_card='$voting_card'";
		$run2 = mysqli_query($conn,$query2);
		$row2 = mysqli_num_rows($run2);
		if(mysqli_num_rows($run2)>0){
			$voting_card_error="Please change the name of voting card file.<br>";
		}




		if(empty($username_error) && empty($password_error) && empty($email_error) && empty($voting_card_error)){


			$sql = "INSERT INTO `queue_form`(`name`, `username`, `email`, `password`, `voting_id`, `voting_card`, `status`)
		VALUES ('$name','$username','$email','$password','$voting_id','$voting_card', '$status')";

		$result = mysqli_query($conn, $sql);	

		if($result){
			$success= "Registration form succeessfully send. Wait till your form is verified. You will be notified through mail.<br>";
		}
		else{
			$error="Something Went wrong. Please try again.<br>";
			}

		}




		
		


	}


    ?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Login | Voting OnTheGo</title>


	<?php include('./header.php'); ?>
	
</head>
<style>
	body {
		width: 100%;
		height: calc(100%);
		/*background: #007bff;*/
	}

	main#main {
		width: 100%;
		height: calc(100%);
		background: white;
	}

	#login-right {
		position: absolute;
		right: 0;
		width: 40%;
		height: calc(100%);
		background-color: #2ec4b6;
		background-size: cover;
		display: flex;

	}

	.card {
		border-radius: 5px;
	}

	#login-left {
		position: absolute;
		left: 0;
		width: 60%;
		height: calc(100%);
		background-color: #7209b7;
		display: flex;
		align-items: center;
	}

	#login-right .card {
		margin: auto
	}

	.logo {
		margin: auto;
		font-size: 8rem;
		/*background: #00000061;*/
		/*padding: .5em 0.8em;*/
		/*border-radius: 50% 50%;*/
		color: #000000b3;
		position: relative;
		left: 150px;
	}
</style>

<body>


	<main id="main" class=" alert-info">
		<div id="login-left">
			<div class="logo">
			<?php include 'db_connect.php'; 
				
				$sql = "SELECT `title` FROM `voting_list` WHERE `is_default` =1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
    			// output data of each row
   						 while($row = $result->fetch_assoc()) {
							?> <div style="font-size:0.3em; position: relative; top:-10px; "> <?php echo $row['title']; }}?> </div>
				<img src="assets\img\logo.png" alt="..." width="60%">
			</div>
		</div>
		<div id="login-right" class="">
			<div class="card col-md-8">
				<div class="card-body">
                
                
			
			
				<div class="alert alert-success"><?php echo $success;?></div>


				<div class="alert alert-danger">
				<?php echo $error;?>
				<?php echo $username_error;?>
				<?php echo $email_error;?>
				<?php echo $password_error;?>
				<?php echo $voting_card_error;?> </div>
							
			
			
			
			
                <center><button type="button" class="btn btn-outline-success" onclick="history.back()">Click here to go to Login Page</button>
				</center>
				</div>
			</div>
		</div>


	</main>

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>


<script>

</script>
