
<style>
	#sidebar a{
		background-color:#fe6d73;
	}
	#sidebar{
		background-color: #fe6d73;
	}
</style>

<nav id="sidebar" class='mx-lt-5' >
		
		<div class="sidebar-list">
		<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=voting_list" class="nav-item nav-voting_list nav-manage_voting"><span class='icon-field'><i class="fa fa-poll-h"></i></span> Election</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Category</a>
				<a href="index.php?page=notice" class="nav-item nav-notice"><span class='icon-field'><i class='bx bx-notepad'></i></span> Notice</a>
				
				<a href="index.php?page=pending_forms" class="nav-item nav-pending_forms"><span class='icon-field'><i class='bx bx-user-check'></i></span> Pending Forms</a>
				<a href="index.php?page=voters_data" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Voters Info</a>
			<?php endif; ?>
			
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>