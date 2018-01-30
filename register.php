<?PHP require_once('./html/head.php')?>

<html>
<header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="./index.php">
                <img src="../../camagru/img/camagru-blanc.png" width="90" height="40" alt="">
            </a>
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" >Sign Up</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./index.php">Sign In</a>
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
        <div class="menu">
            <img class=img-menu src="./img/camagru-black.png">
         
            <form method='post' action='./php/subscription.php'>
            <!-- <span><button class=fb id=facebook type='submit' name='subscribe'><i aria-hidden='true'></i><span id=fb_img_butt></span>Se connecter avec Facebook</button></span>

            <h1>OR</h1><br> -->

            <input id='login' type='email' name='email' value='' placeholder='Email' autocomplete='on' required/>
            <input id='login' type='text' name='login' value='' placeholder='Login (3 - 32)' autocomplete='on' required/>
            <input id='login' type='password' name='password' value='' placeholder='Password (4 - 50)' autocomplete='on' required/>
            <input id='login' type='password' name='password-check' value='' placeholder='Type your password again' autocomplete='on' required/>
            <button id='login-button' class="btn btn-lg btn-primary btn-block" type='submit' name='subscribe'>Inscription</button><br>
            <div class=text>En vous inscrivant, vous acceptez nos <br>Conditions d’utilisation et notre <br>Politique de confidentialité.</div>
        </form>

        </div>
			<a  id="copyright">© mmartins 2018</a>
	</body>
</html>