<?PHP

function alertJS(){
    return '<script type="text/javascript"> alert(\'Votre compte a bien été supprimé ! \'); </script>';
    }
     
    
    session_start();
    if($_SESSION['auth'] != NULL){
        require_once 'setup.php';
        $req = $pdo->prepare('DELETE FROM users WHERE login = :login');
        $req->execute(['login' => $_SESSION['auth']['login']]);
        unset($_SESSION['auth']);
        header('Location : ../index.php');
        echo ("Votre compte a bien été supprimé !");
    }
?>