<?PHP

function alertJS(){
    return '<script type="text/javascript"> alert(\'Identifiant ou mot de passe incorrect ! \'); </script>';
    }

session_start();
    if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password'])){
        require_once 'setup.php';
        $req = $pdo->prepare('SELECT * FROM users WHERE (login = :login) AND confirmation_token IS NULL');
        $req->execute(['login' => $_POST['login']]);
        $user = $req->fetch();        

        if($user == null){
            echo alertJS();
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect : User = NULL';
            exit;           
        }else if(password_verify($_POST['password'], $user['password'])){
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
            header('Location: ../cam.php');
            exit;            
        }
        header('Location: ../index.php'); 
        exit;          
    }
?>