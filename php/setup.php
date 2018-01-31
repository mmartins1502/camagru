<?PHP
// $servername = "localhost";
// $username = "root";
// $password = "150291";

try
{
    $pdo = new PDO('mysql:host=127.0.0.1', root, 150291);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = 'CREATE DATABASE db_camagru';
    $req = $pdo->prepare($req);
    $req->execute();
    // header(“location:index.php”);
}
catch(PDOException $e)
{
    // echo 'Error creating DataBase: ' . $e->getMessage();
}


    try {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=db_camagru;', root, 150291);
        $user = $pdo->query('CREATE TABLE IF NOT EXISTS users
            (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            login VARCHAR(255) NOT NULL,
            password VARCHAR(128),
            email VARCHAR(255) NOT NULL,
            confirmation_token VARCHAR(255) NULL,
            registred BOOLEAN NOT NULL DEFAULT 0,
            is_admin BOOLEAN NOT NULL DEFAULT 0)'
        );
        $img = $pdo->query('CREATE TABLE IF NOT EXISTS img
            (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            base_64 MEDIUMTEXT CHARACTER SET ascii NOT NULL,
            user_id INT UNSIGNED NOT NULL,
            url VARCHAR(255) NULL,            
            likes INT NOT NULL DEFAULT 0,
            dates TIMESTAMP NOT NULL DEFAULT now(),
            comments_nb INT NOT NULL DEFAULT 0,
            filter VARCHAR(255) NOT NULL DEFAULT "")'
        );
        $comments = $pdo->query('CREATE TABLE IF NOT EXISTS comments
            (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            img_id INT(11) UNSIGNED NOT NULL,
            user_id INT(11) UNSIGNED NOT NULL,
            user_email VARCHAR(255) NOT NULL,
            dates TIMESTAMP NOT NULL DEFAULT now(),
            content TEXT NOT NULL,
            avatar VARCHAR(255))'
        );
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    return $pdo;
 ?>