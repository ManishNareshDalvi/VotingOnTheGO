<style>
	.logo {
    margin: auto;
    font-size: 25px;
    /*//background: black;*/
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
#name{
	font-size: 25px;
	position: relative;
	top: 5px;
}
#navbar{
	background-color: black;
}
</style>

<nav class="navbar navbar-dark fixed-top " style="padding:0;" id="navbar">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  				<img src="assets\img\logo.png" alt="..." width="50%">
  			</div>
  		</div>
	  	<div id="name" class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class='bx bx-log-out'></i></a>
	    </div>
    </div>
  </div>
  
</nav>