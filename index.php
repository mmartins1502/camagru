<?PHP require_once('head.php')?>
<html>
	<body>
        <div>
            <div class=logo></div>
        </div>
        <div class="menu">
            <img class=img-menu src="./img/camagru-black.png">

            <form method='post' action='./server/login.php'>
                <input id='login' type='text' name='login' value='' placeholder='Login' autocomplete='off' required/><br>
                <input id='login' type='password' name='password' value='' placeholder='Password' autocomplete='off' required/><br>
                <button id='login-button' type='submit' name='connect'><i class='fa fa-sign-in' aria-hidden='true'></i>Se connecter</button><br>
                <h1>OU</h1><br>
                <span class="fb"><img class="fb_img" src="./img/Fb_icon.png">Se connecter avec Facebook</span><br>
                <span ><a id='forgot' href='forgot'>Mot de passe oublié ?</a></span><br>
                <p>Vous n’avez pas de compte  ? <a href="register.php">Inscrivez-vous</a></p>
            </form>

        </div>
			<a  id="copyright">© mmartins 2018</a>
	</body>
</html>