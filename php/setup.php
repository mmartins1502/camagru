<?PHP
    $dsn = 'mysql:dbname=myDB;host=127.0.0.1';
    $userdb = 'root';
    $passworddb = '150291';
    try {
        $pdo = new PDO($dsn, $userdb, $passworddb);
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