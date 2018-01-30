<?PHP
    function str_random($length) {
        $alphabet = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
        // return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $lenght);
        $string = '';
        for ($i = 0; $i < $length; $i++)
        {
            $rand = rand(0, $length);
            $string .= $alphabet[$rand];
        }
        return $string;
    }

    if(empty($errors)){
      
            require_once('./setup.php');
            
            // On génère le token qui servira à la validation du compte 
            $token = str_random(60);
            $login =  $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordcheck = $_POST['password-check'];
            if ($password != $passwordcheck){
                echo $_SESSION['flash']['fail'] = 'Verification du mot de passe incorrecte.';
                return(0);
            }
            if (login != "admin"){
                $req = $pdo->prepare("SELECT * FROM users WHERE login = :login OR email = :email");
                $req->execute(['login' => $login, 'email' => $email]);
                $user = $req->fetchAll();
                if (!(empty($user)))
                {
                    echo $_SESSION['flash']['fail'] = 'Cet email ou ce login existe deja.';
                    return (0);
                }
            }

            
            // $password = $_POST['password'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            // On enregistre les informations dans la base de données
            try{
                $req = $pdo->prepare("INSERT INTO users (login, password, email, confirmation_token) VALUES (:login, :pass, :email, :token)");
                $req->bindValue('login', $login, PDO::PARAM_STR);
                $req->bindValue('pass', $password, PDO::PARAM_STR);
                $req->bindValue('email', $email, PDO::PARAM_STR);
                $req->bindValue('token', $token, PDO::PARAM_STR);
                $req->execute();
            }
            catch (Exception $e)
            {
                die(var_dump($e->getMessage()));
            }
            // On ne sauvegardera pas le , mot de passe en clair dans la base mais plutôt un hash
            $user_id = $pdo->lastInsertId();
            // On envoit l'email de confirmation
            mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost:8080/Camagru/php/confirm.php?id=$user_id&token=$token");
            // On redirige l'utilisateur vers la page de login avec un message flash
            echo $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
            // header('Location: ./index.php');
            // exit();
        }
?>