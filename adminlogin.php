<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Login | Voting OnTheGo</title>


	<?php include('links.php'); ?>
	<?php
	session_start();
	if (!isset($_SESSION['login_id']))
		header("location:login.php");
	?>

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
					<form id="otp-login" method="post">
						
					<span id="email_error" class="field_error"></span>
							<span id="otp_error" class="field_error"></span>

						<h2 class="text-center">Admin Log in</h2>
						<div class="form-group first_box">
							<input type="email" id="email" class="form-control" placeholder="Email" required="required">


						</div>
						<div class="form-group first_box">
							<button type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send OTP</button><br>

						</div>
						<div class="form-group second_box">
							<input type="text" id="otp" class="form-control" placeholder="Enter OTP received by Mail" required="required">

						</div>
						<div class="form-group second_box">
							<button type="button" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button><br>

						</div>
					</form>
				</div>
			</div>
		</div>


	</main>

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	function send_otp() {
		var email = jQuery('#email').val();
		jQuery.ajax({
			url: 'send_otp.php',
			type: 'post',
			data: 'email=' + email,
			success: function(result) {
				if (result == 'yes') {
					jQuery('.second_box').show();
					jQuery('.first_box').hide();
				}
				if (result == 'not_available') {
					jQuery('#email_error').html('<center><div class="alert alert-danger">Please enter invalid mail Id.</div></center>');
				}
			}
		});
	}

	function submit_otp() {
		var otp = jQuery('#otp').val();
		jQuery.ajax({
			url: 'check_otp.php',
			type: 'post',
			data: 'otp=' + otp,
			success: function(result) {
				if (result == 'yes') {
					window.location = 'index.php?page=home'
				}

				if (result == 'not_exist') {
					jQuery('#otp_error').html('<center><div class="alert alert-danger">Please enter invalid OTP.</div></center>');
				}
			}
		});
	}
</script>
<script>
	window.history.pushState(null, "", window.location.href);
	window.onpopstate = function() {
		window.history.pushState(null, "", window.location.href);
	};
</script>
<style>
	.second_box {
		display: none;
	}

	.field_error {
		color: red;
	}
</style>

</html>

<script>
	(function() {
		var visited = localStorage.getItem('visited');
		if (!visited) {
			document.getElementById("email_error").style.visibility = "visible";
			localStorage.setItem('visited', true);
		}
	})();
</script>