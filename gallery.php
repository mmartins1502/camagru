<?PHP 
session_start();
require_once('./html/head.php');
?>

	<!-- <img class=logout src="./img/red-logout.png"> -->
<html>
	<header>
    <?php if ($_SESSION['auth']):?>
      <nav class="navbar navbar-dark bg-dark">
          <a class="navbar-brand header" href="./cam.php">
              <img src="../../camagru/img/camagru-blanc.png" width="90" height="40" alt="">
          </a>
          <!-- <?php if ($_SESSION['auth']):?>
          <div class="nav-link" >Welcome <?php echo $_SESSION['auth']['login'];?> </div>
          <?php endif;?> -->
          <ul class="nav justify-content-end">
                  <li class="nav-item">
                    <a class="nav-link header disabled">Gallery</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link header" href="./register.php">Sign Up</a>
                  </li> -->
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
            // PHP $req = $pdo->prepare('SELECT * FROM img')->execute();
            // $ligne = mysqli_fetch_assoc($req);

            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="Video thumbnail" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
            <img src="https://images.unsplash.com/photo-1448814100339-234df1d4005d?crop=entropy&fit=crop&fm=jpg&h=400&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=600" width="30%" alt="" />
        </div>
    </body>
    </html>