<?PHP
require_once('./html/head.php');
require_once('./php/setup.php');
?>

<html>
<header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand header" href="./gallery.php">
                <img src="./img/camagru-blanc.png" width="90" height="40" alt="">
            </a>
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link header active" href="./gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link header" href="./register.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link header disabled">Sign In</a>
                    </li>
            </ul>
        </nav>
    </header>
	<body>
        <div class="menu container">
            <img class="img-menu container" src="./img/camagru-black.png">

            <form method='post' action='./php/login.php'>
                <input id='login' type='text' name='login' value='' placeholder='Login' autocomplete='off' required/><br>
                <input id='login' type='password' name='password' value='' placeholder='Password' autocomplete='off' required/><br>
                <button id='login-button' class="btn btn-lg btn-primary btn-block container" type='submit' name='connect'><i class='fa fa-sign-in' aria-hidden='true'></i>Se connecter</button><br>
                <span ><a id='forgot' href='forgot'>Mot de passe oublié ?</a></span><br>
                <p>Vous n’avez pas de compte  ? <a class=register href="./register.php">Inscrivez-vous</a></p>
            </form>

        </div>
	</body>
</html>