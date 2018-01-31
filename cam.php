<?PHP 
session_start();
require_once('./html/head.php');
require('./php/loggued_only.php');

?>

<html>
	<header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand header" href="./cam.php">
                <img src="../../camagru/img/camagru-blanc.png" width="90" height="40" alt="">
			</a>
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link header active" href="./gallery.php">Gallery</a>
                    </li>
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
			<div class='top-app container' height=450px>
				<div class="row">
					<div id='top-center-app' class='cam col-md-6' style="text-align: center;">
						<video id='camera' autoplay>COUCOU</video>
						<button id="vid_button" class="btn btn-lg btn-danger">Snapshot</button>
					</div>
					<div class="col-md-6">
						<canvas id='canvas' class="canvas"></canvas>
					</div>
				</div>
			</div>
			

			<div class='bottom-app'>
				<div class="container" id='bottom-left-app'>
					<h3 class="container" style="text-align: center; width: 20vw; border: solid 1px black; border-radius: 15px; color: black; background-color: white;">Objects</h3>
				<div class="content-all container" style="max-height: 20%; max-width: 40%;">
						<ul id='tab-obj'>
							<div id='objects'>
								<img style="background-color: white;" class='object action' width=100 src='./img/filters/arcenciel.png' />
								<img style="background-color: white;" class='object action' width=80 src='./img/filters/chien.png' />
								<img style="background-color: white;" class='object action' width=100 src='./img/filters/demon.png' />
								<img style="background-color: white;" class='object action' width=100 src='./img/filters/licorne.png' />
							</div>
						</ul>
				</div>
				<ul>
					<li id='tab-filters'>
						Filters
						<!-- <div id='filters'>
							<button class="filter action " id="Normal" type="button" name="Normal">Normal</button>
						</div> -->
					</li>
					<li id='tab-upload' class='hidden'>Image Upload
						<div id='no-camera' class='hidden'>
							<input type='file' name='fileToUpload' id='fileToUpload' />
						</div>
					</li>
				</ul>
	<script src="./js/cam.js"></script>
	</body>
</html>