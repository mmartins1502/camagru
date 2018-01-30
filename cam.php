<?PHP 
session_start();
require_once('./html/head.php');
require('./php/loggued_only.php');
?>

	<!-- <img class=logout src="./img/red-logout.png"> -->
<html>
	<header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand header" href="./cam.php">
                <img src="../../camagru/img/camagru-blanc.png" width="90" height="40" alt="">
						</a>
						<!-- <?php if ($_SESSION['auth']):?>
        		<div class="nav-link" >Welcome <?php echo $_SESSION['auth']['login'];?> </div>
        		<?php endif;?> -->
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link header active" href="#">Gallery</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link header" href="./register.php">Sign Up</a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link header disabled">Home</a>
                    </li>
                    <?php if ($_SESSION['auth']):?>
										<li class="nav-item">
										<a class="nav-link" href="./Account.php"><?php echo $_SESSION['auth']['login'];?></a>
										</li>
		                <?php endif;?>
										<li class="nav-item">
                      <a class="nav-link " href="./php/logout.php">Log Out</a>
                    </li>
            </ul>
        </nav>
    </header>
	<body>
		<div class='main app'>
		<br>
			<div class='top-app'>
				<div id='top-left-app' class='webcam'>
					<!-- if camera available -->
					<video id='camera' width="100%" autoplay></video>
					<!-- else -->
					<img class='hidden' id='top-left-img' src='' alt='top-left-img' />
				</div>
				<div id='top-right-app' class='preview'>
					<!-- hidden -->
					<canvas class='hidden' id='canvas' width='' height=''></canvas>
					<!-- div for image -->
					<div id='logo' style='position:absolute;width:200px;height:200px;z-index:100;top:600px;left:0px;background:url("");background-size:cover;'>
					</div>
				</div>
			</div>
		<script type='text/javascript' src='./js/app.js'></script>		
	</body>
</html>