<?PHP 
session_start();
require_once('./html/head.php');
require('./php/loggued_only.php');
?>

	<!-- <img class=logout src="./img/red-logout.png"> -->
<html>
	<header>
				<!-- <script type='text/javascript' src='./js/app.js'></script>		 -->
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand header" href="./cam.php">
                <img src="../../camagru/img/camagru-blanc.png" width="90" height="40" alt="">
						</a>
						<!-- <?php if ($_SESSION['auth']):?>
        		<div class="nav-link" >Welcome <?php echo $_SESSION['auth']['login'];?> </div>
        		<?php endif;?> -->
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link header active" href="./gallery.php">Gallery</a>
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
			<div class='top-app container' height=450px>
				<div id='top-center-app' class='cam' style="text-align: center;">
					<video id='camera' autoplay>COUCOU</video>
					<button id="vid_button" class="btn btn-lg btn-danger" onclick="clone()">Snapshot</button>
				</div>
				<canvas id='canvas' width='150' height='150'></canvas>
				<div id='logo' style='position:absolute;width:200px;height:200px;z-index:100;top:600px;left:0px;background:url("");background-size:cover;'></div>
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
				<li id='tab-filters'>
					Filters
					<!-- <div id='filters'>
						<button class="filter action " id="Normal" type="button" name="Normal">Normal</button>
						<button class="filter action _1977" id="1977" type="button" name="1977">1977</button>
						<button class="filter action aden" id="Aden" type="button" name="Aden">Aden</button>
						<button class="filter action brooklyn" id="Brooklyn" type="button" name="Brooklyn">Brooklyn</button>
						<button class="filter action clarendon" id="Clarendon" type="button" name="Clarendon">Clarendon</button>
						<button class="filter action earlybird" id="Earlybird" type="button" name="Earlybird">Earlybird</button>
						<button class="filter action gingham" id="Gingham" type="button" name="Gingham">Gingham</button>
						<button class="filter action Hudson" id="Hudson" type="button" name="Hudson">Hudson</button>
						<button class="filter action inkwell" id="Inkwell" type="button" name="Inkwell">Inkwell</button>
						<button class="filter action lark" id="Lark" type="button" name="Lark">Lark</button>
						<button class="filter action lofi" id="Lo-Fi" type="button" name="Lo-Fi">Lo-Fi</button>
						<button class="filter action mayfair" id="Mayfair" type="button" name="Mayfair">Mayfair</button>
						<button class="filter action moon" id="Moon" type="button" name="Moon">Moon</button>
						<button class="filter action nashville" id="Nashville" type="button" name="Nashville">Nashville</button>
						<button class="filter action perpetua" id="Perpetua" type="button" name="Perpetua">Perpetua</button>
						<button class="filter action reyes" id="Reyes" type="button" name="Reyes">Reyes</button>
						<button class="filter action rise" id="Rise" type="button" name="Rise">Rise</button>
						<button class="filter action slumber" id="Slumber" type="button" name="Slumber">Slumber</button>
						<button class="filter action toaster" id="Toaster" type="button" name="Toaster">Toaster</button>
						<button class="filter action walden" id="Walden" type="button" name="Walden">Walden</button>
						<button class="filter action willow" id="Willow" type="button" name="Willow">Willow</button>
						<button class="filter action xpro2" id="X-pro-II" type="button" name="X-pro-II">X-pro II</button>
						<button class="filter action sepia" id="Sepia" type="button" name="Sepia">Sepia</button>
						<button class="filter action blur" id="Blur" type="button" name="Blur">Blur</button>
					</div> -->
				</li>
				<li id='tab-upload' class='hidden'>Image Upload
					<div id='no-camera' class='hidden'>
						<input type='file' name='fileToUpload' id='fileToUpload' />
					</div>
				</li>
			</ul>
			<img class='hidden return-img' id='return-img' src='' alt='return-img' />
		</div>
		<div id='bottom-right-app' class='last-taken'>
			<?php
				if (isset($results)) {
					?> <ul class='last-taken'>
						<li><h2>Last 4 photos taken: </h2><?php
						foreach ($results as $img) { ?>
							<div class='gallery-single-small' id='<?php echo $img['id']; ?>'>
								<a href='single/<?php echo $img['id']; ?>'>
									<img class='<?php echo filter($img['id']); ?>' src='<?php echo $img['base_64']; ?>' alt='img-<?php echo $img['id']; ?>'/>
								</a>
							</div>
				<?php }
				} ?>
					</li>
				</ul>
		</div>
	</div>
</div>
	<script type="text/javascript">

	function init(){
		navigator.getUserMedia = navigator.getUserMedia ||
								navigator.webkitGetUserMedia ||
								navigator.mozGetUserMedia;

		if (navigator.getUserMedia) {
									navigator.getUserMedia({ audio: false, video: { width: 1280, height: 720 } },
									function(stream) {
													var video = document.querySelector('video');
													video.src = window.URL.createObjectURL(stream);
													video.onloadedmetadata = function(e) {
																							video.play();		
													};	
									}, function(err) {
													console.log("The following error occurred: " + err.name);
									}
									);
		} else {
		console.log("getUserMedia not supported");
		}
	}

	function clone(){
		var vivi = document.getElementById('video');
		var canvas1 = document.getElementById('canvas').getContext('2d');
		canvas1.drawImage(vivi, 0,0, 150, 112);
		var base64=document.getElementById('canvas').toDataURL("image/png");	//l'image au format base 64
		document.getElementById('tar').value='';
		document.getElementById('tar').value=base64;
	}

	window.onload = init();
	</script>
	</body>
</html>