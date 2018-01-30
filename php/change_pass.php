<?PHP
session_start();
if($_SESSION['auth'] != NULL && !empty($_POST) && !empty($_POST['Old_pass']) && !empty($_POST['New_pass']) && !empty($_POST['pass-check'])) {
    require_once 'setup.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE login = :login');
    $req->execute(['login' => $_SESSION['auth']['login']]);
    $user = $req->fetch();
    if (password_verify($_POST['Old_pass'], $user['password'])) {
        if ($_POST['New_pass'] == $_POST['pass-check']) {
            $pass = password_hash($_POST['New_pass'], PASSWORD_BCRYPT);
            $req = $pdo->prepare('UPDATE users SET password = :password WHERE login = :login');
            $req->execute(['password' => $pass, 'login' => $_SESSION['auth']['login']]);
            header('Location : ./lougout.php');
        }
    }
}
?>