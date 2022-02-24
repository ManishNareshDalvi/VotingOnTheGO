<style>
	#edit:hover {

		color: #4361ee;

	}

	#delete:hover {
		color: red;
	}

	#block1 {
		background-color: #fca311;
		position: relative;
		left: 200px;
	}

	#block2 {
		background-color: #d62828;
		position: relative;
		left: 200px;
	}
</style>


<div class="containe-fluid">
	<?php include('db_connect.php');
	$voting = $conn->query("SELECT * FROM voting_list where  is_default = 1 ");
	foreach ($voting->fetch_array() as $key => $value) {
		$$key = $value;
	}
	$votes  = $conn->query("SELECT * FROM votes where voting_id = $id ");
	$v_arr = array();
	while ($row = $votes->fetch_assoc()) {
		if (!isset($v_arr[$row['voting_opt_id']]))
			$v_arr[$row['voting_opt_id']] = 0;

		$v_arr[$row['voting_opt_id']] += 1;
	}
	$opts = $conn->query("SELECT * FROM voting_opt where voting_id=" . $id);
	$opt_arr = array();
	while ($row = $opts->fetch_assoc()) {
		$opt_arr[$row['category_id']][] = $row;
	}

	?>
	<br>
	<div class="row">
		<div class="col-lg-8">
			<div id="block1" class="card col-md-4 offset-2  float-left">
				<div class="card-body text-white">
					<h4><b>Voters</b></h4>
					<hr>
					<span class="card-icon"><i class="fa fa-users"></i></span>
					<h3 class="text-right"><b><?php echo $conn->query('SELECT * FROM user where type = 2 ')->num_rows ?></b></h3>
				</div>
			</div>
			<div id="block2" class="card col-md-4 offset-2  ml-4 float-left">
				<div class="card-body text-white">
					<h4><b>Pending Forms</b></h4>
					<hr>
					<span class="card-icon"><i class="fa fa-user-tie"></i></span>
					<h3 class="text-right"><b><?php
												$voters = $conn->query('SELECT * FROM queue_form where status="Not Verified" ')->num_rows;

											

												echo "$voters";


												?></b></h3>
				</div>
			</div>
		</div>
	</div>


	<br><br>

	<div class="container-fluid">

		<center>
			<b>
				<h1 class="h2">Pending Forms</h1>
			</b>
		</center>

		<br>
		<div class="row">
			<div class="card col-lg-11">
				<div class="card-body">

					

					<table id="" class="table-bordered table-striped col-md-12">
						<thead class="text-center" height="50px">
							<th class="text-center">ID</th>
							<th class="text-center">Name</th>
							<th class="text-center">Username</th>
							<th class="text-center">Email</th>
							<th class="text-center">Voting ID</th>
							<th class="text-center">Action</th>
							<th class="text-center">Status</th>
						</thead>
						<tbody>
							<?php
							include 'db_connect.php';
							$sql = "SELECT * FROM queue_form ORDER BY status ASC";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while ($row = $query->fetch_assoc()) {
								echo
								"<tr class=text-center height=50px>
									<td>" . $row['id'] . "</td>
									<td>" . $row['name'] . "</td>
									<td>" . $row['username'] . "</td>
									<td>" . $row['email'] . "</td>
									<td>" . $row['voting_id'] . "</td>
									<td>
										<a href='#view_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal' .bd-example-modal-lg><span class='glyphicon glyphicon-edit'></span>View</a>
										<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
                                    <td>" . $row['status'] . "</td>
								</tr>";
								include('view_modal.php');
							}


							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>



		<style>
			.row {
				position: relative;
				left: 60px;
			}

			body {
				background: #2ec4b6;
			}
		</style>


<script>



