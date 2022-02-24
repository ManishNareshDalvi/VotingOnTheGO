
<style>
	.custom-menu {
		z-index: 1000;
		position: absolute;
		background-color: #ffffff;
		border: 1px solid #0000001c;
		border-radius: 5px;
		padding: 8px;
		min-width: 13vw;
	}

	a.custom-menu-list {
		width: 100%;
		display: flex;
		color: #4c4b4b;
		font-weight: 600;
		font-size: 1em;
		padding: 1px 11px;
	}

	span.card-icon {
		position: absolute;
		font-size: 3em;
		bottom: .2em;
		color: #ffffff80;
	}

	.file-item {
		cursor: pointer;
	}

	a.custom-menu-list:hover,
	.file-item:hover,
	.file-item.active {
		background: #80808024;
	}

	a.custom-menu-list span.icon {
		width: 1em;
		margin-right: 5px
	}
	body{
		width: 90%;
	}
/* -----------------------------------------------------------------*/
	

.candidate {
	    margin: auto;
	    width: 25vw;
	    padding: 10px;
	    cursor: pointer;
	    border-radius: 3px;
	    margin-bottom: 1em;
	
	}
	.candidate:hover {
	    background-color: #80808030;
	  
	}
	.candidate img {
	    height: 14vh;
	    width: 8vw;
	    margin: auto;
	}
	.candidate-name{
		position: relative;
		left: 100px;
	}

/* ------------------------------------------------ */

	#block1 {
		background-color: #fca311;
		position: relative;
		left: 250px;
	}

	#block2 {
		background-color: #d62828;
		position: relative;
		left: 250px;
	}
	#if-part{
		position: relative;
		left: 90px;
		top: -170px;
	}
	#else-part{
		position: relative;
		left: 90px;
	
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
			<div id="block2" class="card col-md-4.5 offset-2  ml-4 float-left">
				<div class="card-body text-white">
					<h4><b>Vote Percentage</b></h4>
					<hr>
					<span class="card-icon"><i class="fa fa-user-tie"></i></span>
					<h3 class="text-right"><b><?php
												$voters = $conn->query('SELECT * FROM user where type = 2 ')->num_rows;

												$voted = $conn->query('SELECT distinct(user_id) FROM votes where voting_id = ' . $id)->num_rows;


												$voted_per = ceil($voted / $voters * 100);

												echo "$voted_per%";


												?></b></h3>
				</div>
			</div>
		</div>
	</div>

	<div id='else-part' style='visibility: hidden'>
	<center><br><br><br><br><br><br>
		<h1 class="ab">

			<?php include 'db_connect.php';

			$sql = "SELECT `notice` FROM `notice` WHERE `event` ='Result Declaration'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
			?> <div style="font-size:0.3em; position: relative; top:-10px; ">
						<h1 style=" font-size: 50px;"><?php echo $row['notice'];
													}
												} ?><h1>
					</div>


		</h1>
	</center>
</div>
	<div class="flex-container">
	<div id='if-part' style='visibility: hidden;'>
		<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-15">
				<div class="card">
					<div class="card-body">
						<div class="text-center">
							<h3><b><?php echo $title ?></b></h3>
							<small><b><?php echo $description; ?></b></small>
						</div>
						<?php
						$cats = $conn->query("SELECT * FROM category_list where id in (SELECT category_id from voting_opt where voting_id = '" . $id . "' )");
						while ($row = $cats->fetch_assoc()) :
						?>
							<hr>
							<div class="row mb-4">
								<div class="col-md-12">
									<div class="text-center">
										<h3><b><?php echo $row['category'] ?></b></h3>
									</div>
								</div>
							</div>
							<div class="row mt-3"><br><br>
								<?php foreach ($opt_arr[$row['id']] as $candidate) {
								?>
								<div class="candidate" style="position: relative;"  >
				
								<div class="item" >
								<div style="display: flex">
									<img src="assets/img/<?php echo $candidate['image_path'] ?>" alt="">
								</div>
								<br>
								<div class="text-center">
								<div class=""><b>Candidate Name : </b><?php echo ucwords($candidate['opt_txt']) ?></div>
										<div class=""><b>Gender : </b><?php echo ucwords($candidate['gender']) ?></div>
										<div class=""><b>Political Party : </b><?php echo ucwords($candidate['political_party']) ?></div>
										<div class=""><b>Total Votes :</b> <?php echo isset($v_arr[$candidate['id']]) ? number_format($v_arr[$candidate['id']]) : 0  ?></div>

								</div>
								</div>
							</div>
								<?php } ?>
							</div>
						<?php endwhile; ?>
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>
	
</div>











<?php



$sql = "SELECT * FROM notice where event='Result Declaration'	";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$date_main = $row['date'];
$start_time = $row['start_time'];


?>


<script type="text/javascript">
	var currentdate = new Date();
	var date1 = +currentdate.getDate() + "/" +
		(currentdate.getMonth() + 1) + "/" +
		currentdate.getFullYear();

	var time1 = +currentdate.getHours() + ":" +
		currentdate.getMinutes() + ":" +
		currentdate.getSeconds();


	if (date1 == '<?php echo $date_main ?>' && time1 >= '<?php echo $start_time ?>') {
		node = document.getElementById('if-part');
	} else {
		node = document.getElementById('else-part');
	}
	node.style.visibility = 'visible';
</script>
