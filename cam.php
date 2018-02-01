<?PHP 
session_start();
require_once('./html/head.php');
require('./php/loggued_only.php');

?>

<html>
	<header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand header" href="./cam.php">
                <img src="./img/camagru-blanc.png" width="90" height="40" alt="">
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
		<br>
			<div class='container' height=450px>
				<div class="row">
					<div class="main col-lg-8 row container">
						<div id='top-center-app' class='cam col-md-6' style="text-align: center;float:left;">
							
							<video id='camera'  autoplay></video>
							<div id='drag' style="position: absolute; width: 250px;"></div>
							<button id="vid_button" class="btn btn-lg btn-danger">Snapshot</button>
						</div>
						<div class="col-md-6" style="text-align: center;float:right;position:relative;">
							<canvas id='canvas' class="canvas"></canvas>
						</div>
					</div>
					<div class="side col-lg-2">
						<img id='ciel' style="background-color: white;" class='object action' width=100 src='./img/filters/arcenciel.png' />
						<img id='dog'  style="background-color: white;" class='object action' width=80 src='./img/filters/chien.png' />
						<img id='demon'  style="background-color: white;" class='object action' width=100 src='./img/filters/demon.png' />
						<img id='unicorn'  style="background-color: white;" class='object action' width=100 src='./img/filters/licorne.png' />
					</div>
				</div>
			</div>
			<br><br><br><br><br>
				<!-- <ul>
					<li id='tab-upload' class='hidden'>Image Upload
						<div id='no-camera' class='hidden'>
							<input type='file' name='fileToUpload' id='fileToUpload' />
						</div>
					</li>
				</ul> -->
			<div id='bottom' class="bottom container">
				<?PHP 
									try
									{
										$pdo = new PDO('mysql:host=127.0.0.1;dbname=db_camagru;', root, 150291);    
										$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$req = $pdo->prepare('SELECT * FROM img ORDER BY dates DESC');
										$req->execute();
										$result = $req->fetchAll();
									}
									catch (Exception $e)
									{
										echo "Couldn't load photos : " . $e->getMessage();
									}
									foreach ($result as $key => $value)
									{
										if ($key <= 3)
												echo "<img class='preview' id='$key' width='20%' src='" . $value['url'] . "'/>";
										else
												break;
									}
						?>
			</div>
	<script src="./js/cam.js"></script>
	</body>
</html>