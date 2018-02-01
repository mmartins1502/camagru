<?PHP 
session_start();
require_once('./html/head.php');

?>

<html>
	<header>
    <?php if ($_SESSION['auth']):?>
      <nav class="navbar navbar-dark bg-dark">
          <a class="navbar-brand header" href="./cam.php">
              <img src="./img/camagru-blanc.png" width="90" height="40" alt="">
          </a>
          <ul class="nav justify-content-end">
                  <li class="nav-item">
                    <a class="nav-link header disabled">Gallery</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link header active" href="./cam.php">Home</a>
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
    <?php else:?>
      <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand header" href="./gallery.php">
          <img src="../../camagru/img/camagru-blanc.png" width="90" height="40" alt=""></a>
        <ul class="nav justify-content-end">
                <li class="nav-item">
                  <a class="nav-link header disabled" >Gallery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link header active" href="./register.php">Sign Up</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link header active" href="./index.php">Sign In</a>
                </li>
        </ul>
      </nav>
    <?php endif;?>
    </header>
	<body>
        <div><img class="img-gallery" src="./img/camagru-black.png" alt=""></div>
        <div class="content-all container">
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
                  foreach ($result as $value)
                  {
                      echo "<img class='photos' width='30%' src='" . $value['url'] . "'/>";
                  }
            ?>
        </div>
    </body>
    </html>