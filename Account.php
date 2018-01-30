<?PHP 
session_start();
require_once('./html/head.php');
require('./php/loggued_only.php');
?>

<html>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand header" href="./cam.php">
            <img src="../../camagru/img/camagru-blanc.png" width="90" height="40" alt="">
        </a>
        <ul class="nav justify-content-end">
                <li class="nav-item">
                <a class="nav-link header active" href="./gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                <a class="nav-link header" href="cam.php">Home</a>
                </li>
                <?php if ($_SESSION['auth']):?>
                <li class="nav-item">
                <a class="nav-link disabled"><?php echo $_SESSION['auth']['login'];?></a>
                </li>
                <?php endif;?>                
                <li class="nav-item">
                <a class="nav-link " href="./php/logout.php">Log Out</a>
                </li>
        </ul>
    </nav>
</header>
	<body>
        <div class="menu container"><br>
            <!-- <img class=img-menu src="./img/camagru-black.png"> -->
            <h1>Change your password !</h1>
            <form method='post' action='./php/change_pass.php'>
            <input id='login' type='password' name='Old_pass' value='' placeholder='Old Password' autocomplete='on' required/>
            <input id='login' type='password' name='New_pass' value='' placeholder='New Password' autocomplete='on' required/>
            <input id='login' type='password' name='pass-check' value='' placeholder='Type your password again' autocomplete='on' required/>
            <button id=login-button class="btn btn-lg btn-primary btn-block container" >Save Password</button><br>
            </form>
            <h1>Change your Login !</h1>
            <form method='post' action='./php/change_login.php'>
            <input id='login' type='login' name='Old_login' value='' placeholder='Old Login' autocomplete='on' required/>
            <input id='login' type='login' name='New_login' value='' placeholder='New Login' autocomplete='on' required/>
            <button id=login-button class="btn btn-lg btn-primary btn-block container" >Save Login</button><br>
            </form>
            <form method='post' action='./php/delete_users.php'>
            <button id=login-button class="btn btn-lg btn-danger btn-block container" >Delete my Account</button>
            </form>
        </div>
	</body>
</html>