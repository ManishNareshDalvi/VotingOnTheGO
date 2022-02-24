
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Login | Voting OnTheGo</title>


	<?php include('links.php'); ?>
	<?php
	
	if (isset($_SESSION['login_id']))
		header("location:index.php?page=home");
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

	#new_voter {
		position: relative;
		left: 10px;
		top: -2px;
	}

	img#cimg {
		max-height: 10vh;
		max-width: 6vw;
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
							?> <div style="font-size:0.3em; position: relative; top:-1s0px; "> <?php echo $row['title'];} ?> </div>
							
				
				
				<img src="assets\img\logo.png" alt="..." width="60%">
			</div>
		</div>
		<div id="login-right" class="">
			<div class="card col-md-8">
				<div class="card-body">
				
					<form id="login-form">
						<div class="form-group">
							<label for="username" class="control-label">Username</label>
							<input type="text" id="username" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" class="control-label">Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						<center>
							<button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button>
						</center>
					</form>
				</div>
				<center><label>Dont have account? <button class="btn btn-warning float-right btn-sm" id="new_voter" data-toggle="modal" data-target="#exampleModal">Register</button>
					</label></center>
			</div>
		</div>


	</main>



	<!--  Registration form -->
	<form method="post" action="register.php" id="register">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						
						<h5 class="modal-title" id="exampleModalLabel">Registeration Form</h5>
						<button type="button" id="close" class="close danger" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label for="name" class="control-label">Full Name</label>
						<input type="text" id="name" name="name" class="form-control" required>
					</div>

					<div class="modal-body">
						<label for="username" class="control-label">Username</label>
						<input type="text" id="username" name="username" class="form-control" required>
					</div>
					<div class="modal-body">
						<label for="email" class="control-label">Email</label>
						<input type="email" id="email" name="email" class="form-control" required>
					</div>
					<div class="modal-body">
						<label for="password" class="control-label">Password</label>
						<input type="password" id="password" name="password" class="form-control" required>
					</div>
					<div class="modal-body">
						<label for="cpassword" class="control-label">Confirm Password</label>
						<input type="password" id="cpassword" name="cpassword" class="form-control" required>
					</div>
					<div class="modal-body">
						<label for="voting_id" class="control-label">Voting ID</label>
						<input type="text" id="voting_id" name="voting_id" class="form-control" required>
					</div>
					<div class="modal-body">
						<label for="status" class="control-label">Verification Status</label>
						<input type="text" id="status" name="status" class="form-control" value="Not Verified" readonly>
					</div>
				
				<div class="modal-body">
					<label for="" class="control-label">Image</label>
					<input type="file" class="form-control" name="voting_card" onchange="displayImg(this,$(this))" required>
				</div>
				<div class="modal-body">
					<img src="<?php echo isset($image_path) ? 'assets/img/' . $image_path : '' ?>" alt="" id="cimg">
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<input class="btn btn-secondary" type="reset" value="Reset">
						<button type="submit" name="register" class="btn btn-success">Submit</button>

					</div>

				</div>
			</div>
		</div>
	</form>

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e) {
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success: function(resp) {
				if (resp == 1) {
					location.href = 'adminlogin.php';
				} else if (resp == 2) {
					location.href = 'voterlogin.php';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})

	$('#new_voter').click(function() {
		uni_modal('New Voter', 'register.php')
	})

	


	function displayImg(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

</html>

<?php
				}
?>








