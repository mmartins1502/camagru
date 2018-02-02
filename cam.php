<?PHP 
session_start();
require_once('./html/head.php');
require('./php/loggued_only.php');

?>

<html>
	<header>
        <nav class="navbar navbar-dark bg-dark" style="z-index: 1;">
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
		<div class="mainpage">
		<div class="row">
		<div class="column col-xs-11">
			<div class='container'>
				<div class="main container">
					<div class="wrapper" style="width:1200px;">
						<div id="one">
							<div id='top-center-app' class='cam container' style="text-align: center;float:left;">
								<div id='area' style="width:500px;float: left;">
									<video id='camera'  autoplay></video>
									<div id='drag' style="position: absolute; width: 250px;z-index: 1; top: -1px"></div>
								</div>
								<button id="vid_button" class="btn btn-lg btn-danger">Snapshot</button>
							</div>
						<div id="two" style="width:500px;float: left;">
							<canvas id='canvas' class="canvas"></canvas>
						</div>
					</div>
				</div>
				<div class="column col-xs-1 side" id="sidebar">
					<div class="">
						<img id='ciel'class='object action' style="border: solid black 2px; border-radius: 15px;width: 100px;background-color:white; opacity:20%;"  width=100 src='./img/filters/arcenciel.png' />
						<img id='dog' class='object action' style="border: solid black 2px; border-radius: 15px;width: 100px;background-color:white; opacity:20%;"  width=80 src='./img/filters/chien.png' />
						<img id='demon' class='object action' style="border: solid black 2px; border-radius: 15px;width: 100px;background-color:white; opacity:20%;"  width=100 src='./img/filters/demon.png' />
						<img id='unicorn' class='object action' style="border: solid black 2px; border-radius: 15px;width: 100px;background-color:white; opacity:20%;"  width=100 src='./img/filters/licorne.png' />
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
				<!-- <ul>
					<li id='tab-upload' class='hidden'>Image Upload
						<div id='no-camera' class='hidden'>
							<input type='file' name='fileToUpload' id='fileToUpload' />
						</div>
					</li>
				</ul> -->
			<div id='bottom' class="bottom">
				<div class="container" style="padding-right: -2vw;">
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
			</div>
		</div>
		<script src="./js/cam.js"></script>
	</body>
	<footer class="footer">mmartins 2018</footer>
</html>