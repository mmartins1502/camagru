<?PHP
session_start();
function loggued_only(){
    if(!isset($_SESSION['auth'])){
        echo $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
        exit();
    }
}

loggued_only();
?>