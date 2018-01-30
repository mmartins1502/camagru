<?PHP require_once('head.php')?>

<html>
	<body>
        <div>
            <div class=logo></div>
        </div>
        <div class="menu">
            <img class=img-menu src="./img/camagru-black.png">
         
            <form method='post' action='./subscription.php'>
            <span><button class=fb id=facebook type='submit' name='subscribe'><i aria-hidden='true'></i><span id=fb_img_butt></span>Se connecter avec Facebook</button></span>

            <h1>OR</h1><br>

            <input id='login' type='email' name='email' value='' placeholder='Email' autocomplete='on' required/>
            <input id='login' type='text' name='login' value='' placeholder='Login (3 - 32)' autocomplete='on' required/>
            <input id='login' type='password' name='password' value='' placeholder='Password (4 - 50)' autocomplete='on' required/>
            <input id='login' type='password' name='password-check' value='' placeholder='Type your password again' autocomplete='on' required/>
            <button class=fb id=facebook type='submit' name='subscribe'><i  aria-hidden='true'></i>Inscription</button><br>
            <div class=text>En vous inscrivant, vous acceptez nos <br>Conditions d’utilisation et notre <br>Politique de confidentialité.</div>
        </form>

        </div>
			<a  id="copyright">© mmartins 2018</a>
	</body>
</html>