<?PHP
session_start();
function loggued_only(){
    // if(session_status() == PHP_SESSION_NONE){
    //     session_start();
	// }
	// var_dump($_SESSION['auth']);
    if(!isset($_SESSION['auth'])){
        echo $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
        // header('Location: ./login.php');
        exit();
    }
}

loggued_only();
?>