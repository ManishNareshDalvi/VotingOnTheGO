<div class="modal fade bd-example-modal-lg" id="view_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<form action="verification.php"  method="POST" id="verification">
					<h5 class="modal-title" id="exampleModalLabel">Voter Details</h5>
					<button type="button" id="close" class="close danger" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
			<input type="hidden" class="form-control" name="password" value="<?php echo $row['password']; ?>">
			<div class="modal-body">
				<b>Full Name :</b> <input type="text" id="verify" name="name" class="form-control" value="<?php echo $row['name'];  ?>" readonly>
			</div>

			<div class="modal-body ok">
				<b>Username :</b> <input type="text" id="verify" name="username" class="form-control" value="<?php echo $row['username'];  ?>" readonly>
			</div>

			<div class="modal-body ok1">
				<b>Email :</b> <input type="email" id="verify" name="email" class="form-control" value="<?php echo $row['email'];  ?>" readonly>
			</div>

			<div class="modal-body ok2">
				<b>Voting ID :</b> <input type="text" id="verify" name="voting_id" class="form-control" value="<?php echo $row['voting_id'];  ?>" readonly>
			</div>


			<div class="modal-body ok3">
				<b>Voting Card :</b> <input type="text" id="verify" name="voting_card" class="form-control" value="<?php echo $row['voting_card'];  ?>" readonly>
			</div>

			<div style="display: flex" class="ok5">
				<img src="assets/img/<?php echo $row['voting_card'];  ?>" alt="" width="700px" class="center">
			</div>

			

			

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				
			</div>

		</div>
	</div>
	</form>
</div>

</div>
</div>
</div>





<style>
	.center {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 90%;

	}

	.modal-body {
		font-size: 20px;
	}

	#verify{
		width: 40%;;
		position: relative;
		top:-33px;
		left:150px;
		}


		.ok{
			position: relative;
			top: -30px;
		}
		
		.ok1{
			position: relative;
			top: -60px;
		}
		.ok2{
			position: relative;
			top: -90px;
		}
		.ok3{
			position: relative;
			top: -120px;
		}
		.ok4{
			position: relative;
			top: -150px;
		}

		.ok5{
			position: relative;
			top: -100px;
		}
	
</style>


<!-- Delete -->
<div class="modal fade bd-example-modal-lg" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<form action="delete1.php" method="POST" id="verification">
					<h5 class="modal-title" id="exampleModalLabel">Voter Details</h5>
					<button type="button" id="close" class="close danger" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
			<input type="hidden" class="form-control" name="password" value="<?php echo $row['password']; ?>">
			<div class="modal-body">
				<b>Full Name :</b> <input type="text" id="verify" name="name" class="form-control" value="<?php echo $row['name'];  ?>" readonly>
			</div>

			<div class="modal-body ok">
				<b>Username :</b> <input type="text" id="verify" name="username" class="form-control" value="<?php echo $row['username'];  ?>" readonly>
			</div>

			<div class="modal-body ok1">
				<b>Email :</b> <input type="email" id="verify" name="email" class="form-control" value="<?php echo $row['email'];  ?>" readonly>
			</div>

			<div class="modal-body ok2">
				<b>Voting ID :</b> <input type="text" id="verify" name="voting_id" class="form-control" value="<?php echo $row['voting_id'];  ?>" readonly>
			</div>


			<div class="modal-body ok3">
				<b>Voting Card :</b> <input type="text" id="verify" name="voting_card" class="form-control" value="<?php echo $row['voting_card'];  ?>" readonly>
			</div>

			<div style="display: flex" class="ok5">
				<img src="assets/img/<?php echo $row['voting_card'];  ?>" alt="" width="700px" class="center">
			</div>






			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="submit" name="delete" class="btn btn-success verification" id="verification">Delete</button>
			</div>

		</div>
	</div>
	</form>
</div>


<style>
.tera{
	position: relative;
	top: -30px;
	left: 90px;
}

</style>
