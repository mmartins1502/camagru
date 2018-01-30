<?PHP
$admin = "admin";
$user_id = $_GET['id'];
$token = $_GET['token'];
require './setup.php';
$req = $pdo->prepare('SELECT * FROM users WHERE (id = :id)');
$req->execute(['id' => $user_id]);
$user = $req->fetch();
session_start();

if($user && $user['confirmation_token'] == $token ){
    $req = $pdo->prepare('UPDATE users SET confirmation_token = :confirmation_token, registred = :registred WHERE id = :id');
    $req->execute(['confirmation_token' => NULL, 'registred' => 1,'id' => $user_id]);
    $_SESSION['flash']['success'] = 'Votre compte a bien été validé';
    $req = $pdo->prepare('UPDATE users SET is_admin = :is_admin WHERE login = :login');
    $req->execute(['is_admin' => 1,'login' => $admin]);
    $_SESSION['auth'] = $user;
    // var_dump($user);
    header('Location: ../index.php');
}else{
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
    header('Location: ../index.php');
}
?>