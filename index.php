<?PHP
require_once('./html/head.php');
$servername = "localhost";
$username = "root";
$password = "150291";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
    // echo "Database created successfully";
} else {
    // echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<html>
<header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand header" href="./index.php">
                <img src="../../camagru/img/camagru-blanc.png" width="90" height="40" alt="">
            </a>
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link header active" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link header" href="./register.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link header disabled">Sign In</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link " href="#">Account</a>
                    </li> -->
                    <!-- <li class="nav-item">
                    <a href="index.php" src="./php/logout.php"><img id=logout src="./img/red-logout.png" alt=logout width="80"></a>
                    </li>                     -->
            </ul>
        </nav>
    </header>
	<body>
        <!-- <div>
            <div class=logo></div>
        </div> -->
        <div class="menu">
            <img class=img-menu src="./img/camagru-black.png">

            <form method='post' action='./php/login.php'>
                <input id='login' type='text' name='login' value='' placeholder='Login' autocomplete='off' required/><br>
                <input id='login' type='password' name='password' value='' placeholder='Password' autocomplete='off' required/><br>
                <button id='login-button' class="btn btn-lg btn-primary btn-block" type='submit' name='connect'><i class='fa fa-sign-in' aria-hidden='true'></i>Se connecter</button><br>
                <!-- <h1>OU</h1><br>
                <span class="fb"><img class="fb_img" src="./img/Fb_icon.png">Se connecter avec Facebook</span><br> -->
                <span ><a id='forgot' href='forgot'>Mot de passe oublié ?</a></span><br>
                <p>Vous n’avez pas de compte  ? <a class=register href="./register.php">Inscrivez-vous</a></p>
            </form>

        </div>
	</body>
</html>